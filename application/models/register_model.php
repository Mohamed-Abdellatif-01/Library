<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class register_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }


  function register() {
    $data = array(
          'UserName' => $this->input->post("UserName"),
          'Password' => $this->input->post("Password"),
          'FirstName' => $this->input->post("FirstName"),
          'LastName' => $this->input->post("LastName")
  );

  $this->db->insert('account', $data);
  return 1;
  }

}
