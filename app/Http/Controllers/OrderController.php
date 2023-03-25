<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use function Symfony\Component\String\b;

class OrderController extends Controller
{
    //
    public function orderBook(Request $request)
    {
        Order::saveOrder($request);
        Alert::success('Order successful');
        return redirect('/manage-userOrder');
    }

    public function editUserOrder($order_id)
    {
        return view('dashboard.user.edit-user-order',[
            'order'=>DB::table('orders')
                ->join('books','orders.book_id','books.id')
                ->select('orders.*','books.id as book_id','books.book_name','books.author_name','books.image','books.description')
                ->where('orders.id', $order_id)
                ->first()
        ]);
//        return DB::table('orders')
//                    ->join('books','orders.book_id','books.id')
//                    ->select('orders.*','books.id as book_id','books.book_name','books.author_name','books.image','books.description')
//                    ->where('orders.id', $order_id)
//                    ->first();
    }

    public function updateOrder(Request $request)
    {
        Order::updateOrder($request);
        Alert::success('Order updated successfully');
        return redirect('/manage-userOrder');
    }

    public function deleteOrder(Request $request)
    {
        Order::find($request->id)->delete();
        Alert::success('Order deleted successfully');
        return back();
    }

    public function updateAdminOrder($order_id)
    {
        Order::updateAdminOrder($order_id);
        Alert::success('status updated successfully');
        return back();
    }

    public function deleteAdminOrder(Request $request)
    {
        Order::find($request->id)->delete();
        Alert::success('Order deleted successfully');
        return back();
    }

}
