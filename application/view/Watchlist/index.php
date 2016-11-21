<div class="container">
<h1>Watchlist/index</h1>
<div class="box">

<?php $this->renderFeedbackMessages(); ?>
<h3>Your Watchlist: </h3>
<table>
<?php if ($this->watchlist) { ?>
<table>
	<thead>
	<tr>
		<td></td>
		<td>Title</td>
	</tr>
	</thead>

<tbody>
<?php foreach($this->watchlist as $list) { ?>
<tr>                  
	<td><img HEIGHT="200" WIDTH="150" src="<?= $list->movie_imgUrl; ?>"></td>
	<td><a href=<?= Config::get('URL') . 'movie/movieindex/' . $list->movie_id; ?>"><h2><?= $list->movie_title; ?></h2></a></td>
	<td><a href="<?= Config::get('URL') . 'Watchlist/Delete/' . $list->watchlist_id; ?>"><img HEIGHT="32" WIDTH="32" src="https://cdn4.iconfinder.com/data/icons/linecon/512/delete-128.png"></a></td>
</tr>

<?php } ?>
</tbody>
</table>

<?php } else { ?>
	<div>You have no movies added to your watchlist. <a href="../movie/index">Do you want to add a movie?</a></div>
<?php } ?>

</div>
</div>
