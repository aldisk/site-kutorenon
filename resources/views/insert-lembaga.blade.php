<h1>Memasukkan Lembaga Desa</h1>
<form action="{{ route('LembagaInsert') }}" method="post" enctype="multipart/form-data">
    @csrf
    Nama Lembaga : <input type="text" name="nama"> <br>
    Deskripsi Lembaga : <textarea name="isi" cols="30" rows="10"></textarea> <br>
    Logo : <input type="file" name="attachment">
    <input type="submit" value="Submit">
</form>