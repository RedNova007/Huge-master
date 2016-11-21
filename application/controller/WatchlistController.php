        <?php

         
class WatchlistController extends Controller
{
        
        
        public function index()
        {
        $this->View->render('watchlist/index', array(
        'watchlist' => WatchlistModel::getAllmovies()
        ));
        }

        public function Add()
        {
        WatchlistModel::Addmovie(Request::post('movie_id'), Request::post('movie_title'), Request::post('movie_imgUrl'));
        Redirect::to('watchlist/index');
        }

        public function Delete($watchlist_id)
        { 
        WatchlistModel::Delete($watchlist_id);
        Redirect::to('watchlist/index');
        }
}
