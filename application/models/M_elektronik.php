
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_elektronik extends CI_Model {

	public function ambilelektronik(){
			$ambilelektronik = $this->db->join('kategori', 'kategori.kode_kategori = elektronik.kode_kategori')->get('elektronik')->result();
	
			return $ambilelektronik;
	}


	public function ambilkategori(){

			$ambilkategori = $this->db->get('kategori')->result();

			return $ambilkategori;
	}

	public function tambah($nama_file){

	if($nama_file == ""){

			$tambah = array(
				'merk_elektronik' => $this->input->post('merk_elektronik'),
				'tahun' => $this->input->post('tahun'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'buatan' => $this->input->post('buatan'),
				'produksi' => $this->input->post('produksi'),
				'stok' => $this->input->post('stok'), );

	}else{

		$tambah = array(
				'merk_elektronik' => $this->input->post('merk_elektronik'),
				'tahun' => $this->input->post('tahun'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'cover' => $nama_file,
				'buatan' => $this->input->post('buatan'),
				'produksi' => $this->input->post('produksi'),
				'stok' => $this->input->post('stok'), );

	}
	return $this->db->insert('elektronik', $tambah);
	}

public function tampil_ubah_elektronik($kode_elektronik){
		return $this->db->join('kategori', 'kategori.kode_kategori = elektronik.kode_kategori')->where('kode_elektronik',$kode_elektronik)->get('elektronik')->row();

	}



public function update(){
			$ubah = array(
				'merk_elektronik' => $this->input->post('merk_elektronik'),
				'tahun' => $this->input->post('tahun'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'buatan' => $this->input->post('buatan'),
				'produksi' => $this->input->post('produksi'),
				'stok' => $this->input->post('stok'), );

			return $this->db->where('kode_elektronik',$this->input->post('kode_elektronik'))->update('elektronik', $ubah);

}


public function update_ft($nama_file){
				$ubah = array(
				'merk_elektronik' => $this->input->post('merk_elektronik'),
				'tahun' => $this->input->post('tahun'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'cover' => $nama_file,
				'buatan' => $this->input->post('buatan'),
				'produksi' => $this->input->post('produksi'),
				'stok' => $this->input->post('stok'), );

		return $this->db->where('kode_elektronik',$this->input->post('kode_elektronik'))->update('elektronik', $ubah);





}


public function hapus($kode_elektronik ){
	return $this->db->where('kode_elektronik',$kode_elektronik)->delete('elektronik');
}




public function ambilelektronikcart($kode_elektronik){
	return $this->db->where('kode_elektronik',$kode_elektronik )->get('elektronik')->row();

}

}

/* End of file M_elektronik.php */
/* Location: ./application/models/M_elektronik.php */

?>