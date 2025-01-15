<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Auth::user()->purchases;
        return view('dashboard', compact('purchases'));
    }

    public function create()
    {
        return view('purchases.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        Auth::user()->purchases()->create($request->all());

        return redirect()->route('dashboard')->with('success', 'Purchase created successfully.');
    }

    public function edit(Purchase $purchase)
    {
        return view('purchases.edit', compact('purchase'));
    }

    public function update(Request $request, Purchase $purchase)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        $purchase->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Purchase updated successfully.');
    }

    public function destroy(Purchase $purchase)
    {
        $purchase->delete();

        return redirect()->route('dashboard')->with('success', 'Purchase deleted successfully.');
    }
} 