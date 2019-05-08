<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Log extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Log_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'log/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'log/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'log/index.html';
            $config['first_url'] = base_url() . 'log/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Log_model->total_rows($q);
        $log = $this->Log_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'log_data' => $log,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('log/log_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Log_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_log' => $row->id_log,
		'info' => $row->info,
		'time' => $row->time,
		'ip' => $row->ip,
		'agent' => $row->agent,
		'uri' => $row->uri,
		'ref' => $row->ref,
		'proxy' => $row->proxy,
		'via' => $row->via,
	    );
            $this->load->view('log/log_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('log'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('log/create_action'),
	    'id_log' => set_value('id_log'),
	    'info' => set_value('info'),
	    'time' => set_value('time'),
	    'ip' => set_value('ip'),
	    'agent' => set_value('agent'),
	    'uri' => set_value('uri'),
	    'ref' => set_value('ref'),
	    'proxy' => set_value('proxy'),
	    'via' => set_value('via'),
	);
        $this->load->view('log/log_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'info' => $this->input->post('info',TRUE),
		'time' => $this->input->post('time',TRUE),
		'ip' => $this->input->post('ip',TRUE),
		'agent' => $this->input->post('agent',TRUE),
		'uri' => $this->input->post('uri',TRUE),
		'ref' => $this->input->post('ref',TRUE),
		'proxy' => $this->input->post('proxy',TRUE),
		'via' => $this->input->post('via',TRUE),
	    );

            $this->Log_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('log'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Log_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('log/update_action'),
		'id_log' => set_value('id_log', $row->id_log),
		'info' => set_value('info', $row->info),
		'time' => set_value('time', $row->time),
		'ip' => set_value('ip', $row->ip),
		'agent' => set_value('agent', $row->agent),
		'uri' => set_value('uri', $row->uri),
		'ref' => set_value('ref', $row->ref),
		'proxy' => set_value('proxy', $row->proxy),
		'via' => set_value('via', $row->via),
	    );
            $this->load->view('log/log_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('log'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_log', TRUE));
        } else {
            $data = array(
		'info' => $this->input->post('info',TRUE),
		'time' => $this->input->post('time',TRUE),
		'ip' => $this->input->post('ip',TRUE),
		'agent' => $this->input->post('agent',TRUE),
		'uri' => $this->input->post('uri',TRUE),
		'ref' => $this->input->post('ref',TRUE),
		'proxy' => $this->input->post('proxy',TRUE),
		'via' => $this->input->post('via',TRUE),
	    );

            $this->Log_model->update($this->input->post('id_log', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('log'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Log_model->get_by_id($id);

        if ($row) {
            $this->Log_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('log'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('log'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('info', 'info', 'trim|required');
	$this->form_validation->set_rules('time', 'time', 'trim|required');
	$this->form_validation->set_rules('ip', 'ip', 'trim|required');
	$this->form_validation->set_rules('agent', 'agent', 'trim|required');
	$this->form_validation->set_rules('uri', 'uri', 'trim|required');
	$this->form_validation->set_rules('ref', 'ref', 'trim|required');
	$this->form_validation->set_rules('proxy', 'proxy', 'trim|required');
	$this->form_validation->set_rules('via', 'via', 'trim|required');

	$this->form_validation->set_rules('id_log', 'id_log', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Log.php */
/* Location: ./application/controllers/Log.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-21 14:25:38 */
/* http://harviacode.com */