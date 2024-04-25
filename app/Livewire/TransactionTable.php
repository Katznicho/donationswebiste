<?php

namespace App\Livewire;
use App\Models\Transaction;


use Livewire\Component;
use Livewire\WithPagination;

class TransactionTable extends Component
{
   

    use WithPagination;

    public function render()
    {

        //sort where user_id = auth()->id()
        $transactions = Transaction::where('user_id', auth()->id())
          ->with('child')
        ->paginate(10); // Adjust as needed
        //$transactions = Transaction::paginate(10); // Adjust as needed

        return view('livewire.transaction-table', ['transactions' => $transactions]);
    }
}
