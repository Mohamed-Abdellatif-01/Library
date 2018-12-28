<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class library extends CI_Controller {
	/**
 * constructer for library controller. we load the models here
 */

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
	 * Index loads the defalut view when you go to http://localhos/library/
	 * @return null no return expcted
	 */
	public function index()
	{

		$this->load->view('login_main');

	}


	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Register
/**
 * register(create a new admin account) is called when you go to this url http://localhost/library/index.php/library/register
 */
public function register()
{
  if($this->input->post("UserName") || $this->input->post("Password") || $this->input->post("FirstName")|| $this->input->post("LastName"))
  {
		// call register_model.register() to insert a new account
    $result = $this->register_model->register();
		//create an empty array called data
    $data = array();
		//add the results from the model which are stored in $result to data and give it key "result"
		//we'll use this key to access the data in the add
    $data['result'] = $result;
		//load view register.php and pass to it the array data
    $this->load->view('register',$data);
  }
	else {
		//load view register.php
			$this->load->view('register');
	}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//login
/**
 * action to the login form in http://localhost/library/
 * here we check if we have a correct username and password.
 * if we do, we create a session with keys isuserloggedin  and redicrect to http://localhost/library/index.php/library/mainpage
 * if not, we disply a "wrong username and password message"
 * @return null no return expcted
 */
public function login()
{
	//call login_model.loginpass(username,password)
	//pass the values from the form via post
	$result = $this->login_model->loginpass($this->input->post("UserName"),$this->input->post("Password"));
		//if the result is not zero (if there is a record with the inputted username and password)
	if($result!=0)
	{
			//create session, to make sure a user can't access any page without logging in
		$this->session->set_userdata('isuserloggedin', 'true');
//go to the home page (dashboard)
		redirect('/library/mainpage');
	}

	else
	{
//disply an error to the user
//just show massage "wrong username or password"
		$this->load->view('login_fail');
}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//after login
/**
 * mainpage loads http://localhost/library/index.php/library/mainpage
 * called if login is Successful.
 * @return null no return expcted
 */
public function mainpage()
{
	//load the home page (dashboard) view(page)
	$this->load->view('library_main');
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//logout
/**
 * logout delets the session, forcing them to login again before they can use the system
 * @return null no return exptected
 */
public function logout()
{
	//unset the session
	$this->session->unset_userdata('isuserloggedin');
//go to login page immediately
	redirect('/library');
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Books show all books
/**
 * showallitems is called when you go to url http://localhost/library/index.php/library/showallitems
 * it calls items_model.get_all_items() to show all books
 * @return null no return expcted
 */
public function showallitems()
	{
			//call items_model.get_all_items() to get all books
		$all_items = $this->items_model->get_all_items();
	//create an empty array called data
    $data = array();
		//add the results from the model which are stored in $all_items to data and give it key "books"
		//we'll use this key to access the data in the view
    $data['items'] = $all_items;
			//load view show_items.php and pass to it the array data
		$this->load->view('show_items',$data);
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//search books by name
/**
 * this function to load the view http://localhost/library/index.php/library/search_items_by_name
 * the function checks if there is a post from the from in the view.
 * if there is, then it calls the model items_model.searchItemsByName(BookTittle) and sends the results to the page to display them
 * if there isn't it loads the page with the empty form
 * @return null no return expcted
 */
	public function search_items_by_name()
		{
				//if the form was submitted and the book title feild was posted
			if($this->input->post("BookTittle"))
			{
					// call items_model.searchItemsByName(BookTittle) to get search results
				$result = $this->items_model->searchItemsByName($this->input->post("BookTittle"));
				//create an empty array called data
		    $data = array();
				//add the results from the model which are stored in $result to data and give it key "items"
		//we'll use this key to access the data in the view
		    $data['items'] = $result;
				//load view search_items_by_name.php and pass to it the array data
				$this->load->view('search_items_by_name',$data);
			}
			else
			{
					//load view search_items_by_name.php and no data passed
				$this->load->view('search_items_by_name');
			}
}

/**
 * this function to load the view http://localhost/library/index.php/library/search_items_by_authorname
 * the function checks if there is a post from the from in the view.
 * if there is, then it calls the model items_model.searchItemsByAuthor(AuthorName) and sends the results to the page to display them
 * if there isn't it loads the page with the empty form
 * @return null no return expcted
 */
public function search_items_by_authorname()
	{
		//if the form was submitted and the Author name feild was posted
		if($this->input->post("AuthorName"))
		{
			// call items_model.searchItemsByAuthor(AuthorName) to get search results
			$result = $this->items_model->searchItemsByAuthor($this->input->post("AuthorName"));
			//create an empty array called data
			$data = array();
			//add the results from the model which are stored in $result to data and give it key "authors"
			//we'll use this key to access the data in the view
			$data['authors'] = $result;
			//load view search_items_by_author.php and pass to it the array data
			$this->load->view('search_items_by_author',$data);
		}
		else
		{
			//load view search_items_by_author.php and no data passed
			$this->load->view('search_items_by_author');
		}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//show item (book) details by id
/**
	 * show_items_details is called when you go to url http://localhost/library/index.php/library/show_items_details/$id
	 * it calls items_model.showbookdetails($id) to show book and edition details
	 * it calls items_model.showbookauthordetails($id) to show book authors details
	 * it calls items_model.showbookdetailsgenre($id) to show book genres details
	 * it calls items_model.showbookdetailstype($id) to show book types(format) details
	 * user will see all book information in this page from items table, edition, author, genre, types
	 * @return null no return expcted
	 */

public function show_items_details($id)
	{
		//call items_model.showbookdetails($id) to get information of this book from items table and edition table
			$result = $this->items_model->showbookdetails($id);
			//create an empty array called data
			$data = array();
			//add the results from the model which are stored in $result to data and give it key "itemdetails"
			//we'll use this key to access the data in the view
			$data['itemdetails'] = $result;
			//call items_model.showbookauthordetails($id) to get author information of this book
			$result = $this->items_model->showbookauthordetails($id);
			//get the results from the model which are stored in $result to data and give it key "itemauhtors"
			//we'll use this key to access the data in the view
			$data['itemauthors'] = array_pop($result);
			//call items_model.showbookdetailsgenre($id) to get genres information of this book
			$result = $this->items_model->showbookdetailsgenre($id);
			//get the results from the model which are stored in $result to data and give it key "itemgenre"
			//we'll use this key to access the data in the view
			$data['itemgenre'] = array_pop($result);
			//call items_model.showbookdetailstype($id) to get genres information of this book
			$result = $this->items_model->showbookdetailstype($id);
			//get the results from the model which are stored in $result to data and give it key "itemtype"
			//we'll use this key to access the data in the view
			$data['itemtype'] = array_pop($result);
			//load view book_details.php and pass to it the array data
			$this->load->view('book_details',$data);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * addeditionbyid is called when you go to this url http://localhost/library/index.php/library/addeditionbyid/$id
 * this function use book id to add edition to the book
 */
public function addeditionbyid($id){
	//create an array called data have book id
	$data=array('BookID'=>$id);
	//load view add_edition.php and pass the data array
	$this->load->view('add_edition',$data);

}
/**
 * add_edition_by_id_result is the action from the from in http://localhost/library/index.php/library/addeditionbyid/$id
 * we call editions_model.addeditionby_id(BookID) function to insert the new edition to the book in database
 */
public function add_edition_by_id_result()
{
if($this->input->post("ISBN") || $this->input->post("EditionNum")
|| $this->input->post("PrintDate") || $this->input->post("BookID"))
{
	$result = $this->editions_model->addeditionby_id($this->input->post("BookID"));
	//create an empty array called data
	$data = array();
	//add the results from the model which are stored in $result to data and give it key "result"
	//we'll use this key to access the data in the view
	$data['result'] = $result;
	//load view add_edition.php and pass the data array
	$this->load->view('add_edition',$data);
}
}


/**
 * delete_edition_by_editionid($id) is the action from the from in http://localhost/library/index.php/library/delete_edition_by_editionid/$id
 * we call editions_model.deleteeditionbyeeditionid($id) function to delete the  edition from the book
 */
public function delete_edition_by_editionid($id)
{
	//call editions_model.deleteeditionbyeeditionid($id) to delete this edition from the book by edition id
	$result = $this->editions_model->deleteeditionbyeeditionid($id);
	//load showallitems immediately
	redirect('/library/showallitems');
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//add book
/**
 * add_book is called when you go to this url http://localhost/library/index.php/library/add_book
 * to load this view we need to get authors, get types and get genres from the Database
 * we use items_model.getauthors() & items_model.getgenres() & items_model.gettypes() to get the lists
 */
public function add_book()
{
	// call items_model.getauthors() to get list of all the authors
	$result = $this->items_model->getauthors();
	//create an empty array called data
	$data = array();
	//add the results from the model which are stored in $result to data and give it key "authorslist"
	//we'll use this key to access the data in the view
	$data['authorslist'] = $result;
	// call items_model.getgenres() to get list of all the genres
	$result = $this->items_model->getgenres();
	//add the results from the model which are stored in $result to data and give it key "genrelist"
	//we'll use this key to access the data in the view
	$data['genrelist'] = $result;
	// call items_model.gettypes() to get list of all the types
	$result = $this->items_model->gettypes();
	//add the results from the model which are stored in $result to data and give it key "typeslist"
	//we'll use this key to access the data in the view
	$data['typeslist'] = $result;
	//load view add_Book.php and pass the data array
	$this->load->view('add_Book',$data);
}
/**
 * add_book_result is the action from the from in http://localhost/library/index.php/library/add_book
 * we call items_model.additems() function to insert the new book(item) to the database
 */
public function add_book_result()
	{
		if($this->input->post("BookTittle") || $this->input->post("NumOfPages")
		 || $this->input->post("PublishingDate")|| $this->input->post("Quantity")
		|| $this->input->post("BestOfCollection")|| $this->input->post("ISBN")
		|| $this->input->post("EditionNum")|| $this->input->post("PrintDate")
		|| $this->input->post("TypeID")|| $this->input->post("AuthorID")
		|| $this->input->post("GenreID")|| $this->input->post("BookID"))
		{
			// call items_model.additems() to insert new book to database
			$result = $this->items_model->additems();
			//create an empty array called data
			$data = array();
			//add the results from the model which are stored in $result to data and give it key "result"
		//we'll use this key to access the data in the add
			$data['result'] = $result;
			//load view add_book_result.php and pass to it the array data
			$this->load->view('add_book_result',$data);
		}
	}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//edit book
/**
	 * editbook is called when you click on the edit button in showallitems page. the link to show this function is http://localhost/library/index.php/library/editbook/1
	 * in the link editbook/1 .. editbook is the function & 1 is the id of the user we'll be editing.
	 * in editUser we prepare all the required data to autofill the form with the current user details
	 * @param  Integer $id user id we wish to edit
	 * @return null     no return expected
	 */
	public function editbook($id)
	{
		// call items_model.getauthors() to get list of all the authors
		$result = $this->items_model->getauthors();
		//create an empty array called data
		$data = array();
		//add the results from the model which are stored in $result to data and give it key "authorslist"
	 //we'll use this key to access the data in the view
		$data['authorslist'] = $result;
		// call items_model.getgenres() to get list of all the genres
		$result = $this->items_model->getgenres();
		//add the results from the model which are stored in $result to data and give it key "genrelist"
	 //we'll use this key to access the data in the view
		$data['genrelist'] = $result;
		// call items_model.gettypes() to get list of all the types
		$result = $this->items_model->gettypes();
		//add the results from the model which are stored in $result to data and give it key "typeslist"
	 //we'll use this key to access the data in the view
		$data['typeslist'] = $result;
		// call items_model.getbookDetailsbyID() to get book details via their ID
		$result = $this->items_model->getbookDetailsbyID($id);
		//add the results from the model which are stored in $result to data and give it key "items"
	//we'll use this key to access the data in the view
		$data['items'] = array_pop($result);
		// call items_model.getbookauthorbyID(id) to get the book authors iva their ID
		$result = $this->items_model->getbookauthorbyID($id);
		//add the results from the model which are stored in $result to data and give it key "bookauthor"
	//we'll use this key to access the data in the view
		$data['bookauthor'] = $result;
		// call items_model.getbooktypebyID(id) to get the book types iva their ID
		$result = $this->items_model->getbooktypebyID($id);
		//add the results from the model which are stored in $result to data and give it key "books_has_type"
	//we'll use this key to access the data in the view
		$data['books_has_type'] = $result;
		// call items_model.getgenreDetailsbyID(id) to get the book genres iva their ID
		$result = $this->items_model->getgenreDetailsbyID($id);
		//add the results from the model which are stored in $result to data and give it key "genre_has_books"
	//we'll use this key to access the data in the view
		$data['genre_has_books'] = $result;
		//load view edit_book.php and pass the data array
		$this->load->view('edit_book',$data);
	}
	/**
 * updatebook the action from the form in http://localhost/library/index.php/library/editbook/1
 * updateStudent will take the data from the form and updates the book based on their ID
 * @return null no return expected
 */
	public function updatebook()
	{
		if($this->input->post("BookTittle	") || $this->input->post("NumOfPages")
		|| $this->input->post("PublishingDate") || $this->input->post("Quantity")
		|| $this->input->post("BestOfCollection")|| $this->input->post("EditionID")|| $this->input->post("ISBN")
		|| $this->input->post("EditionNum")|| $this->input->post("PrintDate")
		|| $this->input->post("TypeID")|| $this->input->post("AuthorID")
		|| $this->input->post("GenreID")|| $this->input->post("BookID"))
		{
			// call items_model.additems() to update the book in database
			$result = $this->items_model->updateitem();
			//create an empty array called data
			$data = array();
			//add the results from the model which are stored in $result to data and give it key "result"
		//we'll use this key to access the data in the add
			$data['result'] = $result;
			//load view update_item_result.php and pass the data array
			$this->load->view('update_item_result',$data);
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/**
		 * delete_book is called when you click on the edit button in showallitems page. the link to show this function is http://localhost/library/index.php/library/delete_book/1
		 * in the link delete_book/1 .. delete_book is the function & 1 is the id of the user we'll be deleteing.
		 * @param  Integer $id user id we wish to delete
		 * @return null     no return expected
		 */

	public function delete_book($id)
	{
		// call items_model.deletebook($id) to delete the book from database
		$result = $this->items_model->deletebook($id);
   //go to showallitems immediately
		redirect('/library/showallitems');
	}


	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Author
/**
	 * showallauthors is called when you go to url http://localhost/library/index.php/library/showallauthors
	 * it calls authors_model.get_all_authors() to show all authors in database
	 * @return null no return expcted
	 */
public function showallauthors()
	{
		//call authors_model.get_all_authors() to get all authors
		$all_authors = $this->authors_model->get_all_authors();
		//create an empty array called data
    $data = array();
		//add the results from the model which are stored in $all_authors to data and give it key "libauthors"
	//we'll use this key to access the data in the view
    $data['libauthors'] = $all_authors;
		//load view show_authors.php and pass to it the array data
		$this->load->view('show_authors',$data);
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * this function to load the view http://localhost/library/index.php/library/search_author_by_name
	 * the function checks if there is a post from the from in the view.
	 * if there is, then it calls the model authors_model.searchAuthorByName(AuthorName) and sends the results to the page to display them
	 * if there isn't it loads the page with the empty form
	 * @return null no return expcted
	 */
	public function search_author_by_name()
	{
		//if the form was submitted and the author name feild was posted
		if($this->input->post("AuthorName"))
		{
			// call authors_model.searchAuthorByName(AuthorName) to get search results
			$result = $this->authors_model->searchAuthorByName($this->input->post("AuthorName"));
			//create an empty array called data
	    $data = array();
			//add the results from the model which are stored in $result to data and give it key "libauthors"
		//we'll use this key to access the data in the view
	    $data['libauthors'] = $result;
			//load view search_author_by_name.php and pass to it the array data
			$this->load->view('search_author_by_name',$data);
		}
		else
		{
			//load view search_author_by_name.php and no data passed
			$this->load->view('search_author_by_name');
		}

	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * add_author is called when you go to this url http://localhost/library/index.php/library/add_author
	 */
	public function add_author()
{
	if($this->input->post("AuthorID") || $this->input->post("AuthorName"))
	{
		// call authors_model.addAuthor() to add a new author to database
		$result = $this->authors_model->addAuthor();
		//create an empty array called data
		$data = array();
		//add the results from the model which are stored in $result to data and give it key "result"
	//we'll use this key to access the data in the add
		$data['result'] = $result;
		//load view add_author.php and pass the data array
		$this->load->view('add_author',$data);
	}
	else
		{
			//load view add_author.php
			$this->load->view('add_author');
		}

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
	 * delete_author is called when you click on the delete button in showallauthors page. the link to show this function is http://localhost/library/index.php/library/delete_author/1
	 * in the link delete_author/1 .. delete_author is the function & 1 is the id of the user we'll be deleteing.
	 * @param  Integer $id user id we wish to delete
	 * @return null     no return expected
	 */
public function delete_author($id)
{
	// call authors_model.deleteauthor($id) to delete the author from database
	$result = $this->authors_model->deleteauthor($id);
	//go to showallauthors immediately
	redirect('/library/showallauthors');
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Genre
/**
	 * showallgenres is called when you go to url http://localhost/library/index.php/library/showallgenres
	 * it calls genre_model.get_all_genres() to show all genres in database
	 * @return null no return expcted
	 */
public function showallgenres()
	{
		//call genre_model.get_all_genres() to get all genres
		$all_genres = $this->genre_model->get_all_genres();
		//create an empty array called data
    $data = array();
		//add the results from the model which are stored in $result to data and give it key "genre"
	//we'll use this key to access the data in the view
    $data['genre'] = $all_genres;
		//load view show_genres.php and pass the data array
		$this->load->view('show_genres',$data);
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * this function to load the view http://localhost/library/index.php/library/search_genre_by_name
	 * the function checks if there is a post from the from in the view.
	 * if there is, then it calls the model genre_model.searchGenreByName(GenreName) and sends the results to the page to display them
	 * if there isn't it loads the page with the empty form
	 * @return null no return expcted
	 */
	public function search_genre_by_name()
	{
		//if the form was submitted and the genre name feild was posted
		if($this->input->post("GenreName"))
		{
			// call genre_model.searchGenreByName(GenreName) to get search results
			$result = $this->genre_model->searchGenreByName($this->input->post("GenreName"));
			//create an empty array called data
			$data = array();
			//add the results from the model which are stored in $result to data and give it key "genre"
		//we'll use this key to access the data in the view
			$data['genre'] = $result;
			//load view search_genre_by_name.php and pass to it the array data
			$this->load->view('search_genre_by_name',$data);
		}
		else
		{
			//load view search_genre_by_name.php
			$this->load->view('search_genre_by_name');
		}

	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * add_author is called when you go to this url http://localhost/library/index.php/library/add_genre
	 */
	public function add_genre()
{
	if($this->input->post("GenreID") || $this->input->post("GenreName"))
	{
		// call genre_model.addgenre() to add a new genre to database
		$result = $this->genre_model->addgenre();
		//create an empty array called data
		$data = array();
		//add the results from the model which are stored in $result to data and give it key "result"
	//we'll use this key to access the data in the add
		$data['result'] = $result;
		//load view add_genre.php and pass the data array
		$this->load->view('add_genre',$data);
	}
	else
		{
			//load view add_genre.php
			$this->load->view('add_genre');
		}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
	 * delete_genre is called when you click on the delete button in showallgenres page. the link to show this function is http://localhost/library/index.php/library/delete_genre/1
	 * in the link delete_genre/1 .. delete_genre is the function & 1 is the id of the user we'll be deleteing.
	 * @param  Integer $id user id we wish to delete
	 * @return null     no return expected
	 */
public function delete_genre($id)
{
	// call genre_model.deletegenre($id) to delete the genre from database
	$result = $this->genre_model->deletegenre($id);
	//go to showallgenres immediately
	redirect('/library/showallgenres');
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



}
