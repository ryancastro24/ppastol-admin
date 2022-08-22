<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_M extends CI_Model {
	function __construct()
	{
	    parent::__construct();
	}

    public function addUser($data){
        return $this->db->insert('tbl_user',$data);
    }
    public function getUjuris(){
        $this->db->where('userJurName !=',"superadmin");
        $result = $this->db->get("tbl_user_jurisdiction");
        return $result->result();
    }
    public function getRegion(){
        $result = $this->db->get("tbl_region");
        return $result->result();
    }

    public function getProvince($region){
        $this->db->where('regionPSGC',$region);
        $result = $this->db->get("tbl_province");
        return $result->result();
    }

    public function getMunicity($province){
        $this->db->where('provincePSGC',$province);
        $result = $this->db->get("tbl_municity");
        return $result->result();
    }

    public function getBarangay($municity){
        $this->db->where('municityPSGC',$municity);
        $result = $this->db->get("tbl_barangay");
        return $result->result();
    }

    public function getUtype(){
        $this->db->where('userTypeName !=',"superadmin");
        $result = $this->db->get("tbl_usertype");
        return $result->result();
    }

    public function getUtypeAccess(){
        $this->db->where('userTypeName !=',"superadmin");
         $this->db->where('userTypeName !=',"admin");
        $result = $this->db->get("tbl_usertype");
        return $result->result();
    }

    public function getAgency(){
        $this->db->where('agencyName !=',"superadmin");
        $result = $this->db->get("tbl_agency");
        return $result->result();
    }

    public function getDetails($data){
        $this->db->where($data);
        $result = $this->db->get('tbl_user');
        return $result->result();
    }

    public function updateDetails($data){
        $this->db->where('email'.$data["email"]);
        $result = $this->db->update('tbl_user',$data);
        return $result->result();
    }


    
    public function addComponent($data){
        $this->db->where('componentName', $data['componentName']);
       $check = $this->db->get('tbl_component');
       if($check->num_rows()== 0){
           $this->db->flush_cache();
          $this->db->insert('tbl_component',$data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
       }
        else{
            return false;
        }
        
    }

    public function getComponentDetails(){
            $query = $this->db->get("tbl_component");
            return $query->result();
    }




    
    public function deleteComponent($componentID){
    return $this->db->delete('tbl_component', array('componentID' => $componentID));
    }




    
    public function updateComponentDetails($componentID){
        $this->db->select("*");
        $this->db->from("tbl_component");
        $this->db->where("componentID", $componentID);
        $query = $this->db->get();
        if(count($query->result())> 0){
            return $query->row();
        }
    }
   
    public function updateComponentDetailsForm($data){

        $this->db->where('componentName', $data['componentName']);
        $check = $this->db->get('tbl_component');
       if($check->num_rows() == 0 ){
            $this->db->flush_cache();

            $update_id =  $this->db->update('tbl_component', $data, array( 'componentID' => $data['componentID']));
            return $update_id;
       }
        else{
            return false;
        }
     
    }
    


    public function addAccess($data){
        return $this->db->insert('tbl_access', $data);
    }

    public function getAccessDetails(){
            $query = $this->db->get("tbl_access");
            return $query->result();
    }

   

    public function deleteAccess($accessID){
    return $this->db->delete('tbl_access', array('accessID' => $accessID));
    }


    public function updateAccessDetails($accessID){
        $this->db->select("*");
        $this->db->from("tbl_access");
        $this->db->where("accessID", $accessID);
        $query = $this->db->get();
        if(count($query->result())> 0){
            return $query->row();
        }
    }


    public function updateAccessDetailsForm($data){
    return  $this->db->update('tbl_access', $data, array( 'accessID' => $data['accessID']));
    }
}
