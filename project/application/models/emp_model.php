<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp_model extends CI_Model {

    public function add_data($table,$data){
        if(!empty($table) && !empty($data)){
              $query = $this->db->insert($table,$data);
              if($query){
                 return $this->db->insert_id();;
              }else{
                  return false;
              }
        }else{
            return false;
        }
    }

        public function get_data($table){
            if(!empty($table)){
                $query = $this->db->get($table);
                if($query->num_rows()>0){
                    return $query->result();
                } else{
                    return false;
                }
            }
        }
    public function get_single_row($table,$column,$value){
        if(!empty($table)){
            if(!empty($column) && !empty($value)){
                $this->db->where($column,$value);
            }
            $query = $this->db->get($table);
            if($query->num_rows()>0){
                return $query->row();
            } else{
                return false;
            }
        }
    }
    public function update_data($table,$data,$column,$value){
        if(!empty($table)){
            if(!empty($column) && !empty($value)){
                $this->db->where($column,$value);
            }
            $query = $this->db->update($table,$data);
            if($query){
                return $query;
            } else{
                return false;
            }
        }
    }
    public function delete_row($table,$column,$value){
        if(!empty($table)){
            if(!empty($column) && !empty($value)){
                $this->db->where($column,$value);
            }
            $query = $this->db->delete($table);
            if($query){
                return $query;
            } else{
                return false;
            }
        }
    }
          
    }



