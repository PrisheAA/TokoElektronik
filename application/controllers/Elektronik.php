<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class elektronik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_elektronik','mlek');
	}

	public function index()
	{
		if($this->session->userdata('level')){

			$data['kategori']=$this->mlek->ambilkategori();
			$data['elektronik']=$this->mlek->ambilelektronik();
			$data['konten']='v_elektronik';
			$this->load->view('template',$data);
		}else{
			redirect('Login','refresh');
		}
	}


	public function tambah(){
		$this->form_validation->set_rules('merk_elek', 'merk_elek', 'trim|required');
		$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('buatan', 'buatan', 'trim|required');
		$this->form_validation->set_rules('produksi', 'produksi', 'trim|required');
		$this->form_validation->set_rules('stok', 'stok', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$config['upload_path'] = './assets/gambar';
			$config['allowed_types'] = 'jpg|png';

			if($_FILES['cover']['name'] != ""){

				$this->load->library('upload', $config);


				if(!$this->upload->do_upload('cover')){

					$this->session->set_flashdata('pesan', $this->upload->display_errors());
					redirect('elektronik','refresh');

				}else{

					if($this->mlek->tambah($this->upload->data('file_name'))){

						$this->session->set_flashdata('pesan', 'anda berhasil menambah barang');
					}else{
						$this->session->set_flashdata('pesan', 'anda gagal menambah barang');
					}

					redirect('elektronik','refresh');


				}

			}else{

				if($this->mlek->tambah('')){
					$this->session->set_flashdata('pesan', 'anda berhasil menambah barang');
				}else{
					$this->session->set_flashdata('pesan', 'anda gagal menambah barang');
				}
				redirect('elektronik','refresh');
			}

		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('elektronik','refresh');
		}

	}

	public function tampil_ubah_elektronik($kode_elektronik){
		$data =  $this->mlek->tampil_ubah_elektronik($kode_elektronik);
		echo json_encode($data);

	}

	public function update(){

		if($this->input->post('update')){

			if($_FILES['cover']['name']==""){

				if($this->mlek->update()){

					$this->session->set_flashdata('pesan', 'sukses ubah data ');
				}else{

					$this->session->set_flashdata('pesan', 'gagal ubah data ');
				}
				redirect('elektronik','refresh');	


			}else{


				$config['upload_path'] = './assets/gambar/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('cover')){

					$this->session->set_flashdata('pesan', $this->upload->display_errors());
					redirect('elektronik','refresh');

				}else{


					if($this->mlek->update_ft($this->upload->data('file_name'))){

						$this->session->set_flashdata('pesan', 'sukses ubah data ');

					}else{

						$this->session->set_flashdata('pesan', 'gagal ubah data ');

					}


					redirect('elektronik','refresh');


				}
			}

		}

	}

	public function hapus($kode_elektronik){
		if($this->mlek->hapus($kode_elektronik)){

			$this->session->set_flashdata('pesan', 'anda berhasil menghapus data elektronik');
			redirect('elektronik','refresh');

		}else{

			$this->session->set_flashdata('pesan', 'anda gagal menghapus data elektronik');
			redirect('elektronik','refresh');
		}
	}
}

/* End of file elektronik.php */
/* Location: ./application/controllers/elektronik.php */


?>