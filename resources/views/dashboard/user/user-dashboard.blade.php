@extends('dashboard.master')
@section('title')
    user dashboard
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">User Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Area Chart Example
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart Example
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Book List
                </div>
                <div class="card-body">
                    <div style="overflow-x:auto;">
                    <table class="table" style="vertical-align: middle" id="datatablesSimple">
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

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
