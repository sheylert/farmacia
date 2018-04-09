<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model(['reportemodel']);
	}

	public function plantilla()
	{
		$this->load->view('dashboard/header');
        $this->load->view('dashboard/menu');
        $this->load->view('reportes/plantilla');
        $this->load->view('dashboard/footer');
	}



/* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

	public function show_pdf()
	{
		$where = '';

		if(isset($_POST['hasta']))
		{
			if(!empty($_POST['hasta']))
			{
				if(!empty($where))
				{
					$where.= " AND e.fecha <= '".$_POST['hasta']."'";
				}
				else
				{
					$where= "WHERE e.fecha <= '".$_POST['hasta']."'";
				}
			}
				
		}

		if(isset($_POST['desde']))
		{
			if(!empty($_POST['desde']))
			{
				if(!empty($where))
				{
					$where.= " AND e.fecha >= '".$_POST['desde']."'";
				}
				else
				{
					$where= "WHERE e.fecha >= '".$_POST['desde']."'";
				}
			}
				
		}

		/*if(isset($_POST['genero']))
		{
			
			if(!empty($where))
			{
				$where.= " AND c.genero = ".$_POST['genero'];
			}
			else
			{
				$where = "WHERE c.genero = ".$_POST['genero'];
			}
		}
		*/

		//echo $where;
		//exit();
		$this->output_pdf($where);
	}

	private function output_pdf($where)
	{
		//load mPDF library
		$this->load->library('M_pdf'); 	

		$data['data'] = $this->reportemodel->datos_pdf($where);

		$html=$this->load->view('reportes/vista_pdf',$data, true);
		
		$pdfFilePath ="entregas-".date('Y-m-d').".pdf";		
		
		$this->m_pdf->pdf->addPage('L');
		$this->m_pdf->pdf->WriteHTML($html);
		

		$this->m_pdf->pdf->Output($pdfFilePath, "D");
		exit;
	}

}

/* End of file Reportes.php */
/* Location: ./application/controllers/Reportes.php */
?>
