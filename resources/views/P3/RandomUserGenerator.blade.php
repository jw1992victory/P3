@extends('master')

@section('title')
    Random User Generator
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')
    <link href="/css/master.css" type='text/css' rel='stylesheet'>
@stop


@section('content')
    <h1>Random User Generator</h1>
    <p>What kind of User Info you want?</p>
    <form method="POST" action="/randomusergenerator/generate">
        {{ csrf_field() }}
        <div class="selection">
            <p class="choice_title">How many number of Users you want? <input type="text" name="length" value="@yield('length', old("length"))" class="input_text"> (max of 99)</p>
        </div>
        <div class="error">
            @if(count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="selection botton_margin">
            <p class="choice_title">Gender</p>
            <ul class="choices_list">
                <li class="choice"><input class="choice_text" type="radio" name="gender" id="Male" value="male"> Male</li>
                <li class="choice"><input class="choice_text" type="radio" name="gender" id="Female" value="female"> Female</li>
                <li class="choice"><input class="choice_text" type="radio" name="gender" id="RandomGender" value="random" checked> I dunno</li>
            </ul>
        </div>
        <div class="selection botton_margin">
            <p class="choice_title">Region</p>
            <ul class="choices_list">
                <li class="choice"><input type="radio" name="region" id="US" value="united states"><img class="flag" src="/img/us.png">United States</li>
                <li class="choice"><input type="radio" name="region" id="Canada" value="canada"><img class="flag" src="/img/canada.png">Canada</li>
                <li class="choice"><input type="radio" name="region" id="Englaund" value="england"><img class="flag" src="/img/england.png">England</li>
                <li class="choice"><input type="radio" name="region" id="Australia" value="australia"><img class="flag" src="/img/austrilia.png">Australia</li>
                <li class="choice"><input type="radio" name="region" id="Germany" value="germany"><img class="flag" src="/img/germany.png">Germany</li>
                <li class="choice"><input type="radio" name="region" id="China" value="china"><img class="flag" src="/img/china.png">China</li>
                <li class="choice"><input type="radio" name="region" id="RandomRegion" value="random"  checked><img class="flag" src="/img/world.png">I dunno</li>
            </ul>
        </div>
        <div class="selection"><input type="submit" class="button" value="submit"></div>
    </form>
    @yield('users', '')
@endsection
