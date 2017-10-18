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
                                    <td><a href="/buckhamAndDuffy/users/{{$user['id']}}/edit">Edit</a></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#myModal" href="">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Delete User Modal -->
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


                    <!-- Register Modal -->
                    <div class="modal fade" id="registerModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><strong>Create User</strong></h4>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <form id="createUser" class="form-horizontal" method="POST" action="{{ action('UserController@store') }}">
                                                {{ csrf_field() }}

                                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                    <label for="first_name" class="col-md-4 control-label">First Name</label>

                                                <div class="col-md-6">
                                                        <input id="first_name" type="text" class="form-control" name="first_name" required autofocus>

                                                        @if ($errors->has('first_name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('first_name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                    <label for="last_name" class="col-md-4 control-label">Last Name</label>

                                                    <div class="col-md-6">
                                                        <input id="last_name" type="text" class="form-control" name="last_name" required autofocus>

                                                        @if ($errors->has('last_name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('last_name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control" name="email" required>

                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password" class="col-md-4 control-label">Password</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control" name="password" required>

                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="user_timezone" class="col-md-4 control-label">Timezone</label>

                                                    <div class="col-md-6">
                                                        <select name="user_timezone" id="user_timezone" class="form-control">
                                                            @foreach (timezone_identifiers_list() as $timezone)
                                                                <option value="{{ $timezone }}"{{ $timezone == old('timezone') ? ' selected' : '' }}>{{ $timezone }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            Register
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <button type="button" data-toggle="modal" data-target="#registerModal" class="btn btn-default panel-right">Create User</button>
            </div>
        </div>
    @endsection