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
                📚 Ayo donasikan bukumu!<span class="cl-light-blue"><br></span>
                    <div class="sub-headline w-auto">
                        Guna mencerdaskan kehidupan bangsa.
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 mt-5">
                <div class="card w-auto">
                    <form action="<?= base_url(); ?>/opac/proses" method="post">
                    <div class="input-group mb-4">
                        <label for="input" class="w-100">
                            <span class="input-title">Nama</span>
                            <input name="title" type="text" class="form-control mt-2" placeholder="Masukkan Nama">
                        </label>
                    </div>

                    <div class="input-group mb-4">
                        <label for="input" class="w-100">
                            <span class="input-title">NPM</span>
                            <input name="title" type="text" class="form-control mt-2" placeholder="Masukkan NPM">
                        </label>
                    </div>

                    <div class="input-group mb-4">
                        <label for="input" class="w-100">
                            <span class="input-title">Program Studi</span>
                            <select name="gmd" class="form-select" id="inputGroupSelect01">
                                <option value="" selected>Pilih Program Studi</option>
                                    <option value="">1</option>
                            </select>
                        </label>
                    </div>
                    
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
                            <span class="input-title">Kategori Buku</span>
                            <select name="gmd" class="form-select" id="inputGroupSelect01">
                                <option value="" selected>Teknologi</option>
                                    <option value="">1</option>
                            </select>
                        </label>
                    </div>

                    <button class="btn btn-card">
                        Kirim
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="clear"></div>

<?= $this->endSection(); ?>