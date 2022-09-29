<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>User</h3>
                <p class="text-subtitle text-muted">Memanajemen user</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-6">
                <button class="btn btn-primary rounded-pill mb-2" data-bs-toggle="modal" data-bs-target="#tambahuser">+ User Baru</button>
                <div class="modal fade text-left modal-borderless" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            
            <form action="<?= route_to('users-add'); ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registration</h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group has-icon-left">
                            <label for="name">Nama</label>
                            <div class="position-relative">
                                <input type="text" name="name" class="form-control" placeholder="Masukkan nama" id="name">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>
            
                        <div class="form-group has-icon-left">
                            <label for="username">Username</label>
                            <div class="position-relative">
                                <input type="text" name="username" class="form-control" placeholder="Masukkan Username" id="username">
                                <div class="form-control-icon">
                                    <i class="bi bi-person-badge"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <select class="form-select" name="roles" id="roles">
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
            
                        <div class="form-group has-icon-left">
                            <label for="password">Password</label>
                            <div class="position-relative">
                                <input required type="password" name="password" class="form-control" placeholder="Masukkan password" id="password">
                                <div class="form-control-icon">
                                    <i class="bi bi-lock"></i>
                                </div>
                            </div>
                        </div>
            
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-light-primary">
                            
                            <span class="d-sm-block">Reset</span>
                        </button>
                        <button name="submit" type="submit" class="btn btn-primary ml-1"
                            data-bs-dismiss="modal">
                            
                            <span class="d-sm-block">Registrasi</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
                    <div class="card">

                        <div class="card-content">
                            <div class="card-body">

                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Role</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($users as $user) : ?>
                                                <tr class="">
                                                    <td class="text-bold-500"><?= $user['name']; ?></td>
                                                    <td class="text-bold-500"><?= $user['roles']; ?></td>
                                                    <td class="text-bold-500">
                                                        <ul class="list-inline m-0 d-flex">
                                                            <li class="list-inline-item mail-delete">
                                                                <button type="button" class="btn btn-light-primary btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#edituser<?= $user['id_users']; ?>">
                                                                    <span class="fonticon-wrap">
                                                                        <i class="bi bi-pencil-fill"></i>
                                                                </span>
                                                                </button>
                                                            </li>
                                                            <li class="list-inline-item mail-unread">
                                                                <button type="button" class="btn btn-light-danger btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#hapususer<?= $user['id_users']; ?>">
                                                                    <span class="fonticon-wrap d-inline">
                                                                        <i class="bi bi-trash-fill"></i>
                                                                </span>
                                                                </button>
                                                            </li>

                                                        </ul>

                                                        <!--Hapus User Modal Content -->
                                                        <div class="modal fade text-left modal-borderless" id="hapususer<?= $user['id_users']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Peringatan</h5>
                                                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                                            <i data-feather="x"></i>
                                                                        </button>
                                                                    </div>
                                                                    
                                                                    <form action="<?= route_to('users-delete'); ?>" method="POST">

                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Apakah anda yakin ingin menghapus user ini?
                                                                        </p>
                                                                    </div>
                                                                    <input type="number" name="id_users" value="<?= $user['id_users']; ?>" hidden>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light-primary ml-1" data-bs-dismiss="modal">
                                                                            
                                                                            <span class="d-sm-block">Tidak</span>
                                                                        </button>
                                                                        <button name="submit" type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                                                            
                                                                            <span class="d-sm-block">Ya</span>
                                                                        </button>
                                                                    </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Hapus User Modal Content End-->
                                                    </td>
                                                </tr>

                                                <div class="modal fade text-left modal-borderless" id="edituser<?= $user['id_users']; ?>" >
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            
            <form action="<?= route_to('users-update'); ?>" method="POST">
            
                <input type="hidden" name="id_users" value="<?= $user['id_users']; ?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit user</h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group has-icon-left">
                            <label for="name">Nama</label>
                            <div class="position-relative">
                                
                                <input value="<?= $user['name']; ?>" type="text" name="name" class="form-control" placeholder="Masukkan nama" id="name">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>
            
                        <div class="form-group has-icon-left">
                            <label for="username">Username</label>
                            <div class="position-relative">
                                <input value="<?= $user['username']; ?>" type="text" name="username" class="form-control" placeholder="Masukkan Username" id="username">
                                <div class="form-control-icon">
                                    <i class="bi bi-person-badge"></i>
                                </div>
                            </div>
                        </div>
            
                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <select class="form-select" name="roles" id="roles">
                                <option value="admin" <?php if($user['roles'] == 'admin') { echo 'selected'; } ?>>Admin</option>
                                <option value="staff" <?php if($user['roles'] == 'staff') { echo 'selected'; } ?>>Staff</option>
                            </select>
                        </div>

                        <div class="form-group has-icon-left">
                            <label for="password">Password</label>
                            <div class="position-relative">
                                <input type="password" name="password" class="form-control" placeholder="Masukkan password" id="password">
                                <div class="form-control-icon">
                                    <i class="bi bi-lock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                            
                            <span class="d-sm-block">Batal</span>
                        </button>
                        <button name="submit" type="submit" class="btn btn-primary ml-1"
                            data-bs-dismiss="modal">
                            
                            <span class="d-sm-block">Simpan</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
                                                <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
    </section>
</div>
<?= $this->endSection(); ?>