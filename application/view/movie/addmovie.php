<div class="container">
    <h1>Movie</h1>

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <h2>Create new movie</h2>
        <div class="login-box">
        <p>
            this is addmovie
        </p>
       		
        <p>
            <form method="post" action="<?php echo Config::get('URL');?>movie/addmovie_function">
                <label>Title: </label><input type="text" name="movie_title" />
                <label>Year: </label><input type="text" name="movie_year" />
                <label>Genre: </label><input type="text" name="movie_genre" />
                <label>Rate: </label><input type="text" name="movie_rate" />
                <label>Rank: </label><input type="text" name="movie_rank" />
                <label>Runtime: </label><input type="text" name="movie_runtime" />
                <label>Summary: </label><textarea rows="10" cols="100" type="text" name="movie_summary"> </textarea><br><br>
                <label>img Link: </label><input type="text" name="movie_imgUrl" />
                <input type="submit" value='save' autocomplete="off" />
            </form>
        </p>
    </div>
    <a href="../movie/index"><h3>Back to movies</h3></a>
</div> 