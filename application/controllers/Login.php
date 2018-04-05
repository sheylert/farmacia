<?php
/**
 * Controlador del inicio 
 * @author sistemaweb21. 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
/*---------------------------------------------------------------------*/
    public function __construct() {
         parent::__construct();
         $this->load->model(array('usuariomodel'));
    }
/*---------------------------------------------------------------------*/
	public function index(){
	     $datos = [
	     	'imagen' => 'banner.jpg',
	     	'banner' => 'banner.jpg',
	     	'titulo' => 'S.C.A.M.F.U.P.E.L',
        'logo' => '',
	     ];

		    $this->load->view('login/login_4',$datos);

        $this->load->view('login/footer');
	}// fin index

/*---------------------------------------------------------------------*/
	public function logueo(){

		 if ($this->input->post()) 
     {  

        $data = array( 'bd_activa' => 'default',
              'tipo_bd' => 1);

         $this->session->set_userdata($data);

        $username = $this->input->post('username');
        $password = $this->input->post('pass');
        $check_user = $this->usuariomodel->login_usuario($username, $password);

        
        $membrete = '';

        switch ($check_user->id_permiso) {
                  case '1':
                    $membrete = 'Administrador';
                  break;

                  case '2':
                    $membrete = 'Empleado';
                  break;

                  case '3':
                    $membrete = 'Soporte ';
                  break;
        }	       

       $data = array(
              'is_logued_in' => TRUE,
              'id_usuario' => $check_user->id,
              'id_permiso' => $check_user->id_permiso,
              'membrete' => $membrete,
              'nombre_usuario' => $check_user->nombre,
              'apellido_usuario' => $check_user->apellido,
          );

          $this->session->set_flashdata('type','success');
          $this->session->set_flashdata('message','Ha iniciado sesión Correctamente');
          $this->session->set_userdata($data);	
         
         redirect('dashboard/','refresh');
	   }

  }

/*---------------------------------------------------------------------*/  
    public function salir ()
    {
        $this->session->set_userdata('is_logued_in', FALSE);
        $this->session->sess_destroy();
        redirect(base_url() . 'index.php/login', 'refresh');
    }

}
