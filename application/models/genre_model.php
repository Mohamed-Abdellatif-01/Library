<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class genre_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }

  function get_all_genres(){
    $sql = "select * from genre";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }

  function searchGenreByName($GenreName) {
      $sql = "select * from genre where GenreName LIKE '%{$GenreName}%'";
      $query = $this->db->query($sql, $GenreName);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }

    function addgenre() {
        $data = array(

              'GenreName' => $this->input->post("GenreName"),

      );

      $this->db->insert('Genre', $data);
      return 1;
      }

      function deletegenre($id) {
        $sql = "delete from genre where GenreID = $id";
    $query = $this->db->query($sql);
        return 1;
        }









}

?>
