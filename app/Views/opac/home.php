<?= $this->extend('layouts/opac'); ?>

<?= $this->section('content'); ?>

<section class="abovefold overflow-hidden">
    <div class="container position-relative">
        <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/HeaderFinance-1/Ornament.png" alt="bg-header" class="img-fluid img-header d-none d-md-block">
    </div>
    <div class="container header">
        <div class="row">
            <div class="col-lg-6 px-md-0 my-auto position-relative">
                <div class="headline">
                    Temukan buku secara <span class="cl-light-blue">Spesifik</span>
                </div>
                <div class="sub-headline">
                    Cari buku yang kamu cari disini secara spesifik!
                </div>
                <!-- <div class="row four-point">
                    <div class="col-md-6">
                        <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/HeaderFinance-1/Vector.png" alt="vector" class="me-3"> Licensed & Regulated
                    </div>
                    <div class="col-md-6">
                        <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/HeaderFinance-1/Vector.png" alt="vector" class="me-3"> Hassle-free
                    </div>
                    <div class="col-md-6">
                        <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/HeaderFinance-1/Vector.png" alt="vector" class="me-3"> 100% Transparent
                    </div>
                    <div class="col-md-6">
                        <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/HeaderFinance-1/Vector.png" alt="vector" class="me-3"> Across 180+ Countries
                    </div>
                </div> -->
            </div>
            <div class="col-lg-6 mt-5 mt-md-0">
                <div class="card">
                    <form action="<?= base_url(); ?>/opac/advanced/proses" method="post">
                    
                    <div class="input-group mb-4">
                        <label for="input" class="w-100">
                            <span class="input-title">Judul</span>
                            <input name="title" type="text" class="form-control mt-2" placeholder="Laskar Pelangi">
                        </label>
                    </div>
                    <div class="input-group mb-4">
                        <label for="input" class="w-100">
                            <span class="input-title">Pengarang</span>
                            <input name="author_name" type="text" class="form-control mt-2" placeholder="Andrea Hirata">
                        </label>
                    </div>
                    <div class="input-group mb-4">
                        <label for="input" class="w-100">
                            <span class="input-title">Subyek</span>
                            <input name="topic" type="text" class="form-control mt-2" placeholder="Masukkan Subyek">
                        </label>
                    </div>

                    <div class="input-group mb-4">
                        <label for="input" class="w-100">
                            <span class="input-title">ISBN/ISSN</span>
                            <input name="isbn_issn" type="text" class="form-control mt-2" placeholder="Masukkan ISBN/ISSN">
                        </label>
                    </div>

                    <div class="input-group mb-4">
                        <label for="input" class="w-100">
                            <span class="input-title">GMD</span>
                            <select name="gmd" class="form-select" id="inputGroupSelect01">
                                <option value="" selected>Semua GMD</option>
                                <?php foreach($gmds as $gmd): ?>
                                    <option value="<?= $gmd['gmd_name']; ?>"><?= $gmd['gmd_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                    </div>

                    <div class="input-group mb-4">
                        <label for="input" class="w-100">
                            <span class="input-title">Tipe Koleksi</span>
                            <select name="coll_type" class="form-select" id="inputGroupSelect01">
                                <option value="" selected>Semua Tipe</option>
                                <?php foreach($coll_types as $coll_type): ?>
                                    <option value="<?= $coll_type['coll_type_name']; ?>"><?= $coll_type['coll_type_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                    </div>

                    <div class="input-group mb-4">
                        <label for="input" class="w-100">
                            <span class="input-title">Lokasi</span>
                            <select name="location" class="form-select" id="inputGroupSelect01">
                                <option value="" selected>Semua Lokasi</option>
                                <?php foreach($locations as $location): ?>
                                    <option value="<?= $location['location_name']; ?>"><?= $location['location_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                    </div>

                    <button class="btn btn-card">
                        Cari Buku
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="artikel" class="explore-2">
    <div class="pl-house">
        <div class="container">
            <div class="row text-content title pt-35 my-0 mx-0" id="header">
                <div class="col-md-9 px-md-0">
                    <h1 class="pb-3">
                        Buku terfavorit
                    </h1>
                    <p class="pb-0 descript-explore-2">
                        Paling banyak diminati saat ini,
                        yuk baca lebih banyak lagi!
                    </p>
                </div>
                <div class="col-md-3 mt-md-3">
                    <a href="<?= route_to('home-article'); ?>" class="btn btn-blue px-5 py-3 mt-0">Lebih banyak</a>
                </div>
            </div>
        </div>
        <div class="row section scrolling-wrapper flex-row flex-nowrap mt-3 img-explore-2 mx-2">

            <?php

            foreach ($biblios as $biblio) : ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <img class="card-img-top img-fluid" style="object-fit: cover;" src="http://localhost/slims/lib/minigalnano/createthumb.php?filename=images/docs/<?= $biblio['image']; ?>&width=200" alt="Card image cap" style="height: 20rem">
                            <div class="card-body">
                                <?php foreach ($authors as $author): ?>
                                    <?php if($biblio['biblio_id'] == $author['biblio_id']): ?>
                                        <span class="badge bg-light-success my-2"> <?= $author['author_name']; ?> </span>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <h4 class="card-title mb-3"><a href=""><?= $biblio['title']; ?> </a></h4>
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