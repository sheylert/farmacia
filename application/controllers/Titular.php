<?php
/**
 * Controlador del inicio 
 * @author sistemaweb21. 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Titular extends CI_Controller {
/*---------------------------------------------------------------------*/
    public function __construct() {
         parent::__construct();
         $this->load->model(array('usuariomodel', 'perfilmodel', 'titularmodel', 'parentescomodel'));
    }

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

         $titular  = $this->titularmodel->show_titular();

         $this->load->view('dashboard/header');
         $this->load->view('dashboard/menu');
         $this->load->view('titular/index',['titular' => $titular]);
         $this->load->view('dashboard/footer');
        }
    
    }// fin index

    /*---------------------------------------------------------------------------------------------------------*/


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
         $this->load->view('beneficiario/index', $data );
         $this->load->view('dashboard/footer');
        }
    
    }// fin index



 /*--------------------------------------------------------------------------------------------------------*/
   public function create()
   {    
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/menu');
        $this->load->view('titular/form',['register' => null]);
        $this->load->view('dashboard/footer');
   }

   /*---------------------------------------------------------------------------------------------------------*/

    public function create_beneficiario($id_titular)
   {
        $parentesco  = $this->parentescomodel->show_parentesco();

        $this->load->view('dashboard/header');
        $this->load->view('dashboard/menu');
        $this->load->view('beneficiario/form',['register' => null, 'id_titular' => $id_titular, 'parentesco' => $parentesco]);
        $this->load->view('dashboard/footer');
   }

   /*---------------------------------------------------------------------------------------------------------*/

    public function store()
    {

        $cedula = $this->input->post('cedula', TRUE);
        $nombre = $this->input->post('nombre', TRUE);
        $apellido = $this->input->post('apellido', TRUE);
        
         $data = array(
                'sexo' => $this->input->post('sexo', TRUE),
                'fecha' => $this->input->post('fecha', TRUE),
                'cedula' => $cedula,
                'nombres' => $nombre,
                'apellidos' => $apellido,
            );

        if($this->titularmodel->crear_titular($data))
        {  
            redirect('titular/listado','refresh');
        }
        else
        {       
            redirect('titular/listado','refresh');
        }
    }


    /*---------------------------------------------------------------------------------------------------------*/

     public function store_beneficiario()
    {

        $cedula = $this->input->post('cedula', TRUE);
        $nombre = $this->input->post('nombre', TRUE);
        $apellido = $this->input->post('apellido', TRUE);
        $id_titular = $this->input->post('id_titular', TRUE);
        $parentesco = $this->input->post('parentesco', TRUE);
        
         $data = array(
                'sexo' => $this->input->post('sexo', TRUE),
                'fecha' => $this->input->post('fecha', TRUE),
                'cedula' => $cedula,
                'nombres' => $nombre,
                'apellidos' => $apellido,
                'titulare_id' => $id_titular,
                'parentesco_id' => $parentesco,
            );

        if($this->titularmodel->crear_beneficiario($data))
        {  
            redirect('titular/beneficiario/'.$id_titular,'refresh');
        }
        else
        {       
            redirect('titular/beneficiario/'.$id_titular,'refresh');
        }
    }


    /*---------------------------------------------------------------------------------------------------------*/

    public function editar($idtitular){
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

         $data = array(
                'titular' => $titular ,
                'id_titular' => $idtitular,
            );

         $this->load->view('dashboard/header');
         $this->load->view('dashboard/menu');
         $this->load->view('titular/edit', $data );
         $this->load->view('dashboard/footer');
        }
    
    }// fin index


   public function update($id)
    {
        if($this->titularmodel->actualizar_registro($id,$_POST))
        {
            redirect('titular/listado','refresh');
        }
        else
        {
            redirect('titular/listado','refresh');
        }
    }

    /*------------------------------------------------------------------*/

    public function destroy($id)
    {
        if($this->titularmodel->destroy($id))
        {
            redirect('titular/listado','refresh');
        }
        else
        {
            redirect('titular/listado','refresh');
        }
    }

 /*------------------------------------------------------------------*/

 public function editar_beneficiario($id, $idtitular){
        //buscar tipo de logueo

      if (!$this->session->userdata('is_logued_in'))
       {
        redirect('login/', 'refresh');
       }else
       {
         $data = array( 'bd_activa' => 'default',
              'tipo_bd' => 1);
         $this->session->set_userdata($data); 


         $titular  = $this->titularmodel->show_beneficiario_id($idtitular);

         $parentesco  = $this->parentescomodel->show_parentesco();


         $data = array(
                'titular' => $titular ,
                'id_titular' => $idtitular,
                'parentesco' => $parentesco,
                'id' => $id,
            );

         $this->load->view('dashboard/header');
         $this->load->view('dashboard/menu');
         $this->load->view('beneficiario/edit', $data );
         $this->load->view('dashboard/footer');
        }
    
    }// fin index

/*----------------------------------------------------------------------*/
  public function update_beneficiario($idtitular,$id)
    {
        if($this->titularmodel->actualizar_registro_bene($id,$_POST))
        {
            redirect('titular/beneficiario/'.$idtitular,'refresh');
        }
        else
        {
             redirect('titular/beneficiario/'.$idtitular,'refresh');
        }
    }

    /*------------------------------------------------------------------*/

    public function destroy_beneficiario($idtitular,$id)
    {
        if($this->titularmodel->destroy_beneficiario($id))
        {
             redirect('titular/beneficiario/'.$idtitular,'refresh');
        }
        else
        {
             redirect('titular/beneficiario/'.$idtitular,'refresh');
        }
    }

 /*------------------------------------------------------------------*/
 
}
