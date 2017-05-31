<?php

require 'conn_model.php';





function set_pond(array $pondData){
	$db = new Db();
	$pond_name= $pondData['pond_name'];
	$pond_capacity= $pondData['pond_capacity'];
	$pond_size=$pondData['pond_size'];
	if(isset($pondData['pond_id'])){
		//update
		$pond_id=$pondData['pond_id'];
		$result=$db->insert("UPDATE pond_tbl SET pond_name='$pond_name', pond_capacity='$pond_capacity', pond_size='$pond_size' WHERE pond_id='$pond_id'");;
		if($result === true){
			echo "Pond Edited Successfully";
		}
		else{
			echo "Pond not Edited. Try again.";
		}
		
	}else{
		//insert
		$result= $db->insert("INSERT INTO pond_tbl (pond_id,pond_name,pond_capacity,pond_size) VALUES ('DEFAULT','$pond_name','$pond_capacity','$pond_size')");
		if($result === true){
			echo "Added Pond Successfully";
		}
		else{
			echo "Pond not Added. Try again.";
		}
	}
	
}

function delete_pond($pond_id){
	$db = new Db();
	if($pond_id==0 || !is_numeric($pond_id)){
		echo "Select Pond to Delete. Cannot Delete Imaginary Pond";
		return false;
	}
	$result=$db->remove("DELETE FROM pond_tbl WHERE (pond_id='$pond_id')");
	if($result === true){
			echo "Deleted Pond Successfully";
		}
		else{
			echo "Pond not Deleted. Try again.";
		}
	
}

function get_pond(array $pondData){
	$db = new Db();
	//get all
	
}

/* delete_pond("5");
$pond=array();
$pond['pond_id']="5";
$pond['pond_name']="Dirty Pond";
$pond['pond_capacity']="20";
$pond['pond_size']="12x10 sqft";
set_pond($pond); */