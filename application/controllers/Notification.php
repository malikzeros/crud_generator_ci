<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class notification extends CI_Controller
{
    public function __construct(){
       parent::__construct();
       $this->load->helper('url');
       $this->load->library('pagination');
       $this->load->database();
    }
    public function index(){
        $data['allcountincoming'] = $this->db->count_all('notification');
        $data['allcountdistribution'] = $this->db->count_all('notification');
        $data['allcounttransmittal'] = $this->db->count_all('notification');
       $this->load->view('v_notification',$data);
    }
    public function loadRecordincoming($rowno=0){
 
        $rowperpage = 5;
 
        if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }
  
        $allcount = $this->db->count_all('notification');
 
        $this->db->limit($rowperpage, $rowno);
        $users_record = $this->db->get('notification')->result_array();
  
        $config['base_url'] = base_url().'index.php/post/loadRecordincoming';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
 
        $this->pagination->initialize($config);
 
        $data['paginationincoming'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;
 
        echo json_encode($data);
  }
      public function loadRecorddistribution($rowno=0){
 
        $rowperpage = 5;
 
        if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }
  
        $allcount = $this->db->count_all('notification');
 
        $this->db->limit($rowperpage, $rowno);
        $users_record = $this->db->get('notification')->result_array();
  
        $config['base_url'] = base_url().'index.php/post/loadRecorddistribution';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
 
        $this->pagination->initialize($config);
 
        $data['paginationdistribution'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;
 
        echo json_encode($data);
  }
      public function loadRecordtransmittal($rowno=0){
 
        $rowperpage = 5;
 
        if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }
  
        $allcount = $this->db->count_all('notification');
 
        $this->db->limit($rowperpage, $rowno);
        $users_record = $this->db->get('notification')->result_array();
  
        $config['base_url'] = base_url().'index.php/post/loadRecordtransmittal';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
 
        $this->pagination->initialize($config);
 
        $data['paginationtransmittal'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;
 
        echo json_encode($data);
  }
 
}