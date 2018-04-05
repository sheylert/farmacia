<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Titularmodel extends CI_Model {

    public function __construct() {
        //parent::__construct();
    }

    /*------------------------------------------------------------------------------------*/

     public function show_titular()
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

       $db_admin->select('t.*');
       $db_admin->from('titulares as t');

      return $db_admin->get()->result();

      $db_admin->close();
    } 


    public function show_titular_id($id_titular)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

       $db_admin->select('t.*');
       $db_admin->from('titulares as t');
      $db_admin->where('t.id', $id_titular);

      return $db_admin->get()->row();

      $db_admin->close();
    } 

     public function show_titular_cedula($cedula)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

       $db_admin->select('t.*');
       $db_admin->from('titulares as t');
      $db_admin->where('t.cedula', $cedula);

      return $db_admin->get()->result();

      $db_admin->close();
    } 


    public function show_beneficiario_id($id_titular)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

       $db_admin->select('t.*');
       $db_admin->from('beneficiarios as t');
      $db_admin->where('t.id', $id_titular);

      return $db_admin->get()->row();

      $db_admin->close();
    } 


     public function show_beneficiario($id_titular)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

       $db_admin->select('b.*, p.nombre parentesco');
       $db_admin->from('beneficiarios as b');
        $db_admin->join('parentesco as p','p.id = b.parentesco_id');
        $db_admin->where('b.titulare_id', $id_titular);


      return $db_admin->get()->result();

      $db_admin->close();
    } 

     /*------------------------------------------------------------------------------------*/

      public function crear_titular($datos)
    {
     $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

    if($db_admin->insert('titulares',$datos))
      {  
         $this->session->set_flashdata('type','success');
          $this->session->set_flashdata('message','Titular registrado Correctamente');
        return true;
      }else
      {  return false; } 
    
    }
     /*------------------------------------------------------------------------------------*/

     public function crear_beneficiario($datos)
    {
     $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

    if($db_admin->insert('beneficiarios',$datos))
      {  

         $this->session->set_flashdata('type','success');
          $this->session->set_flashdata('message','Beneficiario registrado Correctamente');
        return true;
      }else
      {  return false; } 
    
    }

    /*------------------------------------------------------------------------------------*/ 



     public function actualizar_registro($id,$datos)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

      $db_admin->where('id',$id);
      if($db_admin->update('titulares',$datos))
      {
         $this->session->set_flashdata('type','success');
        $this->session->set_flashdata('message','Se actualizo Correctamente el Titular');
        return true;
      }
      else
      {
        return false;
      }

      $db_admin->close();
    }


       /*------------------------------------------------------------------------------------*/ 



  public function actualizar_registro_bene($id,$datos)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

      $db_admin->where('id',$id);
      if($db_admin->update('beneficiarios',$datos))
      {
        $this->session->set_flashdata('type','success');
        $this->session->set_flashdata('message','Se actualizo Correctamente el Beneficiario');
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

      $db_admin->where('titulare_id',$id);
      $db_admin->select('*');
      $result = $db_admin->get('beneficiarios');

      if($result->num_rows() > 0)
      {
          $this->session->set_flashdata('type','danger');
          $this->session->set_flashdata('message','No se puede Eliminar Titular si tiene carga familiar');
        return false;
      }
      else
      {
        $db_admin->where('id',$id);
        $db_admin->delete('titulares');

          $this->session->set_flashdata('type','success');
          $this->session->set_flashdata('message','Titular Eliminado Correctamente');

           return true;

        $db_admin->close();

      }
    }


      /*------------------------------------------------------------------------------------*/


     public function destroy_beneficiario($id)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

        $db_admin->where('id',$id);
        $db_admin->delete('beneficiarios');

          $this->session->set_flashdata('type','success');
          $this->session->set_flashdata('message','Beneficiario Eliminado Correctamente');

           return true;

        $db_admin->close();

      }

}
