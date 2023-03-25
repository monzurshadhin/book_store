<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function manageUserOrder()
    {
        if(Auth::user()->uType == 'USR') {
//            return DB::table('orders')
//                ->join('books','orders.book_id','books.id')
//                ->select('orders.*','books.book_name')
//                ->where('user_id', Auth::user()->id)
//                ->get();
            return view('dashboard.user.manage-user-order',[
                'orders'=>DB::table('orders')
                    ->join('books','orders.book_id','books.id')
                    ->select('orders.*','books.book_name')
                    ->where('user_id', Auth::user()->id)
                    ->get()
            ]);
        }else{
            return redirect('/');
        }
    }
}
