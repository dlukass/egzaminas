<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Category;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::with('category')
            ->where('user_id',auth()->id())
            ->orderBy('date','desc')->get();

        $income = $transactions->filter(fn($t)=>$t->category->type=='income')->sum('amount');
        $expense = $transactions->filter(fn($t)=>$t->category->type=='expense')->sum('amount');

        return view('transactions.index',compact('transactions','income','expense'));
    }

    public function create(){
        return view('transactions.create',[
            'categories'=>Category::all()
        ]);
    }

    public function store(Request $r){
        $data = $r->validate([
            'category_id'=>'required',
            'amount'=>'required|numeric',
            'date'=>'required|date',
            'note'=>'nullable'
        ]);
        $data['user_id']=auth()->id();
        Transaction::create($data);
        return redirect()->route('transactions.index');
    }

    public function edit(Transaction $transaction){
        return view('transactions.edit',[
            'transaction'=>$transaction,
            'categories'=>Category::all()
        ]);
    }

    public function update(Request $r, Transaction $transaction){
        $transaction->update($r->only('category_id','amount','date','note'));
        return redirect()->route('transactions.index');
    }

    public function destroy(Transaction $transaction){
        $transaction->delete();
        return back();
    }
}
