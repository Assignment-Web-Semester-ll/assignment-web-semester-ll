@extends('layouts.master')

@section('title')
    All Users
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Register</h4>
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->usertype }}</td>
                                    <td>
                                        <a href="/edit-user?name={{ $user->name }}&id={{ $user->id }}" class="btn btn-success btn-circle">Edit</a>
                                    </td>
                                    <td>
                                        <form action="/delete-user?name={{ $user->name }}&id={{ $user->id }}" method="post">
                                            {{csrf_field()}}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-circle">Delete</button>
                                        </form>
                                        <!-- <a href="/delete-user?name={{ $user->name }}&id={{ $user->id }}" class="btn btn-danger">Delete</a> -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection