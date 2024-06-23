<?php

namespace App\Http\Controllers\Admin;

use id;
use Exception;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $category = Category::count();
        $product = Product::count();
        $user = User::where('role', 'user')->count();

        return view('pages.admin.index', compact(
            'category',
            'product',
            'user'
        ));
    }

    public function userList(){
        $user = User::where('role', 'user')->get();
        return view('pages.admin.userList', compact('user'));
    }


    public function resetpassword($id){
        try {
            $user = User::find($id);
        $user->password = Hash::make('password');
        $user->save();

        return redirect()->route('admin.userList')->with('success', 'Password has been reset');
        } catch (Exception $e) {
            return redirect()->route('admin.dashboard')->with('error', 'Failed reset Password');
        }
        
    }
}

