<div class = "container">
    <h1>Edit Dokumen</h1>
        <form action="{{ route('DokumenUpdate') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{!! $item->id !!}">
            <div class="form-group">
            <label for="nama">Nama Dokumen</label>
            <input type="text" class="form-control" value="{!! $item->nama !!}" id="nama" placeholder="Masukkan Nama Anggaran" name="nama">
            </div> <br>
            <div class="form-group">
            <label for="gambar">File Dokumen</label><br>
            <input type="file" name="attachment">
            <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>