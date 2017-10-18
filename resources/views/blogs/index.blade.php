@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Blogs</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="blogs" class="table">
                        <table id="users" class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Content</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($blogs as $key => $blog)
                                <tr>
                                    <td>{{$blog['title']}}</td>
                                    <td>{{url($blog['slug'])}}</td>
                                    <td>{!!substr($blog['content'], 0, 10).(strlen($blog['content']) > 10 ? '...' : '')!!}</td>
                                    <td><a href="/buckhamAndDuffy/blog/{{$blog['slug']}}">View</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection