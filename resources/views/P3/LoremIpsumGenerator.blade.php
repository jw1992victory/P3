@extends('master')

@section('title')
    Lorem Ipsum Generator
@endsection

@section('content')
    <h1>Lorem Ipsum Generator</h1>
    <p>How many paragraphs do you want?</p>
    <form method="POST" action="/loremipsumgenerator/generate">
        {{ csrf_field() }}
        <p>Paragraphs <input type="text" name="length" value="@yield('length', old("length"))" class="input_text"> (max of 99)</p>
        <p><input type="checkbox" name="random"> pick it for me!</p>
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
    @yield('paragraphs', '')
@endsection
