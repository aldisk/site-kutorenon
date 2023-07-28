<html>
    <head>
        @include('plugin/bootstrap-open')

        <style>
            .hoverable:hover {
                text-decoration: underline;
            }
        </style>

        <title>Berita | Situs Resmi Desa Kutorenon</title>
    </head>
    <body>
        @include('navbar')
        <h1 class="py-4 text-center">Berita Desa</h1>
        <form action="{{ route('searchBerita') }}" class=" d-flex flex-wrap justify-content-center align-items-center">
            <div class="mt-3 px-4">
                <input type="text" name="searchToken" value="{!! $searchToken !!}" class="form-control my-1" placeholder="Judul" id="searchingToken">
            </div>
            <div><button type="submit" class="btn btn-dark mt-3 px-4">Cari</button></div>
        </form>
        
        <div class="row row-cols-1 row-cols-md-3 p-5 g-4">
            @foreach($items as $item)
            <div class="col px-5">
                <div class="card h-100">
                <img src="{!! asset('/storage/foto-berita/'.$item->id.'.jpg') !!}" style="height: 12rem; object-fit: cover" class="card-img-top" alt="{!! $item->judul !!}">
                <div class="card-body">
                    <a href="/berita/view/{!! $item->id !!}" class="text-wrap text-center text-dark text-decoration-none">
                        <h5 class="card-title hoverable">{{ Str::limit($item->judul, 100) }}</h5>
                        <p class="card-text">{{ Str::limit(Str::replace(';', "\n", $item->isi), 60) }}</p>
                    </a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="mx-1 mb-1 bi bi-calendar" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                    </svg>  {{ \Carbon\Carbon::parse($item->created_at)->format('d F o') }}
                    </small>
                </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <form action="{!! route('searchBerita') !!}">
                <input type="hidden" name="searchToken" value="{!! $searchToken !!}">
                <input type="hidden" name="page" value="{!! $page - 1 !!}">
                @if($page > 1)
                <button class="btn btn-dark">< Halaman Sebelumnya</button>
                @else
                <button class="btn btn-dark" disabled>< Halaman Sebelumnya</button>
                @endif
            </form>

            <button class="btn btn-outline-dark" disabled><strong>{{ $page.' / '.$maxPage }}</strong></button>

            <form action="{!! route('searchBerita') !!}">
                <input type="hidden" name="searchToken" value="{!! $searchToken !!}">
                <input type="hidden" name="page" value="{!! $page + 1 !!}">
                @if($page < $maxPage)
                <button class="btn btn-dark">Halaman Selanjutnya ></button>
                @else
                <button class="btn btn-dark" disabled>Halaman Selanjutnya ></button>
                @endif
            </form>
        </div>
        </div>
        @include('footer')
        @include('plugin/bootstrap-close')
    </body>
</html>