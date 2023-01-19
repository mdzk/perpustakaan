<?= $this->extend('layouts/opac'); ?>

<?= $this->section('content'); ?>

<section class="abovefold overflow-hidden">

    <div class="container header">
        <div class="row">
            <div class="col-lg-6 px-md-0 position-relative">

                <div class="card">
                    <img class="card-img-top img-fluid" style="object-fit: cover;" src="http://localhost/slims/lib/minigalnano/createthumb.php?filename=images/docs/<?= $biblio['image']; ?>&width=200" alt="Card image cap" style="height: 20rem">
                </div>

            </div>
            <div class="col-lg-6 mt-5 mt-md-0">
                <div class="headline ">
                    <p class="fs-1 p-0 m-0 lh-sm"><?= $biblio['title']; ?></p>
                </div>
                <div class="sub-headline">
                    <span class="fs-5 lh-sm"><?= $biblio['notes']; ?></span>
                </div>

                <table class="table mt-5">
                    <tr>
                        <th colspan="2">Informasi Buku</th>
                    </tr>
                    <tr>
                        <th>Judul Seri</th>
                        <td><?= $biblio['title']; ?></td>
                    </tr>
                    <tr>
                        <th>No. Panggil</th>
                        <td><?= $biblio['call_number']; ?></td>
                    </tr>
                    <tr>
                        <th>Penerbit</th>
                        <td><?= $biblio['publish_place']; ?> : <?= $biblio['publisher']; ?>., <?= $biblio['publish_year']; ?></td>
                    </tr>
                    <tr>
                        <th>Deskripsi Fisik</th>
                        <td><?= $biblio['collation']; ?></td>
                    </tr>
                    <tr>
                        <th>Bahasa</th>
                        <td><?= $biblio['language']; ?></td>
                    </tr>
                    <tr>
                        <th>ISBN/ISSN</th>
                        <td><?= $biblio['isbn_issn']; ?></td>
                    </tr>
                    <tr>
                        <th>Klasifikasi</th>
                        <td><?= $biblio['classification']; ?></td>
                    </tr>
                    <tr>
                        <th>Tipe Isi</th>
                        <td><?= $biblio['content_type']; ?></td>
                    </tr>
                    <tr>
                        <th>Tipe Media</th>
                        <td><?= $biblio['media_type']; ?></td>
                    </tr>
                    <tr>
                        <th>Tipe Karir</th>
                        <td><?= $biblio['carrier_type']; ?></td>
                    </tr>
                    <tr>
                        <th>Edisi</th>
                        <td><?= $biblio['edition']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="clear"></div>

<?= $this->endSection(); ?>