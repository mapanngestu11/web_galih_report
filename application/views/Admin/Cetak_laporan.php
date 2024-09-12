<html>
<head>
	<title>Data Laporan Issue (Bulanan)</title>
</head>
<body>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


	<style type="text/css">
		.logo{
			height: 100px;
			padding-left: 200px;
		}
		.judul{
			padding-left: 136px;
		}
	</style>
	<div class="container">
		<div class="row">
			
			<img src="<?php echo base_url() . "assets/login/images/logo.png"; ?>" class="logo">
			
			
			<h3 class="judul">Laporan Issue PT. United Can</h3>
			
		</div>
	</div>


	<hr>
	<style type="text/css">
		.tanggal{
			text-align: right;
			margin-right: 30px;
		}
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: center;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}

	</style>
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
	<p class="tanggal">Tangerang, <?php echo date('d-M-Y');?> </p>
	<center>
		<h3> Data Permohonan </h3>
	</center>
	<table>
		<thead>
			<tr>
				<th>No.</th>
				<th>Tanggal</th>
				<th>No Laporan</th>
				<th>Nama Lengkap</th>
				<th>Waktu</th>
				<th>Line</th>
				<th>Mesin</th>
				<th>Status Kerja</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach ($hasil_laporan as $tanggal => $data): ?>
				<?php if ($data['status'] === 'Kosong'): ?>

					<?php


					?>
					<tr>
						<td><?php echo $no++?></td>
						<td><?php echo format_tanggal_indo($data['tanggal']); ?></td>
						<td colspan="7">Tidak Ada Laporan Issue yang di buat pada tanggal Ini.</td>
					</tr>
					<?php else: ?>
						<tr>
							<td><?php echo $no++?></td>
							<td><?php echo format_tanggal_indo($data['tanggal']); ?></td>
							<td><?php echo $data['no_laporan']; ?></td>
							<td><?php echo $data['nama_lengkap']; ?></td>
							<td><?php echo $data['waktu']; ?></td>
							<td><?php echo $data['line']; ?></td>
							<td><?php echo $data['mesin']; ?></td>
							<td><?php echo $data['status_kerja']; ?></td>
							<td><?php echo $data['keterangan']; ?></td>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
		<script type="text/javascript">
			window.print();
		</script>
		


	</body>
	</html>