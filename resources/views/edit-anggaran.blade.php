<div class = "container">
    <h1>Edit Anggaran</h1>
        <form action="{{ route('AnggaranUpdate') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{!! $item->id !!}">
            <div class="form-group">
            <label for="nama">Nama Anggaran</label>
            <input type="text" class="form-control" value="{!! $item->nama !!}" id="nama" placeholder="Masukkan Nama Anggaran" name="nama">
            </div> <br>
            <div class="form-group">
            <label for="gambar">File Anggaran</label><br>
            <input type="file" name="attachment">
            <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>