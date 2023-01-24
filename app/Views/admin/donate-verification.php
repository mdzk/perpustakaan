<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Verifikasi Donasi</h3>
                <p class="text-subtitle text-muted">Menampilkan semua daftar donasi yang akan di verifikasi.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Donasi Buku</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <a class="btn btn-primary rounded-pill mb-2 btn-icon action-icon" href="<?= route_to('donate'); ?>">
                    <span class="fonticon-wrap me-2">
                        <i class="bi bi-chevron-left"></i>
                    </span> Kembali
                </a>

                <div class="modal fade text-left modal-borderless" id="tambahkategori">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Buku</h5>
                            </div>
                            <form method="POST" action="<?= route_to('donate-save'); ?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="basicInput">Judul</label>
                                        <input type="text" name="title" class="form-control" id="basicInput" placeholder="Masukkan Judul" @error('name') is-invalid @enderror>
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Pengarang</label>
                                        <input type="text" name="author" class="form-control" id="basicInput" placeholder="Masukkan Nama Pengarang" @error('name') is-invalid @enderror>
                                    </div>

                                    <div class="form-group">
                                        <label for="basicInput">Program Studi</label>
                                        <select name='id_prodi' class="form-select" id="basicSelect">
                                            <option selected disabled>-- Pilih Program Studi --</option>
                                            <?php foreach ($prodies as $prodi) : ?>
                                                <option value="<?= $prodi['id_prodi']; ?>"><?= $prodi['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                        <span class="d-sm-block">Batal</span>
                                    </button>
                                    <button type="submit" name="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                        <span class="d-sm-block">Simpan</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Donatur</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($donates as $donate) : ?>
                                            <tr>
                                                <td class="text-bold-500"><?= $donate['title']; ?></td>
                                                <td class="text-bold-500"><?= $donate['author']; ?></td>
                                                <td class="text-bold-500">
                                                    <?php if ($donate['donors'] == '') { ?>
                                                        <span class="badge bg-light-danger mx-2">Belum terdapat donatur</span>
                                                    <?php } else {; ?>
                                                        <span class="badge bg-light-primary mx-2"><?= $donate['donors']; ?></span>
                                                    <?php }; ?>
                                                </td>
                                                <td class="text-bold-500">
                                                    <ul class="list-inline m-0 d-flex">
                                                        <li class="list-inline-item mail-delete">
                                                            <button type="button" class="btn btn-light-success btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#verifikasikategori<?= $donate['id_donate']; ?>">
                                                                <span class="fonticon-wrap">
                                                                    <i class="bi bi-check-lg"></i>
                                                                </span>
                                                            </button>
                                                        </li>
                                                        <!-- <li class="list-inline-item mail-delete">
                                                            <button type="button" class="btn btn-light-primary btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#editkategori<?= $donate['id_donate']; ?>">
                                                                <span class="fonticon-wrap">
                                                                    <i class="bi bi-pencil-fill"></i>
                                                                </span>
                                                            </button>
                                                        </li> -->
                                                        <li class="list-inline-item mail-unread">
                                                            <button type="button" class="btn btn-light-danger btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#hapuskategori<?= $donate['id_donate']; ?>">
                                                                <span class="fonticon-wrap d-inline">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                </span>
                                                            </button>
                                                        </li>
                                                    </ul>

                                                    <!-- hapus kategori modal -->
                                                    <div class="modal fade text-left modal-borderless" id="hapuskategori<?= $donate['id_donate']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Peringatan</h5>
                                                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>

                                                                <form action="<?= route_to('donate-delete'); ?>" method="POST">
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Apakah anda yakin ingin menghapus buku ini?
                                                                        </p>

                                                                        <input type="text" value="<?= $donate['id_donate']; ?>" name="id_donate" hidden>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light-primary ml-1" data-bs-dismiss="modal">
                                                                            <span class="d-sm-block">Tidak</span>
                                                                        </button>
                                                                        <button type="submit" name="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                                                            <span class="d-sm-block">Ya</span>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>

                                            <!-- edit kategori modal -->
                                            <div class="modal fade text-left modal-borderless" id="editkategori<?= $donate['id_donate']; ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Buku</h5>
                                                        </div>

                                                        <form action="<?= route_to('donate-update'); ?>" method="POST">
                                                            <input type="hidden" name="id_donate" value="<?= $donate['id_donate']; ?>">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="basicInput">Judul</label>
                                                                    <input type="text" name="title" value="<?= $donate['title'] ?>" class="form-control" id="basicInput" placeholder="Masukkan Judul" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="basicInput">Pengarang</label>
                                                                    <input type="text" name="author" value="<?= $donate['author'] ?>" class="form-control" id="basicInput" placeholder="Masukkan Nama Pengarang" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                                                    <span class="d-sm-block">Batal</span>
                                                                </button>
                                                                <button type="submit" wire:click.prevent="update()" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                                    <span class="d-sm-block">Simpan</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- verifikasi modal -->
                                            <div class="modal fade text-left modal-borderless" id="verifikasikategori<?= $donate['id_donate']; ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Verifikasi Donasi</h5>
                                                        </div>

                                                        <form enctype="multipart/form-data" action="<?= route_to('donate-verify'); ?>" method="POST">
                                                            <input type="hidden" name="id_donate" value="<?= $donate['id_donate']; ?>">
                                                            <input type="hidden" name="title" value="<?= $donate['title']; ?>">
                                                            <input type="hidden" name="author" value="<?= $donate['author']; ?>">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="basicInput">Donatur</label>
                                                                    <input type="text" name="donors" class="form-control" value="<?= $donate['donors']; ?>" id="basicInput" placeholder="Masukkan Nama Donatur" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="basicInput">NPM</label>
                                                                    <input type="text" name="npm" class="form-control" id="basicInput" value="<?= $donate['npm']; ?>" placeholder="Masukkan Nama Donatur" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="formFile" class="form-label">Bukti</label>
                                                                    <input name="bukti" class="form-control" type="file" accept="image/*" id="formFile" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                                                    <span class="d-sm-block">Batal</span>
                                                                </button>
                                                                <button type="submit" wire:click.prevent="update()" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                                                    <span class="d-sm-block">Simpan</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Tables end -->
</div>

<?= $this->endSection(); ?>