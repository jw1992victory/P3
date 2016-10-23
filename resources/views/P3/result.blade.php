@extends('P3.LoremIpsumGenerator')

@section('length')
    {{$length}}
@endsection

@section('paragraphs')
    @foreach ($paragraphs as $paragraph)
        <li class="paragraph">{{$paragraph}}</li>
    @endforeach
@endsection