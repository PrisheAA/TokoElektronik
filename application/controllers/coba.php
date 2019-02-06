

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {

	public function index()
	{
		$this->load->view('index.php');
		
	}
	public function gallery()
  {
    	$data['konten']="gallery";
    	$this->load->view('template',$data);
  }
	public function contact()
	{
		$data['konten']="contact";
		$this->load->view('template',$data);
	}

}

/* End of file coba.php */
/* Location: ./application/controllers/coba.php */

?>