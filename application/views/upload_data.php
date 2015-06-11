haha

<table>
	<?php
	if($dataallupload){
	?>
	<?php foreach($dataallupload as $key => $value){?>
	<tr>
		<td><?php echo $value->filename;?></td>
		<td><a href="<?php echo site_url('upload/delete/id');?>/<?php echo $value->id_file;?>">Delete</a></td>
	</tr>
	<?php } ?>
	<?php } ?>
</table>
<?php
//var_dump(getdate());
?>