<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_film extends CI_Model
{
  public function joinGenreRating()
  {
    // $this->db->select('*');
    $this->db->select('*');
    $this->db->from('film');
    $this->db->join('genre', 'genre.id_genre = film.id_genre');
    $this->db->join('rating', 'rating.id_rating = film.id_rating');
    $query = $this->db->get();
    return $query->result_array();
  }

  // model hapus data film
  public function getDataById($id_film)
  {
    return $this->db->get_where('film', ['id_film' => $id_film])->row();
  }

  public function delete_data($id_film)
  {
    $this->db->where('id_film', $id_film);
    $this->db->delete('film');
  }

  // edit data film
  public function getFilmById($id)
  {
    $this->db->select('*');
    $this->db->from('film');
    $this->db->join('genre', 'genre.id_genre = film.id_genre');
    $this->db->join('rating', 'rating.id_rating = film.id_rating');
    $this->db->where('film.id_film', $id);
    return $this->db->get()->row_array();
  }

  public function getJumlahFilm()
  { // Mengambil jumlah film dari database
    $this->db->select('COUNT(*) as total');
    $query = $this->db->get('film');
    $result = $query->row();
    return $result->total;
  }
}
