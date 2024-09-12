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
                            <a href="index.html"><img src="<?php echo base_url() . "assets/login/images/logo.png"; ?>" alt="Logo" srcset="" class="gambar_logo"></a>
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
                <h3>PT. United Can</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Laporan ACC</h6>
                                                <h6 class="font-extrabold mb-0"> <?php echo $solve[0]->jumlah ;?> </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Laporan Belum Dicek</h6>
                                                <h6 class="font-extrabold mb-0"><?php echo $pending[0]->jumlah ;?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Total Laporan</h6>
                                                <h6 class="font-extrabold mb-0"> <?php echo $total[0]->jumlah ;?> </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                 <i class="iconly-boldProfile"></i>
                                             </div>
                                         </div>
                                         <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Total User</h6>
                                            <h6 class="font-extrabold mb-0"><?php echo $user[0]->jumlah ;?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Perubahan Issue (Laporan) Terbaru</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-lg">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                function format_tanggal_indo($tanggal) {
                                                    $bulan = [
                                                        1 => 'Januari',
                                                        'Februari',
                                                        'Maret',
                                                        'April',
                                                        'Mei',
                                                        'Juni',
                                                        'Juli',
                                                        'Agustus',
                                                        'September',
                                                        'Oktober',
                                                        'November',
                                                        'Desember'
                                                    ];
                                                    $tanggal_split = explode('-', $tanggal);
                                                    return $tanggal_split[2] . ' ' . $bulan[(int)$tanggal_split[1]] . ' ' . $tanggal_split[0];
                                                }
                                                ?>
                                                <tr>
                                                  <?php
                                                  $no = 0;
                                                  foreach ($laporan->result_array() as $row) :

                                                    $no++;
                                                    $nama_lengkap               = $row['pembuat'];
                                                    $status = $row['status_kerja'];
                                                    $keterangan = $row['keterangan'];
                                                    $waktu_post = $row['tanggal'];
                                                    ?>

                                                    <td class="col-auto">
                                                        <p class=" mb-0"><?php echo $nama_lengkap;?></p>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0"><?php echo $status;?></p>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0"><?php echo $keterangan;?></p>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0"><?php echo format_tanggal_indo($waktu_post);?></p>
                                                    </td>

                                                <?php endforeach;?>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4>Informasi Laporan Issue</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-visitors-profile"></div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>


</body>
<?php include 'Page/Footer.php';?>

</html>