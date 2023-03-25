<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    private static $order,$update;
    use HasFactory;

    public static function saveOrder($request)
    {
        self::$order = new Order();
        self::$order->user_id = $request->user_id;
        self::$order->book_id = $request->book_id;
        self::$order->price = $request->price;
        self::$order->quantity = $request->quantity;
        self::$order->save();

    }

    public static function updateOrder($request)
    {
        self::$update = Order::find($request->id);
        self::$update->user_id = $request->user_id;
        self::$update->book_id = $request->book_id;
        self::$update->price = $request->price;
        self::$update->quantity = $request->quantity;
        self::$update->save();
    }

    public static function updateAdminOrder($order_id)
    {
        self::$update = Order::find($order_id);
        if(self::$update->status=='pending'){
            self::$update->status = 'approved';
        }
        else{
            self::$update->status = 'pending';
        }
        self::$update->save();
    }
}
