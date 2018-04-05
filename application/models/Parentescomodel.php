<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Parentescomodel extends CI_Model {

	public function __construct()
    {
      //parent::__construct();
      //Codeigniter : Write Less Do More
      //Revisar  
      $this->load->model(array('menumodel'));
    }

    public function show_parentesco()
    {
      $db_admin = $this->load->database($this->session->userdata('bd_activa'), TRUE);

    	$db_admin->select('*');
      $db_admin->order_by('nombre');
    	return $db_admin->get('parentesco')->result();
      $db_admin->close();
    }


}