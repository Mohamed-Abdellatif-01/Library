<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class editions_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }

  function addeditionby_id($id) {
      $data = array(
            'ISBN' => $this->input->post("ISBN"),
            'EditionNum' => $this->input->post("EditionNum"),
            'PrintDate' => $this->input->post("PrintDate"),
            'BookID' => $this->input->post("BookID")


    );

    $this->db->insert('edition', $data);
    return 1;
    }




}
