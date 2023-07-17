<h1>Tulis Berita</h1>
<form action="{{ route('BeritaInsert') }}" method="post" enctype="multipart/form-data">
    @csrf
    Judul Berita : <input type="text" name="judul"> <br>
    Isi Berita : <textarea name="isi" cols="30" rows="10"></textarea> <br>
    Gambar : <input type="file" name="fotoBerita">
    <input type="submit" value="Submit">
</form>