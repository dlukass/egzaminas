<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use PDF; 
use App\Mail\ReportMail;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    public function form()
    {
        return view('reports.form');
    }

    public function generate(Request $request)  
    {
        
        $data = $request->validate([
            'from' => 'required|date',
            'to' => 'required|date',
            'email' => 'nullable|email'
        ]);

        $transactions = Transaction::with('category')
            ->whereBetween('date', [$data['from'], $data['to']])
            ->get();

        $stats = [
            'min' => $transactions->min('amount'),
            'max' => $transactions->max('amount'),
            'avg' => $transactions->avg('amount'),
        ];

        $pdf = PDF::loadView('reports.pdf', compact('transactions','stats'));

        
        if($data['email']){
            Mail::to($data['email'])->send(new ReportMail($pdf));
            return back()->with('success','PDF išsiųstas el. paštu');
        }

        return $pdf->stream('report.pdf');
    }
}
