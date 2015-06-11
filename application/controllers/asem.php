<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asem extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('haha');
	}
	function proses(){
		$input_cb = $this->input->post('asem');
		$this->load->model('test_model');
		
		$data_cb	=	implode(',',$input_cb);
		
		$database = array(
			'nama'	=>	'hahahahaha',
			'cb'	=>	$data_cb
		);
		$this->test_model->AddCheckbox($database);
		redirect('result');
		//var_dump($input_cb);
		/*$data_session = array(
			'my_cb'	=> $input_cb
		);
		$this->session->set_userdata($data_session);
		redirect('result');*/
		/*$this->load->model('test_model');
		$database = array(
			'cb'	=>	$input_cb
		);
		$this->test_model->AddCheckbox($database);*/
	}
}
