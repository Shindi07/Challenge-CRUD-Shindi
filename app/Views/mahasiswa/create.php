<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1 class="display-5">
                Form Tambah Data Mahasiswa
            </h1>
        </div>
    </div>

    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="row">
            <div class="col-5">
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('errors') ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-5">
            <form action="<?= base_url('mahasiswa/save') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <!-- NIM -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nim" placeholder="nim" name="nim" value="<?= old('nim') ?>">
                    <label for="nim">Nomor Induk Mahasiswa</label>
                </div>
                <!-- nama -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" value="<?= old('nama') ?>">
                    <label for="nama">Nama Mahasiswa</label>
                </div>
                <!-- prodi -->
                <div class="form-floating mb-3">
                    <select class="form-select" id="prodi" name="prodi">
                        <option selected value="">Pilih Program Studi</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        <option value="Farmasi">Farmasi</option>
                        <option value="Keperawatan">Keperawatan</option>
                        <option value="Kebidanan">Kebidanan</option>
                        <option value="Pendidikan Teknologi Informasi">Pendidikan Teknologi Informasi</option>
                        <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                        <option value="Akuntansi">Akuntansi</option>
                        <option value="Psikologi">Psikologi</option>
                    </select>
                    <label for="prodi">Program Studi</label>
                </div>
                <!-- alamat -->
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Alamat" id="alamat" style="height: 100px;" name="alamat"><?= old('alamat') ?></textarea>
                    <label for="alamat">Alamat</label>
                </div>
                <!-- no hp -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="no_hp" placeholder="no_hp" name="no_hp" value="<?= old('no_hp') ?>">
                    <label for="no_hp">No Handphone</label>
                </div>
                <!-- upload foto -->
                <div class="mb-3">
                    <input type="file" class="form-control" placeholder="foto" name="foto">
                </div>

                <!-- tombol -->
                <button type="submit" class="btn btn-success">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>