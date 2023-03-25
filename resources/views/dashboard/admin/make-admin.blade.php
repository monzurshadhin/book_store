@extends('dashboard.master')
@section('title')
make-admin
@endsection
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Make Admin
        </div>
        <div class="card-body">
            <div style="overflow-x:auto;">
                <table class="table" id="datatablesSimple">
                    <thead class="thead-light">
                    @php
                        $i=1;
                        $total_price=0;
                    @endphp
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">User ID</th>
                        <th scope="col">User Name</th>
                        <th scope="col">User Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->uType=='ADM'?'Admin':'User'}}</td>

                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    @if($user->uType=='ADM')
                                        <a class="" style="color: {{$user->uType=='ADM'?'green':'red'}}" data-bs-toggle="tooltip" data-bs-placement="top" title="make user" href="{{route('update.admin',['user_id'=>$user->id])}}"><i class="fa-solid fa-user"></i></a>
                                    @else
                                        <a class="" style="color: {{$user->uType=='ADM'?'green':'red'}}" data-bs-toggle="tooltip" data-bs-placement="top" title="make admin" href="{{route('update.admin',['user_id'=>$user->id])}}"><i class="fa-solid fa-user-tie"></i></a>
                                    @endif

                                    <form action="{{route('delete.admin')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$user->id}}">
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
