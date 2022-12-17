<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Bahan Ajar</h3>
                <p class="text-subtitle text-muted">Menampilkan semua bahan ajar pada website</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bahan Ajar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="dropdown">
            <button class="btn btn-primary mb-3 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Tambah bahan ajar
            </button>
            <ul class="dropdown-menu">
                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#tambahbahanajar1">YouTube</button></li>
                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#tambahbahanajar2">PDF</button></li>
            </ul>
        </div>

        <div class="modal fade text-left modal-borderless" id="tambahbahanajar1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Bahan Ajar YouTube</h5>
                    </div>
                    <form enctype="multipart/form-data" method="POST" action="<?= route_to('materials-save'); ?>">
                        <input type="text" name="status" value="1" hidden>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="basicInput">Judul</label>
                                <input type="text" name="title" class="form-control" id="basicInput" placeholder="Masukkan Judul" required>
                            </div>
                            <div class="form-group">
                                <label for="basicInput">YouTube Embed</label>
                                <input type="text" name="material" class="form-control" id="basicInput" placeholder="Masukkan Nama Pengarang" required>
                            </div>
                            <div class="form-group">
                                <label for="floatingTextarea2">Deskripsi</label>
                                <textarea class="form-control" name="description" placeholder="Masukkan Deskripsi" id="floatingTextarea2" style="height: 100px" required></textarea>
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

        <div class="modal fade text-left modal-borderless" id="tambahbahanajar2">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Bahan Ajar PDF</h5>
                    </div>
                    <form enctype="multipart/form-data" method="POST" action="<?= route_to('materials-save'); ?>">
                        <input type="text" name="status" value="2" hidden>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="basicInput">Judul</label>
                                <input type="text" name="title" class="form-control" id="basicInput" placeholder="Masukkan Judul" required>
                            </div>
                            <div class="form-group">
                                <label for="formFile" class="form-label">Upload PDF</label>
                                <input name="filePDF" class="form-control" type="file" accept="application/pdf" id="formFile" required>
                            </div>
                            <div class="form-group">
                                <label for="floatingTextarea2">Deskripsi</label>
                                <textarea class="form-control" name="description" placeholder="Masukkan Deskripsi" id="floatingTextarea2" style="height: 100px" required></textarea>
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

        <?php foreach ($materials as $material) : ?>
            <div class="card mb-2">
                <div class="card-body py-4 px-4">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="d-flex align-items-center">
                                <div class="ms-3 name">
                                    <h5 class="font-bold"><?= $material['title']; ?></h5>
                                    <?php if ($material['status'] == 1) { ?>
                                        <span class="badge bg-light-danger mx-2">YouTube</span>
                                    <?php } else { ?>
                                        <span class="badge bg-light-primary mx-2">PDF</span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="d-flex align-items-center justify-content-end">

                                <ul class="list-inline m-0 d-flex">
                                    <li class="list-inline-item mail-delete">
                                        <button type="button" class="btn btn-light-primary btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#edit<?= $material['status']; ?><?= $material['id_materials']; ?>">
                                            <span class="fonticon-wrap d-inline">
                                                <i class="bi bi-pencil-fill"></i>
                                            </span> Edit
                                        </button>
                                    </li>
                                    <li class="list-inline-item mail-unread">
                                        <button type="button" class="btn btn-light-danger btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#border-less<?= $material['id_materials']; ?>">
                                            <span class="fonticon-wrap d-inline">
                                                <i class="bi bi-trash-fill"></i>
                                            </span> Hapus
                                        </button>
                                    </li>
                                </ul>

                                <?php
                                if ($material['status'] == 1) {
                                ?>

                                    <div class="modal fade text-left modal-borderless" id="edit<?= $material['status']; ?><?= $material['id_materials']; ?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Bahan Ajar YouTube</h5>
                                                </div>
                                                <form enctype="multipart/form-data" method="POST" action="<?= route_to('materials-update'); ?>">
                                                    <input type="text" name="status" value="1" hidden>
                                                    <div class="modal-body">
                                                        <input type="text" name="id_materials" hidden value="<?= $material['id_materials']; ?>">
                                                        <div class="form-group">
                                                            <label for="basicInput">Judul</label>
                                                            <input type="text" name="title" value="<?= $material['title']; ?>" class="form-control" id="basicInput" placeholder="Masukkan Judul" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="basicInput">YouTube Embed</label>
                                                            <input type="text" name="material" value="<?= $material['material']; ?>" class="form-control" id="basicInput" placeholder="Masukkan Nama Pengarang" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="floatingTextarea2">Deskripsi</label>
                                                            <textarea class="form-control" name="description" placeholder="Masukkan Deskripsi" id="floatingTextarea2" style="height: 100px" required><?= $material['description']; ?></textarea>
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

                                <?php } else if ($material['status'] == 2) { ?>
                                    <div class="modal fade text-left modal-borderless" id="edit<?= $material['status']; ?><?= $material['id_materials']; ?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Bahan Ajar PDF</h5>
                                                </div>
                                                <form enctype="multipart/form-data" method="POST" action="<?= route_to('materials-update'); ?>">
                                                    <input type="text" name="status" value="2" hidden>
                                                    <div class="modal-body">
                                                    <input type="text" name="id_materials" hidden value="<?= $material['id_materials']; ?>">
                                                        <div class="form-group">
                                                            <label for="basicInput">Judul</label>
                                                            <input type="text" name="title" value="<?= $material['title']; ?>" class="form-control" id="basicInput" placeholder="Masukkan Judul" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="formFile" class="form-label">Upload PDF</label>
                                                            <input name="filePDF" class="form-control" type="file" accept="application/pdf" id="formFile">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="floatingTextarea2">Deskripsi</label>
                                                            <textarea class="form-control" name="description" placeholder="Masukkan Deskripsi" id="floatingTextarea2" style="height: 100px" required><?= $material['description']; ?></textarea>
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
                                <?php } ?>

                                <!--Hapus Modal Content -->
                                <div class="modal fade text-left modal-borderless" id="border-less<?= $material['id_materials']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Peringatan</h5>
                                                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="<?= route_to('materials-delete'); ?>" method="POST">
                                                <input type="text" name="status" value="<?= $material['status']; ?>" hidden>
                                                <div class="modal-body">
                                                    <p>
                                                        Apakah anda yakin ingin menghapus bahan ajar ini?
                                                    </p>
                                                </div>

                                                <input type="number" hidden value="<?= $material['id_materials']; ?>" name="id_materials">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                                        <span class="d-sm-block">Tidak</span>
                                                    </button>

                                                    <button name="submit" type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                                        <span class="d-sm-block">Ya</span>
                                                    </button>

                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </section>
</div>
<?= $this->endSection(); ?>