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
                        <form action="<?php echo base_url('Admin/Laporan/cetak_laporan_bulan') ?>" method="POST">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Tanggal Awal</label>
                                    <input type="date" name="tgl_awal" class="form-control" required="">
                                </div>
                                <div class="col-md-4">
                                    <label>Tanggal Akhir</label>
                                    <input type="date" name="tgl_akhir" class="form-control" required="">
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                                </div>
                            </div>
                        </form>
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

                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>

        <?php include 'Page/Footer.php';?>
    </body>

    </html>