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

        <h3>movies</h3>
        <p>
            this is movie
        </p>
       		<a href="top10"><h3>top 10 </h3></a>


       		
    </div>
</div>