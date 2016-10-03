<div class="container">
    <h1>Movie</h1>

	<?php if (Session::get("user_account_type") == 7) : ?>
            		 <?php if (View::checkForActiveController($filename, "admin")) {
                		echo ' class="active" ';
        		} ?> 
           			 <a class="navigation right" href="../movie/addmovie"><h2>Add a Movie</h2></a>
            		
           		<?php endif; ?>
        
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <h2>movies</h2><br>
        <p>
            <h3>New Movies:</h3>
        </p>
           <table>
            <tbody>
           <?php foreach ($this->movies as $movie) { ?>
              <td><a href=<?= Config::get('URL') . 'movie/movieindex/' . $movie->movie_id; ?>"><img HEIGHT="200" WIDTH="140" src="<?= $movie->movie_imgUrl; ?>"></td>
           <?php } ?>
            </tbody>
        </table>
        <br>
       		<a href="TopRated"><h2>Top Rated Movies</h2></a>

           
       		
    </div>
</div> 

