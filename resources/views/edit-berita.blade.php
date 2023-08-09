    <div class = "container">
    <h1>Edit Berita</h1>
        <form action="{{ route('BeritaUpdate') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{!! $berita->id !!}">
            <div class="form-group">
            <label for="judul">Judul Berita</label>
            <input type="text" class="form-control" value="{!! $berita->judul !!}" id="judul" placeholder="Masukkan Judul Berita" name="judul">
            </div> <br>
            <div class="form-group">
            <label for="isi">Isi Berita</label><br>
            <textarea class="form-control" rows = "10" col = "30" name="isi">@foreach(explode(';', $berita->isi) as $iter){{ $iter }}@endforeach</textarea> <br>
            </div>
            <div class="form-group">
            <label for="gambar">Gambar</label><br>
            <input type="file" name="fotoBerita">
            <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>