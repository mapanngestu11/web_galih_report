<?php defined('BASEPATH') or exit('No direct script access allowed');

class Homepage  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('M_login');
        $this->load->model('M_laporan');
        $this->load->model('M_user');

        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
            $url = base_url('Login');
            redirect($url);
        }
    }

    public function index()
    {

        $data['solve'] = $this->M_laporan->jumlah_laporan_solve()->result();
        $data['pending'] = $this->M_laporan->jumlah_laporan_pending()->result();
        $data['total'] = $this->M_laporan->jumlah_laporan()->result();
        $data['user'] = $this->M_user->jumlah_data()->result();
        $data['laporan'] =$this->M_laporan->tampil_data_join();

        $status_data = $this->M_laporan->get_status_data();

        // Siapkan data untuk grafik
        $series = [];
        $labels = [];

        foreach ($status_data as $data_laporan) {
            $labels[] = ucfirst($data_laporan['status']); // Memastikan label dimulai dengan huruf kapital
            $series[] = (int)$data_laporan['count']; // Pastikan data dalam bentuk integer
        }

        $data['chart_data'] = [
            'series' => $series,
            'labels' => $labels,
            'colors' => ['#feff3e','#23fa4f', '#fa2323'],
        ];

        // var_dump($data);
        // die();

        $this->load->view('Admin/Homepage.php',$data);
    }


}
