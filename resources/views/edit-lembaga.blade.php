<div class="container">
    <h1>Edit Lembaga</h1>
    <form action="{{ route('LembagaUpdate') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{!! $item->id !!}">
        <div class="form-group">
            Nama Lembaga : {{ $item->nama }} <br>
        </div> <br>
        <div class="form-group">
            <label for="isi">Deskripsi Lembaga</label><br>
            <textarea class="form-control" rows="10" col="30" name="isi">@foreach(explode(';', $item->isi) as $iter){{ $iter }}@endforeach</textarea> <br>
        </div>
        <div class="form-group">
            <label for="gambar">Logo </label><br>
            <input type="file" name="attachment">
            <button type="submit" class="btn btn-dark">Submit</button>
        </div>
    </form>
</div>