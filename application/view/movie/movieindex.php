<div class="container">
    <h1>Movie Index</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <h3>movies</h3>
        <p>
            this is movieindex
        </p>

		 <?php if ($this->movies) { ?>
        
        <tbody>
        	  <td><img HEIGHT="325" WIDTH="225" src="<?= $this->movies->movie_imgid; ?>" ></td>
        	  <td><h1><?= $this->movies->movie_title; ?></h1></td>
        	  <br>
        	  <td>Runtime: <?= $this->movies->movie_runtime; ?></td>
        	  <br>
        	   <td>Ranking: <?= $this->movies->movie_rank; ?></td>
        	  <br><br><br><br><br><br><br><br><br><br>
        </tbody>
<?php } ?>

    </div>
<a href="../../movie/top10"><h3>Back to top 10</h3></a>
</div>
