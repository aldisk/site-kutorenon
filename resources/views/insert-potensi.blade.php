    <div class = "container"> <br>
    <h1>Memasukan Potensi Desa</h1>
        <form action="{{ route('PotensiInsert') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <label for="nama">Nama Potensi</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Potensi" name="nama">
            </div> <br>
            <div class="form-group">
            <label for="isi">Deskripsi Potensi</label><br>
            <textarea class="form-control" rows = "10" col = "30" name="isi" placeholder="Masukkan Isi Potensi"></textarea> <br>
            </div>
            <div class="form-group">
            <label for="attachment">Gambar</label><br>
            <input type="file" name="fotoPotensi">
            <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>