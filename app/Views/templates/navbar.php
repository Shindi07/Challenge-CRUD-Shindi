<nav class="navbar navbar-expand-lg bg-success navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">SIAKAD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $title === 'Home' ? 'active' : '' ?> " aria-current="page" href="<?= base_url() ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $title === 'About' ? 'active' : '' ?>" href="<?= base_url() ?>about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $title === 'Mahasiswa' ? 'active' : '' ?>" href="<?= base_url() ?>mahasiswa"> Data Mahasiswa</a>
                </li>

            </ul>
        </div>
    </div>
</nav>