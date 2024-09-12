<?php
class M_Laporan extends CI_Model
{

  private $_table = "tabel_laporan";

  function tampil_data()
  {
    $hak_akses =  $this->session->userdata('hak_akses');

    if ($hak_akses == 'admin') {
      return $this->db->get('tabel_laporan');
    }else{

      return $this->db->get('tabel_laporan');
    }
  }

  function tampil_data_join()
  {
    $this->db->select('
      a.id_laporan as id_laporan,
      b.id_status as id_status,
      a.no_laporan,
      a.nama_lengkap as pembuat,
      a.tanggal,
      a.waktu,
      a.line,
      a.mesin,
      a.keterangan,
      a.status_kerja,
      a.lampiran,
      a.waktu_post as waktu_pembuat,
      b.status as status_staff,
      b.nama_lengkap as nama_staff,
      b.keterangan as keterangan_staff,
      b.waktu as waktu_staff
      ');
    $this->db->from('tabel_laporan as a');
    $this->db->join('tabel_status_laporan as b', 'b.no_laporan = a.no_laporan','left');
    $query = $this->db->get();
    return $query;
  }

  function input_data($data, $table)
  {
    $this->db->insert($table, $data);
  }

  function input_status_data($data_status_laporan, $table)
  {
    $this->db->insert($table, $data_status_laporan);
  }


  function delete_data($no_laporan)
  {
    $hsl = $this->db->query("DELETE FROM tabel_laporan WHERE no_laporan='$no_laporan'");
    $hsl_1 = $this->db->query("DELETE FROM tabel_status_laporan WHERE no_laporan='$no_laporan'");
    return $hsl;
    return $hsl_1;
  }

  function update_data($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  function update_status_data($where,$data,$table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }
  function jumlah_data()
  {
    $this->db->select('count(tabel_laporan.kode_pegawai) as jumlah');
    $hsl = $this->db->get('tabel_laporan');
    return $hsl;
  }

  function get_data_by_range($tgl_awal, $tgl_akhir)
  {
    $this->db->where('tanggal >=', $tgl_awal);
    $this->db->where('tanggal <=', $tgl_akhir);
    $query = $this->db->get('tabel_laporan'); 
    return $query->result_array(); 
  }
  function jumlah_laporan_solve()
  {
    $this->db->select('count(tabel_status_laporan.id_status) as jumlah');
    $this->db->where('status','Solve');
    $hsl = $this->db->get('tabel_status_laporan');
    return $hsl;
  }
  function jumlah_laporan_pending()
  {
    $this->db->select('count(tabel_status_laporan.id_status) as jumlah');
    $this->db->where('status',NULL);
    $hsl = $this->db->get('tabel_status_laporan');
    return $hsl;
  }
  function jumlah_laporan()
  {
    $this->db->select('count(tabel_laporan.id_laporan) as jumlah');
    $hsl = $this->db->get('tabel_laporan');
    return $hsl;
  }

  function get_status_data()
  {
   $this->db->select('status, COUNT(id_status) as count');
        $this->db->from('tabel_status_laporan'); // Gantilah 'your_table_name' dengan nama tabel Anda
        $this->db->group_by('status');
        $query = $this->db->get();
        return $query->result_array();
      }
    }
