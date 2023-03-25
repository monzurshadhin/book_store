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
            <table class="table" style="vertical-align: middle" id="datatablesSimple">
            <thead class="thead-light">
            @php
                $i=1;
                $total_price=0;
            @endphp
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Book Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>

                    <td class="d-none">{{$total_price = $total_price+ $order->price*$order->quantity}}</td>

                    <th scope="row">{{$i++}}</th>
                    <td>{{$order->book_name}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price*$order->quantity}}</td>
                    <td style="color: {{$order->status=='pending'?'#F54F2B':'green'}}">{{$order->status}}</td>
                    <td class="d-flex justify-content-around align-items-center">
                        <a class="" data-bs-toggle="tooltip" data-bs-placement="top" title="edit" href="{{route('edit.userOrder',['order_id'=>$order->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>
{{--                        <a class="btn btn-danger" href="{{route('delete.userOrder',['order_id'=>$order->id])}}">Delete</a>--}}
                        <form action="{{route('delete.userOrder')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$order->id}}">
                            <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="delete" style="background: none; border: none" onclick="return confirm('are you sure to delete?')"><i class="fa-solid fa-trash-can text-danger"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-center">Total price</td>
                <td>{{$total_price}}</td>
                <td colspan="2"></td>
            </tr>
            </tbody>
        </table>
    </div>
    </div>
@endsection

