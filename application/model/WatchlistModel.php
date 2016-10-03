				<?php



				class WatchlistModel
				{
				/**
				* Get all notes (notes are just example data that the user has created)
				* @return array an array with several objects (the results)
				*/
				public static function getAllmovies()
				{
				$database = DatabaseFactory::getFactory()->getConnection();

				$sql = "SELECT watchlist_id, movie_id, user_id, movie_title  FROM watchlist LEFT JOIN movies WHERE user_id = :user_id";
				$query = $database->prepare($sql);
				$query->execute(array(':user_id' => Session::get('user_id')));

				// fetchAll() is the PDO method that gets all result rows
				return $query->fetchAll();
				}


				public static function getmovie($movie_id)
				{
				$database = DatabaseFactory::getFactory()->getConnection();

				$sql = "SELECT movie_id, movie_title, movie_year, movie_genre, movie_rate, movie_rank, movie_runtime, movie_summary, movie_imgUrl FROM movies WHERE movie_id = :movie_id LIMIT 1";
				$query = $database->prepare($sql);
				$query->execute(array(':movie_id' => $movie_id));

				return $query->fetch();
				}
















				public static function AddMovie($movie_id)
				{
				$database = DatabaseFactory::getFactory()->getConnection();

				$sql = "INSERT INTO watchlist (movie_id, user_id) VALUES (:movie_id, :user_id)";
				$query = $database->prepare($sql);
				$query->execute(array(':movie_id' => $movie_id, ':user_id' => Session::get('user_id')));

				if ($query->rowCount() == 1) {
				return true;
				}

				// default return
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


				         


