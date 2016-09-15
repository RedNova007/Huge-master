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
            <form method="post" action="<?php echo Config::get('URL');?>movie/top10">
                <label>Title: </label><input type="text" name="movie_title" />
                <label>Rate: </label><input type="text" name="movie_rate" />
                <label>Rank: </label><input type="text" name="movie_rank" />
                <label>Runtime: </label><input type="text" name="movie_runtime" />
                <label>img Link: </label><input type="text" name="movie_imgid" />
                <input type="submit" value='save' autocomplete="OFF" />
            </form>
        </p>
    </div>
    <a href="../movie/index"><h3>Back to movies</h3></a>
</div>