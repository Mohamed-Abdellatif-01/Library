<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class authors_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }

  function get_all_authors(){
    $sql = "select * from libauthors";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }


  function searchAuthorByName($AuthorName) {
      $sql = "select * from libauthors where AuthorName LIKE '%{$AuthorName}%'";
      $query = $this->db->query($sql, $AuthorName);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }


    function addAuthor() {
        $data = array(
              'AuthorID' => $this->input->post("AuthorID"),
              'AuthorName' => $this->input->post("AuthorName"),

      );

      $this->db->insert('libauthors', $data);
      return 1;
      }

      function deleteauthor($id) {
        $sql = "delete from libauthors where AuthorID = $id";
    $query = $this->db->query($sql);
        return 1;
        }









}
