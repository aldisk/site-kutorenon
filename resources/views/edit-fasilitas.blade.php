<h2>Edit Fasilitas</h2>
<form action="{{ route('FasilitasUpdate') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{!! $item->id !!}">
    Nama Fasilitas : <input type="text" name="nama" value="{!! $item->nama !!}"> <br>
    Isi Fasilitas : <textarea name="isi" cols="30" rows="10">{{ str_replace(";", "\n", $item->isi) }}</textarea> <br>
    Gambar : <input type="file" name="attachment">
    <input type="submit" value="Submit">
</form>