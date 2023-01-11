<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Verifikasi Judul</h3>
                <p class="text-subtitle text-muted">Menampilkan semua judul buku yang diajukan.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Donasi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-8">
                <a class="btn btn-primary rounded-pill mb-2 btn-icon action-icon" href="<?= route_to('donate'); ?>">
                    <span class="fonticon-wrap me-2">
                        <i class="bi bi-chevron-left"></i>
                    </span> Kembali
                </a>

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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($donates as $donate) : ?>
                                            <tr>
                                                <td class="text-bold-500"><?= $donate['title']; ?></td>
                                                <td class="text-bold-500"><?= $donate['author']; ?></td>
                                                <td class="text-bold-500">
                                                    <ul class="list-inline m-0 d-flex">
                                                        <li class="list-inline-item mail-delete">

                                                            <button type="button" class="btn btn-light-primary " data-bs-toggle="modal" data-bs-target="#editkategori<?= $donate['id_donate']; ?>">
                                                                Verifikasi
                                                            </button>
                                                        </li>
                                                        <li class="list-inline-item mail-unread">
                                                            <button type="button" class="btn btn-light-danger" data-bs-toggle="modal" data-bs-target="#hapuskategori<?= $donate['id_donate']; ?>">
                                                                Hapus
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

                                                    <!-- verifikasi judul modal -->
                                                    <div class="modal fade text-left modal-borderless" id="editkategori<?= $donate['id_donate']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Verifikasi Judul</h5>
                                                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>

                                                                <form action="<?= route_to('donate-title-verify'); ?>" method="POST">
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Apakah anda yakin ingin verifikasi judul ini?
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