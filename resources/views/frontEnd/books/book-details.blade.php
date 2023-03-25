@extends('frontEnd.master')
@section('title')
    books-details
@endsection
@section('content')
    <section>
        <div class="container my-4">
            <div class="row">




                    <div class="col-12 mx-auto">
                        <div class="card details-card my-4" >
                        <div class="row">
                            <div class="col-12 col-lg-4 d-flex justify-content-center">
                                <img src="{{asset($book->image)}}" class="img-fluid"  alt="...">
                            </div>
                            <div class="col-12 col-lg-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$book->book_name}}</h5>
                                <p class="card-text">{{$book->author_name}}</p>
                                <p class="description">{{$book->description}}</p>
                                <p><b>Price: ${{$book->price}}</b></p>
                                <form action="{{route('order.book')}}" method="POST">

                                    @csrf
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="book_id" value="{{$book->id}}">
                                    <input type="hidden" name="price" value="{{$book->price}}">
                                    <div class="row mb-3">
                                        <label for="" class="col-md-3">Order Amount</label>

                                        <div class="col-md-3">

                                            <input type="number" value='1' min="1" max="5" step="1" id="quantity"  name="quantity" class="form-control form-control-sm">

                                        </div>
                                    </div>
                                    <button type="submit" class="">Order Now</button>
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

