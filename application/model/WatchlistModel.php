		<?php



		class WatchlistModel
		{
		
		public static function getAllmovies()
		{
		$database = DatabaseFactory::getFactory()->getConnection();

		$sql = "SELECT watchlist_id, movie_id, movie_title, movie_imgUrl, user_id FROM watchlist  WHERE user_id = :user_id";
		$query = $database->prepare($sql);
		$query->execute(array(':user_id' => Session::get('user_id')));

		
		return $query->fetchAll();
		}

 

		public static function AddMovie($movie_id, $movie_title, $movie_imgUrl)
		{
		$database = DatabaseFactory::getFactory()->getConnection();

		$sql = "INSERT INTO watchlist (movie_id, user_id, movie_title, movie_imgUrl) VALUES (:movie_id, :user_id, :movie_title, :movie_imgUrl)";
		$query = $database->prepare($sql);
		$query->execute(array(	':movie_id' => $movie_id,
								':movie_title' => $movie_title,
								':movie_imgUrl' => $movie_imgUrl,
							 	':user_id' => Session::get('user_id')));

		if ($query->rowCount() == 1) {
		return true;
		}

		Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_CREATION_FAILED'));
		return false;
		}



		public static function Delete($watchlist_id)
		{
		if (!$watchlist_id) {
		return false;
		}

		$database = DatabaseFactory::getFactory()->getConnection();

		$sql = "DELETE FROM watchlist WHERE watchlist_id = :watchlist_id AND user_id = :user_id  LIMIT 1 ";
		$query = $database->prepare($sql);
		$query->execute(array(':watchlist_id' => $watchlist_id, ':user_id' => Session::get('user_id')));

		if ($query->rowCount() == 1) {
		return true;

		}   
		Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
		return false;
		
		}
}


				         


