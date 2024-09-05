<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('M_laporan');

        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
            $url = base_url('Login');
            redirect($url);
        }
    }

    public function Create()
    {
        $this->load->view('Admin/Create.php');
    }

    public function View()
    {
        $data['laporan'] = $this->M_laporan->tampil_data();
        $this->load->view('Admin/List.Laporan.php',$data);
    }
    public function Add()
    {
        date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 100000; //Batas Ukuran
        $keterangan =  $this->input->post('keterangan');

        $this->upload->initialize($config);
        if (!empty($_FILES['lampiran']['name'])) {
            if ($this->upload->do_upload('lampiran')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['new_image'] = './assets/upload/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $lampiran = $gbr['file_name'];
                $no_laporan = $this->input->post('no_laporan');
                $nama_lengkap = $this->input->post('nama_lengkap');
                $tanggal = $this->input->post('tanggal');
                $waktu = $this->input->post('waktu');
                $line = $this->input->post('line');
                $mesin = $this->input->post('mesin');
                $keterangan = $this->input->post('keterangan');
                $status_kerja = $this->input->post('status_kerja');
                $waktu_post =  date('Y-m-d h:i:s');

                $data = array(

                    'no_laporan' => $no_laporan,
                    'nama_lengkap' => $nama_lengkap,
                    'tanggal' => $tanggal,
                    'waktu' => $waktu,
                    'line' => $line,
                    'mesin' => $mesin,
                    'keterangan' => $keterangan,
                    'status_kerja' => $status_kerja,
                    'lampiran' => $lampiran,
                    'waktu_post' => $waktu_post

                );

                $data_status_laporan = array(
                    'no_laporan' => $no_laporan
                );
                $this->M_laporan->input_status_data($data_status_laporan,'tabel_status_laporan');
                $this->M_laporan->input_data($data,'tabel_laporan');
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Admin/Laporan/View');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Laporan/View');
            }

        } else {

          $no_laporan = $this->input->post('no_laporan');
          $nama_lengkap = $this->input->post('nama_lengkap');
          $tanggal = $this->input->post('tanggal');
          $waktu = $this->input->post('waktu');
          $line = $this->input->post('line');
          $mesin = $this->input->post('mesin');
          $keterangan = $this->input->post('keterangan');
          $status_kerja = $this->input->post('status_kerja');
          $waktu_post =  date('Y-m-d h:i:s');

          $data = array(

            'no_laporan' => $no_laporan,
            'nama_lengkap' => $nama_lengkap,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'line' => $line,
            'mesin' => $mesin,
            'keterangan' => $keterangan,
            'status_kerja' => $status_kerja,
            'waktu_post' => $waktu_post

        );
          $data_status_laporan = array(
            'no_laporan' => $no_laporan
        );
          $this->M_laporan->input_status_data($data_status_laporan,'tabel_status_laporan');
          $cek = $this->M_laporan->input_data($data,'tabel_laporan');
          echo $this->session->set_flashdata('msg', 'success');
          redirect('Admin/Laporan/View');
      }
  }
}

