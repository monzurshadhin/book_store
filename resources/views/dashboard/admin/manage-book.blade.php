@extends('dashboard.master')
@section('title')
    manage-book
@endsection
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Manage Book
        </div>
        <div class="card-body">
            <div style="overflow-x:auto;">
                <table class="table"  id="datatablesSimple">
                    <thead class="thead-light">
                    @php
                        $i=1;
                        $total_price=0;
                    @endphp
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Book ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Book Name</th>
                        <th scope="col">Author Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$book->id}}</td>
                            <td><img src="{{asset($book->image)}}" height="80px" alt=""></td>
                            <td>{{$book->book_name}}</td>
                            <td>{{$book->author_name}}</td>
                            <td>${{$book->price}}</td>
                            <td >
                                <div class="d-flex align-items-center justify-content-around">
                                    <a class="text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="edit" href="{{route('edit.book',['book_id'=>$book->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{route('delete.books')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$book->id}}">
                                        <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="delete" style="background: none; border: none" onclick="return confirm('are you sure to delete?')"><i class="fa-solid fa-trash-can text-danger"></i></button>
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

