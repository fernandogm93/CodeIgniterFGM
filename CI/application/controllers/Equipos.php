<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';

class Equipos extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('equipos_model');
	}

        public function index_get()
        {
		$equipos = $this->equipos_model->get();

		$this->response(array('response' => $equipos));
        }

        public function find_get($id)
        {
		$equipo = $this->equipos_model->get($id);

		$this->response(array('response' => $equipo));
        }

        public function index_post()
        {
		$id = $this->equipos_model->save($this->post('equipo'));

		$this->response(array('response' => $id));
        }

        public function index_put($id)
        {
		$update = $this->equipos_model->update($id, $this->put('equipo'));

		$this->response(array('response' => 'Equipo bien editado'));

        }

        public function index_delete($id)
        {
		$delete = $this->equipos_model->delete($id);

		$this->response(array('response' => 'Equipo bien eliminado'));
        }

}




