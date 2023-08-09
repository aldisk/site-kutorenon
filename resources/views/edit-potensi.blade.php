<div class = "container">
    <h1>Edit Potensi</h1>
        <form action="{{ route('PotensiUpdate') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{!! $potensi->id !!}">
            <div class="form-group">
            <label for="nama">Judul Potensi</label>
            <input type="text" class="form-control" value="{!! $potensi->nama !!}" id="nama" placeholder="Masukkan Judul Potensi" name="nama">
            </div> <br>
            <div class="form-group">
            <label for="isi">Deskripsi Potensi</label><br>
            <textarea class="form-control" rows = "10" col = "30" name="isi">@foreach(explode(';', $potensi->isi) as $iter){{ $iter }}@endforeach</textarea> <br>
            </div>
            <div class="form-group">
            <label for="gambar">Gambar</label><br>
            <input type="file" name="fotoPotensi">
            <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>