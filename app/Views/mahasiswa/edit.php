<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1 class="display-5">
                Form Ubah Data Mahasiswa
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
            <form action="<?= base_url('mahasiswa/update/' . $mahasiswa['nim']) ?>" method="POST">
                <?= csrf_field() ?>
                <!-- NIM -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nim" placeholder="nim" name="nim" value="<?= $mahasiswa['nim'] ?>">
                    <label for="nim">Nomor Induk Mahasiswa</label>
                </div>
                <!-- nama -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" value="<?= $mahasiswa['nama'] ?>">
                    <label for="nama">Nama Mahasiswa</label>
                </div>
                <!-- prodi -->
                <div class="form-floating mb-3">
                    <select class="form-select" id="prodi" name="prodi">
                        <option value="">Pilih Program Studi</option>
                        <?php
                        $programStudi = [
                            'Teknik Informatika',
                            'Rekayasa Perangkat Lunak',
                            'Farmasi',
                            'Keperawatan',
                            'Kebidanan',
                            'Pendidikan Teknologi Informasi',
                            'Pendidikan Bahasa Inggris',
                            'Akuntansi',
                            'Psikologi',
                        ];

                        foreach ($programStudi as $prodi) {
                            $selected = ($mahasiswa['prodi'] === $prodi) ? 'selected' : '';
                            echo '<option ' . $selected . ' value="' . $prodi . '">' . $prodi . '</option>';
                        }
                        ?>
                    </select>
                    <label for="prodi">Program Studi</label>
                </div>

                <!-- alamat -->
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Alamat" id="alamat" style="height: 100px;" name="alamat"><?= $mahasiswa['alamat'] ?></textarea>
                    <label for="alamat">Alamat</label>
                </div>
                <!-- no hp -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="no_hp" placeholder="no_hp" name="no_hp" value="<?= $mahasiswa['no_hp'] ?>">
                    <label for="no_hp">No Handphone</label>
                </div>
                <button type="submit" class="btn btn-success">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>