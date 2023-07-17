<h2>Edit Potensi</h2>
<form action="{{ route('PotensiUpdate') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{!! $potensi->id !!}">
    Judul Berita : <input type="text" name="nama" value="{!! $potensi->nama !!}"> <br>
    Isi Berita : <textarea name="isi" cols="30" rows="10">{{ str_replace(";", "\n", $potensi->isi) }}</textarea> <br>
    Gambar : <input type="file" name="fotoPotensi">
    <input type="submit" value="Submit">
</form>