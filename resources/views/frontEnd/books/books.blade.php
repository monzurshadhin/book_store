@extends('frontEnd.master')
@section('title')
    books
@endsection
@section('content')
    <section class="book-section">
        <p class="text-center mb-0">book shop</p>
        <h1 class="text-center mb-5">Find your latest book here</h1>
        <div class="container ">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">


                @foreach($books as $book)

                    <div class="col">
                        <div class="card book-card">
                            <img src="{{asset($book->image)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <div>
                                        <h5 class="card-title">{{$book->book_name}}</h5>
                                        <p class="card-text">{{$book->author_name}}</p>
                                        <a class="book-card-btn" href="{{route('book.details',['book_id'=>$book->id])}}">Details</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
