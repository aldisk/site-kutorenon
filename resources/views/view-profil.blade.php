<html>
    <head>
        @include('plugin/bootstrap-open')
        <title>Profil Desa | Website Resmi Kutorenon</title>
    </head>
    <body>
        @include('navbar')
        <div class="container">
            <h1 class="py-4 text-center">Profil Desa</h1>
            <div class="text-break">
                <h6 class="px-4 py-1 mt-4 fs-6">Desa kutorenon adalah salah satu desa yang terletak di Kecamatan Sukodono, Kabupaten Lumajang yang dulunya merupakan Kerajaan Lamajang Tigang Juru yang merupakan cikal bakal adanya Kota Lumajang, bukti adanya Kerajaan Lamajang Tigang Juru yaitu dengan adanya petilasan Makam Arya Wiraraja dan Cagar Budaya Biting.</h6>
                <h6 class="px-4 py-1 fs-6">Secara geografis, Desa Kutorenon terletak di posisi  7" 21'-7" 31' lintang selatan dan 110" 10'-111" 40' bujur timur pada ketinggian 156 mdpl, dengan luas wilayah 918,18 ha. Akses jalan di Desa Kutorenon dilintasi oleh jalan lintas provinsi yang menjadikannya lokasi singgah dan transit untuk rute Malang-Lumajang melalui Turen.</h6>
                <h6 class="px-4 py-1 fs-6">Desa Kutorenon memiliki penduduk sebanyak 8096 jiwa yang sebagian besar bermata pencaharian sebagai petani dengan hasil utama pertanian berupa padi, tebu dan sengon.</h6>
                <div class="px-3 py-1">
                <img src="{!! asset('/storage/peta-desa.png') !!}" style="width: 20rem;" class="d-block mx-auto img-thumbnail" alt="...">
                </div>
                <h6 class="px-4 py-1 fs-6">Secara administratif batas-batas wilayah desa Kutorenon antara lain :</h6>
                <ul>
                    <li>Sebelah Utara : Desa Wonorejo</li>
                    <li>Sebelah Timur : Desa Selok Gondang</li>
                    <li>Sebelah Selatan : Desa Karangsari dan Kelurahan Kepuharjo</li>
                    <li>Sebelah Barat : Desa Dawuhan Lor dan Desa Tanggung</li>
                </ul>
                <h6 class="px-4 py-1 fs-6">Sedangkan, jumlah dusun di desa Kurorenon terbagi menjadi 5 dengan cakupan RW antara lain : </h6>
                <ul>
                    <li>Dusun Kepuh yang meliputi RW.01, RW. 02 dan RW.03</li>
                    <li>Dusun Krajan I yang meliputi RW. 04 dan RW. 05</li>
                    <li>Dusun Krajan II yang meliputi RW. 06 dan RW. 07</li>
                    <li>Dusun Biting I yang meliputi RW. 08 dan RW. 09</li>
                    <li>Dusun Biting II meliputi RW.10, RW. 11, RW. 12, RW. 13 dan RW. 14</li>
                </ul>
            </div>
        </div>
        @include('footer')
        @include('plugin/bootstrap-close')
    </body>
</html>