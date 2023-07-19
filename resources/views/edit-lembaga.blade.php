<h1>Memasukkan Lembaga Desa</h1>
<form action="{{ route('LembagaUpdate') }}" method="post" enctype="multipart/form-data">
    @csrf
    Mengedit Lembaga {{ $item->nama }} <br>
    <input type="hidden" name="id" value="{!! $item->id !!}">
    Deskripsi Lembaga : <textarea name="isi" cols="30" rows="10">{{ str_replace(";", "\n", $item->isi) }}</textarea> <br>
    Logo : <input type="file" name="attachment">
    <input type="submit" value="Submit">
</form>