<?php

namespace App\Http\Livewire\Chart;

use App\Models\Transaction;
use App\Models\Trash;
use Livewire\Component;

class Index extends Component
{
    public $trash;
    public $transaction;
    public function mount()
    {
        $transaction = Transaction::limit(10)->get();
        $trash = Trash::limit(10)->get();
        foreach ($transaction as $item) {
            $data['label'][] = date('d M Y', $item->created_at);
            $data['data'][] = (int) $item->total;
        }

        $this->transaction = json_encode($data);
        // dd($this->trash);
    }

    
    public function render()
    {
        return view('livewire.chart.index')->extends('layouts.master')->section('content');
    }
}
