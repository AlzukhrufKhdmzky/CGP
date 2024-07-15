<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataTiket extends CI_Controller
{
  public function index()
  {
    $data['studio'] = ['1', '2', '3', '4'];
    $data['jumlahTiket'] = ['40', '60'];
    $data['lokasi'] = [
      'Grand Galaxy Mall',
      'Metropolitan Mall Bekasi',
      'Revo Town Bekasi'
    ];
    // $data['lokasi'] = $this->db->get('lokasi')->result_array();

    $data['tiket'] = $this->db->get('film')->result_array();
    $data['joinTiket'] = $this->M_tiket->joinTiket();

    $this->form_validation->set_rules('judul', 'judul', 'required');
    $this->form_validation->set_rules('studio', 'studio', 'required');



    if ($this->form_validation->run() == false) {
      $data['title'] = 'Data Tiket';
      $this->load->view('template_admin/header', $data);
      $this->load->view('template_admin/sidebar');
      $this->load->view('template_admin/navbar');
      $this->load->view('admin/dataTiket', $data);
      $this->load->view('template_admin/footer');
    } else {
      // Ambil data checkbox dari POST
      $checkboxData = $this->input->post('checkbox_field');

      // Konversi data checkbox menjadi string terpisah dengan koma
      $checkboxValues = implode(', ', $checkboxData);
      $data = [
        'id_film' => $this->input->post('judul', true),
        'studio' => $this->input->post('studio', true),
        'lokasi' => $checkboxValues,
        'jumlah_tiket' => $this->input->post('jmlhTiket', true),
      ];

      $this->db->insert('tiket', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show" role="alert">
          Add data tiket success
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
      redirect('DataTiket');
    }
  }

  public function delete()
  {
    $id = $this->uri->segment(3);
    $this->db->where('id_tiket', $id);
    $this->db->delete('tiket');

    // Redirect atau tampilkan pesan sukses
    $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show" role="alert">
    Data tiket berhasil di hapus
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>');
    redirect('DataTiket');
  }

  public function edit($id_tiket)
  {
    $data['tiketById'] = $this->M_tiket->getTicketById($id_tiket);

    $data['studio'] = ['1', '2', '3', '4'];
    $data['jumlahTiket'] = ['40', '60'];
    $data['lokasi'] = [
      'Grand Galaxy Mall',
      'Metropolitan Mall Bekasi',
      'Revo Town Bekasi'
    ];
    // $data['lokasi'] = $this->db->get('lokasi')->result_array();

    $data['tiket'] = $this->db->get('film')->result_array();
    $data['joinTiket'] = $this->M_tiket->joinTiket();

    $this->form_validation->set_rules('judul', 'judul', 'required');
    $this->form_validation->set_rules('studio', 'studio', 'required');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Data Tiket';
      $this->load->view('template_admin/header', $data);
      $this->load->view('template_admin/sidebar');
      $this->load->view('template_admin/navbar');
      $this->load->view('edit/editDataTiket', $data);
      $this->load->view('template_admin/footer');
    } else {
      $id = $this->input->post('id_tiket');
      $data = [
        'id_tiket' => $id,
        'id_film' => $this->input->post('judul', true),
        'studio' => $this->input->post('studio', true),
        'jumlah_tiket' => $this->input->post('jmlhTiket', true),
      ];

      $this->db->where('id_tiket', $id);
      $this->db->update('tiket', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show" role="alert">
          Add data tiket success
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
      redirect('DataTiket');
    }
  }
}
