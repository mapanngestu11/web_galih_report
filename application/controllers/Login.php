<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('M_login');

        
    }

    public function index()
    {
        $this->load->view('Login.php');
    }

    public function auth()
    {
        $username = strip_tags(str_replace("'", "", $this->input->post('username')));
        $password = strip_tags(str_replace("'", "", $this->input->post('password')));

        $u = $username;
        $p = $password;

        $cadmin = $this->M_login->cekadmin($u, $p);
        $cekadmin = $cadmin->num_rows();
        

        json_encode($cadmin);        



        if ($cadmin->num_rows() > 0) {

            $this->session->set_userdata('masuk', true);
            $this->session->set_userdata('user', $u);
            $xcadmin = $cadmin->row_array();

            if ($xcadmin['hak_akses'] == 'Admin') {
                $this->session->set_userdata('akses', 'Admin');
                $id = $xcadmin['id'];
                $nama_lengkap = $xcadmin['nama_lengkap'];
                $hak_akses = $xcadmin['hak_akses'];
                $this->session->set_userdata('id', $id);
                $this->session->set_userdata('nama_lengkap', $nama_lengkap);
                $this->session->set_userdata('hak_akses', $hak_akses);
                $data = array(
                    'hak_akses'     => $hak_akses,
                    'id'     => $id,
                    'nama_lengkap'     => $nama_lengkap,
                    'logged_in' => TRUE
                );

                
                redirect('Admin/Homepage', $data);
            } elseif ($xcadmin['hak_akses'] == 'tu') {
                $this->session->set_userdata('akses', 'tu');
                $id = $xcadmin['id'];
                $nama_lengkap = $xcadmin['nama_lengkap'];
                $hak_akses = $xcadmin['hak_akses'];
                $this->session->set_userdata('id', $id);
                $this->session->set_userdata('nama_lengkap', $nama_lengkap);
                $this->session->set_userdata('hak_akses', $hak_akses);
                $data = array(
                    'hak_akses'     => $hak_akses,
                    'nama_lengkap'     => $nama_lengkap,
                    'logged_in' => TRUE
                );

                redirect('Admin/Homepage', $data);
            }elseif ($xcadmin['hak_akses'] == 'guru') {
               $this->session->set_userdata('akses', 'Admin');
               $id = $xcadmin['id'];
               $nama_lengkap = $xcadmin['nama_lengkap'];
               $hak_akses = $xcadmin['hak_akses'];
               $this->session->set_userdata('id', $id);
               $this->session->set_userdata('nama_lengkap', $nama_lengkap);
               $this->session->set_userdata('hak_akses', $hak_akses);
               $data = array(
                'hak_akses'     => $hak_akses,
                'id'     => $id,
                'nama_lengkap'     => $nama_lengkap,
                'logged_in' => TRUE
            );
               redirect('Admin/Homepage', $data);
           }
       } else {

        $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert" style="color:white">Username Atau Password Salah !</div>');
        redirect('Login');
    }
}

}
