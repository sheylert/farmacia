<?php
/**
 * Controlador del inicio 
 * @author sistemaweb21. 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
/*---------------------------------------------------------------------*/
    public function __construct() {
         parent::__construct();
         $this->load->model(array('usuariomodel', 'perfilmodel'));
    }
/*---------------------------------------------------------------------*/
	public function index($tipo_bd = null){
		//buscar tipo de logueo

      if (!$this->session->userdata('is_logued_in'))
       {
        redirect('login/', 'refresh');
       }else
       {
         $data = array( 'bd_activa' => 'default',
              'tipo_bd' => 1);

        $this->session->set_userdata($data); 

         $usuario  = $this->usuariomodel->show_usuario();

         $this->load->view('dashboard/header');
         $this->load->view('dashboard/menu');
         $this->load->view('usuario/index',['usuario' => $usuario]);
         $this->load->view('dashboard/footer');
        }
	
	}// fin index

/*---------------------------------------------------------------------*/
    public function listado(){
        //buscar tipo de logueo

      if (!$this->session->userdata('is_logued_in'))
       {
        redirect('login/', 'refresh');
       }else
       {
         $data = array( 'bd_activa' => 'default',
              'tipo_bd' => 1);
         $this->session->set_userdata($data); 

         $usuario  = $this->usuariomodel->show_usuario();

         $this->load->view('dashboard/header');
         $this->load->view('dashboard/menu');
         $this->load->view('usuario/index',['usuario' => $usuario]);
         $this->load->view('dashboard/footer');
        }
    
    }// fin index

/*---------------------------------------------------------------------*/
       public function usuario_activo($id,$estatus){

       if (!$this->session->userdata('is_logued_in'))
       {
        redirect('login/', 'refresh');
       }else
       {  

        if ($estatus == 't'){
         $data = array(
                 'usuario_activo' => false);
         }else{
            $data = array(
                 'usuario_activo' => true);
         }

        if($this->usuariomodel->actualizar_registro($id,$data))
        {
            //registro modificado;
             $this->session->set_flashdata('usuario_mensj', 'Cambiado el estatus');
            redirect('usuario/listado','refresh');
        }
        else
        {
            redirect('usuario/listado','refresh');
        }
       }

   }

 /*--------------------------------------------------------------------------------------------------------*/
   public function create()
   {
      $perfil = $this->perfilmodel->show_perfil();

      $ruta = base_url().'index.php/usuario/store';
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/menu');
        $this->load->view('usuario/form',['ruta' => $ruta,'register' => null, 'perfil' => $perfil]);
        $this->load->view('dashboard/footer');
   }

    public function store()
    {

        $cedula = $this->input->post('cedula', TRUE);
        $nombre = $this->input->post('nombre', TRUE);
        $apellido = $this->input->post('apellido', TRUE);
        
         $data = array(
                'fecha_creacion' => date('Y-m-d H:i:s'),
                'password' => '123456',
                'login' => $this->input->post('login', TRUE),
                'id_permiso' => $this->input->post('id_permiso', TRUE),
                'cedula' => $cedula,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'activo' => 1,
            );

        if($this->usuariomodel->crear_usuario($data))
        {  
            redirect('usuario/','refresh');
        }
        else
        {       
            redirect('usuario/','refresh');
        }
    }



 
}
