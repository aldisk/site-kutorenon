<html>
    <head>
        <title>{{ $tabs }} | Website Resmi Kutorenon</title>
    </head>
    <body>
        @include('navbar')
        <h1>{{ $tabs }}</h1>
        @foreach($items as $item)
            <a href="/{!! strtolower($tabs) !!}/view/{!! $item->slug !!}">{{ $item->nama }}</a> <br>
        @endforeach
    </body>
</html>