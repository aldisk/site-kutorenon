<head>
@include('plugin/bootstrap-open')
</head>
<body>
    <div class = "container"> <br>
    <h1>Memasukan Lembaga Desa</h1>
        <form action="{{ route('LembagaInsert') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <label for="nama">Nama Lembaga</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lembaga" name="nama">
            </div> <br>
            <div class="form-group">
            <label for="isi">Deskripsi Lembaga</label><br>
            <textarea class="form-control" rows = "10" col = "30" name="isi" placeholder="Masukkan Deskripsi Lembaga"></textarea> <br>
            </div>
            <div class="form-group">
            <label for="attachment">Logo</label><br>
            <input type="file" name="attachment">
            <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
    @include('plugin/bootstrap-close')   
</body>
