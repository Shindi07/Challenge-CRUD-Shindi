<?= $this->extend("templates/index") ?>

<?= $this->section("content") ?>
<div class="container mt-4 ">
    <!-- judul halaman -->
    <div class="row text-center">
        <div class="col">
            <h1 class="display-5">
                Daftar Mahasiswa UAP
            </h1>
        </div>
    </div>

    <!-- tombol tambah data -->
    <div class="row ">
        <div class="col">
            <a href="<?= base_url('mahasiswa/create/') ?>" class="btn btn-success"> Tambah Data Mahasiswa</a>
        </div>
    </div>

    <!-- pencarian data -->
    <div class="row my-3">
        <div class="col-md-5">
            <form action="<?= base_url('mahasiswa') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari NIM / Nama..." name="keyword" value=<?= $keyword ?>>
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <!--  akhir pencarian data -->

    <!-- notif sukses -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="row my-2">
            <div class="col-4">
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            </div>
        </div>
    <?php endif ?>
    <!-- akhir notif sukses -->



    <!-- tabel data mahasiswa -->
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $page = isset($_GET['page_mahasiswa']) ? $_GET['page_mahasiswa'] : 1;
                    $no = 1 + (5 * ($page - 1));
                    ?>

                    <?php foreach ($mahasiswa as $mhs) : ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $mhs['nim'] ?></td>
                            <td><?= $mhs['nama'] ?></td>
                            <td><?= $mhs['prodi'] ?></td>
                            <td class="d-flex">
                                <a href="<?= base_url('/mahasiswa/' . $mhs['nim']) ?>" class="btn btn-primary">Detail</a>
                                <a href="<?= base_url('/mahasiswa/edit/' . $mhs['nim']) ?>" class="btn btn-warning mx-2">Ubah</a>
                                <form action="<?= base_url('/mahasiswa/' . $mhs['nim']) ?>" method="POST">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Ingin Menghapus Data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>


                </tbody>
            </table>
        </div>
    </div>
    <?php if (empty($mahasiswa)) : ?>
        <div class="row text-center">
            <div class="col">
                <h3 class="display-6">Data Tidak Ditemukan!</h3>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col">
            <?= $pager->links('mahasiswa', 'my_pagination') ?>
        </div>
    </div>


</div>
</div>

<?= $this->endSection() ?>