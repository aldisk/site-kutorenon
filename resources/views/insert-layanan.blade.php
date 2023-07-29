<h1>Masukkan Layanan</h1>
<form action="{{ route('LayananInsert') }}" method="post">
    @csrf
    Nama Layanan : <input type="text" name="nama"> <br>
    Link : <input type="text" name="link">
    <input type="submit" value="Submit">
</form>