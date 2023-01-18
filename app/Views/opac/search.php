<?= $this->extend('layouts/opac'); ?>

<?= $this->section('content'); ?>

<section id="hero" class="h-100 w-100" style="box-sizing: border-box; background-color: #141432">
    <div class="container-xxl mx-auto p-0  position-relative header-2-3" style="font-family: 'Poppins', sans-serif;">
        <div>
            <div class="mx-auto d-flex flex-lg-row flex-column hero">
                <!-- Left Column -->
                <div class="left-column d-flex flex-lg-grow-1 flex-column align-items-center text-center">
                    <h1 class="title-text-big">🔍 Berikut hasil pencarian "<?= $keyword; ?>"</h1>
                    <div class="row mx-0 d-flex justify-content-center mt-5">
                        <form action="<?= base_url(); ?>/opac/proses" method="post">
                            <div class="form-subscribe">
                                <div class="row">
                                    <div class="col-8 px-0 px-md-3">
                                        <div class="input-group d-flex align-items-center">
                                            <div class="input-group-prepend">
                                                <i class="bi bi-search me-1"></i>
                                            </div>
                                            <input type="text" name="title" class="form-control border-0 input-text" placeholder="Cari buku ..." required>
                                        </div>
                                    </div>
                                    <div class="col-4 px-0 px-md-3">
                                        <button type="submit" class="btn btn-subscribe h-100 bg-primary">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="artikel" class="mt-5">
    <div class="container">
        <div class="row flex-row mt-3 mx-2">

            <?php
            foreach ($biblios as $biblio) : ?>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <img class="card-img-top img-fluid" style="object-fit: cover;" src="<?= base_url(); ?>/slims/lib/minigalnano/createthumb.php?filename=images/docs/<?= $biblio['image']; ?>&width=200" alt="Card image cap" style="height: 20rem">
                            <div class="card-body">
                                <p class="fs-6 text mb-3"><a href="<?= base_url(); ?>/book/<?= $biblio['biblio_id']; ?>"><?= $biblio['title']; ?></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div class="clear"></div>

<?= $this->endSection(); ?>