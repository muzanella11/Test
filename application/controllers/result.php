<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends CI_Controller {

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
		$this->data	=	new stdClass();
		
		$this->load->model('test_model');
		$this->data->alldata	=	$this->test_model->getDataCheckbox();
		
		$this->load->view('result',$this->data);
		
		$config['protocol']='smtp';  
		$config['smtp_host']='ssl://smtp.googlemail.com';  
		$config['smtp_port']='465';  
		$config['smtp_timeout']='30';  
		$config['smtp_user']='spamformuzanella11@gmail.com';  
		$config['smtp_pass']='sebelas11';  
		$config['charset']='utf-8';  
		$config['newline']="\r\n"; 
		
		// mengirimkan email  
		$this->load->library('email', $config);  
		$this->email->from('spamformuzanella11@gmail.com','Gueee');  
		$this->email->to("muzanella11@gmail.com");  //diisi dengan alamat tujuan
		$this->email->subject('A test email from CodeIgniter using Gmail');  
		$this->email->message("I can now email from CodeIgniter using Gmail as my server!");  
		$this->email->send();
	}
}
