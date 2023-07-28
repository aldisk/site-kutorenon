<html>
    <head>
        @include('plugin/bootstrap-open')
        @include('plugin/hoverable')
        <title>{{ $tabs }} | Website Resmi Kutorenon</title>
    </head>
    <body>
        @include('navbar')
        <h1 class="py-4 text-center">{{ $tabs }} Desa</h1>

        <div class="row row-cols-1 row-cols-md-3 p-5 g-4">
            @foreach($items as $item)
            <div class="col px-5">
                <div class="card h-100">
                <div>
                    <img src="{!! asset('/storage/foto-potensi/'.$item->id.'.jpg') !!}" style="height: 12rem; object-fit: cover" class="card-img-top d-block mx-auto" alt="{!! $item->nama !!}">
                </div>
                <div class="card-footer text-center">
                    <a href="/{!! strtolower($tabs) !!}/view/{!! $item->slug !!}" class="text-wrap text-center text-dark text-decoration-none">
                        <h5 class="mt-1 hoverable">{{ $item->nama }}</h5>
                    </a>
                </div>
                </div>
            </div>
            @endforeach
        </div>
        @include('footer')
        @include('plugin/bootstrap-close')
    </body>
</html>