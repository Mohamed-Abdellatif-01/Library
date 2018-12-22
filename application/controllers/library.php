<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class library extends CI_Controller {

	public function __construct() {
    parent::__construct();

    $this->load->model('register_model');
    $this->load->model('login_model');
		$this->load->model('items_model');
		$this->load->model('authors_model');
		$this->load->model('genre_model');
$this->load->model('editions_model');

		$this->load->helper('url');

  }
	/**
	 * thisis the main page
	 * @return [type] [description]
	 */
	public function index()
	{

		$this->load->view('login_main');

	}


	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Register

public function register()
{
  if($this->input->post("UserName") || $this->input->post("Password") || $this->input->post("FirstName")|| $this->input->post("LastName"))
  {
    $result = $this->register_model->register();
    $data = array();
    $data['result'] = $result;
    $this->load->view('register',$data);
  }
	else {

			$this->load->view('register');

	}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//login
public function login()
{
	$result = $this->login_model->loginpass($this->input->post("UserName"),$this->input->post("Password"));
	if($result!=0)
	{
		$this->session->set_userdata('isuserloggedin', 'true');

		redirect('/library/mainpage');
	}

	else
	{

		$this->load->view('login_fail');
}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//after login

public function mainpage()
{
	$this->load->view('library_main');
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//logout
public function logout()
{
	$this->session->unset_userdata('isuserloggedin');

	redirect('/library');
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Books show all books
public function showallitems()
	{
		$all_items = $this->items_model->get_all_items();

    $data = array();
    $data['items'] = $all_items;
		$this->load->view('show_items',$data);
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//search books by name
	public function search_items_by_name()
		{
			if($this->input->post("BookTittle"))
			{
				$result = $this->items_model->searchItemsByName($this->input->post("BookTittle"));
		    $data = array();
		    $data['items'] = $result;
				$this->load->view('search_items_by_name',$data);
			}
			else
			{
				$this->load->view('search_items_by_name');
			}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function show_items_details($id)
	{

			$result = $this->items_model->showbookdetails($id);
			$data = array();
			$data['itemdetails'] = $result;


	$result = $this->items_model->showbookauthordetails($id);
	$data['itemauthors'] = array_pop($result);
			$result = $this->items_model->showbookdetailsgenre($id);
			$data['itemgenre'] = array_pop($result);

			$result = $this->items_model->showbookdetailstype($id);
			$data['itemtype'] = array_pop($result);
			$this->load->view('book_details',$data);


}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function addeditionbyid($id){
	$data=array('BookID'=>$id);
		$this->load->view('add_edition',$data);

}

public function add_edition_by_id_result()
{
if($this->input->post("ISBN") || $this->input->post("EditionNum")
|| $this->input->post("PrintDate") || $this->input->post("BookID"))
{
	$result = $this->editions_model->addeditionby_id($this->input->post("BookID"));
	$data = array();
	$data['result'] = $result;


	$this->load->view('add_edition',$data);
}
}



public function delete_edition_by_isbn($id)
{
	$result = $this->items_model->deletebook($id);

	redirect('/library/showallitems');


}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//add book
public function add_book()
{
	$result = $this->items_model->getauthors();
	$data = array();
	$data['authorslist'] = $result;
	$result = $this->items_model->getgenres();
	$data['genrelist'] = $result;
	$result = $this->items_model->gettypes();
	$data['typeslist'] = $result;
	$result = $this->items_model->geteditions();


	$this->load->view('add_Book',$data);
}
public function add_book_result()
	{
		if($this->input->post("BookTittle") || $this->input->post("NumOfPages")
		 || $this->input->post("PublishingDate")|| $this->input->post("Quantity")
		|| $this->input->post("BestOfCollection")|| $this->input->post("ISBN")
		|| $this->input->post("EditionNum")|| $this->input->post("PrintDate")
		|| $this->input->post("TypeID")|| $this->input->post("AuthorID")
		|| $this->input->post("GenreID")|| $this->input->post("BookID"))
		{
			$result = $this->items_model->additems();
			$data = array();
			$data['result'] = $result;
			$this->load->view('add_book_result',$data);
		}
	}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//edit book
	public function editbook($id)
	{
		$result = $this->items_model->getauthors();
		$data = array();
		$data['authorslist'] = $result;
		$result = $this->items_model->getgenres();
		$data['genrelist'] = $result;
		$result = $this->items_model->gettypes();
		$data['typeslist'] = $result;
		$result = $this->items_model->getbookDetailsbyID($id);
		$data['items'] = array_pop($result);
		$result = $this->items_model->getbookauthorbyID($id);
		$data['bookauthor'] = $result;
		$result = $this->items_model->getbooktypebyID($id);
		$data['books_has_type'] = $result;
		$result = $this->items_model->getgenreDetailsbyID($id);
		$data['genre_has_books'] = $result;
		$this->load->view('edit_book',$data);
	}
	public function updatebook()
	{
		if($this->input->post("BookTittle	") || $this->input->post("NumOfPages")
		|| $this->input->post("PublishingDate") || $this->input->post("Quantity")
		|| $this->input->post("BestOfCollection")|| $this->input->post("EditionID")|| $this->input->post("ISBN")
		|| $this->input->post("EditionNum")|| $this->input->post("PrintDate")
		|| $this->input->post("TypeID")|| $this->input->post("AuthorID")
		|| $this->input->post("GenreID")|| $this->input->post("BookID"))
		{
			$result = $this->items_model->updateitem();
			$data = array();
			$data['result'] = $result;
			$this->load->view('update_item_result',$data);
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function delete_book($id)
	{
		$result = $this->items_model->deletebook($id);

		redirect('/library/showallitems');


	}


	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Author

public function showallauthors()
	{
		$all_authors = $this->authors_model->get_all_authors();

    $data = array();
    $data['libauthors'] = $all_authors;
		$this->load->view('show_authors',$data);
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function search_author_by_name()
	{
		if($this->input->post("AuthorName"))
		{
			$result = $this->authors_model->searchAuthorByName($this->input->post("AuthorName"));
	    $data = array();
	    $data['libauthors'] = $result;
			$this->load->view('search_author_by_name',$data);
		}
		else
		{
			$this->load->view('search_author_by_name');
		}

	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function add_author()
{
	if($this->input->post("AuthorID") || $this->input->post("AuthorName"))
	{
		$result = $this->authors_model->addAuthor();
		$data = array();
		$data['result'] = $result;
		$this->load->view('add_author',$data);
	}
	else
		{
			$this->load->view('add_author');
		}

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function delete_author($id)
{
	$result = $this->authors_model->deleteauthor($id);
	redirect('/library/showallauthors');


}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Genre


public function showallgenres()
	{
		$all_genres = $this->genre_model->get_all_genres();

    $data = array();
    $data['genre'] = $all_genres;
		$this->load->view('show_genres',$data);
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function search_genre_by_name()
	{
		if($this->input->post("GenreName"))
		{
			$result = $this->genre_model->searchGenreByName($this->input->post("GenreName"));
			$data = array();
			$data['genre'] = $result;
			$this->load->view('search_genre_by_name',$data);
		}
		else
		{
			$this->load->view('search_genre_by_name');
		}

	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function add_genre()
{
	if($this->input->post("GenreID") || $this->input->post("GenreName"))
	{
		$result = $this->genre_model->addgenre();
		$data = array();
		$data['result'] = $result;
		$this->load->view('add_genre',$data);
	}
	else
		{
			$this->load->view('add_genre');
		}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function delete_genre($id)
{
	$result = $this->genre_model->deletegenre($id);
	redirect('/library/showallgenres');
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



}
