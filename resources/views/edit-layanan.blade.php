<h2>Edit Layanan</h2>
<form action="{{ route('LayananUpdate') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{!! $item->id !!}">
    Nama Layanan : <input type="text" name="nama" value="{!! $item->nama !!}"> <br>
    Link : <input type="text" name="link" value="{!! $item->link !!}">
    <input type="submit" value="Submit">
</form>