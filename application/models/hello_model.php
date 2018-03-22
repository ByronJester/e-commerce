<?php
defined('BASEPATH') OR exit('No ');
class Hello_model extends CI_Model {
	
//Login
	public function login($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$q = $this->db->get('register');
		if($q->num_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}

//Product Table
	public function showAccounts(){

		
		$q = $this->db->get('addproduct');

		if($q->num_rows() > 0) {
			return $q->result();
		}
		else{
			return false;

				}
			}


//Add Product
	public function register($data){

		$sql = "INSERT INTO addproduct (productname, productcode, stock, price) VALUES (?,?,?,?)";
		
		$q = $this->db->query($sql, $data);
		if($q){
			echo 'success';
		}else{
			return false;
	}
}

//Edit Product
	public function upprod($id,$data){
		 $this->db->where('product_ID',$id);
   	 $query = $this->db->update('addproduct',$data);
   	 if($query){
   	 	echo 'success';
   	 }else{
   	 	return false;
   	 }	
   }
//Delete Product
   public function deleteProduct($data)
   {
   		$sql = "DELETE FROM addproduct WHERE product_ID = ?";
   		return $this->db->query($sql, $data);		
   }


	
}



	



