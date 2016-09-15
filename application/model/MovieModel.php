<?php

class MovieModel
{

  public static function getallmovies() 
  {

  	 $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT movie_id, movie_title, movie_rate, movie_rank, movie_runtime, movie_imgid FROM movies ORDER BY movie_rank";
        $query = $database->prepare($sql);
        $query->execute();

        $all_movie_list = array();

        foreach ($query->fetchAll() as $movie) {

        	array_walk_recursive($movie, 'Filter::XSSFilter');

            $all_movie_list [$movie->movie_id] = new stdClass();
            $all_movie_list [$movie->movie_id]->movie_id = $movie->movie_id;
            $all_movie_list [$movie->movie_id]->movie_title = $movie->movie_title;
            $all_movie_list [$movie->movie_id]->movie_rate = $movie->movie_rate;
            $all_movie_list [$movie->movie_id]->movie_rank = $movie->movie_rank;
            $all_movie_list [$movie->movie_id]->movie_runtime = $movie->movie_runtime;
            $all_movie_list [$movie->movie_id]->movie_imgid = $movie->movie_imgid;
        }

        return $all_movie_list;
  }

   public static function getmovie($movie_id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT movie_id, movie_title, movie_rate, movie_rank, movie_runtime, movie_imgid FROM movies WHERE movie_id = :movie_id LIMIT 1";
        $query = $database->prepare($sql);
        $query->execute(array(':movie_id' => $movie_id));

        $movie = $query->fetch();
        return $movie;
}

  public static function addnewmovie()
  {
    $movie_title = Request::post('movie_title');
    $movie_rate = Request::post('movie_rate');
    $movie_rank =request::post('movie_rank');
    $movie_runtime = Request::post('movie_runtime');
    $movie_imgid = Request::post('movie_imgid');

    if (self::writenewmovie($movie_title, $movie_rate, $movie_rank, $movie_runtime, $movie_imgid)); {
        return true;
    }
  }

  public static function writenewmovie($movie_title, $movie_rate, $movie_rank, $movie_runtime, $movie_imgid)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        
        $sql = "INSERT INTO movies (movie_title, movie_rate, movie_rank, movie_runtime, movie_imgid)
                    VALUES (:movie_title, :movie_rate, :movie_rank, :movie_runtime, :movie_imgid)";
        $query = $database->prepare($sql);
        $query->execute(array(':movie_title' => $movie_title,
                              ':movie_rate' => $movie_rate,
                              ':movie_rank' => $movie_rank,
                              ':movie_runtime' => $movie_runtime,
                              ':movie_imgid' => $movie_imgid));
        $count =  $query->rowCount();
        if ($count == 1) {
            return true;
        }
 
        return false;
    }
}

