<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiUser extends CI_Controller
{
  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $id_user = $this->uri->segment(3);
    $data['transaksi'] = $this->M_tiket->transaksiByUser($id_user);

    $data['title'] = 'History Transaction';
    $this->load->view('template_user/header', $data);
    $this->load->view('template_user/navbar', $data);
    $this->load->view('transaksi_user/index', $data);
    $this->load->view('template_user/footerJs');
  }
  public function detailTransaksi()
  {
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $id = $this->uri->segment(3);
    $data['detail'] = $this->M_tiket->getTransaksiById($id);

    $data['title'] = 'Detail Transaction';
    $this->load->view('template_user/header', $data);
    $this->load->view('template_user/navbar', $data);
    $this->load->view('transaksi_user/detailTransaksi', $data);
    $this->load->view('template_user/footerJs');
  }
}
