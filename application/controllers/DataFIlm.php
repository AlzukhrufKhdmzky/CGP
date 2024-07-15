<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataFilm extends CI_Controller
{
  // fungsi untuk menampilkan halaman default film
  public function index()
  {

    $data['genre'] = $this->db->get('genre')->result_array();
    $data['rating'] = $this->db->get('rating')->result_array();
    $data['film'] = $this->M_film->joinGenreRating(); /* memanggil isi data table film */

    $this->form_validation->set_rules('judul', 'Judul', 'required|trim|is_unique[film.judul]', [
      'is_unique' => '<div class="text-danger">Penambahan Film gagal, karena film sudah di tambahkan!!</div>'
    ]);
    $this->form_validation->set_rules('genre', 'genre', 'required');
    $this->form_validation->set_rules('produser', 'produser', 'required|trim');
    $this->form_validation->set_rules('releasedDate', 'releasedDate', 'required|trim');
    $this->form_validation->set_rules('durasi', 'durasi', 'required|trim|numeric|min_length[2]|max_length[3]');
    $this->form_validation->set_rules('rating', 'rating', 'required|trim');
    $this->form_validation->set_rules('sinopsis', 'sinopsis', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Data film';
      $this->load->view('template_admin/header', $data);
      $this->load->view('template_admin/sidebar');
      $this->load->view('template_admin/navbar');
      $this->load->view('admin/dataFilm', $data);
      $this->load->view('template_admin/footer');
    } else {
      // upload gambar dan image

      // Load library Upload
      $this->load->library('upload');

      // Konfigurasi upload gambar
      $config['upload_path']   = './assets/img/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['max_size']      = 1024; // 1MB
      $config['max_width'] = '600';
      $config['max_height'] = '800';
      $config['file_name'] = 'img' . time();

      // Atur konfigurasi upload
      $this->upload->initialize($config);

      // Lakukan proses upload gambar
      if ($this->upload->do_upload('image')) {
        // Jika upload gambar berhasil
        $imageData = $this->upload->data();
        $imagePath = $imageData['file_name'];

        // Lakukan proses input gambar ke database atau tindakan selanjutnya
      } else {
        // jika upload image salah
        $this->upload->display_errors();
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Gambar gagal ditambahkan!!!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
        redirect('datafilm');
      }

      // Lakukan proses upload video
      $config['upload_path']   = './assets/videos/';
      $config['allowed_types'] = 'mp4';
      $config['max_size']      = 80000; // 50MB
      $config['file_name'] = 'mp4' . time();

      // Atur konfigurasi upload
      $this->upload->initialize($config);

      // Lakukan proses upload video
      if ($this->upload->do_upload('video')) {
        // Jika upload video berhasil
        $videoData = $this->upload->data();
        $videoPath = $videoData['file_name'];

        // Lakukan proses input video ke database atau tindakan selanjutnya
      } else {
        // jika upload image salah
        $this->upload->display_errors();
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Video gagal ditambahkan!!!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
        redirect('datafilm');
      }

      // data untuk dimasukkan ke dalam database
      $data = [
        'judul' => $this->input->post('judul', true),
        'id_genre' => $this->input->post('genre', true),
        'id_rating' => $this->input->post('rating', true),
        'durasi' => $this->input->post('durasi', true),
        'produser' => $this->input->post('produser', true),
        'tanggal_rilis' => $this->input->post('releasedDate', true),
        'sinopsis' => $this->input->post('sinopsis', true),
        'img' => $imagePath,
        'trailler' => $videoPath
      ];

      // $this->M_film->insertFilm($data);
      $this->db->insert('film', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show" role="alert">
          Add data film success
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
      redirect('dataFilm');
    }
  }

  public function delete($id_film)
  {
    $data = $this->M_film->getDataById($id_film);

    if ($data) {
      // Hapus gambar dari folder
      $image_path = './assets/img/' . $data->img;
      if (file_exists($image_path)) {
        unlink($image_path);
      }
      $videos_path = './assets/videos/' . $data->trailler;
      if (file_exists($videos_path)) {
        unlink($videos_path);
      }

      // Hapus data dari database
      $this->M_film->delete_data($id_film);

      // Redirect atau tampilkan pesan sukses
      $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show" role="alert">
          Data berhasil di hapus
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
      redirect('DataFilm');
    }
    // else {
    //   // Redirect atau tampilkan pesan error jika data tidak ditemukan
    //   $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //       Data tidak ditemukan
    //       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //       </div>');
    //   redirect('DataFilm');
    // }
  }

  public function edit()
  {
    $id = $this->uri->segment(3);
    $data['filmId'] = $this->M_film->getFilmById($id);

    $data['genre'] = $this->db->get('genre')->result_array();
    $data['rating'] = $this->db->get('rating')->result_array();

    $this->form_validation->set_rules('produser', 'produser', 'required|trim');
    $this->form_validation->set_rules('releasedDate', 'releasedDate', 'required|trim');
    $this->form_validation->set_rules('durasi', 'durasi', 'required|trim|numeric|min_length[2]|max_length[3]');
    $this->form_validation->set_rules('rating', 'rating', 'required|trim');
    $this->form_validation->set_rules('sinopsis', 'sinopsis', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Edit data film';
      $this->load->view('template_admin/header', $data);
      $this->load->view('template_admin/sidebar');
      $this->load->view('template_admin/navbar');
      $this->load->view('edit/editDataFIlm', $data);
      $this->load->view('template_admin/footer');
    } else {
      $id = $this->input->post('id');
      $data = [
        'id_film' => $id,
        'id_genre' => $this->input->post('genre', true),
        'id_rating' => $this->input->post('rating', true),
        'durasi' => $this->input->post('durasi', true),
        'produser' => $this->input->post('produser', true),
        'tanggal_rilis' => $this->input->post('releasedDate', true),
        'sinopsis' => $this->input->post('sinopsis', true),
      ];

      $this->db->where('id_film', $id);
      $this->db->update('film', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show" role="alert">
          Data berhasil di ubah
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
      redirect('DataFilm');
    }
  }
}
