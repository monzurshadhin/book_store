@extends('dashboard.master')
@section('title')
manage-order
@endsection
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Manage Order
        </div>
        <div class="card-body">
            <div style="overflow-x:auto;">
    <table class="table" id="datatablesSimple" style="overflow-x:auto;">
        <thead class="thead-light">
        @php
            $i=1;
            $total_price=0;
        @endphp
        <tr>
            <th scope="col">SL</th>
            <th scope="col">Order ID</th>
            <th scope="col">User Name</th>
            <th scope="col">Book Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$order->id}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->book_name}}</td>
                <td >{{$order->quantity}}</td>
                <td style="color:{{$order->status=='pending'?'#F54F2B':'green'}}">{{$order->status}}</td>
                <td>
                    <div class="d-flex justify-content-around align-items-center">
                        @if($order->status=='pending')
                        <a class="" style="color: green" data-bs-toggle="tooltip" data-bs-placement="top" title="approved" href="{{route('update.adminOrder',['order_id'=>$order->id])}}"><i class="fa-regular fa-circle-check"></i></a>
                        @elseif($order->status=='approved')
                        <a class="" style="color: #F54F2B" data-bs-toggle="tooltip" data-bs-placement="top" title="pending" href="{{route('update.adminOrder',['order_id'=>$order->id])}}"><i class="fa-regular fa-circle-xmark"></i></a>
                        @endif
                        {{--                        <a class="btn btn-danger" href="{{route('delete.userOrder',['order_id'=>$book->id])}}">Delete</a>--}}
                        <form action="{{route('delete.adminOrder')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$order->id}}">
                            <button data-bs-toggle="tooltip" data-bs-placement="top" title="delete" type="submit" style="background: none; border: none" onclick="return confirm('are you sure to delete?')"><i class="fa-solid fa-trash-can text-danger"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
            </div>
        </div>
    </div>
@endsection

