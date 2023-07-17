<h2>Edit Berita</h2>
<form action="{{ route('BeritaUpdate') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{!! $berita->id !!}">
    Judul Berita : <input type="text" name="judul" value="{!! $berita->judul !!}"> <br>
    Isi Berita : <textarea name="isi" cols="30" rows="10">{{ str_replace(";", "\n", $berita->isi) }}</textarea> <br>
    Gambar : <input type="file" name="fotoBerita">
    <input type="submit" value="Submit">
</form>