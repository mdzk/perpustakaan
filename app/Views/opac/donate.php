<?= $this->extend('layouts/opac'); ?>

<?= $this->section('content'); ?>

<section class="abovefold overflow-hidden">
    <div class="container header">
        <div class="row">
            <div class="text-center col-lg-12 px-md-0 my-auto position-relative">
                <div class="headline">
                    Ayo donasikan bukumu! ✨<span class="cl-light-blue"><br></span>
                    <div class="sub-headline w-auto">
                        Daftar buku yang kami butuhkan atau ajukan judul kamu sendiri.
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-md-12 mt-5">
                <button data-bs-toggle="modal" class="btn btn-light-primary mb-4" data-bs-target="#judulModal">📚 Ajukan Judul</button>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($donates as $donate) : ?>
                            <tr data-id="<?= $donate['id_donate']; ?>">
                                <td class="title-donate"><?= $donate['title']; ?></td>
                                <td class="author-donate"><?= $donate['author']; ?></td>
                                <td>
                                    <button type="button" onclick="showModalEdit(this)" ; class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Donasi
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal Donasi -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Donasikan Buku</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= route_to('home-donate-update'); ?>" method="POST">
                            <div class="modal-body">
                                <input type="text" id="id-form" name="id-form" hidden>
                                <div class="form-group">
                                    <label for="" class="form-label">Judul</label>
                                    <input type="text" id="title-form" name="title" class="form-control" value="" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Pengarang</label>
                                    <input type="text" id="author-form" name="author" class="form-control" value="" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" name="donors" class="form-control" placeholder="Masukkan Nama Kamu">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">NPM</label>
                                    <input type="text" name="npm" class="form-control" placeholder="Masukkan NPM Kamu">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Donasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Judul -->
            <div class="modal fade" id="judulModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Judul</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= route_to('home-donate-add'); ?>" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="" class="form-label">Judul</label>
                                    <input type="text" name="title-add" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Pengarang</label>
                                    <input type="text" name="author-add" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Program Studi</label>
                                    <select name='id_prodi' class="form-select" id="basicSelect">
                                        <option selected disabled>-- Pilih Program Studi --</option>
                                        <?php foreach ($prodies as $prodi) : ?>
                                            <option value="<?= $prodi['id_prodi']; ?>"><?= $prodi['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Ajukan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<div class="clear"></div>



<?= $this->endSection(); ?>