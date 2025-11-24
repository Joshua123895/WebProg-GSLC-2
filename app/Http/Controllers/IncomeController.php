<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function index() {
        $incomes = Income::where('user_id', Auth::id())->orderBy('date', 'desc')->get();
        return view('income.index', compact('incomes')); 
    }

    public function create() {
        return view('income.create');
    }

    public function store(Request $request) {
        $request->validate([
            'amount' => 'required|numeric',
            'source' => 'required',
            'desc' => 'nullable',
            'date' => 'required|date',
            'receipt_file' => 'nullable|file'
        ]);

        $fileName = null;

        if ($request->hasFile('receipt_file')) {
            $fileName = $request->file('receipt_file')->store('receipts', 'public');
        }

        Income::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'source' => $request->source,
            'desc' => $request->desc,
            'date' => $request->date,
            'receipt_file' => $fileName
        ]);

        return redirect()->route('income.index')->with('success', 'Income added!');
    }

    public function edit(Income $income) {
        $this->authorizeData($income);
        return view('income.edit', compact('income'));
    }

    public function update(Request $request, Income $income) {
        $this->authorizeData($income);

        $request->validate([
            'amount' => 'required|numeric',
            'source' => 'required',
            'desc' => 'nullable',
            'date' => 'required|date',
            'receipt_file' => 'nullable|file'
        ]);

        if ($request->hasFile('receipt_file')) {
            $income->receipt_file = $request->file('receipt_file')->store('receipts');
        }

        $income->update([
            'amount' => $request->amount,
            'source' => $request->source,
            'desc' => $request->desc,
            'date' => $request->date
        ]);

        return redirect()->route('income.index')->with('success', 'Income updated!');
    }

    public function destroy(Income $income) {
        $this->authorizeData($income);
        $income->delete();

        return back()->with('success', 'Income deleted');
    }

    private function authorizeData($income) {
        if ($income->user_id !== Auth::id()) {
            abort(403);
        }
    }
}
