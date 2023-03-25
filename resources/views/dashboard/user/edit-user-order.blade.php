@extends('dashboard.master')
@section('title')
books-details
@endsection
@section('content')
<section>
    <div class="container my-4">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card details-card" >
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <img src="{{asset($order->image)}}" class="img-fluid" alt="...">
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">{{$order->book_name}}</h5>
                                <p class="card-text">{{$order->author_name}}</p>
                                <p>{{$order->description}}</p>
                                <p><b>Price:{{$order->price}}</b></p>
                                <form action="{{route('update.order')}}" method="POST">

                                    @csrf
                                    <input type="hidden" name="id" value="{{$order->id}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="book_id" value="{{$order->book_id}}">
                                    <input type="hidden" name="price" value="{{$order->price}}">
                                    <div class="row mb-3">
                                        <label for="" class="col-md-3">Order Amount</label>

                                        <div class="col-md-3">

                                            <input type="number" value={{$order->quantity}} min="1" max="5" step="1" id="quantity"  name="quantity" class="form-control form-control-sm">

                                        </div>
                                    </div>
                                    <button type="submit" class="">Update Now</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

