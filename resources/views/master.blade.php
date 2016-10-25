<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'HomePage' --}}
        @yield('title','HomePage')
    </title>

    <meta charset='utf-8'>
    <link href="{{ URL::asset('css/master.css') }}" type='text/css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="wrapper">
        <header>
            <ul class="navigation">
                <li class="navigation_title"><a href="/homepage">Home Page</a></li>
                <li class="navigation_title"><a href="/loremipsumgenerator">Lorem Ipsum Generator</a></li>
                <li class="navigation_title"><a href="/randomusergenerator">Random User Generator</a></li>
                <li class="navigation_title"><a href="/passwordgenerator">Password Generator</a></li>
            </ul>

        </header>

        <section>
            {{-- Main page content will be yielded here --}}
            <div class="content">
                @yield('content')
            </div>
        </section>
    </div>
    <footer>
        wendy jiang @ {{ date('Y') }} <img class="picture" src="/img/github.png"><a target="_blank" href="https://github.com/jw1992victory/P3">github</a>
    </footer>

</body>
</html>