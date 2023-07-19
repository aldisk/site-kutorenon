<h1>Masukkan Anggaran</h1>
<form action="{{ route('AnggaranInsert') }}" method="post" enctype="multipart/form-data">
    @csrf
    Nama Anggaran : <input type="text" name="nama"> <br>
    Dokumen Anggaran : <input type="file" name="attachment">
    <input type="submit" value="Submit">
</form>