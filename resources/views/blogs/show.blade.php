@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>{{$blog['title']}}</h3></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <h3>{{$blog['slug']}}</h3>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <h3>{!! $blog['content'] !!}</h3>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    @endsection