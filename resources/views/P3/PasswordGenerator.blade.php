@extends('master')

@section('title')
    Password Generator
@stop

@section('content')
    <h1>xkcd Password Generator</h1>

    @yield('password')

    <form  method='POST' action='/P3/Public/passwordgenerator/generate'>
        {{ csrf_field() }}
        <p># of Words <input type="text" name="length" value="@yield('length', old("length"))"  class="input_text"> (max of 9)</p>

        <p><input type="checkbox" name="contain_number"> Add a number</p>
        <p><input type="checkbox" name="contain_symbol"> Add a symbol</p>

        <input type="submit" class="button" value="submit">

    </form>

    <div class="error">
        @if(count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <img src="/P3/public/img/password_strength.png" alt="password strngth gif">
@endsection