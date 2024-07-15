<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['film'] = $this->M_film->joinGenreRating();

    $data['title'] = 'Home';
    $this->load->view('template_user/header', $data);
    $this->load->view('template_user/navbar');
    $this->load->view('user/index');
    $this->load->view('template_user/footer');
  }

  public function detail()
  {
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $id = $this->uri->segment(3);
    $data['filmId'] = $this->M_film->getFilmById($id);

    $data['tgl'] = ['26 Juni 2023', '27 Juni 2023', '28 Juni 2023'];

    $data['title'] = 'Detail film';
    $this->load->view('template_user/header', $data);
    $this->load->view('template_user/navbar');
    $this->load->view('user/detail', $data);
    $this->load->view('template_user/footerJs');
  }

  public function trailler()
  {
    $id = $this->uri->segment(3);
    $data['filmId'] = $this->M_film->getFilmById($id);

    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['title'] = 'Trailler';
    $this->load->view('template_user/header', $data);
    $this->load->view('template_user/navbar', $data);
    $this->load->view('user/trailler', $data);
  }

  public function upComing()
  {
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    
    $data['film'] = $this->M_film->joinGenreRating();

    $data['title'] = 'Now Playing';
    $this->load->view('template_user/header', $data);
    $this->load->view('template_user/navbar');
    $this->load->view('upComing/upComing', $data);
    $this->load->view('template_user/footer');
  }
  public function upComingDetail()
  {
    $id = $this->uri->segment(3);
    $data['filmId'] = $this->M_film->getFilmById($id);

    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['title'] = 'Now Playing';
    $this->load->view('template_user/header', $data);
    $this->load->view('template_user/navbar', $data);
    $this->load->view('upComing/detail', $data);
    $this->load->view('template_user/footerJs');
  }

  public function myProfile()
  {
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('name', 'full name', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'My Profile';
      $this->load->view('template_user/header', $data);
      $this->load->view('template_user/navbar');
      $this->load->view('user/profile', $data);
      $this->load->view('template_user/footerJs');
    } else {
      $name = $this->input->post('name');
      $id = $this->input->post('id');

      // cek jika ada gambar yg akan di upload
      $upload_image = $_FILES['image']['name'];

      if ($upload_image) {
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size']     = '2024';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
          $new_image = $this->upload->data('file_name');
          $this->db->set('img', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('nama', $name);
      $this->db->where('id_user', $id);
      $this->db->update('user');

      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Your profile has been update
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');
      redirect('home/myProfile');
    }
  }
}
