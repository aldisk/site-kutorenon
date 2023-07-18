<h2>Edit Dokumen</h2>
<form action="{{ route('DokumenUpdate') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{!! $item->id !!}">
    Nama Dokumen : <input type="text" name="nama" value="{!! $item->nama !!}"> <br>
    File Dokumen : <input type="file" name="attachment">
    <input type="submit" value="Submit">
</form>