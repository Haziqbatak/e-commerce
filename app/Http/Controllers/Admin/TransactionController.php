<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transaction = Transaction::with('user')->select('id',
        'user_id',
        'name',
        'email',
        'phone',
        'status',
        'payment',
        'payment_url',
        'adress',
        'total_price',
        'slug'
        )->latest()->paginate(10);
        return view('pages.admin.transaction.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //get data ttransaction by id
        $transaction = Transaction::findOrFail($id); 

        try {
            //upadate status transaction
            $transaction->update([
                'status' => $request->status
            ]);

            return redirect()->route('admin.transaction.index')->with('success', 'Success');

        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.transaction.index')->with('error', 'Error');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showTransactionUserByAdminWithSlugAndId($slug, $id)
    {
        $transaction = Transaction::where('slug', $slug)->where('id', $id)->first();

        // dd($transaction);

        return view('pages.admin.transaction.show', compact(
            'transaction'
        ));
    }
}
