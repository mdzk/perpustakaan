<?= $this->extend('layouts/opac'); ?>

<?= $this->section('content'); ?>

<section class="abovefold overflow-hidden">
    <div class="container position-relative">
        <!-- <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Header/HeaderFinance-1/Ornament.png" alt="bg-header" class="img-fluid img-header d-none d-md-block"> -->
    </div>
    <div class="container header">
        <div class="row">
            <div class="text-center col-lg-12 px-md-0 my-auto position-relative">
                <div class="headline">
                    📚 Mari belajar bersama!<span class="cl-light-blue"><br></span>
                    <div class="sub-headline w-auto">
                        Kamu bisa akses bahan ajar disini.
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <?php foreach ($materials as $material) : ?>

                <div class="col-md-3 mt-5">
                    <div class="card w-auto p-0">
                        <?php if ($material['status'] == 1) { ?>
                            <div style="width:;">
                                <?= $material['material']; ?>
                            </div>
                        <?php } else if ($material['status'] == 2) { ?>
                            <img src="<?= base_url(); ?>/img/pdf.png" alt="">
                        <?php } ?>
                    </div>
                    <?php if ($material['status'] == 1) { ?>
                        <h3 class="fs-5"><?= $material['title']; ?></h3>
                    <?php } else if ($material['status'] == 2) { ?>
                        <h3 class="fs-5"><a target=”_blank” href="<?= base_url(); ?>/pdf/<?= $material['material']; ?>"><?= $material['title']; ?></a></h3>
                    <?php } ?>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</section>

<div class="clear"></div>

<?= $this->endSection(); ?>