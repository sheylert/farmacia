<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Productomodel extends CI_Model {

    public function __construct() {
        //parent::__construct();
    }

    /*------------------------------------------------------------------------------------*/

     public function show_producto()
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

       $db_admin->select('t.*');
       $db_admin->from('productos as t');

      return $db_admin->get()->result();

      $db_admin->close();
    } 

   /*------------------------------------------------------------------------------------*/
 
     public function show_entregas_todas()
    {
       $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

       $db_admin->select('e.id as id, e.fecha as fecha, t.nombres as nombre, t.apellidos as apellido,
        t.cedula as cedula, b.nombres as nombreb, b.apellidos as apellidob,
        b.cedula as cedulab, e.beneficiario_id as beneficiario_id');
       $db_admin->from('entregados as e');
       $db_admin->join('titulares as t','t.id = .e.titulare_id');
        $db_admin->join('beneficiarios as b','b.id = e.beneficiario_id', 'left');
      
      

      return $db_admin->get()->result();
      $db_admin->close();

    } 

   /*------------------------------------------------------------------------------------*/

      public function crear_medicamento($datos)
     {
     $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

    if($db_admin->insert('productos',$datos))
      {  
          $this->session->set_flashdata('type','success');
          $this->session->set_flashdata('message','Beneficiario Eliminado Correctamente');
        return true;
      
      }else
      { 
       return false; } 

    }  
     /*------------------------------------------------------------------------------------*/


     public function crear_entrega($datos)
     {
     $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

    if($db_admin->insert('entregados',$datos))
      {  
          $this->session->set_flashdata('type','success');
          $this->session->set_flashdata('message','Entrega Registrada Correctamente');
        return true;
      
      }else
      { 
       return false; } 

    }  

   /*------------------------------------------------------------------------------------*/
 
     public function crear_entrega_producto($datos)
     {
     $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

    if($db_admin->insert('entregaproducto',$datos))
      {  
          $this->session->set_flashdata('type','success');
          $this->session->set_flashdata('message','Entrega Registrada Correctamente');
        return true;
      
      }else
      { 
       return false; } 

    }  

      /*------------------------------------------------------------------------------------*/
 
     public function show_entregado_max()
    {
    
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

       $db_admin->select('id');
       $db_admin->from('entregados');
       $db_admin->limit(1);
       $db_admin->order_by('id', 'DESC' );

      return $db_admin->get()->row();

      $db_admin->close();
    } 


      /*------------------------------------------------------------------------------------*/
  
       public function show_entrega($id)
    {
    
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

       $db_admin->select('e.id as id, e.fecha as fecha, t.nombres as nombre, t.apellidos as apellido,
        t.cedula as cedula');
       $db_admin->from('entregados as e');
       $db_admin->join('titulares as t','t.id = .e.titulare_id');
       $db_admin->where('e.id',$id);
      

      return $db_admin->get()->row();

      $db_admin->close();
    } 

     /*------------------------------------------------------------------------------------*/
  
       public function show_entrega_all($id)
    {
    
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

       $db_admin->select('e.*, t.nombre as producto, t.descripcion as descripcion');
       $db_admin->from('entregaproducto as e');
       $db_admin->join('productos as t','t.id = .e.producto_id');
       $db_admin->where('e.entrega_id',$id);
      
      return $db_admin->get()->result();

      $db_admin->close();
    } 


     /*------------------------------------------------------------------------------------*/
  
       public function show_entrega_beneficiario($id)
    {
    
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

       $db_admin->select('e.id as id, e.fecha as fecha, t.nombres as nombre, t.apellidos as apellido,
        t.cedula as cedula, b.nombres as nombreb, b.apellidos as apellidob,
        b.cedula as cedulab');
       $db_admin->from('entregados as e');
       $db_admin->join('titulares as t','t.id = .e.titulare_id');
        $db_admin->join('beneficiarios as b','b.id = e.beneficiario_id');
       $db_admin->where('e.id',$id);
      

      return $db_admin->get()->row();

      $db_admin->close();
    } 

     /*------------------------------------------------------------------------------------*/


    

      /*------------------------------------------------------------------------------------*/
 

    public function show_medicamento_id($id_medicamento)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

       $db_admin->select('t.*');
       $db_admin->from('productos as t');
      $db_admin->where('t.id', $id_medicamento);

      return $db_admin->get()->row();

      $db_admin->close();
    } 

 /*------------------------------------------------------------------------------------*/


     public function actualizar_registro($id,$datos)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

      $db_admin->where('id',$id);
      if($db_admin->update('productos',$datos))
      {
         $this->session->set_flashdata('type','success');
        $this->session->set_flashdata('message','Se actualizo Correctamente el Medicamento');
        return true;
      }
      else
      {
        return false;
      }

      $db_admin->close();
    }

    /*------------------------------------------------------------------------------------*/

    public function destroy($id)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

      $db_admin->where('producto_id',$id);
      $db_admin->select('*');
      $result = $db_admin->get('medicinas');

      if($result->num_rows() > 0)
      {
          $this->session->set_flashdata('type','danger');
          $this->session->set_flashdata('message','No se puede Eliminar el Medicamento si tiene una entrega en el sistema');
        return false;
      }
      else
      {
        $db_admin->where('id',$id);
        $db_admin->delete('productos');

          $this->session->set_flashdata('type','success');
          $this->session->set_flashdata('message','Medicamento Eliminado Correctamente');

           return true;

        $db_admin->close();

      }
    }

   /*------------------------------------------------------------------------------------*/

      public function show_titular_medicina($id)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

       $db_admin->select('t.*, p.nombre medicamento');
       $db_admin->from('medicinas as t');
       $db_admin->join('productos as p','p.id = t.producto_id');
       $db_admin->where('t.titulare_id',$id);


      return $db_admin->get()->result();

      $db_admin->close();
    } 


 /*------------------------------------------------------------------------------------*/

      public function show_medicina_all($id)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

       $db_admin->select('t.*, p.nombre medicamento, titu.nombres nombretitular, titu.apellidos apellidotitular,
        bene.nombres nombrebene, bene.apellidos apellidobene, titu.cedula cedulatitular,
        bene.cedula cedulabene');
       $db_admin->from('medicinas as t');
       $db_admin->join('titulares as titu','titu.id = t.titulare_id');
       $db_admin->join('beneficiarios as bene','bene.id = t.beneficiario_id','left');
       $db_admin->join('productos as p','p.id = t.producto_id');
       $db_admin->where('t.producto_id',$id);

      return $db_admin->get()->result();

      $db_admin->close();
    } 

    


   /*------------------------------------------------------------------------------------*/

 
      public function show_beneficiario_medicina($id, $id_beneficiario)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

       $db_admin->select('t.*, p.nombre medicamento');
       $db_admin->from('medicinas as t');
       $db_admin->join('productos as p','p.id = t.producto_id');
       $db_admin->where('t.titulare_id',$id);
       $db_admin->where('t.beneficiario_id',$id_beneficiario);


      return $db_admin->get()->result();

      $db_admin->close();
    } 

   /*------------------------------------------------------------------------------------*/


      public function crear_asignacion($datos)
     {
     $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

      $db_admin->where('producto_id', $datos['producto_id']);
      $db_admin->where('beneficiario_id', $datos['beneficiario_id']);
      $db_admin->where('titulare_id',$datos['titulare_id']);
      $db_admin->select('*');
      $result = $db_admin->get('medicinas');

      if($result->num_rows() > 0)
      {
          $this->session->set_flashdata('type','danger');
          $this->session->set_flashdata('message','Ya ese medicamento lo tiene Asignado');
        return false;
      }

    if($db_admin->insert('medicinas',$datos))
      {  
          $this->session->set_flashdata('type','success');
          $this->session->set_flashdata('message','Asignacion de Medicamento Correctamente');
        return true;
      
      }else
      { 
       return false; } 

    }  
     /*------------------------------------------------------------------------------------*/

    public function destroy_asignacion($id)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

        $db_admin->where('id',$id);
        $db_admin->delete('medicinas');

          $this->session->set_flashdata('type','success');
          $this->session->set_flashdata('message','Medicamento Eliminado Correctamente');

           return true;

        $db_admin->close();

      }
   /*------------------------------------------------------------------------------------*/


      /*------------------------------------------------------------------------------------*/

    public function destroy_entrega($id)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

        $db_admin->where('id',$id);
        $db_admin->delete('entregaproducto');

          $this->session->set_flashdata('type','success');
          $this->session->set_flashdata('message','Medicamento Eliminado Correctamente');

           return true;

        $db_admin->close();

      }
   /*------------------------------------------------------------------------------------*/

}
