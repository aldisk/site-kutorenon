<div class = "container">
    <h1>Edit Fasilitas</h1>
        <form action="{{ route('FasilitasUpdate') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{!! $item->id !!}">
            <div class="form-group">
            <label for="nama">Nama Fasilitas</label>
            <input type="text" class="form-control" value="{!! $item->nama !!}" id="nama" placeholder="Masukkan Nama Fasilitas" name="nama">
            </div> <br>
            <div class="form-group">
            <label for="isi">Isi Fasilitas</label><br>
            <textarea class="form-control" rows = "10" col = "30" name="isi">@foreach(explode(';', $item->isi) as $iter){{ $iter }}@endforeach</textarea> <br>
            </div>
            <div class="form-group">
            <label for="gambar">Gambar</label><br>
            <input type="file" name="attachment">
            <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>