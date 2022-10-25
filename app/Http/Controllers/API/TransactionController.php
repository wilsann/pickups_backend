<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class TransactionController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 10);
        $trash_id = $request->input('trash_id');
        $date_time = $request->input('date_time');
        $status = $request->input('status');
        
        if($id)
        {
            $transaction = Transaction::with(['trash', 'user'])->find($id);

            if($transaction)
            {
                return ResponseFormatter::success(
                    $transaction, 'Data transaksi berhasil diambil'
                );
            }
            else
            {
                return ResponseFormatter::error(
                    null,
                    'Data transaksi tidak ditemukan',
                    404
                );
            }
        }

        $transaction = Transaction::with(['trash', 'user'])
                        ->where('user_id', Auth::user()->id);

        if($trash_id)
        {
            $transaction->where('trash_id', $trash_id);
        }

        if($status)
        {
            $transaction->where('status', $status);
        }

        return ResponseFormatter::success(
            $transaction->paginate($limit),
            'Data list transaksi behasil diambil'
        );
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->update($request->all());

        return ResponseFormatter::success($transaction, 'Transaksi berhasil diperbarui');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'trash_id' => 'required|exists:trashes,id',
            'quantity' => 'required',
            'total' => 'required',
            // 'date_time' => 'required',
            'status' => 'required',
        ]);

        $transaction = Transaction::create([
            'user_id' => $request->user_id,
            'trash_id' => $request->trash_id,
            'quantity' => $request->quantity,
            'total' => $request->total,
            // 'date_time' => $request->date_time,
            'status' => $request->status,
            'payment_url' => '',
        ]);

        //Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        //Panggil transaksi yang udah dibuat
        $transaction = Transaction::with(['trash','user'])->find($transaction->id);

        //Buat Transaksi Midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $transaction->id,
                'gross_amount' => (int) $transaction->total,
            ],
            'customer_detail' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email,
            ],
            'enabled_payments' => ['gopay', 'bank_transfer'],
            'vtweb' => []
        ];

        //Memanggil Midtrans
        try{
            //Ambil Halaman payment midtrans
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            $transaction->payment_url = $paymentUrl;
            $transaction->save();

            //Mengembalikan data ke API
            return ResponseFormatter::success($transaction, 'Transaksi Berhasil');
        }
        catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 'Transaksi Gagal');
        }
    }
}
