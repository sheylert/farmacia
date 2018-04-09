<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuariomodel extends CI_Model {

    public function __construct() {
        //parent::__construct();
    }

    public function login_usuario($username, $password) {
        
        $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

        $db_admin->where('login', $username);
        $db_admin->where('password', $password);
        $db_admin->select('usuario.*');
        $query = $db_admin->get('usuario');     
        
        if ($query->num_rows() == 1) {
            $db_admin->close();
            return $query->row();

        } else {

            $db_admin->close();
            
            $this->session->set_flashdata('type','danger');
            $this->session->set_flashdata('message','Sus credenciales son Incorrectas');
          redirect(base_url() . 'index.php/login', 'refresh');
        }
    }

    /*------------------------------------------------------------------------------------*/

     public function show_usuario()
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

       $db_admin->select('u.*, p.nombre as permiso');
       $db_admin->from('usuario as u');
       $db_admin->join('permisos as p', 'u.id_permiso = p.id');

      return $db_admin->get()->result();

      $db_admin->close();
    } 

     /*------------------------------------------------------------------------------------*/

      public function crear_usuario($datos)
    {
     $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

    if($db_admin->insert('usuario',$datos))
      {  return true;
      }else
      {  return false; } 
    
    }

    /*------------------------------------------------------------------------------------*/






    public function count_users()
    {
        $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

        return $db_admin->count_all('usuario');
        $db_admin->close();
    }


   

     public function actualizar_registro($id,$datos)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

      $db_admin->where('id',$id);
      if($db_admin->update('usuario',$datos))
      {
        return true;
      }
      else
      {
        return false;
      }
    } 

    


    public function usuario_info($id)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

      $db_admin->where('u.id',$id);
      $db_admin->select('u.*,ui.*,perfil.nombre as perfil, ui.nombre as centro');
      $db_admin->from('usuario as u');
      $db_admin->join('usuario_info as ui','ui.id_usuario = u.id','left');
      $db_admin->join('perfil','perfil.id = u.id_permiso');
      return $db_admin->get()->row();

      $db_admin->close();
      
    } 

    public function usuario_user($id)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

      $db_admin->select('u.*');
      $db_admin->from('usuario as u');
      $db_admin->where('u.id',$id);

      return $db_admin->get()->row();

      $db_admin->close();
      
    } 

    public function guardar_informacion_usuario($arreglo)
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);
      
      if(!empty($arreglo['password']))
      {
        $arreglo_user = ['password' => $arreglo['password']];

        $db_admin->where('id',$arreglo['id_usuario']);
        $db_admin->update('usuario',$arreglo_user);
      }
        
      unset($arreglo['password']);

      $db_admin->where('id_usuario',$arreglo['id_usuario']);

      if($db_admin->update('usuario_info',$arreglo))
      {
        $db_admin->close(); 
        return true;
      }
      else
      {
        $db_admin->close(); 
        return false;
      }
    }

    public function uploadImg($id,$imagen)
    {
      // función para subir una imagen a la foto de perfil
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

      $db_admin->where('id_usuario',$id);
      $db_admin->update('usuario_info',['imagen' => $imagen]);

      $db_admin->close();
    }

    public function registro_ultimo_logueo()
    {
      // función para actualizar el último logueo del usuario

      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

      $db_admin->where('id',$this->session->userdata('id_usuario'));
      $db_admin->update('usuario',['fecha_acceso' => date('Y-m-d H:i:s', strtotime('-4 hour')) ] );
    }




   

}
