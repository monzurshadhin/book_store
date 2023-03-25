<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Console\View\Components\Confirm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BookController extends Controller
{
    //
    public function addBook(Request $request)
    {
        Book::addBook($request);
        Alert::success('Book added successfully');
        return back();
    }

    public function allBooks()
    {
        return view('frontEnd.books.books',[
            'books'=>Book::all(),
        ]);
    }

    public function bookDetails($book_id)
    {
        return view('frontEnd.books.book-details',[
            'book'=>Book::find($book_id)
        ]);
    }

    public function deleteBooks(Request $request)
    {
        $book = Book::find($request->id);
        if($book->image){
            unlink($book->image);
        }
        $book->delete();
        Alert::success('Deleted Successfully');

        return back();
    }

    public function editBook($book_id)
    {
        return view('dashboard.admin.edit-book',[
            'book'=>Book::find($book_id),
        ]);
    }

    public function updateBook(Request $request)
    {
        Book::updateBook($request);
        Alert::success('Updated Successfully');

        return redirect('/manage-book');
    }

}
