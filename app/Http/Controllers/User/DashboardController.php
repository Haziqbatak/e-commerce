<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $action = auth()->user()->transaction->count();
        $transaction = Transaction::where('user_id', auth()->user()->id);
        $pending = $transaction->where('status', 'pending')->count();
        $settlement = $transaction->where('status', 'settlement')->count();
        $expired = $transaction->where('status', 'expired')->count();

        return view('pages.user.index', compact(
            'pending',
            'settlement',
            'expired'
        ));
    }
}
