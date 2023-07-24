<html>
    <head>
        <title>{{ $tabs }} | Website Resmi Kutorenon</title>
    </head>
    <body>
        <h1>{{ $tabs }}</h1>
        @foreach($items as $item)
            <a href="{!! asset('/storage/.{{ $tabs }}./'.$item->id.'.pdf') !!}">{{ $item->nama }}</a>
        @endforeach
    </body>
</html>