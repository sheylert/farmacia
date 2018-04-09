<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportemodel extends CI_Model {

	public function datos_pdf($where)
	{

		//INNER JOIN usuario_info ui ON ui.id_usuario = u.id
			
		$sql = "SELECT e.*, t.nombres as nombretitular, t.apellidos as apellidotitular,
		        b.nombres as nombrebene, b.apellidos as apellidobene, p.nombre as producto,
		        en.cantidad as cantidad, t.cedula as cedulatitular, b.cedula as cedulabene   
		        from entregados as e 
				INNER JOIN entregaproducto as en ON en.entrega_id = e.id
				INNER JOIN productos as p ON en.producto_id = p.id
				INNER JOIN titulares t ON t.id = e.titulare_id
				LEFT JOIN beneficiarios b ON b.id = e.beneficiario_id

				$where

				ORDER BY e.id ASC";

		return $this->db->query($sql)->result();

		$this->db->close();
	}

}

/* End of file Reportemodel.php */
/* Location: ./application/models/Reportemodel.php */