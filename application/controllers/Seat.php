<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seat extends CI_Controller
{
  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $id = $this->uri->segment(3); /* untuk mengambil id film yang ada di url */
    $data['tiket'] = $this->M_tiket->getTiketById($id);

    // menampung data dari tampilan view schedule, kemudian dikirimkan ke tampilan seat
    $harga = $this->input->post('harga');
    $ticket = $this->input->post('selectTiket');
    $totalHarga = $harga * $ticket;
    $data['detail'] = [
      'id' => $this->input->post('id'),
      'lks' => $this->input->post('lokasi'),
      'tgl' => $this->input->post('tanggal'),
      'jam' => $this->input->post('jamTayang'),
      'select' => $this->input->post('selectTiket'),
      'harga' => $totalHarga,
    ];

    $this->form_validation->set_rules('judul', 'Judul', 'required');
    $this->form_validation->set_rules('nameCard', 'Card name', 'required');
    $this->form_validation->set_rules('cardNumber', 'Card number', 'required|numeric');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Seat';
      $this->load->view('template_user/header', $data);
      $this->load->view('template_user/navbar', $data);
      $this->load->view('user/seat', $data);
      $this->load->view('template_user/footerJs');
    } else {
      // menampung data dari halaman seat kemudian data ini akan di kirim ke table transaksi
      $data = [
        'id_user' => $this->input->post('id'),
        'id_film' => $this->input->post('id_film'),
        'date' => $this->input->post('date'),
        'time' => $this->input->post('time'),
        'lokasi' => $this->input->post('lokasi'),
        'studio' => $this->input->post('studio'),
        'ticket' => $this->input->post('jumlahTiket'),
        'seats' => $this->input->post('selected_seats'),
        'total_priece' => $this->input->post('totalHarga'),
        'date_pesan' => time()
      ];
      $this->db->insert('transaksi', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show" role="alert">
      Pemesanan Tiket succsess
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');

      redirect('home');
    }
  }
}
