<div class="container">
    <h1>Movie Index</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>


<?php if ($this->movies) { ?>
        <form class="navigation right" method="post" action="<?php echo Config::get('URL');?>watchlist/Add">
            <label></label><input type="hidden" name="movie_id" value="<?= $this->movies->movie_id; ?>"  />
            <label></label><input type="hidden" name="movie_title" value="<?= $this->movies->movie_title; ?>"  />
            <label></label><input type="hidden" name="movie_imgUrl" value="<?= $this->movies->movie_imgUrl; ?>"  />
            <input type="submit" value='Add to watchlist'  autocomplete="off" />
        </form>



        <h3>movies</h3>
        <p>
            this is movieindex
        </p>

		 
        
        <tbody>
        	  
        	  <h1><?= $this->movies->movie_title; ?> 

                <img HEIGHT="20" WIDTH="20" src="http://pngimg.com/upload/star_PNG1592.png"><?= $this->movies->movie_rate;?></h1>

                    <h3>(<?= $this->movies->movie_year; ?>)</h3>

        	           <img HEIGHT="325" WIDTH="225" src="<?= $this->movies->movie_imgUrl; ?>">

                            <p><?= $this->movies->movie_summary; ?></p>

                            <br><br>
                               <h2>Extra info: </h2>

        	                   Runtime: <?= $this->movies->movie_runtime; ?>

        	                   <br>

        	                       Ranking: <?= $this->movies->movie_rank; ?>
                                   <br> 
                                        Genre: <?= $this->movies->movie_genre; ?>                                     
        	                       <br><br>
        </tbody>
<?php } ?>

    </div>
    <div class="box">
<a href="../../movie/toprated"><h3>Back to top rated</h3></a>
</div>
 