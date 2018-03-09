<?php

class Equipos_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get($id = null) //Esta función nos va a permitir seleccionar uno o varios sitios
	{
		if(!is_null($id)){
			$query = $this->db->select('*')->from('equipos')->where('id', $id)->get(); //Este consigue un unico equipo especifico

			if ($query->num_rows() === 1){
				return $query->row_array();
			}

			return false;
		}

		$query = $this->db->select('*')->from('equipos')->get(); //Este consigue todos los equipos

		if ($query->num_rows() > 0) {

			return $query->result_array();

		}

		return false;

	}


	public function save($equipo) //insertar un equipo en la BD
	{

		$this->db->set($this->_setequipo($equipo))->insert('equipos');//insertamos en la tabla equipos

		if ($this->db->affected_rows() === 1) {
			return $this->db->insert_id();
		}

		return false;
	}

	public function update($id, $equipo) //editar un equipo
        {

                $this->db->set($this->_setequipo($equipo))->where('id', $id)->update('equipos');//insertamos en la tabla equipos

		if ($this->db->affected_rows() === 1) {
			return true;
		}

		return false;
        }

	public function delete($id)
	{
		$this->db->where('id', $id)->delete('equipos');

		if ($this->db->affected_rows() === 1) {

                        return true; 
                }

                return false;

	}


	public function _setequipo($equipo) //le pasamos a traves de la peticion un objeto equipo y obtenga los valores para insertarlo en la base de datos
	{
		return array(
			'id' => $equipo['id'],
			'equipo' => $equipo['equipo'],
			'division' => $equipo['division'],
			'descripcion' => $equipo['descripcion'],
			'puntos' => $equipo['puntos']
		);
	}
}

