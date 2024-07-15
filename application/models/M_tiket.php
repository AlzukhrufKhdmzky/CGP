<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tiket extends CI_Model
{
  public function joinTiket()
  {
    $this->db->select('*');
    $this->db->from('tiket');
    $this->db->join('film', 'film.id_film = tiket.id_film');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getTiketById($id_tiket)
  {
    $this->db->select('*');
    $this->db->from('tiket');
    $this->db->join('film', 'film.id_film = tiket.id_film', 'LEFT');
    $this->db->where('tiket.id_film', $id_tiket);
    return $this->db->get()->row_array();
  }
  public function getTicketById($id_tiket)
  {
    $this->db->select('*');
    $this->db->from('tiket');
    $this->db->join('film', 'film.id_film = tiket.id_film', 'LEFT');
    $this->db->where('tiket.id_tiket', $id_tiket);
    return $this->db->get()->row_array();
  }

  public function getTransaksi()
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->join('user', 'user.id_user = transaksi.id_user');
    $this->db->join('film', 'film.id_film = transaksi.id_film');
    return $this->db->get()->result_array();
  }

  // mengambil data transaksi berdasarkan id_transaksi
  public function getTransaksiById($id)
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->join('user', 'user.id_user = transaksi.id_user');
    $this->db->join('film', 'film.id_film = transaksi.id_film');
    $this->db->where('transaksi.id_transaksi', $id);
    return $this->db->get()->row_array();
  }
  public function transaksiByUser($id_user)
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->join('user', 'user.id_user = transaksi.id_user');
    $this->db->join('film', 'film.id_film = transaksi.id_film');
    $this->db->where('transaksi.id_user', $id_user);
    return $this->db->get()->result_array();
  }


  // menghitung jumlah tiket yang terjual
  public function tiketTerjual()
  {
    $this->db->select_sum('ticket'); // Ganti "jumlah" dengan nama kolom yang menyimpan jumlah tiket
    $query = $this->db->get('transaksi'); // Ganti "tiket" dengan nama tabel yang sesuai
    return $query->row()->ticket; // Ganti "jumlah" dengan nama kolom yang menyimpan jumlah tiket
  }

  // menghitung total pendapatan dari table transaksi
  public function pendapatan()
  {
    $this->db->select_sum('total_priece'); // Ganti "jumlah" dengan nama kolom yang menyimpan jumlah tiket
    $query = $this->db->get('transaksi'); // Ganti "tiket" dengan nama tabel yang sesuai
    return $query->row()->total_priece; // Ganti "jumlah" dengan nama kolom yang menyimpan jumlah tiket
  }
}
