<html>
    <head>
        @include('plugin/bootstrap-open')
        @include('/plugin/hoverable')
        <title>Lembaga Desa | Website Resmi Kutorenon</title>
    </head>
    <body>
        @include('navbar')
        <h1 class="py-4 text-center">Lembaga Desa</h1>

        <div class="container">
        <div class="row row-cols-1 row-cols-md-3 py-5 px-1 g-4">
            @foreach($items as $item)
            <div class="col">
                <div class="card h-100">
                <div>
                    <img src="{!! asset('/storage/lembaga/'.$item->id.'.jpg') !!}" style="width: 8rem; object-fit: cover" class="card-img-top py-3 d-block mx-auto" alt="{!! $item->nama !!}">
                </div>
                <div class="card-footer text-center">
                    <a href="/lembaga/view/{!! $item->id !!}" class="text-wrap text-center text-dark text-decoration-none">
                        <h5 class="mt-1 hoverable">{{ $item->nama }}</h5>
                    </a>
                </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>
        @include('footer')
        @include('plugin/bootstrap-close')
    </body>
</html>