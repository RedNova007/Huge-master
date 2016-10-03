<div class="container">
    <h1>Movie</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <h3>movies</h3>
        <p>
            this is top 10
        </p>
        </form>
        <table>
        	<thead>
        		<tr>
                    <?php if (Session::get("user_account_type") == 7) : ?>
                     <?php if (View::checkForActiveController($filename, "admin")) {
                        echo ' class="active" ';
                } ?> 
                    <td>id</td>                 
                <?php endif; ?>
                    <td></td>
        			<td>Title</td>
                    <td>year</td>
                    <td>genre</td>
        			<td>Rate</td>
                    <td>Rank</td>
        			<td>Runtime</td>

        		</tr>
        	</thead>
 
            <tbody>
        	 <?php foreach ($this->movies as $movie) { ?>
                <tr>
                    <?php if (Session::get("user_account_type") == 7) : ?>
                     <?php if (View::checkForActiveController($filename, "admin")) {
                        echo ' class="active" ';
                } ?> 
                    <td><?= $movie->movie_id; ?> </td>                  
                <?php endif; ?>
            	 	<td><img HEIGHT="100" WIDTH="75" src="<?= $movie->movie_imgUrl; ?>"></td>
            	 	<td><a href=<?= Config::get('URL') . 'movie/movieindex/' . $movie->movie_id; ?>"> <?= $movie->movie_title; ?></a></td>
                    <td><?= $movie->movie_year; ?></td>
                    <td><?= $movie->movie_genre; ?></td>
            	 	<td><?= $movie->movie_rate; ?></td>
                    <td><?= $movie->movie_rank; ?></td>
            	 	<td><?= $movie->movie_runtime; ?></td>
                    

                    <td><?php if (Session::get("user_account_type") == 7) : ?>
                     <?php if (View::checkForActiveController($filename, "admin")) {
                        echo ' class="active" ';
                    } ?> 
                     <a href="<?= Config::get('URL') . 'movie/Delete/' . $movie->movie_id; ?>"><img HEIGHT="16" WIDTH="16" src="http://www.freeiconspng.com/uploads/remove-icon-png-25.png"></a>
                    <?php endif; ?></td>


                    <td><?php if (Session::get("user_account_type") == 7) : ?>
                     <?php if (View::checkForActiveController($filename, "admin")) {
                        echo ' class="active" ';
                    } ?> 
                     <a href="<?= Config::get('URL') . 'movie/edit/' . $movie->movie_id; ?>"><img HEIGHT="16" WIDTH="16" src="data:image/png;base64,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"></a>
                    <?php endif; ?></td>

                </tr>
<?php } ?>
            </tbody>
        </table>
    </div>
<a href="../movie/index"><h3>Back to movies</h3></a>
</div>