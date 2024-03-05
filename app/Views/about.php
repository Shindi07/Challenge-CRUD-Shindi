<?= $this->extend("templates/index") ?>

<?= $this->section("content") ?>
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1 class="display-5">About Us</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">

            <p class="lead"> Halaman ini merupakan contoh crud untuk menginputkan data diri mahasiswa.
                Latihan menggunakan ci4 untuk mempermudah pembuatan aplikasi nantinya. Halaman SIAKAD ini akan berisi data diri
                mahasiswa, dari tambah data, edit, delete. Yang terintegrasikan dengan menggunakan database MySQL</p>
        </div>
    </div>
</div>

<?= $this->endSection() ?>