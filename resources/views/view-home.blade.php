<html>
    <head>

        @include('plugin/bootstrap-open')

        @include('/plugin/hoverable')

        <title>Home | Website Resmi Desa Kutorenon</title>
    </head>
    <body>
        @include('navbar')

        <div class="text-center bg-image" style="
        background-image: url('{!! asset('/storage/bg.jpg') !!}');
        background-size: cover;
        background-position: center;
        height: 60vh;">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
                <h1 class="mb-0">Selamat Datang</h1>
                <h1 class="mb-2">di Website Desa Kutorenon</h1>
                <h5 class="mb-0">Kecamatan Sukodono, Kabupaten Lumajang</h5>
            </div>
            </div>
        </div>
        </div>
        <div class="my-0">
        <div class="p-2 text-center bg-body-tertiary">
            <div class="container py-3">
            <h2 class="text-body-emphasis mt-4">Berita Terbaru</h2>
                
            <div class="row row-cols-1 row-cols-md-3 p-5 g-4">
            @foreach($items as $item)
            <div class="col">
                <div class="card h-100">
                <img src="{!! asset('/storage/foto-berita/'.$item->id.'.jpg') !!}" style="height: 12rem; object-fit: cover" class="card-img-top" alt="{!! $item->judul !!}">
                <div class="card-body">
                    <a href="/berita/view/{!! $item->id !!}" class="text-wrap text-center text-dark text-decoration-none">
                        <h5 class="card-title hoverable">{{ Str::limit($item->judul, 50) }}</h5>
                    </a>
                </div>
                <div class="card-footer text-start">
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

            </div>
        </div>
        </div>
        @include('footer')
        @include('plugin/bootstrap-close')
    </body>
</html>