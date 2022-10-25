<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Trash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $search = '';
    public $term;
    
    public function index()
    {
        $transaction = Transaction::with(['trash', 'user'])->latest()->paginate(5);

        return view('transactions.index', [
            'transactions' => $transaction,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.detail', [
            'item' => $transaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index');
    }

    public function changeStatus(Request $request, $id, $status)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->status = $status;
        $transaction->save();

        return redirect()->route('transactions.show', $id);
    }

    public function print()
    {
        $printTransaction = Transaction::with(['trash', 'user'])->latest()->paginate();
        return view('transactions.print-date', compact('printTransaction'));
    }

    public function print_detail(Transaction $transaction)
    {
        $printTransaction = Transaction::with(['trash', 'user']);
        return view('transactions.print-detail', ['item' => $transaction], compact('printTransaction'));
    }

    public function graphic()
    {
        $total = Transaction::select(DB::raw("CAST(SUM(total) as int) as total"))
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('total');

        $month = Transaction::select(DB::raw("MONTHNAME(created_at) as month"))
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('month');

        // $total = Transaction::all();
        // $trash = Trash::all();

        // $categories = [];

        // foreach ($trash as $trash) {
        //     $categories[] = $trash->name;
        // }

        return view('transactions.graphic', compact(['total', 'month']));
        // dd($graphic);
    }
}
