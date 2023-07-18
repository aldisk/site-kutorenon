<html>
    <head>
        <title>Dashboard</title>
    </head>
    <body>
        <h1>Dashboard Desa Kutorenon</h1>
        <a href="/admin/berita">berita</a>
        <a href="/admin/potensi">potensi desa</a>
        <a href="/admin/dokumen">dokumen</a>
        @if(isset($mode) && isset ($tab))
            @if($tab == 'berita')
                @if($mode == 'insert')
                    @include('insert-berita')
                @elseif($mode == 'manage')
                    @include('manage-berita')
                @elseif($mode == 'edit')
                    @include('edit-berita')
                @endif
            @elseif($tab == 'potensi')
                @if($mode == 'insert')
                    @include('insert-potensi')
                @elseif($mode == 'manage')
                    @include('manage-potensi')
                @elseif($mode == 'edit')
                    @include('edit-potensi')
                @endif
            @elseif($tab == 'dokumen')
                @if($mode == 'insert')
                    @include('insert-dokumen')
                @elseif($mode == 'manage')
                    @include('manage-dokumen')
                @elseif($mode == 'edit')
                    @include('edit-dokumen')
                @endif
            @endif
        @endif
    </body>
</html>