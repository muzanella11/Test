<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

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
		$this->load->view('upload');
	}
	function proses_upload(){
		
		$this->data = new stdClass();
		
		$myfoto = $this->input->post('upload');
		$this->load->model('test_model');
		$upath = 'media/upload';
		
		
		$this->data->namee = "hahaasd";
		
		//$this->load->view('result_file',$this->data);
		//$this->session->set_flashdata('success', 'Sukses menyimpan');
		//	redirect('upload/result_view');
		
		//redirect('upload/result_view',$this->data);
		
		$config['upload_path'] = $upath;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']    = '10000';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';
		$file_name = 'aaa'.date('y').date('m').date('d').rand(0,1000000);
		$config['file_name'] = $file_name;

		$this->upload->initialize($config);

		if(!$this->upload->do_upload('upload')){ // validasi file upload error

			$errors = $this->upload->display_errors();
			
			echo "<script>alert('$errors')</script>";
			//$this->load->view('result_file',$data);
			//redirect('upload/result_view');
		} else { //validasi ok

			$upload = $this->upload->data();
			$foto = $upload['file_name'];
			$path = $upload['upload_path'];

			//$this->m_siswa->simpan($foto);
			
			$database = array(
			'nama'	=>	$foto,
			'detail' => 'hahaha',
			'folder' => $upath
			);
			$this->test_model->AddPhoto($database);
			
			$this->data->asu = $database;
			$this->load->view('result_file',$this->data);

			$this->session->set_flashdata('success', 'Sukses menyimpan');
			redirect('upload/upload_data');
		}
		
	}
	
	function result_view(){
		
		$this->data = new stdClass();
		
		$this->data->asd = 'ssss';
		$this->load->view('result_file',$this->data);
	}
	function proses(){
		$input_cb = $this->input->post('upload');
		$this->load->model('test_model');
		
		$data_cb	=	implode(',',$input_cb);
		
		$database = array(
			'nama'	=>	'hahahahaha',
			'cb'	=>	$data_cb
		);
		$this->test_model->AddPhoto($database);
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
	function upload_data(){
		$this->data = new stdClass();
		$this->load->model('test_model');
		
		$this->data->dataallupload = $this->test_model->getDataPic();
		$this->load->view('upload_data',$this->data);
	}
	function delete(){
		$id_items = $this->uri->segment(4);
		$this->load->model('test_model');
		
		$this->test_model->delete($id_items);
		redirect('upload/upload_data');
		
	}
}
