<?php

class moviecontroller extends Controller
{


	 public function __construct()
	{
        parent::__construct();
    }	



    	public function index()
    	{
    		  $this->View->render('movie/index', array(
                'movies' => MovieModel::getallmovies()
            ));		 
    	}


    	public function top10()
    	{
    		  $this->View->render('movie/top10', array(
                'movies' => MovieModel::getallmovies()
            ));		
    	}


            public function movieindex($movie_id)
        {
              if (isset($movie_id)) {
              $this->View->render('movie/movieindex', array(
                'movies' => MovieModel::getmovie($movie_id)
            ));     
          } else {
            Redirect::home();
        }
        }


    	 public function addmovie()
        {
        	$admin_true = Auth::checkAdminAuthentication();

        	if (!$admin_true) {
        		 $this->View->render('movie/addmovie');
        	}
        	else {
        		$this->View->render('error/noadmin');
        	}    
        }

      
     	public function addmovie_function() 
     	{
     		$createmovie__successful = MovieModel::addnewmovie();

     		if ($createmovie__successful) {
     			redirect::to('movie/index');
     		}
     		else {
     			redirect::to('error/404');
     		}

     	}

}
