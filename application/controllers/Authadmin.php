<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authadmin extends CI_Controller
{
  public function index()
  {
    if ($this->session->userdata('email')) {
      redirect('admin');
    }

    $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'password', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Login Admin';
      $this->load->view('template_user/header', $data);
      $this->load->view('auth/loginAdmin');
      $this->load->view('template_user/footerJs');
    } else {
      // ketika validasinya lolos
      $this->_login();
    }
  }

  // method _login di buat method private yang hanya bisa di akses oleh class _login tidak bisa di akses lewat url
  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    // select * from tabel user where 'email' 
    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    // jika usernya ada
    if ($user) {
      // cek password 
      if (password_verify($password, $user['password'])) {
        // siapkan data didalam session supaya bisa di pakai di halaman user
        $data = [
          'email' => $user['email'],
          // role_id => untuk menentukan menunya admin atau member
          'role_id' => $user['role_id']
        ];
        $this->session->set_userdata($data);
        if ($user['role_id'] == 1) {
          redirect('admin');
        } else {
          redirect('home');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        password anda salah !!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('authadmin');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Email tidak terdaftar
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');
    }
    redirect('authadmin');
  }

  public function logout()
  {
    if ($this->session->userdata('email')) {
      redirect('admin');
    }

    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Logout telah berhasil
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');
    redirect('authadmin');
  }
}
