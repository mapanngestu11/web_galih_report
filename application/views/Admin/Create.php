<!DOCTYPE html>
<html lang="en">

<?php include 'Page/Head.php';?>
<body>
    <style type="text/css">
        .gambar_logo{
            height: 100px !important;
            width: 150px !important;
            margin-left: 35px !important;
        }
    }
</style>

<?php
function generateRandomString($length = 3) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Huruf kapital "I"
$prefix = "I";

// Tanggal saat ini dalam format YYYYMMDD
$date = date("dmY");

// Angka urutan acak
$orderNumber = generateRandomString();

// Gabungkan semua bagian menjadi satu string
$finalString = $prefix . $date . $orderNumber;

echo $finalString;
?>

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
                        <h3>Buat Issue (Laporan) Baru </h3>
                        <p class="text-subtitle text-muted">Pastikan Semua Data Terisi dengan benar.
                        </p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Homepage') ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Buat Baru</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Issue</h4>
                            </div>
                            <form action="<?php echo base_url() . 'Admin/Laporan/add'; ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label>Nama Lengkap</label>
                                            <?php $nama_lengkap = $this->session->userdata('nama_lengkap'); ;?>
                                            <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $nama_lengkap;?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label>Nomor Laporan</label>
                                            <input type="text" name="no_laporan" class="form-control" value="<?php echo $finalString;?>" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Tanggal</label>
                                            <?php $tanggal_saat_ini = date('Y-m-d');?>
                                            <input type="text" name="tanggal" class="form-control" value="<?php echo $tanggal_saat_ini;?>" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Waktu </label>
                                            <?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $waktu_sekarang = date('H:i:s');
                                            ?>
                                            <input type="text" name="waktu" class="form-control" required="" value="<?php echo $waktu_sekarang;?> WIB" readonly>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label>Line</label>
                                            <select class="form-control" name="line" required="">
                                                <option value=""> Pilih Line </option>
                                                <option value="Line 1"> Line 1 </option>
                                                <option value="Line 2"> Line 2 </option>
                                                <option value="Line 3"> Line 3 </option>
                                                <option value="Line 4"> Line 4 </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Mesin</label>
                                            <select class="form-control" name="mesin" required="">
                                                <option value=""> Pilih Mesin </option>
                                                <option value="Shellpress"> Shellpress </option>
                                                <option value="Liner"> Liner </option>
                                                <option value="Conversion"> Conversion </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label><strong> Keterangan </strong></label>
                                            <textarea id="summernote" name="keterangan"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label>Status</label>
                                            <select class="form-control" name="status_kerja" required="">
                                                <option value=""> Pilih </option>
                                                <option value="Solve"> Solve </option>
                                                <option value="Unfixed"> Unfixed </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Lampiran (Jika ada)</label>
                                            <input type="file" name="lampiran" class="form-control">
                                            <small style="color: red">Hanya Bisa Upload File dengan Format PDF</small>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Tambah Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <?php include 'Page/Footer.php';?>

    </body>

    </html>