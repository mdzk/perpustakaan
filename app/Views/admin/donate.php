<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Donasi Buku</h3>
                <p class="text-subtitle text-muted">Menampilkan semua buku donasi.</p>
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
                <button class="btn btn-primary rounded-pill mb-2" data-bs-toggle="modal" data-bs-target="#tambahkategori">+ Buku baru</button>

                <div class="modal fade text-left modal-borderless" id="tambahkategori">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Buku</h5>
                            </div>
                            <form method="POST" action="<?= route_to('category-save'); ?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Donatur</label>
                                        <input type="text" name="donors" class="form-control" id="basicInput" placeholder="Masukkan Nama Donatur" @error('name') is-invalid @enderror>
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Judul</label>
                                        <input type="text" name="name" class="form-control" id="basicInput" placeholder="Masukkan Judul" @error('name') is-invalid @enderror>
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Pengarang</label>
                                        <input type="text" name="name" class="form-control" id="basicInput" placeholder="Masukkan Nama Pengarang" @error('name') is-invalid @enderror>
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
                                                <td class="text-bold-500"><?= $donate['donors']; ?></td>
                                                <td class="text-bold-500">
                                                    <ul class="list-inline m-0 d-flex">
                                                        <li class="list-inline-item mail-delete">

                                                            <button type="button" class="btn btn-light-primary btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#editkategori<?= $donate['id_donate']; ?>">
                                                                <span class="fonticon-wrap">
                                                                    <i class="bi bi-pencil-fill"></i>
                                                                </span>
                                                            </button>
                                                        </li>
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
                                                                
                                                                <form action="<?= route_to('category-delete'); ?>" method="POST">
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Apakah anda yakin ingin menghapus kategori ini?
                                                                        </p>
                                                                        
                                                                        <input type="text" value="<?= $donate['id_donate']; ?>" name="id_categories" hidden>
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
                                                            <h5 class="modal-title">Edit Kategori</h5>
                                                        </div>
                                                        
                                                        <form action="<?= route_to('category-update'); ?>" method="POST">
                                                            <input type="hidden" name="id_categories" value="<?= $donate['id_donate']; ?>">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="basicInput">Masukkan Kategori</label>
                                                                    <input type="text" class="form-control" id="basicInput" name="name" value="<?= $donate['id_donate']; ?>" placeholder="ketik disini" @error('name') is-invalid @enderror>
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