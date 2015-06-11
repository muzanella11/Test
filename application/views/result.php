haha <br />
<?php
//echo $alldata;
if($alldata){
	foreach($alldata as $key => $value){
		echo $value->nama.'<br />';
		echo $value->data_check.'<br />';
		echo explode(',',$value->data_check).'<br />';
	}
} else {
	echo 'ga ada data';
}
var_dump($alldata).'<br />';
echo $alldata[2]->data_check.'<br />';

$x = count($alldata);
for($i=0; $i<$x; $i++){
	echo $alldata[$i]->data_check.'<br />';
}
echo $alldata[0]->nama;

$a = $_SERVER['DOCUMENT_ROOT'] . "/" . $this->path . "media/";
if(!file_exists('media/test_folder')){
	//echo 'udah ada';
	mkdir('media/test_folder');
	if(!file_exists('media/test_folder/a')){
		mkdir('media/test_folder/a');
	}
} else {
	echo 'udah bikin';
}

function generatekeykode($length){
	$length 	= $length;
	$characters = '0123456789ABCDEFGHJKLMNPRSTUVWXY';
	$string 	= "";
	for ($p = 0; $p < $length; $p++) {
		$string .= $characters[rand(0, strlen($characters)-1)];
	}
	return $string;
}

echo generatekeykode(8);
/*
var_dump($this->session->userdata('my_cb'));
$data_sess = $this->session->userdata('my_cb');
foreach($data_sess as $value){
	echo $value.'<br />';
	echo 'adasdad<br /><br />';
}
for($i=0;$i<count($data_sess);$i++){
	echo $data_sess[$i].'<br />';
}

echo  '<br />';
for($i=0;$i<count($data_sess);$i++){
	echo $data_sess[$i].'<br />';
}

echo'<br />';
 $data= implode(",",$data_sess);
  echo $data;
  */
?>