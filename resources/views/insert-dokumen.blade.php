<h1>Masukkan Dokumen</h1>
<form action="{{ route('DokumenInsert') }}" method="post" enctype="multipart/form-data">
    @csrf
    Nama Dokumen : <input type="text" name="nama"> <br>
    Gambar : <input type="file" name="attachment">
    <input type="submit" value="Submit">
</form>