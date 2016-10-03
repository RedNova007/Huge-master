<div class="container">
    <h1>IndexController/index</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <h3>movies</h3>
        <p>
        	<?php if (Session::userIsLoggedIn()) {
        		echo "Welcome to my movie review/info website.";
        	}
        		else {
        			echo "Hello this is a movie review/info website. If you want to see our movie assortment please log in or register.";
        		};
        	?>

        </p>
    </div>
</div>
