<?= $this->extend('layouts/home'); ?>

<?= $this->section('content'); ?>

<section id="hero" class="h-100 w-100" style="padding-bottom:10em;box-sizing: border-box; background-color: #141432">
    <div class="container-xxl mx-auto p-0  position-relative header-2-3" style="font-family: 'Poppins', sans-serif;">
        <div>
            <div class="mx-auto d-flex flex-lg-row flex-column hero pb-0">
                <div class="">
                    <span class="badge bg-light-primary mb-3 fs-5"><?= $article['name']; ?></span>
                    <span class="badge bg-light-success mb-3 fs-5"><?= $article['date']; ?></span>
                    <h1 class="title-text-big text-white fs-1"><?= $article['title']; ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="artikel" class="" style="margin-top: -10em">
    <div class="container d-flex flex-column">
        <img class="img-fluid" style="border-radius: 3%;" src="<?= base_url(); ?>/img/<?= $article['thumbnail']; ?>" alt="">
        <div class="mt-3">
            <?= $article['description']; ?>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>