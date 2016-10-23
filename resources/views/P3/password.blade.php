@extends('P3.PasswordGenerator')

@section('length')
    {{$length}}
@endsection

@section('password')
    <div class="result"><p class="password">{{$password}}</p></div>
@endsection
