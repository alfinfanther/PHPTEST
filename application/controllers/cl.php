<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Cl extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper("url");
		$this->data["base"] = $this->config->item('base_url');	
                session_start();
    }
    
    function logout(){
          session_destroy();
            redirect('login');
    }
}
