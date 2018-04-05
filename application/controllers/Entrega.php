<?php
/**
 * Controlador del inicio 
 * @author sistemaweb21. 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrega extends CI_Controller {
/*---------------------------------------------------------------------*/
    public function __construct() {
         parent::__construct();
         $this->load->model(array('usuariomodel', 'perfilmodel', 'titularmodel', 'parentescomodel', 'productomodel'));
    }

/*---------------------------------------------------------------------*/
      public function index($buscar = null){
        //buscar tipo de logueo

      if (!$this->session->userdata('is_logued_in'))
       {
        redirect('login/', 'refresh');
       }else
       {
         $data = array( 'bd_activa' => 'default',
              'tipo_bd' => 1);
         $this->session->set_userdata($data);


         if ($buscar == null){

               $sw = 1;
              $titulares = null;
         }else
         {
             $sw = 0;
             $titulares  = $this->titularmodel->show_titular_cedula($this->input->post('cedula', TRUE));
         }
 
   
         $data = array(
                'titular' => $titulares,
                 'sw' => $sw,
            ); 

         $this->load->view('dashboard/header');
         $this->load->view('dashboard/menu');
         $this->load->view('entrega/buscar', $data);
         $this->load->view('dashboard/footer');
        }
    
    }// fin index

 /*--------------------------------------------------------------------------------------------------------*/
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

         $producto  = $this->productomodel->show_entregas_todas();

         $this->load->view('dashboard/header');
         $this->load->view('dashboard/menu');
         $this->load->view('entrega/listado',['producto' => $producto]);
         $this->load->view('dashboard/footer');
        }
    
    }// fin index


 /*--------------------------------------------------------------------------------------------------------*/


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
         $this->load->view('entrega/index_beneficiario', $data );
         $this->load->view('dashboard/footer');
        }
    
    }// fin index


