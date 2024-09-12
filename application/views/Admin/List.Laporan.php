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
                        <h3>Data Laporan Issue</h3>
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
                        <a href="<?php echo base_url('Admin/Laporan/Create') ?>" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <?php 
                        $hak_akses = $this->session->userdata('hak_akses');?>
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No Laporan</th>
                                    <th>Nama</th>
                                    <th>Line</th>
                                    <th>Mesin</th>
                                    <th>Status Inspektor</th>
                                    <th>Status Staff</th>
                                    <?php if ($hak_akses == 'Admin' || $hak_akses == 'Staff'){ ?>
                                        <th>Update Laporan</th>
                                    <?php }else{?>
                                    <?php }?>
                                    <th>Lihat</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($data_laporan->result_array() as $row) :

                                    $no++;
                                    $id_laporan               = $row['id_laporan'];
                                    $id_status             = $row['id_status'];
                                    $no_laporan             = $row['no_laporan'];
                                    $pembuat             = $row['pembuat'];
                                    $line             = $row['line'];
                                    $mesin             = $row['mesin'];
                                    $status_kerja             = $row['status_kerja'];
                                    $status_staff             = $row['status_staff'];
                                    $waktu_pembuat               = $row['waktu_pembuat'];
                                    ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $no_laporan;?></td>
                                        <td><?php echo $pembuat;?></td>
                                        <td><?php echo $line;?></td>
                                        <td><?php echo $mesin;?></td>
                                        <td style="text-align: center;">
                                            <?php if ($status_kerja == 'Solve') { ?>
                                                <span class="badge bg-success"> Solve </span>
                                            <?php }else{ ?>
                                                <span class="badge bg-danger"> Unfixed </span>
                                            <?php } ?>

                                        </td>
                                        <td style="text-align: center;">
                                            <?php if ($status_staff == NULL) { ?>
                                                <span class="badge bg-warning"> Pending </span>
                                            <?php }elseif ($status_staff == 'Solve'){ ?>
                                                <span class="badge bg-success"> Solve </span>
                                            <?php }else{ ?>
                                                <span class="badge bg-danger"> Unfixed </span>
                                            <?php } ?>
                                        </td>
                                        <?php if ($hak_akses == 'Admin' || $hak_akses == 'Staff'){ ?>
                                         <td style="text-align: center;">
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#update<?php echo $no_laporan;?>" title="" class="btn btn-link btn-warning" data-original-title="Hapus Data">
                                             <svg class="svg-inline--fa fa-pencil-alt fa-w-16 fa-fw select-all" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pencil-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"></path></svg>
                                         </button>
                                     </td>
                                 <?php }else{?>
                                 <?php }?>

                                 <td style="text-align: center;">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#info<?php echo $no_laporan;?>" title="" class="btn btn-link btn-primary" data-original-title="Hapus Data">
                                        <svg class="svg-inline--fa fa-eye fa-w-18 fa-fw select-all" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path></svg>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $no_laporan;?>" title="" class="btn btn-link btn-danger" data-original-title="Hapus Data">
                                      <svg class="svg-inline--fa fa-trash-alt fa-w-14 fa-fw select-all" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
                                  </button>
                              </td>
                          </tr>
                      <?php endforeach;?>
                  </tbody>
              </table>
          </div>
      </div>

  </section>
</div>
<?php
$no = 0;
foreach ($data_laporan->result_array() as $row) :

    $no++;
    $no_laporan               = $row['no_laporan'];
    ?>
    <div class="modal fade" id="hapus<?php echo $no_laporan;?>" tabindex="-1" role="dialog" aria-hidden="true">
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

                <form action="<?php echo base_url() . 'Admin/Laporan/delete'; ?>" method="POST">
                    <p>Apakah kamu yakin ingin menghapus data dengan Nomor Laporan, <strong><?php echo $no_laporan;?> ?</strong></p>
                    <input type="hidden" name="no_laporan" value="<?php echo $no_laporan;?>">
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

<!-- update -->
<?php
$no = 0;
foreach ($data_laporan->result_array() as $row) :

    $no++;
    $no_laporan               = $row['no_laporan'];
    $pembuat = $row['pembuat'];
    $line             = $row['line'];
    $mesin             = $row['mesin'];
    $status_kerja             = $row['status_kerja'];
    $status_staff             = $row['status_staff'];
    $waktu_pembuat               = $row['waktu_pembuat'];
    $keterangan = $row['keterangan'];
    $nama_staff = $row['nama_staff'];
    $keterangan_staff = $row['keterangan_staff'];

    ?>
    <div class="modal fade" id="info<?php echo $no_laporan;?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h5 class="modal-title">
                        <strong>
                            <span class="fw-mediumbold">
                            Info Data</span> 
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

                <form action="<?php echo base_url() . 'Admin/Laporan/update_status'; ?>" method="POST">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>No Laporan</label>
                            <input type="text" name="no_laporan" class="form-control" value="<?php echo $no_laporan;?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Lengkap</label>
                            <?php $nama_lengkap = $this->session->userdata('nama_lengkap'); ;?>
                            <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $nama_lengkap;?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Status Kerja</label>
                            <input type="text" name="status_kerja" class="form-control" value="<?php echo $status_kerja;?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Line</label>
                            <input type="text" name="line" class="form-control" value="<?php echo $line;?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label>Mesin</label>
                            <input type="text" name="mesin" class="form-control" value="<?php echo $mesin;?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" value="<?php echo strip_tags($keterangan);?>" readonly>
                        </div>
                    </div>
                    <hr>
                    <span class="badge bg-primary">Status Pada Staff</span>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Nama Staff</label>
                            <input type="text" name="nama_staff" class="form-control" value="<?php echo $nama_staff;?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label>Status Pada Staff</label>
                            <input type="text" name="status" class="form-control" value="<?php echo $status_staff;?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" value="<?php echo $keterangan_staff;?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="modal-footer no-bd">

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>


<!-- info -->
<!-- update -->
<?php
$no = 0;
foreach ($data_laporan->result_array() as $row) :

    $no++;
    $no_laporan               = $row['no_laporan'];
    ?>
    <div class="modal fade" id="update<?php echo $no_laporan;?>" tabindex="-1" role="dialog" aria-hidden="true">
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

                <form action="<?php echo base_url() . 'Admin/Laporan/update_status'; ?>" method="POST">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>No Laporan</label>
                            <input type="text" name="no_laporan" class="form-control" value="<?php echo $no_laporan;?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Staff</label>
                            <?php $nama_lengkap = $this->session->userdata('nama_lengkap'); ;?>
                            <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $nama_lengkap;?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Status Kerja</label>
                            <select class="form-control" required="" name="status">
                                <option value=""> Pilih </option>
                                <option value="Solve"> Solve </option>
                                <option value="Unfixed"> Unfixed </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" rows="3"></textarea>
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
<?php endforeach;?>
<?php include 'Page/Footer.php';?>
</body>

</html>