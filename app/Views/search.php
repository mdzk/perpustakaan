<?= $this->extend('layouts/home'); ?>

<?= $this->section('content'); ?>

<section id="hero" class="h-100 w-100" style="box-sizing: border-box; background-color: #141432">
    <div class="container-xxl mx-auto p-0  position-relative header-2-3" style="font-family: 'Poppins', sans-serif;">
        <div>
            <div class="mx-auto d-flex flex-lg-row flex-column hero">
                <!-- Left Column -->
                <div class="left-column d-flex flex-lg-grow-1 flex-column align-items-center text-center">
                    <h1 class="title-text-big">🔍 Berikut hasil pencarian "<?= $keyword; ?>"</h1>
                    <div class="row mx-0 d-flex justify-content-center mt-5">
                        <form action="<?= base_url(); ?>/proses" method="post">
                            <div class="form-subscribe">
                                <div class="row">
                                    <div class="col-8 px-0 px-md-3">
                                        <div class="input-group d-flex align-items-center">
                                            <div class="input-group-prepend">
                                                <i class="bi bi-search me-1"></i>
                                            </div>
                                            <input type="text" name="q" class="form-control border-0 input-text" placeholder="Cari artikel ..." required>
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

            foreach ($articles as $article) : ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <img class="card-img-top img-fluid" style="object-fit: cover;" src="<?= base_url(); ?>/img/<?= $article['thumbnail']; ?>" alt="Card image cap" style="height: 20rem">
                            <div class="card-body">
                                <span class="badge bg-light-success my-2"><?= $article['name']; ?></span>
                                <h4 class="card-title mb-3"><a href="<?= base_url(); ?>/article/<?= $article['slug']; ?>"><?= $article['title']; ?></a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>