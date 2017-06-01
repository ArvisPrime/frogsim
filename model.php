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

class specie{
	function set_specie(array $specieData){
		$db = new Db();
		$specie_name= $specieData['specie_name'];
		$specie_growth_rate= $specieData['specie_growth_rate'];
		$specie_mature_age= $specieData['specie_mature_age'];
		$specie_life_expect= $specieData['specie_life_expect'];
		$specie_crowd_rate= $specieData['specie_crowd_rate'];
		if(isset($specieData['specie_id'])){
			//update
			$specie_id=$specieData['specie_id'];
			$result=$db->insert("UPDATE specie_tbl SET specie_name='$specie_name', specie_growth_rate='$specie_growth_rate', specie_mature_age='$specie_mature_age', specie_life_expect='$specie_life_expect', specie_crowd_rate='$specie_crowd_rate' WHERE specie_id='$specie_id'");;
			if($result === true){
				echo "Specie Edited Successfully";
			}
			else{
				echo "Specie not Edited. Try again.";
			}
			
		}else{
			//insert
			$result= $db->insert("INSERT INTO specie_tbl (specie_name,specie_growth_rate,specie_mature_age,specie_life_expect,specie_crowd_rate) VALUES ('$specie_name','$specie_growth_rate','$specie_mature_age','$specie_life_expect','$specie_crowd_rate')");
			if($result === true){
				echo "Added Specie Successfully";
			}
			else{
				echo "Specie not Added. Try again.";
			}
		}
		
	}
	
	function delete_specie($specie_id){
		$db = new Db();
		if($specie_id==0 || !is_numeric($specie_id)){
			echo "Select specie to Delete. Cannot Delete Imaginary specie";
			return false;
		}
		$result=$db->remove("DELETE FROM specie_tbl WHERE (specie_id='$specie_id')");
		if($result === true){
				echo "Deleted specie Successfully";
			}
			else{
				echo "specie not Deleted. Try again.";
			}
		
	}

	function get_specie(array $specieData=[]){
		$db = new Db();
		
		if(!$specieData){
			//get all
			return $result = $db->select("SELECT * FROM specie_tbl");
		}elseif(isset($specieData['specie_id'])){
			$specie_id=$specieData['specie_id'];
			return $result = $db->select("SELECT * FROM specie_tbl WHERE specie_id='$specie_id'");
		}
	}

	/*
	$specie['specie_id']="6";
	$specie['specie_name']="Common Frog";
	$specie['specie_growth_rate']="3";
	$specie['specie_mature_age']="4";
	$specie['specie_life_expect']="7";
	$specie['specie_crowd_rate']="30";
	set_specie($specie);
	 $specie['specie_id']=3;
	var_dump(get_specie($specie)); 
	delete_specie("5");
	*/
}
