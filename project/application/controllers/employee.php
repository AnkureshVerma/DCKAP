<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Emp_model');
		date_default_timezone_set('asia/kolkata');
      }

	public function index(){
		$data = array();
		if($_GET){
        $id = base64_decode($_GET['id']);   
		$data['emp_data'] = $this->Emp_model->get_single_row('tbl_employee','emp_id',$id);
		}
		$this->load->view('emp_add',$data);
	}

	public function add_employee(){
        $this->load->library('form_validation');
		$this->form_validation->set_rules('emp_name', 'Name', 'required');
		$this->form_validation->set_rules('emp_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('emp_phone', 'Phone', 'required|numeric|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('emp_code', 'Code', 'required');
		$this->form_validation->set_rules('emp_dob', 'DOB', 'required');
		$this->form_validation->set_rules('emp_address', 'Address', 'required');
		$this->form_validation->set_rules('emp_status', 'Status', 'required');
		if($this->form_validation->run()){
			  $create_date =  date("Y-m-d h:i:sa");
			  $image       = $this->input->post('emp_img');
			if($this->input->post('emp_id')){
			   $details  	= $this->Emp_model->get_single_row('tbl_employee','emp_id',$this->input->post('emp_id'));
			   $create_date = $details->create_date;
			   $image       =   $details->emp_pro_img;
			   if(isset($_FILES["emp_img"]["name"]) && !empty($_FILES["emp_img"]["name"])){
				$image      = $_FILES["emp_img"]["name"];
			   }    
			} else{
			   	 $image    =  $_FILES["emp_img"]["name"];
			}
			if($image){
				$emp_name	     = $this->input->post('emp_name');
				$emp_email	     = $this->input->post('emp_email');
				$emp_phone	     = $this->input->post('emp_phone');
				$emp_code	     = $this->input->post('emp_code');
				$emp_dob	     = $this->input->post('emp_dob');
				$emp_address	 = $this->input->post('emp_address');
				$emp_status	     = $this->input->post('emp_status');
				$allowed_ext = array("jpg", "png", "jpeg", "gif");
		        $ext = explode(".", $image);
		        $end = end($ext);
				$imgname =  $image;
		       if(in_array($end, $allowed_ext)){
				if(!empty($_FILES["emp_img"]["name"])){
					$imgname = rand(10000,50000).".".$end;
				    $path = "./upload/images/".$imgname;
					move_uploaded_file($_FILES['emp_img']['tmp_name'], $path); 
				 }	
				$formdata = array(
                   'emp_name'        => $emp_name,
				   'emp_email '      => $emp_email,
				   'emp_phone'       => $emp_phone,
				   'emp_code'        => $emp_code,
				   'emp_pro_img'     => $imgname,
				   'emp_dob'         => $emp_dob,
				   'emp_address'     => $emp_address,
				   'emp_status'      => $emp_status,
				   'create_date'     => $create_date,
				   'update_date'     => date("Y-m-d h:i:sa"),
				); 
				if($this->input->post('emp_id')){
				   $resultdata = $this->Emp_model->update_data('tbl_employee',$formdata,'emp_id',$this->input->post('emp_id'));
				   $massage    =  '<div class="alert alert-success">Empolyee Registration Updated Successfully</div>';
				   $refresh    = "yes";
				   $txtbutton  = "Update Information";
				} else{
				$resultdata = $this->Emp_model->add_data('tbl_employee',$formdata);
				$massage    =  '<div class="alert alert-success">Empolyee Registration Created Successfully</div>';
				$refresh    = "";
				$txtbutton  = "Submit Information";
				  }
				if($resultdata){
				$array = array(
						'error'   => false,
						'message' =>  $massage,
						'refresh' =>  $refresh,
						'button'  =>  $txtbutton, 
				   );
				}
			} else{
				$array = array(
					'error'     => true,
					'img_error' => 'Please Uplaod jpg|png|jpeg|gif',
				   );
			} }else{
				$array = array(
					'error'     => true,
					'img_error' => 'Please Uplaod image',
				   );
			}
		}else{
			$array = array(
				'error'         => true,
				'name_error'    => form_error('emp_name'),
				'email_error'   => form_error('emp_email'),
				'phone_error'   => form_error('emp_phone'),
				'code_error'    => form_error('emp_code'),
				'dob_error'     => form_error('emp_dob'),
				'address_error' => form_error('emp_address'),
				'status_error'  => form_error('emp_status')
			   );
		    }
	  echo json_encode($array);
		 }

		 public function emp_list(){
			 $data['emp_list'] = $this->Emp_model->get_data('tbl_employee');
			 $this->load->view('emp_list',$data);
		 }

		 public function delete_data(){
			if($_GET){
				$id = base64_decode($_GET['id']);   
				$result = $this->Emp_model->delete_row('tbl_employee','emp_id',$id);
				if($result){
					redirect('Employee/emp_list','refresh');
				}
				else{
					redirect('Employee/emp_list','refresh');
				}
		     }
		}
		public function check_email(){
			if($this->input->post()){
				 $result = $this->Emp_model->get_single_row('tbl_employee','emp_email',$this->input->post('email'));
				 if(!empty($result)){
                    echo "Please Enter Other Email Address";   
				  }
			} 
		}
		
	}
