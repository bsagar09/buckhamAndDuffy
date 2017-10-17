@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="users" class="table">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Timezone</th>
                                <th>Created At</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $key => $user)
                                <tr>
                                    <td>{{$user['first_name']}}</td>
                                    <td>{{$user['last_name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>{{$user['user_timezone']}}</td>
                                    <td>{{$userCreatedAt[$key]}}</td>
                                    <td><a href="/buckhamAndDuffy/public/users/{{$user['id']}}/edit">Edit</a></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#myModal" href="">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h3>Are you sure you want to delete the user?</h3>
                                </div>

                                <div class="modal-footer text-center">
                                    <form class="form-horizontal" method="POST" action="{{ action('UserController@destroy', $user['id']) }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">Yes</button>
                                        <input type="hidden" name="_method" value="delete" />
                                        
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection