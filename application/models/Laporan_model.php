<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'damo');
		$this->load->model('Log_model', 'lomo');
	}

	public function getLaporanFilter($dari_tanggal, $sampai_tanggal, $status)
	{
		$dari_tanggal = date("Y-m-d\T00:00:01", strtotime($dari_tanggal));
		$sampai_tanggal = date("Y-m-d\T23:59:59", strtotime($sampai_tanggal));

		$this->db->join('anggota', 'transaksi.id_anggota=anggota.id_anggota');
		$this->db->join('buku', 'transaksi.id_buku=buku.id_buku');
		$this->db->where('tanggal_pinjam >=', $dari_tanggal);
	    $this->db->where('tanggal_pinjam <=', $sampai_tanggal);
	    if ($status != 'semua') {
		    $this->db->where('status', $status);
	    }
		$this->db->order_by('tanggal_pinjam', 'asc');
		return $this->db->get('transaksi')->result_array();	
	}
}