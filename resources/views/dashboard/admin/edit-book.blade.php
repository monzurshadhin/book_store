@extends('dashboard.master')
@section('title')
    edit-book
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="border p-3 rounded">
                <h6 class="mb-0 text-uppercase">Add Books</h6>
                <hr/>
                <form class="row g-3" action="{{route('update.book')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$book->id}}">
                    <div class="col-12">
                        <label class="form-label">Book Name</label>
                        <input type="text" name="book_name" value="{{$book->book_name}}"  class="form-control">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Author Name</label>
                        <input type="text" name="author_name" value="{{$book->author_name}}" class="form-control">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" value="{{$book->price}}" class="form-control">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="4" cols="4">{{$book->description}}</textarea>
                    </div>

                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

