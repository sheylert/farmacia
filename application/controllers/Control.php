<?php
/**
 * Controlador del inicio 
 * @author sistemaweb21. 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller {
/*---------------------------------------------------------------------*/
    public function __construct() {
         parent::__construct();
         $this->load->model(array('usuariomodel', 'perfilmodel', 'titularmodel', 'parentescomodel', 'productomodel'));
    }

/*---------------------------------------------------------------------*/
       public function titular(){
        //buscar tipo de logueo

      if (!$this->session->userdata('is_logued_in'))
       {
        redirect('login/', 'refresh');
       }else
       {
         $data = array( 'bd_activa' => 'default',
              'tipo_bd' => 1);
         $this->session->set_userdata($data); 

         $titular  = $this->titularmodel->show_titular();

         $this->load->view('dashboard/header');
         $this->load->view('dashboard/menu');
         $this->load->view('control/index',['titular' => $titular]);
         $this->load->view('dashboard/footer');
        }
    
    }// fin index




 /*--------------------------------------------------------------------------------------------------------*/


 public function beneficiario($idtitular){
        //buscar tipo de logueo

      if (!$this->session->userdata('is_logued_in'))
       {
        redirect('login/', 'refresh');
       }else
       {
         $data = array( 'bd_activa' => 'default',
              'tipo_bd' => 1);
         $this->session->set_userdata($data); 


         $titular  = $this->titularmodel->show_titular_id($idtitular);
         $beneficiario  = $this->titularmodel->show_beneficiario($idtitular);

         $data = array(
                'beneficiario' => $beneficiario,
                'id_titular' => $idtitular,
                'nombre_titular' => $titular->nombres." ".$titular->apellidos,

            );

         $this->load->view('dashboard/header');
         $this->load->view('dashboard/menu');
         $this->load->view('control/index_beneficiario', $data );
         $this->load->view('dashboard/footer');
        }
    
    }// fin index


/*--------------------------------------------------------------------------------------------------------*/

      public function asignar_titular($idtitular){
        //buscar tipo de logueo

      if (!$this->session->userdata('is_logued_in'))
       {
        redirect('login/', 'refresh');
       }else
       {
         $data = array( 'bd_activa' => 'default',
              'tipo_bd' => 1);
         $this->session->set_userdata($data);


         $titular  = $this->titularmodel->show_titular_id($idtitular);
         $medicamento  = $this->productomodel->show_titular_medicina($idtitular);
         $producto  = $this->productomodel->show_producto();

         $data = array(
                'id_titular' => $idtitular,
                'nombre_titular' => $titular->nombres." ".$titular->apellidos,
                'medicamento' => $medicamento,
                'producto' => $producto,
            ); 

         $this->load->view('dashboard/header');
         $this->load->view('dashboard/menu');
         $this->load->view('control/asignar', $data);
         $this->load->view('dashboard/footer');
        }
    
    }// fin index

 /*--------------------------------------------------------------------------------------------------------*/
    public function store_titular()
    {     
         $data = array(
                'titulare_id' => $this->input->post('titulare_id', TRUE),
                'beneficiario_id' => 0,
                'producto_id' => $this->input->post('producto_id', TRUE),
              
            );

        if($this->productomodel->crear_asignacion($data))
        {  
            redirect('control/asignar_titular/'.$this->input->post('titulare_id', TRUE),'refresh');
        }
        else
        {       
            redirect('control/asignar_titular/'.$this->input->post('titulare_id', TRUE),'refresh');
        }
    }


 /*--------------------------------------------------------------------------------------------------------*/
 
    public function destroy_titular($titular,$id)
    {
        if($this->productomodel->destroy_asignacion($id))
        {
             redirect('control/asignar_titular/'.$titular);
        }
        else
        {
              redirect('control/asignar_titular/'.$titular);
        }
    }






    /*--------------------------------------------------------------------------------------------------------*/

      public function asignar_beneficiario($idtitular, $idbeneficiario){
        //buscar tipo de logueo

      if (!$this->session->userdata('is_logued_in'))
       {
        redirect('login/', 'refresh');
       }else
       {
         $data = array( 'bd_activa' => 'default',
              'tipo_bd' => 1);
         $this->session->set_userdata($data);


         $titular  = $this->titularmodel->show_beneficiario_id($idbeneficiario);
         $medicamento  = $this->productomodel->show_beneficiario_medicina($idtitular, $idbeneficiario);
         $producto  = $this->productomodel->show_producto();

         $data = array(
                'id_titular' => $idtitular,
                 'id_beneficiario' => $idbeneficiario,
                'nombre_titular' => $titular->nombres." ".$titular->apellidos,
                'medicamento' => $medicamento,
                'producto' => $producto,
            ); 

         $this->load->view('dashboard/header');
         $this->load->view('dashboard/menu');
         $this->load->view('control/asignar_beneficiario', $data);
         $this->load->view('dashboard/footer');
        }
    
    }// fin index

 /*--------------------------------------------------------------------------------------------------------*/
    public function store_beneficiario()
    {     
         $data = array(
                'titulare_id' => $this->input->post('titulare_id', TRUE),
                'beneficiario_id' => $this->input->post('beneficiario_id', TRUE),
                'producto_id' => $this->input->post('producto_id', TRUE),
              
            );

        if($this->productomodel->crear_asignacion($data))
        {  
            redirect('control/asignar_beneficiario/'.$this->input->post('titulare_id', TRUE).'/'.$this->input->post('beneficiario_id', TRUE),'refresh');
        }
        else
        {       
            redirect('control/asignar_beneficiario/'.$this->input->post('titulare_id', TRUE).'/'.$this->input->post('beneficiario_id', TRUE),'refresh');
        }
    }


 /*--------------------------------------------------------------------------------------------------------*/
 
    public function destroy_beneficiario($titular,$idbeneficiario, $id)
    {
        if($this->productomodel->destroy_asignacion($id))
        {
             redirect('control/asignar_beneficiario/'.$titular.'/'.$idbeneficiario);
        }
        else
        {
              redirect('control/asignar_beneficiario/'.$titular.'/'.$idbeneficiario);
        }
    }


/*--------------------------------------------------------------------------------------------------------*/

      public function buscar($id_medicamento = null){
        //buscar tipo de logueo

      if (!$this->session->userdata('is_logued_in'))
       {
        redirect('login/', 'refresh');
       }else
       {
         $data = array( 'bd_activa' => 'default',
              'tipo_bd' => 1);
         $this->session->set_userdata($data);


         if ($id_medicamento == null){

             $sw = 1;
              $medicamento = null;
         }else
         {
              $sw = 0;
             $medicamento  = $this->productomodel->show_medicina_all($this->input->post('producto_id', TRUE));
         }

        
         $producto  = $this->productomodel->show_producto();

         $data = array(
                'medicamento' => $medicamento,
                'producto' => $producto,
                 'sw' => $sw,
            ); 

         $this->load->view('dashboard/header');
         $this->load->view('dashboard/menu');
         $this->load->view('control/buscar', $data);
         $this->load->view('dashboard/footer');
        }
    
    }// fin index

 /*--------------------------------------------------------------------------------------------------------*/


 
}
