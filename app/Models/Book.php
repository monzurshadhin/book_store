<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    private static $book,$image,$imageName,$directory,$imageUrl;
    public static function addBook($request)
    {
        self::$book = new Book();
        self::$book->book_name = $request->book_name;
        self::$book->author_name = $request->author_name;
        self::$book->book_name = $request->book_name;
        self::$book->price = $request->price;
        self::$book->description = $request->description;
        self::$book->image = self::saveImage($request);
        self::$book->save();
    }

    public static function updateBook($request)
    {
        self::$book = Book::find($request->id);
        self::$book->book_name = $request->book_name;
        self::$book->author_name = $request->author_name;
        self::$book->book_name = $request->book_name;
        self::$book->price = $request->price;
        self::$book->description = $request->description;
        if($request->file('image')){
            if(self::$book->image){
                if(file_exists(self::$book->image)){
                    unlink(self::$book->image);
                    self::$book->image = self::saveImage($request);
                }
            }
            else{
                self::$book->image = self::saveImage($request);
            }
        }

        self::$book->save();
    }
    private static function saveImage($request){
    self::$image = $request->file('image');
    self::$imageName = 'book-'.rand().'.'. self::$image->Extension();
    self::$directory = 'book-asset/books/';
    self::$imageUrl = self::$directory.self::$imageName;
    self::$image->move(self::$directory,self::$imageName);
    return self::$imageUrl;
    }
}
