<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Actividades extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Actividades_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'actividades/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'actividades/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'actividades/index.html';
            $config['first_url'] = base_url() . 'actividades/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Actividades_model->total_rows($q);
        $actividades = $this->Actividades_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'actividades_data' => $actividades,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('actividades/actividades_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Actividades_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'Actividad' => $row->Actividad,
		'Path' => $row->Path,
		'Activado' => $row->Activado,
		'mostrar_asistencias' => $row->mostrar_asistencias,
	    );
            $this->load->view('actividades/actividades_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('actividades'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('actividades/create_action'),
	    'ID' => set_value('ID'),
	    'Actividad' => set_value('Actividad'),
	    'Path' => set_value('Path'),
	    'Activado' => set_value('Activado'),
	    'mostrar_asistencias' => set_value('mostrar_asistencias'),
	);
        $this->load->view('actividades/actividades_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Actividad' => $this->input->post('Actividad',TRUE),
		'Path' => $this->input->post('Path',TRUE),
		'Activado' => $this->input->post('Activado',TRUE),
		'mostrar_asistencias' => $this->input->post('mostrar_asistencias',TRUE),
	    );

            $this->Actividades_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('actividades'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Actividades_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('actividades/update_action'),
		'ID' => set_value('ID', $row->ID),
		'Actividad' => set_value('Actividad', $row->Actividad),
		'Path' => set_value('Path', $row->Path),
		'Activado' => set_value('Activado', $row->Activado),
		'mostrar_asistencias' => set_value('mostrar_asistencias', $row->mostrar_asistencias),
	    );
            $this->load->view('actividades/actividades_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('actividades'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'Actividad' => $this->input->post('Actividad',TRUE),
		'Path' => $this->input->post('Path',TRUE),
		'Activado' => $this->input->post('Activado',TRUE),
		'mostrar_asistencias' => $this->input->post('mostrar_asistencias',TRUE),
	    );

            $this->Actividades_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('actividades'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Actividades_model->get_by_id($id);

        if ($row) {
            $this->Actividades_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('actividades'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('actividades'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Actividad', 'actividad', 'trim|required');
	$this->form_validation->set_rules('Path', 'path', 'trim|required');
	$this->form_validation->set_rules('Activado', 'activado', 'trim|required');
	$this->form_validation->set_rules('mostrar_asistencias', 'mostrar asistencias', 'trim|required');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Actividades.php */
/* Location: ./application/controllers/Actividades.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-29 21:59:21 */
/* http://harviacode.com */