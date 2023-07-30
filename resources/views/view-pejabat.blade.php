<html>
    <head>
        @include('plugin/bootstrap-open')
        <title>Pejabat Desa | Website Resmi Kutorenon</title>
    </head>
    <body>
        @include('navbar')
        <div class="container">
            <h1 class="py-4 text-center">Pejabat dan Struktur Organisasi Desa</h1>
            <div class="px-3 py-1">
                <img src="{!! asset('/storage/pejabat-desa.png') !!}" class="d-block mx-auto img-thumbnail" alt="...">
            </div>
        </div>
        @include('footer')
        @include('plugin/bootstrap-close')
    </body>
</html>