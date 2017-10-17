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
                        <tbody>
                            @foreach($blogs as $key => $blog)
                                <tr>
                                    <td><a href="/buckhamAndDuffy/public/blog/{{$blog['id']}}">{{$blog['title']}}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection