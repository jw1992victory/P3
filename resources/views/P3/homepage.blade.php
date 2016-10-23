@extends('master')

@section('title')
    Home Page
@endsection


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}

@section('content')
    <h1>Home Page for Project 3</h1>
    <p>Home Page for project 3: it contains two tools, Lorem Ipsum Generator and Random User Generator</p>
    <div class="instruction">
        <h2><a href="LoremIpsumGenerator">Lorem Ipsum Generator</a></h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's
            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
            make
            a type specimen book. It has survived not only five centuries, but also the leap into electronic
            typesetting,
            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
            containing
            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including
            versions
            of Lorem Ipsum. Want to know more about Lorem Ipsum? <a target="_blank" href="http://lipsum.com/">click here</a></p>
    </div>
    <div class="instruction">
        <h2><a href="RandomUserGenerator">Random User Generator</a></h2>
        <p>There are free, open-source APIs for generating random user data. Like Lorem Ipsum, but for people. Want to see a
            perfect API for Random User Generator? <a target="_blank" href="https://randomuser.me/">click here</a></p>
    </div>
    <div class="instruction">
        <h2><a href="PasswordGenerator">Password Generator</a></h2>
        <p>A flexible and scriptable password generator which generates strong passphrases, inspired by XKCD 936 <a target="_blank" href="http://xkcd.com/936/">click here</a></p>
    </div>
@endsection
