
    <div class = "container"> <br>
    <h1>Masukan Layanan</h1>
        <form action="{{ route('LayananInsert') }}" method="post">
            @csrf
            <div class="form-group">
            <label for="nama">Nama Layanan</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Layanan" name="nama">
            </div> <br>
            <div class="form-group">
            <label for="link">Link</label><br>
            <input class="form-control" placeholder="Masukan Link Layanan" type="text" name="link"> <br>
            <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
