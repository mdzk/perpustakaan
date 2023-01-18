<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Artikel Editor</h3>
                <p class="text-subtitle text-muted">Tambahkan artikel di sini
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Artikel</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form form-vertical" enctype="multipart/form-data" action="<?= route_to('article-save'); ?>" method="POST">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">Judul</label>
                                            <input name="title" type="text" id="first-name-vertical" class="form-control" name="title" placeholder="Masukkan judul artikel">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email-id-vertical">Kategori</label>
                                            <fieldset class="form-group">

                                                <select name='id_prodi' class="form-select" id="basicSelect">
                                                    <option selected disabled>-- Pilih Kategori --</option>
                                                    <?php foreach ($categories as $category) : ?>
                                                        <option value="<?= $category['id_categories']; ?>"><?= $category['name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>

                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="formFile" class="form-label">Sampul Artikel</label>
                                            <input name="thumbnail" class="form-control {{$errors->first('cover') ? "is-invalid" : ""}}" type="file" accept="image/*" id="formFile">
                                            <div class="invalid-feedback">
                                                {{$errors->first('cover')}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group ">
                                            <textarea class="{{$errors->first('content') ? "is-invalid" : ""}}" name="description" id="summernote"></textarea>
                                            <div class="invalid-feedback">
                                                {{$errors->first('content')}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button name="submit" type="submit" class="btn btn-primary me-1 mb-1">Publish</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>