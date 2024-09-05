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

  function input_data($data, $table)
  {
    $this->db->insert($table, $data);
  }

  function input_status_data($data_status_laporan, $table)
  {
    $this->db->insert($table, $data_status_laporan);
  }


  function delete_data($id_rumus)
  {
    $hsl = $this->db->query("DELETE FROM tabel_laporan WHERE id_rumus='$id_rumus'");
    return $hsl;
  }

  function update_data($where, $data, $table)
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
}
