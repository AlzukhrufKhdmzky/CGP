<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Schedule extends CI_Controller
{
  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $id = $this->uri->segment(3);
    $data['tiket'] = $this->M_tiket->getTiketById($id);
    $data['filmId'] = $this->M_film->getFilmById($id);

    $data['lokasi'] = [
      'Grand Galaxy Mall',
      'Metropolitan Mall Bekasi',
      'Revo Town Bekasi',
      'Pondok Gede'
    ];

    $data['jmlhTiket'] = [
      '1', '2', '3', '4', '5'
    ];

    $data['tanggal'] = [
      '03 Juli 2023', '04 Juli 2023', '05 Juli 2023'
    ];

    $data['jam'] = ['13.45', '16.00', '19.15'];

    $data['harga'] = '40000';

    // untuk memberikan session pada halaman schedule
    if (!empty($this->session->userdata('email'))) {
      $data['title'] = 'schedule';
      $this->load->view('template_user/header', $data);
      $this->load->view('template_user/navbar');
      $this->load->view('user/schedule', $data);
      $this->load->view('template_user/footer');
    } else {
      redirect('auth');
    }
  }
}
