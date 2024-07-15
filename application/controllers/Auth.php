<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function index()
  {
    if ($this->session->userdata('email')) {
      redirect('home');
    }

    $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'password', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Login';
      $this->load->view('template_user/header', $data);
      $this->load->view('template_user/navbar');
      $this->load->view('auth/loginUser');
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
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Email tidak terdaftar
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');
    }
    redirect('auth');
  }

  // fungsi registrasi
  public function registrasi()
  {
    if ($this->session->userdata('email')) {
      redirect('home');
    }

    $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'email ini sudah terdaftar'
    ]);
    $this->form_validation->set_rules('name', 'nama', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[confpass]', [
      'min_length' => 'password to short',
      'matches' => 'password dont matches'
    ]);
    $this->form_validation->set_rules('confpass', 'confirmasi password', 'required|trim|matches[password]');

    if ($this->form_validation->run() == false) {
      // jika validasinya gagal akan kembali ke tampilan login
      $data['title'] = 'Registrasi';
      $this->load->view('template_user/header', $data);
      $this->load->view('template_user/navbar');
      $this->load->view('auth/registrasiUser');
      $this->load->view('template_user/footerJs');
    } else {
      // jika validasinya berhasil 
      $data = [
        'nama' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'date_created' => time(),
        'img' => 'default.jpg'
      ];

      $this->db->insert('user', $data);/* mengirim data inputan ke database*/
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      registrasi sudah berhasil, silahkan login!!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Logout telah berhasil
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');
    redirect('auth');
  }
}
