<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search_management extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Search_management_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'search_management/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'search_management/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'search_management/index.html';
            $config['first_url'] = base_url() . 'search_management/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Search_management_model->total_rows($q);
        $search_management = $this->Search_management_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'search_management_data' => $search_management,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('search_management/search_management_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Search_management_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_search_management' => $row->id_search_management,
		'operator_idoperator' => $row->operator_idoperator,
		'aircraft_name' => $row->aircraft_name,
		'acreg' => $row->acreg,
		'doctype_code' => $row->doctype_code,
	    );
            $this->load->view('search_management/search_management_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('search_management'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('search_management/create_action'),
	    'id_search_management' => set_value('id_search_management'),
	    'operator_idoperator' => set_value('operator_idoperator'),
	    'aircraft_name' => set_value('aircraft_name'),
	    'acreg' => set_value('acreg'),
	    'doctype_code' => set_value('doctype_code'),
	);
        $this->load->view('search_management/search_management_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'operator_idoperator' => $this->input->post('operator_idoperator',TRUE),
		'aircraft_name' => $this->input->post('aircraft_name',TRUE),
		'acreg' => $this->input->post('acreg',TRUE),
		'doctype_code' => $this->input->post('doctype_code',TRUE),
	    );

            $this->Search_management_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('search_management'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Search_management_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('search_management/update_action'),
		'id_search_management' => set_value('id_search_management', $row->id_search_management),
		'operator_idoperator' => set_value('operator_idoperator', $row->operator_idoperator),
		'aircraft_name' => set_value('aircraft_name', $row->aircraft_name),
		'acreg' => set_value('acreg', $row->acreg),
		'doctype_code' => set_value('doctype_code', $row->doctype_code),
	    );
            $this->load->view('search_management/search_management_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('search_management'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_search_management', TRUE));
        } else {
            $data = array(
		'operator_idoperator' => $this->input->post('operator_idoperator',TRUE),
		'aircraft_name' => $this->input->post('aircraft_name',TRUE),
		'acreg' => $this->input->post('acreg',TRUE),
		'doctype_code' => $this->input->post('doctype_code',TRUE),
	    );

            $this->Search_management_model->update($this->input->post('id_search_management', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('search_management'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Search_management_model->get_by_id($id);

        if ($row) {
            $this->Search_management_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('search_management'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('search_management'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('operator_idoperator', 'operator idoperator', 'trim|required');
	$this->form_validation->set_rules('aircraft_name', 'aircraft name', 'trim|required');
	$this->form_validation->set_rules('acreg', 'acreg', 'trim|required');
	$this->form_validation->set_rules('doctype_code', 'doctype code', 'trim|required');

	$this->form_validation->set_rules('id_search_management', 'id_search_management', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Search_management.php */
/* Location: ./application/controllers/Search_management.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-08 03:50:43 */
/* http://harviacode.com */