/*--------------------------------------------------------------------------------------------------------*/

   public function entrega_titular($idtitular)
   {    

        $producto  = $this->productomodel->show_producto();
        $titular  = $this->titularmodel->show_titular_id($idtitular);


        $this->load->view('dashboard/header');
        $this->load->view('dashboard/menu');
        $this->load->view('entrega/form',['register' => null, 'titular' =>  $titular, 'producto' => $producto]);
        $this->load->view('dashboard/footer');
   }

   /*---------------------------------------------------------------------------------------------------------*/

   /*--------------------------------------------------------------------------------------------------------*/

   public function entrega_beneficiario($idtitular, $idbeneficiario)
   {    

        $producto  = $this->productomodel->show_producto();
        $titular  = $this->titularmodel->show_titular_id($idtitular);
         $beneficiario  = $this->titularmodel->show_beneficiario_id($idbeneficiario);


        $this->load->view('dashboard/header');
        $this->load->view('dashboard/menu');
        $this->load->view('entrega/form_beneficiario',['register' => null, 'titular' =>  $titular, 
            'producto' => $producto, 'beneficiario' =>  $beneficiario]);
        $this->load->view('dashboard/footer');
   }

   /*---------------------------------------------------------------------------------------------------------*/




   public function entrega_producto($identrega)
   {    
        $entrega  = $this->productomodel->show_entrega($identrega);
        $producto  = $this->productomodel->show_producto();
        $entrega_titular  = $this->productomodel->show_entrega_all($identrega);

        $this->load->view('dashboard/header');
        $this->load->view('dashboard/menu');
        $this->load->view('entrega/form_entrega',['register' => null, 'entrega' =>  $entrega, 
                                                  'producto' => $producto, 'entrega_pro' => $entrega_titular]);
        $this->load->view('dashboard/footer');
   }

   /*---------------------------------------------------------------------------------------------------------*/


   public function entrega_producto_beneficiario($identrega)
   {    
        $entrega  = $this->productomodel->show_entrega_beneficiario($identrega);
        $producto  = $this->productomodel->show_producto();
        $entrega_titular  = $this->productomodel->show_entrega_all($identrega);

        $this->load->view('dashboard/header');
        $this->load->view('dashboard/menu');
        $this->load->view('entrega/form_entrega_beneficiario',['register' => null, 'entrega' =>  $entrega, 
                                                  'producto' => $producto, 'entrega_pro' => $entrega_titular]);
        $this->load->view('dashboard/footer');
   }

   /*---------------------------------------------------------------------------------------------------------*/


    public function store()
    {

        $titulare_id = $this->input->post('titulare_id', TRUE);
        $beneficiario_id = $this->input->post('beneficiario_id', TRUE);
        $fecha = $this->input->post('fecha', TRUE);
        
         $data = array(
                'titulare_id' => $titulare_id,
                'beneficiario_id' =>  $beneficiario_id,
                'fecha' => $fecha,
            );

        if($this->productomodel->crear_entrega($data))
        {  
            $producto  = $this->productomodel->show_entregado_max();
            redirect('entrega/entrega_producto/'.$producto->id,'refresh');
        }
        else
        {       
            redirect('entrega','refresh');
        }
    }

    /*---------------------------------------------------------------------------------------------------------*/

     public function store_beneficiario()
    {

        $titulare_id = $this->input->post('titulare_id', TRUE);
        $beneficiario_id = $this->input->post('beneficiario_id', TRUE);
        $fecha = $this->input->post('fecha', TRUE);
        
         $data = array(
                'titulare_id' => $titulare_id,
                'beneficiario_id' =>  $beneficiario_id,
                'fecha' => $fecha,
            );

        if($this->productomodel->crear_entrega($data))
        {  
            $producto  = $this->productomodel->show_entregado_max();
            redirect('entrega/entrega_producto_beneficiario/'.$producto->id,'refresh');
        }
        else
        {       
            redirect('entrega','refresh');
        }
    }



 /*---------------------------------------------------------------------------------------------------------*/

    public function store_entregado()
    {

        $entrega_id = $this->input->post('entrega_id', TRUE);
        $producto_id = $this->input->post('producto_id', TRUE);
        $cantidad = $this->input->post('cantidad', TRUE);
        
         $data = array(
                'entrega_id' => $entrega_id,
                'producto_id' =>  $producto_id,
                'cantidad' =>  $cantidad,
            );

        if($this->productomodel->crear_entrega_producto($data))
        {  
            redirect('entrega/entrega_producto/'.$entrega_id,'refresh');
        }
        else
        {       
            redirect('entrega','refresh');
        }
    }

    /*---------------------------------------------------------------------------------------------------------*/

     public function destroy($entrega,$id)
    {
        if($this->productomodel->destroy_entrega($id))
        {
             redirect('entrega/entrega_producto/'.$entrega,'refresh');
        }
        else
        {
             redirect('entrega/entrega_producto/'.$entrega,'refresh');
        }
    }

 /*---------------------------------------------------------------------------------------------------------*/

    public function store_entregado_bene()
    {

        $entrega_id = $this->input->post('entrega_id', TRUE);
        $producto_id = $this->input->post('producto_id', TRUE);
        $cantidad = $this->input->post('cantidad', TRUE);
        
         $data = array(
                'entrega_id' => $entrega_id,
                'producto_id' =>  $producto_id,
                'cantidad' =>  $cantidad,
            );

        if($this->productomodel->crear_entrega_producto($data))
        {  
            redirect('entrega/entrega_producto_beneficiario/'.$entrega_id,'refresh');
        }
        else
        {       
            redirect('entrega','refresh');
        }
    }

    /*---------------------------------------------------------------------------------------------------------*/

   public function destroy_bene($entrega,$id)
    {
        if($this->productomodel->destroy_entrega($id))
        {
             redirect('entrega/entrega_producto_beneficiario/'.$entrega,'refresh');
        }
        else
        {
             redirect('entrega/entrega_producto_beneficiario/'.$entrega,'refresh');
        }
    }

 /*---------------------------------------------------------------------------------------------------------*/

 
}
