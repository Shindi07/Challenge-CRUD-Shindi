<?php

use App\Database\Migrations\Mahasiswa;
?>
<?= $this->extend('templates/index') ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1 class="display-5">Detail Mahasiswa</h1>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-5">
            <img src="<?= base_url('img/' . $mahasiswa['foto']) ?>" alt="" width="200" height="200" class="img-thumbnail">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <!-- card detail -->
            <div class="card">
                <div class=" card-body">
                    <h5 class="card-title"><?= $mahasiswa['nama']; ?></h5>
                </div>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item">NIM :<?= $mahasiswa['nim']; ?></li>
                    <li class="list-group-item">Program Studi :<?= $mahasiswa['prodi']; ?></li>
                    <li class="list-group-item">Alamat :<?= $mahasiswa['alamat']; ?></li>
                    <li class="list-group-item">No HP :<?= $mahasiswa['no_hp']; ?></li>

                </ul>
                <div class="card-body">
                    <a href="<?= base_url('mahasiswa') ?>" class="btn btn-danger">Kembali</a>
                </div>
            </div>
            <!-- akhir card detail -->
        </div>
    </div>
</div>
<?= $this->endSection() ?>