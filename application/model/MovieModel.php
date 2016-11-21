<?php

class MovieModel
{




  public static function getallmovies_toprated() 
  {

    $search = Request::post('search');
    
  	 $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT movie_id, movie_title, movie_year, movie_genre, movie_rate, movie_rank, movie_runtime, movie_summary, movie_imgUrl FROM movies WHERE movie_title like '%$search%' ORDER BY movie_rank  ";
        $query = $database->prepare($sql);
        $query->execute();

        $all_movie_list = array();

        foreach ($query->fetchAll() as $movie) {

        	array_walk_recursive($movie, 'Filter::XSSFilter');

            $all_movie_list [$movie->movie_id] = new stdClass();
            $all_movie_list [$movie->movie_id]->movie_id = $movie->movie_id;
            $all_movie_list [$movie->movie_id]->movie_title = $movie->movie_title;
            $all_movie_list [$movie->movie_id]->movie_year = $movie->movie_year;
            $all_movie_list [$movie->movie_id]->movie_genre = $movie->movie_genre;
            $all_movie_list [$movie->movie_id]->movie_rate = $movie->movie_rate;
            $all_movie_list [$movie->movie_id]->movie_rank = $movie->movie_rank;
            $all_movie_list [$movie->movie_id]->movie_runtime = $movie->movie_runtime;
            $all_movie_list [$movie->movie_id]->movie_summary = $movie->movie_summary;
            $all_movie_list [$movie->movie_id]->movie_imgUrl = $movie->movie_imgUrl;

        }
      
        return $all_movie_list;
  }

  public static function getallmovies_index() 
  {

     $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT movie_id, movie_title, movie_year, movie_genre, movie_rate, movie_rank, movie_runtime, movie_summary, movie_imgUrl FROM movies ORDER BY movie_year DESC LIMIT 5";
        $query = $database->prepare($sql);
        $query->execute();

        $all_movie_list = array();

        foreach ($query->fetchAll() as $movie) {

          array_walk_recursive($movie, 'Filter::XSSFilter');

            $all_movie_list [$movie->movie_id] = new stdClass();
            $all_movie_list [$movie->movie_id]->movie_id = $movie->movie_id;
            $all_movie_list [$movie->movie_id]->movie_title = $movie->movie_title;
            $all_movie_list [$movie->movie_id]->movie_year = $movie->movie_year;
            $all_movie_list [$movie->movie_id]->movie_genre = $movie->movie_genre;
            $all_movie_list [$movie->movie_id]->movie_rate = $movie->movie_rate;
            $all_movie_list [$movie->movie_id]->movie_rank = $movie->movie_rank;
            $all_movie_list [$movie->movie_id]->movie_runtime = $movie->movie_runtime;
            $all_movie_list [$movie->movie_id]->movie_summary = $movie->movie_summary;
            $all_movie_list [$movie->movie_id]->movie_imgUrl = $movie->movie_imgUrl;;

        }

        return $all_movie_list;
  }

  public static function getmovie($movie_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT movie_id, movie_title, movie_year, movie_genre, movie_rate, movie_rank, movie_runtime, movie_summary, movie_imgUrl FROM movies WHERE movie_id = :movie_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':movie_id' => $movie_id));

        return $query->fetch();
    }

  public static function addnewmovie()
  {
    $movie_title = Request::post('movie_title');
    $movie_year = Request::post('movie_year');
    $movie_genre = Request::post('movie_genre');
    $movie_rate = Request::post('movie_rate');
    $movie_rank = request::post('movie_rank');
    $movie_runtime = Request::post('movie_runtime');
    $movie_summary = Request::post('movie_summary');
    $movie_imgUrl = Request::post('movie_imgUrl');

    if (self::writenewmovie($movie_title, $movie_year, $movie_genre, $movie_rate, $movie_rank, $movie_runtime, $movie_summary, $movie_imgUrl)); {
        return true;
    }
  }

  public static function writenewmovie($movie_title, $movie_year, $movie_genre, $movie_rate, $movie_rank, $movie_runtime, $movie_summary, $movie_imgUrl)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        
        $sql = "INSERT INTO movies (movie_title, movie_year, movie_genre, movie_rate, movie_rank, movie_runtime, movie_summary, movie_imgUrl)
                    VALUES (:movie_title, :movie_year, :movie_genre, :movie_rate, :movie_rank, :movie_runtime, :movie_summary, :movie_imgUrl)";
        $query = $database->prepare($sql);
        $query->execute(array(':movie_title' => $movie_title,
                              ':movie_year' => $movie_year,
                              ':movie_genre' => $movie_genre,
                              ':movie_rate' => $movie_rate,
                              ':movie_rank' => $movie_rank,
                              ':movie_runtime' => $movie_runtime,
                              ':movie_summary' => $movie_summary,
                              ':movie_imgUrl' => $movie_imgUrl));
        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        }
 
        return false;
    }

   

  public static function UpdateMovie($movie_id, $movie_title, $movie_year, $movie_genre, $movie_rate, $movie_rank, $movie_runtime, $movie_summary, $movie_imgUrl)
    {
       if (!$movie_id) {
            return false;
        }
        
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE movies SET movie_title = :movie_title, movie_year = :movie_year, movie_genre = :movie_genre, movie_rate = :movie_rate, movie_rank = :movie_rank, movie_runtime = :movie_runtime, movie_summary = :movie_summary,  movie_imgUrl = :movie_imgUrl WHERE movie_id = :movie_id LIMIT 1"; 
        $query = $database->prepare($sql);
        $query->execute(array(':movie_id' => $movie_id,
                              ':movie_title' => $movie_title,
                              ':movie_year' => $movie_year,
                              ':movie_genre' => $movie_genre,
                              ':movie_rate' => $movie_rate,
                              ':movie_rank' => $movie_rank,
                              ':movie_runtime' => $movie_runtime,
                              ':movie_summary' => $movie_summary,
                              ':movie_imgUrl' => $movie_imgUrl));
       if ($query->rowCount() == 1) {
            return true;
        }

        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_EDITING_FAILED'));
        return false;
    }


    public static function DeleteMovie($movie_id)
    {
        if (!$movie_id) {
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "DELETE FROM movies WHERE movie_id = :movie_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':movie_id' => $movie_id));

        if ($query->rowCount() == 1) {
            return true;
        }

        // default return
        Session::add('feedback_negative', Text::get('FEEDBACK_NOTE_DELETION_FAILED'));
        return false;
    }
}

