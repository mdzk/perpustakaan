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
        <a href="<?= route_to('article-add'); ?>" class="btn btn-primary rounded-pill mb-2">+ Tambah bahan ajar</a>

        <?php foreach ($materials as $material) : ?>
            <div class="card mb-2">
                <div class="card-body py-4 px-4">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="d-flex align-items-center">
                                <div class="ms-3 name">
                                    <h5 class="font-bold"><?= $material['title']; ?></h5>
                                    <!-- <span class="badge bg-light-danger mx-2"><?= $material['description']; ?></span> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="d-flex align-items-center justify-content-end">

                                <ul class="list-inline m-0 d-flex">
                                    <li class="list-inline-item mail-delete">
                                        <a href="<?= base_url(); ?>/admin/article/edit/<?= $material['id_materials']; ?>" type="button" class="btn btn-light-primary btn-icon action-icon" data-toggle="tooltip">
                                            <span class="fonticon-wrap">
                                                <i class="bi bi-pencil-fill"></i>
                                            </span> Edit
                                        </a>
                                    </li>
                                    <li class="list-inline-item mail-unread">
                                        <button type="button" class="btn btn-light-danger btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#border-less<?= $material['id_materials']; ?>">
                                            <span class="fonticon-wrap d-inline">
                                                <i class="bi bi-trash-fill"></i>
                                            </span> Hapus
                                        </button>
                                    </li>
                                </ul>

                                <!--BorderLess Modal Content -->
                                <div class="modal fade text-left modal-borderless" id="border-less<?= $material['id_materials']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Peringatan</h5>
                                                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="<?= route_to('article-delete'); ?>" method="POST">
                                                <div class="modal-body">
                                                    <p>
                                                        Apakah anda yakin ingin menghapus artikel ini?
                                                    </p>
                                                </div>
                                                
                                                <input type="number" hidden value="<?= $material['id_materials']; ?>" name="id_articles">
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