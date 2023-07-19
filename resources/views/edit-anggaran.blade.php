<h2>Edit Anggaran</h2>
<form action="{{ route('AnggaranUpdate') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{!! $item->id !!}">
    Nama Anggaran : <input type="text" name="nama" value="{!! $item->nama !!}"> <br>
    File Anggaran : <input type="file" name="attachment">
    <input type="submit" value="Submit">
</form>