<?= $this->extend('layouts/home'); ?>

<?= $this->section('content'); ?>
<section id="hero" class="h-100 w-100" style="box-sizing: border-box; background-color: #141432">
    <div class="container-xxl mx-auto p-0  position-relative header-2-3" style="font-family: 'Poppins', sans-serif;">
        <div>
            <div class="mx-auto d-flex flex-lg-row flex-column hero">
                <!-- Left Column -->
                <div class="left-column d-flex flex-lg-grow-1 flex-column align-items-lg-start text-lg-start align-items-center text-center">
                    <h1 class="title-text-big">Selamat datang<br class=" d-lg-block d-none"> di Perpustakaan Jurusan</h1>
                    <p class="fs-4">Nikmati layanan dari kami untuk mendukung pembelajaran kamu! 😎</p>
                </div>
                <!-- Right Column -->
                <div class="right-column text-center d-flex justify-content-center pe-0">
                    <img id="img-fluid" class="h-auto mw-100" src="<?= base_url(); ?>/assets/images/Header-2-1.png" alt="">
                </div>

            </div>
        </div>
    </div>
</section>

<section id="layanan" class="h-100 w-100" style="box-sizing: border-box; background-color: #141432; ">
    <div class="content-2-3 container-xxl mx-auto p-0  position-relative" style="font-family: 'Poppins', sans-serif">
        <div class="text-center title-text">
            <h1 class="text-title text-white">Yang kami berikan</h1>
            <p class="text-caption" style="margin-left: 3rem; margin-right: 3rem">
                Kamu bisa ini dapatkan ini semua dari kami.
            </p>
        </div>

        <div class="grid-padding text-center">
            <div class="row">
                <div class="col-lg-4 column">
                    <div class="icon">
                        <img src="<?= base_url(); ?>/assets/images/Content-2-8.png" alt="" />
                    </div>
                    <h3 class="icon-title text-white">Buku Terdaftar</h3>
                    <p class="icon-caption">
                        Kami akan membantu untuk<br />
                        melakukan sertifikasi Internasional.
                    </p>
                </div>
                <div class="col-lg-4 column">
                    <div class="icon">
                        <img src="<?= base_url(); ?>/assets/images/Content-2-9.png" alt="" />
                    </div>
                    <h3 class="icon-title text-white">Gratis Hosting</h3>
                    <p class="icon-caption">
                        Dapatkan layanan hosting<br />
                        untuk bagi mahasiswa Manajemen Informatika.
                    </p>
                </div>
                <div class="col-lg-4 column">
                    <div class="icon">
                        <img src="<?= base_url(); ?>/assets/images/Content-2-10.png" alt="" />
                    </div>
                    <h3 class="icon-title text-white">Form Control Laboratorium</h3>
                    <p class="icon-caption">
                        Bantu kami untuk mengontrol<br />
                        agar menjadi lebih baik.
                    </p>
                </div>
            </div>
        </div>

        <div class="card-block">
            <div class="card">
                <div class="d-flex flex-lg-row flex-column align-items-center">
                    <div class="me-lg-3">
                        <img src="<?= base_url(); ?>/assets/images/Content-2-1%20(1).png" alt="" />
                    </div>
                    <div class="flex-grow-1 text-lg-start text-center card-text">
                        <h3 class="card-title text-white">
                            Hosting website mu sekarang, Gratis!
                        </h3>
                        <p class="card-caption">
                            Khusus untuk kamu yang ingin mendapatkan hosting gratis,<br class="d-none d-lg-block" />
                            syarat dan ketentuan berlaku.
                        </p>
                    </div>
                    <div class="card-btn-space">
                        <button style="width: max-content;" class="btn btn-card text-white">Coba Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="artikel" class="explore">
    <div class="pl-house">
        <div class="container">
        <div class="row text-content title pt-35 my-0 mx-0" id="header">
            <div class="col-md-9 px-md-0">
                <h1 class="pb-3">
                    Artikel terbaru
                </h1>
                <p class="pb-0 descript-explore">
                    Dapatkan informasi seputar teknologi terbaru dari kami, <br>
                    jangan sampai ketinggalan ya!
                </p>
            </div>
            <div class="col-md-3 mt-md-3">
                <a href="<?= route_to('home-article'); ?>" class="btn btn-blue px-5 py-3 mt-0">Lebih banyak</a>
            </div>
        </div>
        </div>
        <div class="row section scrolling-wrapper flex-row flex-nowrap mt-3 img-explore mx-2">

            <?php

            use function App\Controllers\truncateString;

            foreach ($articles as $article) : ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <img class="card-img-top img-fluid" style="object-fit: cover;" src="<?= base_url(); ?>/img/<?= $article['thumbnail']; ?>" alt="Card image cap" style="height: 20rem">
                            <div class="card-body">
                                <span class="badge bg-light-success my-2"><?= $article['name']; ?></span>
                                <h4 class="card-title mb-3"><a href="<?= base_url(); ?>/article/<?= $article['slug']; ?>"><?= $article['title']; ?></a></h4>
                                <p class="card-text">
                                    <?php print(truncateString($article['description'], 60, true) . "\n"); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="client position-relative">
    <div class="left-circle">
        <img src="<?= base_url(); ?>/assets/images/Left-Circle.png" alt="circle">

    </div>
    <div class="container-fluid position-relative">
        <div class="row">
            <div class="col">
                <h1 class="text-center">
                    Kami telah berkolaborasi dengan berbagai perusahaan
                </h1>
            </div>
        </div>
        <div class="row mt-5 client-img d-flex justify-content-center mx-0">
            <img src="<?= base_url(); ?>/assets/images/client-1.png" alt="client" width="185" class="img-fluid mx-2 mx-md-4">
            <img src="<?= base_url(); ?>/assets/images/client-2.png" alt="client" width="185" class="img-fluid mx-2 mx-md-4">
            <img src="<?= base_url(); ?>/assets/images/client-3.png" alt="client" width="185" class="img-fluid mx-2 mx-md-4">
            <img src="<?= base_url(); ?>/assets/images/client-4.png" alt="client" width="185" class="img-fluid mx-2 mx-md-4">
            <img src="<?= base_url(); ?>/assets/images/client-5.png" alt="client" width="185" class="img-fluid mx-2 mx-md-4">
            <img src="<?= base_url(); ?>/assets/images/client-6.png" alt="client" width="185" class="img-fluid mx-2 mx-md-4">
        </div>
    </div>
    <div class="container review-section">
        <div class="row">
            <div class="col-md-5 px-5 mt-4 mt-md-0">
                <img src="<?= base_url(); ?>/assets/images/zuriati.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-md-7 mt-4 mt-md-0">
                <div class="text-end">
                    <img src="<?= base_url(); ?>/assets/images/petik.png" alt="mark" class="img-fluid">
                </div>
                <p class="review">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore vel unde voluptatibus, odit, nobis sequi voluptate magni molestias non eius voluptas atque necessitatibus tempora eos recusandae labore quis dolor tenetur.
                </p>
                <h5 class="mt-5">
                    Zuriati, S.Kom., M.Kom.
                </h5>
                <p class="company">
                    Kepala Lab. Software POLINELA
                </p>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>