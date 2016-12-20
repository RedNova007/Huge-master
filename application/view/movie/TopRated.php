<div class="container">
    <h1>Movie</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <h3>movies</h3>
        <p>
            this is top 10
        </p>

            <form class="search-box" method="post" action="<?php echo Config::get('URL');?>movie/toprated">
            <label></label><input type="text" name="search" />
            <input type="submit" value='Search' autocomplete="off" />
            </form>

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
                     <a href="<?= Config::get('URL') . 'movie/edit/' . $movie->movie_id; ?>"><img HEIGHT="16" WIDTH="16" src="https://cdn4.iconfinder.com/data/icons/miu/24/editor-pencil-pen-edit-write-glyph-128.png"></a>
                    <?php endif; ?></td>

                </tr>
<?php } ?>
            </tbody>
        </table>
    </div>
<a href="../movie/index"><h3>Back to movies</h3></a>
</div>