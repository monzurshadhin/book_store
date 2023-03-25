<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        if(Auth::user()->uType == 'USR'){
            return view('dashboard.user.user-dashboard',[
                'books'=>Book::all()
            ]);
        }
        elseif (Auth::user()->uType == 'ADM'){
            return view('dashboard.admin.admin-dashboard',[
                'books'=>Book::all()
            ]);
        }
        else{
            return redirect('/');
        }
    }
}
