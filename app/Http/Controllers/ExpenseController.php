<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller {
    public function index() {
        $expenses = Expense::where('user_id', Auth::id())
                           ->orderBy('date', 'desc')
                           ->get();

        return view('expenses.index', compact('expenses'));
    }

    public function create() {
        return view('expenses.create');
    }

    public function store(Request $request) {
        $request->validate([
            'amount' => 'required|numeric',
            'category' => 'required',
            'desc' => 'nullable',
            'date' => 'required|date',
            'receipt_file' => 'nullable|file'
        ]);

        $fileName = null;

        if ($request->hasFile('receipt_file')) {
            $fileName = $request->file('receipt_file')->store('receipts', 'public');
        }

        Expense::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'category' => $request->category,
            'desc' => $request->desc,
            'date' => $request->date,
            'receipt_file' => $fileName
        ]);

        return redirect()->route('expenses.index')->with('success', 'Expense added!');
    }

    public function edit(Expense $expense) {
        $this->authorizeData($expense);
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense) {
        $this->authorizeData($expense);

        $request->validate([
            'amount' => 'required|numeric',
            'category' => 'required',
            'desc' => 'nullable',
            'date' => 'required|date',
            'receipt_file' => 'nullable|file'
        ]);

        if ($request->hasFile('receipt_file')) {
            $expense->receipt_file = $request->file('receipt_file')->store('receipts');
        }

        $expense->update([
            'amount' => $request->amount,
            'category' => $request->category,
            'desc' => $request->desc,
            'date' => $request->date
        ]);

        return redirect()->route('expenses.index')->with('success', 'Expense updated!');
    }

    public function destroy(Expense $expense) {
        $this->authorizeData($expense);
        $expense->delete();

        return back()->with('success', 'Expense deleted!');
    }

    private function authorizeData($expense) {
        if ($expense->user_id !== Auth::id()) {
            abort(403);
        }
    }
}

