@extends('P3.RandomUserGenerator')

@section('length')
    {{$length}}
@endsection

@section('users')
    @foreach ($users as $user)
        <div class="user">
            <img class="photo" src={{$user['photo']}}>
            <ul class="details">
                <li class="name">First Name: {{$user['name']}}</li>
                <li class="name">Last Name: {{$user['surname']}}</li>
                <li class="name">Title: {{$user['title']}}</li>
                <li class="gender">Gender: {{$user['gender']}}</li>
                <li class="region">Region: {{$user['region']}}</li>
                <li class="age">Age: {{$user['age']}}</li>
                <li class="phone">Phone; {{$user['phone']}}</li>
                <li class="email">Email: {{$user['email']}}</li>
            </ul>
        </div>
    @endforeach
@endsection