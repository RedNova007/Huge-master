<div class="container">
    <h1>Edit</h1>
    
        <h3>Change movie info:</h3>
        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>
       
        <div class="login-box">
        
        <?php if ($this->movies) { ?>
            <form method="post" action="<?php echo Config::get('URL');?>movie/editSave">
                
                <input type="hidden" name="movie_id" value="<?php echo htmlentities($this->movies->movie_id); ?>" />
                <label>Title: </label><input type="text" name="movie_title" value="<?php echo htmlentities($this->movies->movie_title); ?>" />
                <label>Year: </label><input type="text" name="movie_year" value="<?php echo htmlentities($this->movies->movie_year); ?>" />
                <label>Genre: </label><input type="text" name="movie_genre" value="<?php echo htmlentities($this->movies->movie_genre); ?>" />
                <label>Rate: </label><input type="text" name="movie_rate" value="<?php echo htmlentities($this->movies->movie_rate); ?>" />
                <label>Rank: </label><input type="text" name="movie_rank" value="<?php echo htmlentities($this->movies->movie_rank); ?>" />
                <label>Runtime: </label><input type="text" name="movie_runtime" value="<?php echo htmlentities($this->movies->movie_runtime); ?>" />
                <label>Summary: </label><input rows="10" cols="120" type="text" name="movie_summary" value="<?php echo htmlentities($this->movies->movie_summary); ?>" />
                <label>imgurl: </label><input type="text" name="movie_imgUrl" value="<?php echo htmlentities($this->movies->movie_imgUrl); ?>" />
                <input type="submit" value='Change' />
            </form>
        <?php } else { ?>
            <p>This movie does not exist.</p>
        <?php } ?>
    </div>
<a href="../../movie/top10"><h3>Back to Top 10</h3></a>
</div>  