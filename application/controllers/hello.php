<?php

class hello extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('hello_model', 'bal');


//Form Validation
		$this->load->library('form_validation');
		$config = array(
			array(
				'field' => 'uid',
				'label' => 'Username',
				'rules' => 'Required',
				'errors' => 'Please input $s'

				),

			array(
				'field' => 'pwd',
				'label' => 'Password',
				'rules' => 'Required',
				'errors' => 'Please input $s'

				),

			array(
				'field' => 'em',
				'label' => 'Email',
				'rules' => 'Required',
				'errors' => 'Please input $s'

				),array(
				'field' => 'pn',
				'label' => 'Product Name',
				'rules' => 'Required',
				'errors' => 'Please input $s'

				),

			array(
				'field' => 'pc',
				'label' => 'Product Code',
				'rules' => 'Required',
				'errors' => 'Please input $s'

				),

			array(
				'field' => 'st',
				'label' => 'Stock',
				'rules' => 'Required',
				'errors' => 'Please input $s'

				),

			array(
				'field' => 'pr',
				'label' => 'Price',
				'rules' => 'Required',
				'errors' => 'Please input $s'

				),

			);
		$this->form_validation->set_rules($config);


	}

	public function index() {
		

		$uid = NULL;
		$pwd = NULL;
		$login = NULL;

		extract($_POST);

		$data['Username'] = $uid;
		$data['Password'] = $pwd;

		if($this->form_validation->run() != FALSE){

		}
		$this->load->view('templates/header');
		$this->load->view('jose');
		$this->load->view('templates/footer');
		}

//Login
	public function login(){
		$username =	$this->input->post('uid');
		$password =	$this->input->post('pwd');
		$exb = $this->bal->login($username, $password);
		if($exb){
			echo "Invalid";
		}else{
			return false;
		}
	}
	

//Show Table
	public function showAccounts(){
		$res = $this->bal->showAccounts();
		echo json_encode($res);
		}

//Add Product
	public function register(){
		$pname = $this->input->post('pn');
		$pcode = $this->input->post('pc');
		$stock = $this->input->post('st');
		$price = $this->input->post('pr');
		$data = [$pname, $pcode, $stock, $price];
		
		$data = [$this->input->post('pn'), $this->input->post('pc'), $this->input->post('st'), $this->input->post('pr')];

		$hb = $this->bal->register($data);
		if($hb){
			echo "success";
		}else{
			return false;
	}
}
//Edit Product
	public function uppro(){
		$data = array(
				'productname' => $pn,
				'productcode' => $pc,
				'stock' 			=> $st,
				'price' 			=> $pr
				);
			$this->db->where('id',$id);
			$this->db->update('addproduct', $data);

				$hb = $this->bal->uppro($data);
				if($hb){
					echo "success";
				}else{
				return false;
		}
	}

	public function deleteProd($pn){
      $res = $this->bal->delProd($pn);
      if($res){
        echo "success";
      }else{
        return false;
      }
	}
}
	




		
	

