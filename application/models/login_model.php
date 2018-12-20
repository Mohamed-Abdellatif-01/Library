<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class login_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }

  function loginpass($UserName, $Password)
  {
    $sql = "select * from account where UserName ='$UserName' AND Password='$Password'";
    $query = $this->db->query($sql);
    if(count($query->result()) == 1)
    {
        return true;
    }
    else {
      return 0;
    }
  }



}
