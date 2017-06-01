<?php

require 'conn_model.php';




class Pond{
	
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

	function get_pond(array $pondData=[]){
		$db = new Db();
		
		if(!$pondData){
			//get all
			return $result = $db->select("SELECT * FROM pond_tbl");
		}elseif(isset($pondData['pond_id'])){
			$pond_id=$pondData['pond_id'];
			return $result = $db->select("SELECT * FROM pond_tbl WHERE pond_id='$pond_id'");
		}
	}
		
	/* delete_pond("5");
	$pond=array();
	$pond['pond_id']="5";
	$pond['pond_name']="Dirty Pond";
	$pond['pond_capacity']="20";
	$pond['pond_size']="12x10 sqft";
	set_pond($pond); 
	$pond=array();
	$pond['pond_id']="1";
	*/
}

class Frog{
function set_frog(array $frogData){
	$db = new Db();
		$frog_specie_id= $frogData['frog_specie_id'];
		$frog_gender= $frogData['frog_gender'];
		$frog_weight= $frogData['frog_weight'];
		$frog_age= $frogData['frog_age'];
		$frog_pond_id= $frogData['frog_pond_id'];
		
		if(isset($frogData['frog_id'])){
			//update
			$frog_id=$frogData['frog_id'];
			$result=$db->insert("UPDATE frog_tbl SET frog_specie_id='$frog_specie_id', frog_gender='$frog_gender', frog_weight='$frog_weight', frog_age='$frog_age', frog_pond_id='$frog_pond_id' WHERE frog_id='$frog_id'");;
			if($result === true){
				echo "Frog Edited Successfully";
			}
			else{
				echo "Frog not Edited. Try again.";
			}
			
		}else{
			//insert
			$result= $db->insert("INSERT INTO frog_tbl (frog_specie_id, frog_gender, frog_weight, frog_age, frog_pond_id) VALUES ('$frog_specie_id', '$frog_gender', '$frog_weight', '$frog_age', '$frog_pond_id')");
			if($result === true){
				echo "Added Frog Successfully";
			}
			else{
				echo "Frog not Added. Try again.";
			}
		}
}

function delete_frog($frog_id){
		$db = new Db();
		if($frog_id==0 || !is_numeric($frog_id)){
			echo "Select frog to Delete. Cannot Delete Imaginary frog";
			return false;
		}
		$result=$db->remove("DELETE FROM frog_tbl WHERE (frog_id='$frog_id')");
		if($result === true){
				echo "Deleted frog Successfully";
			}
			else{
				echo "frog not Deleted. Try again.";
			}
		
	}
	
	
function get_frog(array $frogData=[]){
		$db = new Db();
		
		if(!$frogData){
			//get all
			return $result = $db->select("SELECT * FROM frog_tbl");
		}elseif(isset($frogData['frog_id'])){
			$frog_id=$frogData['frog_id'];
			return $result = $db->select("SELECT * FROM frog_tbl WHERE frog_id='$frog_id'");
		}
	}

	/*delete_frog("5");
 $frog=[];
$frog['frog_id']="3";
$frog['frog_specie_id']="2";
$frog['frog_gender']="male";
$frog['frog_weight']="4";
$frog['frog_age']="6";
$frog['frog_pond_id']="1";
set_frog($frog); 
$frog['frog_id']=3;
var_dump(get_frog($frog));
*/
}


