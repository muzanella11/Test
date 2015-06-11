<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Test_model extends CI_model{
		
		function __construct(){
			parent::__construct();	
		}
		
		function AddCheckbox($data){
			$sql    =   "INSERT INTO test_checkbox (nama,data_check)
                            VALUES('".$data['nama']."','".$data['cb']."')";
            $this->db->query($sql);
		}
		function AddPhoto($data){
			$sql    =   "INSERT INTO file_upload (filename,detail,folder,dateupload)
                            VALUES('".$data['nama']."','".$data['detail']."','".$data['folder']."',now())";
            $this->db->query($sql);
		}
		function getDataCheckbox(){
			$sql = "Select * From test_checkbox";
			$query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
		}
		function getDataPic(){
			$sql = "Select * From file_upload";
			$query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
		}
		
		function delete($id){

			 //$this->db->where('gallery_id',$id);
			 //$query = $this->db->get('gallery');
			 //$path = 'media/upload';
			 //$sql = "DELETE FROM file_upload WHERE id_file='".$id."'";
			 //$query  =   $this->db->query($sql);
			 
			 //$sqlcari = "SELECT * FROM file_upload WHERE id_file='".$id."'"
             //$queryc  =   $this->db->query($sqlcari);
			 //$this->db->where('id_file',$id);
			 //$querys = $this->db->get('file_upload');
			 
			 //$row = $querys->row();
			 
			 $this->db->where('id_file',$id);
			 $query = $this->db->get('file_upload');
			 
			 $sqlcari = "SELECT * FROM file_upload WHERE id_file='".$id."'";
             $queryc  =   $this->db->query($sqlcari);
			 $row = $queryc->row();
			 
			 $path = './media/upload/';
			 unlink("".$path."".$row->filename."");
			 
			 $sqldelete = "DELETE FROM file_upload WHERE id_file='".$id."'";
			 $this->db->query($sqldelete);
			 
			 //$this->db->delete('file_upload', array('id_file' => $id));

			 //unlink("./uploads/users/".$row->nama_foto."");
			 //unlink("".$path."./.".$row->filename."");

			 //$this->db->delete('gallery', array('gallery_id' => $id));

		}
        
    }
?>