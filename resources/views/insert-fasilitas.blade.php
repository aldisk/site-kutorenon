<h1>Memasukkan Potensi Desa</h1>
<form action="{{ route('FasilitasInsert') }}" method="post" enctype="multipart/form-data">
    @csrf
    Nama Fasilitas : <input type="text" name="nama"> <br>
    Deskripsi Fasilitas : <textarea name="isi" cols="30" rows="10"></textarea> <br>
    Gambar : <input type="file" name="attachment">
    <input type="submit" value="Submit">
</form>