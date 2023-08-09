<head>
@include('plugin/bootstrap-open')
</head>
<body>
    <div class = "container"> <br>
    <h1>Tulis Berita</h1>
        <form action="{{ route('BeritaInsert') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <label for="judul">Judul Berita</label>
            <input type="text" class="form-control" id="judul" placeholder="Masukkan Judul Berita" name="judul">
            </div> <br>
            <div class="form-group">
            <label for="isi">Isi Berita</label><br>
            <textarea class="form-control" rows = "10" col = "30" name="isi" placeholder="Masukkan Judul Berita"></textarea> <br>
            </div>
            <div class="form-group">
            <label for="gambar">Gambar</label><br>
            <input type="file" name="fotoBerita">
            <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
    @include('plugin/bootstrap-close')   
</body>
