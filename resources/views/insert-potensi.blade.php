<h1>Memasukkan Potensi Desa</h1>
<form action="{{ route('PotensiInsert') }}" method="post" enctype="multipart/form-data">
    @csrf
    Nama Potensi : <input type="text" name="nama"> <br>
    Deskripsi Potensi : <textarea name="isi" cols="30" rows="10"></textarea> <br>
    Gambar : <input type="file" name="fotoPotensi">
    <input type="submit" value="Submit">
</form>