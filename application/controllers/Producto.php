<?php
/**
 * Controlador del inicio 
 * @author sistemaweb21. 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {
/*---------------------------------------------------------------------*/
    public function __construct() {
         parent::__construct();
         $this->load->model(array('productomodel'));
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

         $producto  = $this->productomodel->show_producto();

         $this->load->view('dashboard/header');
         $this->load->view('dashboard/menu');
         $this->load->view('producto/index',['producto' => $producto]);
         $this->load->view('dashboard/footer');
        }
    
    }// fin index


 /*--------------------------------------------------------------------------------------------------------*/
   public function create()
   {    
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/menu');
        $this->load->view('producto/form',['register' => null]);
        $this->load->view('dashboard/footer');
   }

   /*---------------------------------------------------------------------------------------------------------*/

    public function store()
    {

        $nombre = $this->input->post('nombre', TRUE);
        $descripcion = $this->input->post('descripcion', TRUE);
        
         $data = array(
                'activo' => $this->input->post('activo', TRUE),
                'nombre' => $nombre,
                'descripcion' => $descripcion,
            );

        if($this->productomodel->crear_medicamento($data))
        {  
            redirect('producto/listado','refresh');
        }
        else
        {       
            redirect('producto/listado','refresh');
        }
    }

    /*---------------------------------------------------------------------------------------------------------*/

    public function editar($id){
        //buscar tipo de logueo

      if (!$this->session->userdata('is_logued_in'))
       {
        redirect('login/', 'refresh');
       }else
       {
         $data = array( 'bd_activa' => 'default',
              'tipo_bd' => 1);
         $this->session->set_userdata($data); 

         $producto  = $this->productomodel->show_medicamento_id($id);

         $data = array(
                'producto' => $producto,
                'id_medicamento' => $id,
            );

         $this->load->view('dashboard/header');
         $this->load->view('dashboard/menu');
         $this->load->view('producto/edit', $data );
         $this->load->view('dashboard/footer');
        }
    
    }// fin index

     /*---------------------------------------------------------------------------------------------------------*/

   public function update($id)
    {
        if($this->productomodel->actualizar_registro($id,$_POST))
        {
            redirect('producto/listado','refresh');
        }
        else
        {
            redirect('producto/listado','refresh');
        }
    }

    /*------------------------------------------------------------------*/

    public function destroy($id)
    {
        if($this->productomodel->destroy($id))
        {
            redirect('producto/listado','refresh');
        }
        else
        {
            redirect('producto/listado','refresh');
        }
    }
 
}
