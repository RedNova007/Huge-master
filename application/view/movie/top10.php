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
        			<td>id</td>
        			<td>Title</td>
        			<td>Rate</td>
                    <td>Rank</td>
        			<td>Runtime</td>
        		</tr>
        	</thead>

            <tbody>
        	 <?php foreach ($this->movies as $movie) { ?>
                <tr>
            	 	<td><?= $movie->movie_id; ?> </td>
            	 	<td><a href=<?= Config::get('URL') . 'movie/movieindex/' . $movie->movie_id; ?>"> <?= $movie->movie_title; ?></a></td>
            	 	<td><?= $movie->movie_rate; ?></td>
                    <td><?= $movie->movie_rank; ?></td>
            	 	<td><?= $movie->movie_runtime; ?></td>
                </tr>
<?php } ?>
            </tbody>
        </table>
    </div>
<a href="../movie/index"><h3>Back to movies</h3></a>
</div>