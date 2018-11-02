@extends('layouts.layout')
@section('box-header')
    <div class="row">
        <div class="col">
            <h2 class="">
                Home
            </h2>
        </div>
    </div>
    <hr>
    <br>
@endsection

@section('box-body')
        @auth
            已登入
        @endauth
@endsection

@section('box-footer')

@endsection
