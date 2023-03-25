<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ShopController extends Controller
{
    //
    public function index()
    {

        return view('frontEnd.home.home',[
            'books'=>Book::limit(6)->get(),
        ]);
    }
}
