<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class items_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function get_all_items() {
  //  $sql = "SELECT * FROM (((((
    //  (bookauthor inner join items on bookauthor.BookID=items.BookID )
    //  inner join libauthors on bookauthor.AuthorID=libauthors.AuthorID)
    //  inner join genre_has_books on genre_has_books.BookID=items.BookID)
    //  inner join genre on genre_has_books.GenreID=genre.GenreID)
    //  INNER JOIN books_has_type ON books_has_type.BookID=items.BookID)
    //  INNER JOIN type ON books_has_type.TypeID=type.TypeID)
    //  INNER JOIN edition on items.BookID=edition.BookID

  //  ";
   $sql = "select * from items";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// search for books by name
  function showbookdetails($id) {
    $sql = " SELECT items.BookID, items.BookTittle, items.PublishingDate,
     items.NumOfPages, items.Quantity, items.BestOfCollection, edition.EditionNum, edition.ISBN, edition.PrintDate,
     GROUP_CONCAT( libauthors.AuthorName SEPARATOR ',') BookAuthors
     FROM ( (library.bookauthor inner join library.items on bookauthor.BookID=items.BookID )
      inner join library.libauthors on bookauthor.AuthorID=libauthors.AuthorID)
     INNER JOIN library.edition on items.BookID=edition.BookID where items.BookID=$id group by items.BookID";
    $query = $this->db->query($sql, $id);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }


  

  function showbookdetailsgenre($id) {
    $sql = " select  GROUP_CONCAT( genre.GenreName SEPARATOR ',') Bookgenres from (library.items inner join library.genre_has_books on items.BookID=genre_has_books.BookID)
     inner join library.genre on genre_has_books.GenreID=genre.GenreID where items.BookID=$id group by items.BookID";
    $query = $this->db->query($sql, $id);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }

  function showbookdetailstype($id) {
    $sql = "  select GROUP_CONCAT( type.NameOfType SEPARATOR ',') Booktypes from (library.items inner join library.books_has_type on items.BookID=books_has_type.BookID)
    inner join library.type on books_has_type.TypeID=type.TypeID where items.BookID=$id group by items.BookID";
    $query = $this->db->query($sql, $id);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


  function searchItemsByName($BookTittle) {
    $sql = "SELECT * FROM (((((
      (bookauthor inner join items on bookauthor.BookID=items.BookID )
      inner join libauthors on bookauthor.AuthorID=libauthors.AuthorID)
      inner join genre_has_books on genre_has_books.BookID=items.BookID)
      inner join genre on genre_has_books.GenreID=genre.GenreID)
      INNER JOIN books_has_type ON books_has_type.BookID=items.BookID)
      INNER JOIN type ON books_has_type.TypeID=type.TypeID)
      INNER JOIN edition on items.BookID=edition.BookID where BookTittle LIKE '%{$BookTittle}%'";
    $query = $this->db->query($sql, $BookTittle);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// get genre for book by id
  function getgenreDetailsbyID($id)
    {
      $sql = "select * from genre_has_books where BookID=$id";
        $query = $this->db->query($sql);
          $results = array();
          foreach ($query->result() as $result) {
            $results[] = $result;
          }
          return $results;
        }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// get types for book by id
        function getbooktypebyID($id)
          {
            $sql = "select * from books_has_type where BookID=$id";
              $query = $this->db->query($sql);
                $results = array();
                foreach ($query->result() as $result) {
                  $results[] = $result;
                }
                return $results;
              }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//get books by id
