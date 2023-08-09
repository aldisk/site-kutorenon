<div class = "container"> <br>
    <h1>Tulis Fasilitas Desa</h1>
        <form action="{{ route('FasilitasInsert') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <label for="nama">Nama Fasilitas</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Fasilitas" name="nama">
            </div> <br>
            <div class="form-group">
            <label for="isi">Deskripsi Fasilitas</label><br>
            <textarea class="form-control" rows = "10" col = "30" name="isi" placeholder="Masukkan Isi Fasilitas"></textarea> <br>
            </div>
            <div class="form-group">
            <label for="gambar">Gambar</label><br>
            <input type="file" name="attachment">
            <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>