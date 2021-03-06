@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h1 class="form-group">{{$blog['title']}}</h1></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <h2>{!! $blog['content'] !!}</h2>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    @endsection