function getbookDetailsbyID($id)
  {
    $sql = "select * from items inner join edition on items.BookID=edition.BookID where items.BookID=$id";
    $query = $this->db->query($sql);
    return $query->result();
  }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        function getbookauthorbyID($id)
          {
            $sql = "select * from bookauthor where BookID=$id";
              $query = $this->db->query($sql);
                $results = array();
                foreach ($query->result() as $result) {
                  $results[] = $result;
                }
                return $results;
              }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  function additems() {
      $data = array(
            'BookTittle' => $this->input->post("BookTittle"),
            'NumOfPages' => $this->input->post("NumOfPages"),
            'PublishingDate' => $this->input->post("PublishingDate"),
            'Quantity' => $this->input->post("Quantity"),
            'BestOfCollection' => $this->input->post("BestOfCollection"),

    );


    $this->db->insert('items', $data);
    $lastBookID =$this->db->insert_id();



            $isbn =  $this->input->post("ISBN");
            $bookid = $lastBookID;
            $editionnum = $this->input->post("EditionNum");
            $printdate = $this->input->post("PrintDate");


     $sql = "insert into edition (BookID, ISBN, EditionNum, PrintDate) VALUES ($bookid, $isbn, $editionnum, '$printdate')";

     $query = $this->db->query($sql);

   $types = $this->input->post("type");
  foreach($types as $type)
  {
    $data = array(
            'BookID' => $lastBookID,
            'TypeID' => $type,
    );
    $this->db->insert('books_has_type', $data);
  }

  $authors = $this->input->post("libauthors");
foreach($authors as $author)
{
  $data = array(
          'BookID' => $lastBookID,
          'AuthorID' => $author,
  );
  $this->db->insert('bookauthor', $data);
}
$genres = $this->input->post("genre");
foreach($genres as $genre)
{
$data = array(
        'BookID' => $lastBookID,
        'GenreID' => $genre,
);
$this->db->insert('genre_has_books', $data);
}

    return 1;

    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function getgenres() {
      $sql = "select * from genre";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function getauthors() {
      $sql = "select * from libauthors";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function geteditions() {
      $sql = "select * from edition";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function gettypes() {
      $sql = "select * from type";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function getbest() {
      $sql = "select items.BestOfCollection from items";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function updateitem() {
    $id = $this->input->post("BookID");
    $name = $this->input->post("BookTittle");
    $pages = $this->input->post("NumOfPages");
    $pubdate = $this->input->post("PublishingDate");
    $qun = $this->input->post("Quantity");
    $best = $this->input->post("BestOfCollection");



    $sql = "update items
    set BookTittle='$name',
    NumOfPages=$pages,
    PublishingDate='$pubdate',
    Quantity=$qun,
    BestOfCollection='$best'
    where BookID=$id";
    $query = $this->db->query($sql);


    $isbn = $this->input->post("ISBN");
    $edition = $this->input->post("EditionNum");
    $print = $this->input->post("PrintDate");


    $sql = "update edition
    set ISBN=$isbn,
    EditionNum=$edition,
    PrintDate='$print'
    where BookID=$id";
    $query = $this->db->query($sql);


    $sql = "delete from bookauthor where BookID = $id";
    $query = $this->db->query($sql);

    $authors = $this->input->post("libauthors");
    if(!isset($authors))
    {
      return 1;
    }
    foreach($authors as $author)
    {

      $data = array(
              'BookID' => $id,
              'AuthorID' => $author,
      );
      $this->db->insert('bookauthor', $data);
    }

    $sql = "delete from genre_has_books where BookID = $id";
    $query = $this->db->query($sql);

    $genres = $this->input->post("genre");
    if(!isset($genres))
    {
      return 1;
    }
    foreach($genres as $genre)
    {
      $data = array(
              'BookID' => $id,
              'GenreID' => $genre,
      );
      $this->db->insert('genre_has_books', $data);
    }


    $sql = "delete from books_has_type where BookID = $id";
    $query = $this->db->query($sql);

    $types = $this->input->post("type");
    if(!isset($types))
    {
      return 1;
    }
    foreach($types as $type)
    {
      $data = array(
              'BookID' => $id,
              'TypeID' => $type,
      );
      $this->db->insert('books_has_type', $data);
    }


    return 1;
  }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function deletebook($id) {
  $sql = "delete from items where BookID = $id";
$query = $this->db->query($sql);
  return 1;
  }



}
