<head>
@include('plugin/bootstrap-open')
</head>
<body>
    <div class = "container"> <br>
    <h1>Masukan Dokumen</h1>
        <form action="{{ route('DokumenInsert') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <label for="nama">Nama Dokumen</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Dokumen" name="nama">
            </div> <br>
            <div class="form-group">
            <label for="attachment">Dokumen</label><br>
            <input type="file" name="attachment">
            <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
    @include('plugin/bootstrap-close')   
</body>
