<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    private static $user;

    public function addBook()
    {
        if(Auth::user()->uType == 'ADM') {
            return view('dashboard.admin.add-book');
        }else{
            return redirect('/');
        }
    }
    public function manageBook()
    {
        if(Auth::user()->uType == 'ADM') {
            return view('dashboard.admin.manage-book',[
                'books'=>Book::all(),
            ]);
        }else{
            return redirect('/');
        }
    }
    public function makeAdmin()
    {
        if(Auth::user()->uType == 'ADM') {
//            return User::all();
            return view('dashboard.admin.make-admin',[
                'users'=>User::all(),
            ]);
        }else{
            return redirect('/');
        }
    }
    public function manageOrder()
    {
        if(Auth::user()->uType == 'ADM') {
//            return DB::table('orders')
//                ->join('users','orders.user_id','users.id')
//                ->join('books','orders.book_id','books.id')
//                ->select('orders.*','users.name','books.book_name')
//                ->get();
            return view('dashboard.admin.manage-order',[
                'orders'=>DB::table('orders')
                    ->join('users','orders.user_id','users.id')
                    ->join('books','orders.book_id','books.id')
                    ->select('orders.*','users.name','books.book_name')
                    ->get(),
            ]);
        }else{
            return redirect('/');
        }
    }

    public function updateAdmin($user_id)
    {
        self::$user = User::find($user_id);
        if (self::$user->uType == 'ADM'){
            self::$user->uType = 'USR';
        }
        else{
            self::$user->uType = 'ADM';
        }
        self::$user->save();
        Alert::success('User updated successfully');
        return back();
    }

    public function deleteAdmin(Request $request)
    {
        User::find($request->id)->delete();
        Alert::success('User deleted successfully');
        return back();
    }
}
