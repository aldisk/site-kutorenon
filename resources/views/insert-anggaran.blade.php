<head>
@include('plugin/bootstrap-open')
</head>
<body>
    <div class = "container"> <br>
    <h1>Masukan Anggaran</h1>
        <form action="{{ route('AnggaranInsert') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <label for="nama">Nama Anggaran</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Anggaran" name="nama">
            </div> <br>
            <div class="form-group">
            <label for="attachment">Dokumen Anggaran</label><br>
            <input type="file" name="attachment">
            <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
    @include('plugin/bootstrap-close')   
</body>
