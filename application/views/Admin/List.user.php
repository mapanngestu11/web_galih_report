<!DOCTYPE html>
<html lang="en">

<?php include 'Page/Head.php';?>
<style type="text/css">
    .gambar_logo{
        height: 100px !important;
        width: 150px !important;
        margin-left: 35px !important;
    }
}
</style>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                           <a href="<?php echo base_url('Admin/Homepage') ?>"><img src="<?php echo base_url() . "assets/login/images/logo.png"; ?>" alt="Logo" srcset="" class="gambar_logo"></a>
                       </div>
                       <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <?php include 'Page/Sidebar.php';?>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Data User</h3>
                        <p class="text-subtitle text-muted">PT. United Can.</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Homepage') ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Laporan Issue</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#tambahuser" title="" class="btn btn-link btn-primary" data-original-title="Hapus Data">
                         Tambah Data
                     </button>

                     <!-- modal -->
                     <div class="modal fade" id="tambahuser" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <strong>
                                            <span class="fw-mediumbold">
                                            Tambah Data</span> 
                                            <span class="fw-light">

                                            </span>
                                        </strong>
                                    </h5>
                                    <button type="button" class="close rounded-pill"
                                    data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="<?php echo base_url() . 'Admin/User/add'; ?>" method="POST">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="nama_lengkap" class="form-control" required="" placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control" required="">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                       <div class="col-md-12">
                                        <label>Hak Akses</label>
                                        <select class="form-control" name="hak_akses" required="">
                                            <option value=""> Pilih </option>
                                            <option value="Staff"> Staff </option>
                                            <option value="Inspektor"> Inspektor </option>
                                            <option value="Manager"> Manager </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer no-bd">
                                <button type="submit" class="btn btn-primary">Ya</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end modal -->
        </div>
        <div class="card-body">
            <?php 
            $hak_akses = $this->session->userdata('hak_akses');?>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Hak Akses</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($user->result_array() as $row) :

                        $no++;
                        $id_user               = $row['id_user'];
                        $nama_lengkap   = $row['nama_lengkap'];
                        $username = $row['username'];
                        $hak_akses = $row['hak_akses'];
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $nama_lengkap;?></td>
                            <td><?php echo $username;?></td>
                            <td>
                                <?php if ($hak_akses == 'Staff') { ?>
                                    <span class="badge bg-warning"> Staff </span>
                                <?php }elseif ($hak_akses == 'Inspektor') { ?>
                                    <span class="badge bg-success"> Inspektor</span>
                                <?php }else{ ?>
                                    <span class="badge bg-primary">Manager</span>
                                <?php } ?>
                            </td>
                            <td>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#update<?php echo $id_user;?>" title="" class="btn btn-link btn-warning" data-original-title="Hapus Data">
                                 <svg class="svg-inline--fa fa-pencil-alt fa-w-16 fa-fw select-all" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pencil-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"></path></svg>
                             </button>
                         </td>
                         <td>      
                            <button type="button" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $id_user;?>" title="" class="btn btn-link btn-danger" data-original-title="Hapus Data">
                              <svg class="svg-inline--fa fa-trash-alt fa-w-14 fa-fw select-all" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                          </button>
                      </td>
                  </td>
              </tr>
          <?php endforeach;?>
      </tbody>
  </table>
</div>
</div>

<!-- hapus -->
<?php
$no = 0;
foreach ($user->result_array() as $row) :

    $no++;
    $id_user               = $row['id_user'];
    $nama_lengkap          = $row['nama_lengkap'];
    ?>
    <div class="modal fade" id="hapus<?php echo $id_user;?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <strong>
                            <span class="fw-mediumbold">
                            Hapus</span> 
                            <span class="fw-light">

                            </span>
                        </strong>
                    </h5>
                    <button type="button" class="close rounded-pill"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?php echo base_url() . 'Admin/User/delete'; ?>" method="POST">
                    <p>Apakah kamu yakin ingin menghapus data dengan Nama Lengkap, <strong><?php echo $nama_lengkap;?> ?</strong></p>
                    <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
                </div>

                <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-primary">Ya</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>

<!-- end hapus -->


<!-- update -->
<?php
$no = 0;
foreach ($user->result_array() as $row) :

    $no++;
    $id_user               = $row['id_user'];
    $nama_lengkap   = $row['nama_lengkap'];
    $username = $row['username'];
    $hak_akses = $row['hak_akses'];
    ?>
    <div class="modal fade" id="update<?php echo $id_user;?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <strong>
                            <span class="fw-mediumbold">
                            Update Data</span> 
                            <span class="fw-light">

                            </span>
                        </strong>
                    </h5>
                    <button type="button" class="close rounded-pill"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?php echo base_url() . 'Admin/User/Update'; ?>" method="POST">
                   <div class="form-group row">
                    <div class="col-md-12">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" required="" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap;?>">
                        <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required="" value="<?php echo $username;?>">
                    </div>
                    <div class="col-md-6">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                   <div class="col-md-12">
                    <label>Hak Akses</label>
                    <select class="form-control" name="hak_akses" required="">
                        <option value="<?php echo $hak_akses;?>"> <?php echo $hak_akses;?> </option>
                        <option value="Staff"> Staff </option>
                        <option value="Inspektor"> Inspektor </option>
                        <option value="Manager"> Manager </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="modal-footer no-bd">
            <button type="submit" class="btn btn-primary">Update Data</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
    </form>
</div>
</div>
</div>
<?php endforeach;?>

<!-- end -->

</section>
</div>

<?php include 'Page/Footer.php';?>
</body>

</html>