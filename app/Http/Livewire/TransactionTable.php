<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransactionTable extends Component
{
    public $search;

    // use WithPagination;

    // protected $paginationTheme = 'bootstrap';

    public function render()
    {

        $users = User::all();

        return view('livewire.transaction-table', [
            'transactions' => Transaction::where('user_id', 'like', '%'.$this->search.'%')->latest()->paginate(5)
        ]);
    }
}
