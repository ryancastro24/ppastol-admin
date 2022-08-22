<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class api extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('main_m');

		//$this->load->library('awslib');
	}

	public function getProvince(){
		$res = $this->main_m->getProvince($_GET["regionPSGC"]);
		echo json_encode($res);
	}


	public function getMunicity(){
		$res = $this->main_m->getMunicity($_GET["provincePSGC"]);
		echo json_encode($res);
	
	} 

	public function getBarangay(){
		$res = $this->main_m->getBarangay($_GET["municityPSGC"]);
		echo json_encode($res);
	}

	/*

	public function addUser(){
		$step1 = $this->awslib->createUser($_POST["email"]);
		if(!isset($step1["message"])){
			if($step1["@metadata"]["statusCode"]===200){
				$step2 = $this->awslib->setUserPassword($_POST["email"]);
				$step3 = $this->main_m->addUser($_POST);
				$step4 = $this->awslib->getUser($_POST["email"]);
				echo json_encode($step4);
			}	
		}
		else{
			echo json_encode($step1);
		}
	}
*/

	public function addComponent(){

		
		if($this->input->is_ajax_request()){
			$ajax_data = $this->input->post();


			if($this->main_m->addComponent($ajax_data)){
				$data = array('response' => 'success', 'message' => "data is added to the database");
			}
			else if($this->main_m->addComponent($ajax_data) == false){
				$data = array('response' => 'invalid', 'message' => "data already exists");
			}
			
			else{
				$data = array('response' => 'error', 'message' => "adding data failed!");
			}
			
		}else{
			echo "no";
		}
		echo json_encode($data);

	}
	

	public function getDetails(){
		$res = $this->main_m->getDetails($_POST);
		echo json_encode($res);
	}

	public function updateDetails(){
		$res = $this->main_m->updateDetails($_POST);
		echo json_encode($res);
		
	}
	 
	public function deleteComponent(){
		if($this->input->is_ajax_request()){
			$del_id = $this->input->post('del_id');
			if($this->main_m->deleteComponent($del_id)){
				$data = array('responce' => "success");
			}
			else{
				$data = array("responce" => "error");
			}


		}
		echo json_encode($data);
	}





	

	public function updateComponentDetails(){
		if($this->input->is_ajax_request()){
			$update_id = $this->input->post('update_id');	
			if($post = $this->main_m->updateComponentDetails($update_id)){
				$data = array("responce" => 'success', "post" => $post);
			}
			else{
				$data = array("responce" => "error", "message" => 'failed!');
			}

			
		}
		echo json_encode($data);
	}



	
	
	public function updateComponentDetailsForm(){
		if($this->input->is_ajax_request()){
			$data['componentID'] = $this->input->post('updateComponentID');
			$data['componentName'] = $this->input->post('updateComponentName');
			$data['componentIcon'] = $this->input->post('updateComponentIcon');
			$data['componentDesc'] = $this->input->post('updateComponentDesc');
			$data['componentProject'] = $this->input->post('updateComponentProject');
			$data['componentPath'] = $this->input->post('updateComponentPath');
			if($this->main_m->updateComponentDetailsForm($data)){
				$data = array('response' => 'success', 'message' => "successfully updated!");
			}
			else if($this->main_m->updateComponentDetailsForm($data) == false){
				$data = array('response' => 'invalid', 'message' => "data already exists");
			}
			else{
				$data = array('response' => 'error', 'message' => "updated failed!");
			}
		
		}else{
			echo "no";
		}
		echo json_encode($data);
	}
	 
    
	public function getComponentDetails(){
		$res = $this->main_m->getComponentDetails($_GET);
		echo json_encode($res);
	}



	public function addAccess(){
		if($this->input->is_ajax_request()){
			$ajax_data = $this->input->post();
			if($this->main_m->addAccess($ajax_data)){
				$data = array('response' => 'sucesss', 'message' => "data is added to the database");
			}
			else{
				$data = array('response' => 'error', 'message' => "adding data failed!");
			}
			
		}else{
			echo "no";
		}
		echo json_encode($data);

	}



	public function getAccess(){
		$res = $this->main_m->getAccessDetails($_GET);
		echo json_encode($res);
	}




	public function deleteAccess(){
		if($this->input->is_ajax_request()){
			$del_id = $this->input->post('del_id');
			if($this->main_m->deleteAccess($del_id)){
				$data = array('responce' => "success");
			}
			else{
				$data = array("responce" => "error");
			}


		}
		echo json_encode($data);
	}




	public function updateAccessDetails(){
		if($this->input->is_ajax_request()){
			$update_id = $this->input->post('update_id');	
			if($post = $this->main_m->updateAccessDetails($update_id)){
				$data = array("responce" => 'success', "post" => $post);
			}
			else{
				$data = array("responce" => "error", "message" => 'failed!');
			}

			
		}
		echo json_encode($data);
	}


public function updateAccessDetailsForm(){
		if($this->input->is_ajax_request()){
	$data['accessID'] = $this->input->post('updateAccessID');
	$data['componentID'] = $this->input->post('updateAccessComponentID');
	$data['userJurID'] = $this->input->post('updateAccessUserJurID');
	$data['userTypeID'] = $this->input->post('updateAccessUserTypeAccessID');
	$data['agencyID'] = $this->input->post('updateAccessAgencyID');
	
			if($this->main_m->updateAccessDetailsForm($data)){
				$data = array('responce' => 'success', 'message' => "successfully updated!");
			}
			else{
				$data = array('responce' => 'error', 'message' => "updated failed!");
			}
		
		}else{
			echo "no";
		}
		echo json_encode($data);
	}

}