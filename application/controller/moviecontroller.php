    <?php

    class moviecontroller extends Controller
    {

    public function index()
    {
    $this->View->render('movie/index', array(
    'movies' => MovieModel::getallmovies_index()
    ));		 
    }


    public function toprated()
    {
    $this->View->render('movie/TopRated', array(
    'movies' => MovieModel::getallmovies_toprated()
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
    redirect::to('movie/TopRated');
    }
    else {
    redirect::to('error/404');
    }

    }

    public function edit($movie_id)
    {
    $this->View->render('movie/edit', array(
    'movies' => MovieModel::getMovie($movie_id)
    ));
    }

    public function editSave()
    {
    MovieModel::UpdateMovie(Request::post('movie_id'), Request::post('movie_title'), Request::post('movie_year'), Request::post('movie_genre'), Request::post('movie_rate'), Request::post('movie_rank'), Request::post('movie_runtime'), Request::post('movie_summary'), Request::post('movie_imgUrl'));
    Redirect::to('movie/TopRated');
    }


    public function delete($movie_id)
    {
    MovieModel::deleteMovie($movie_id);
    Redirect::to('movie/index');
    }



    }
