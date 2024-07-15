<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function index()
  {
    $data['film'] = $this->M_film->getJumlahFilm();

    $role_id = 2; // Ganti dengan role ID yang sesuai
    $data['jumlahUser'] = $this->M_user->sumDataByRoleId($role_id);
    $data['ticketTerjual'] = $this->M_tiket->tiketTerjual();
    $data['pendapatan'] = $this->M_tiket->pendapatan();

    $data['title'] = 'Dashboard';
    $this->load->view('template_admin/header', $data);
    $this->load->view('template_admin/sidebar');
    $this->load->view('template_admin/navbar');
    $this->load->view('admin/index', $data);
    $this->load->view('template_admin/footer');
  }

  public function dataTransaksi()
  {
    $data['transaksi'] = $this->M_tiket->getTransaksi();
    $data['title'] = 'Data Transaksi';
    $this->load->view('template_admin/header', $data);
    $this->load->view('template_admin/sidebar');
    $this->load->view('template_admin/navbar');
    $this->load->view('admin/transaksi', $data);
    $this->load->view('template_admin/footer');
  }
}
