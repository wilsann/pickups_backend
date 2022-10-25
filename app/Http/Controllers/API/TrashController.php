<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trash;
use Exception;

class TrashController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $types = $request->input('types');

        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');
        
        if($id)
        {
            $trash = Trash::find($id);

            if($trash)
            {
                return ResponseFormatter::success(
                    $trash, 'Data produk berhasil diambil'
                );
            }
            else
            {
                return ResponseFormatter::error(
                    null,
                    'Data produk tidak ditemukan',
                    404
                );
            }
        }

        $trash = Trash::query();

        if($name)
        {
            $trash->where('name', 'like', '%' . $name . '%');
        }

        if($types)
        {
            $trash->where('types', 'like', '%' . $types . '%');
        }

        if($price_from)
        {
            $trash->where('price', '>=', $price_from);
        }

        if($price_to)
        {
            $trash->where('price', '<=', $price_to);
        }

        return ResponseFormatter::success(
            $trash->paginate($limit),
            'Data list produk behasil diambil'
        );
    }

    public function add(Request $request)
    {
        try
        {
        Trash::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        ]);

        $trash = Trash::where('name', $request->name)->first();

        return ResponseFormatter::success(
        $trash, 'Data produk berhasil ditambah'
        );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }
}
