<div class="container">
<h1>Watchlist/index</h1>
<div class="box">

<!-- echo out the system feedback (error and success messages) -->
<?php $this->renderFeedbackMessages(); ?>
<h3>Your Watchlist</h3>
<table>
<?php if ($this->watchlist) { ?>
<thead>
<tr>
<td>Watchlist_id</td>   
<td>movie_id</td>    
<td>User_id</td>                  
</tr>
</thead>



<tbody>
<?php foreach($this->watchlist as $list) { ?>
<tr>                  
<td><?= $list->watchlist_id; ?></td>
<td><?= $list->movie_id; ?></td>
<td><?= $list->user_id; ?></td>
<td><a href="<?= Config::get('URL') . 'Watchlist/Delete/' . $list->watchlist_id; ?>"><img HEIGHT="16" WIDTH="16" src="http://image.flaticon.com/icons/svg/216/216923.svg"></a></td>

</tr>

<?php } ?>
</tbody>

</table>

<?php } else { ?>
<div>You have no movies added to your watchlist. <a href="../movie/index">Do you want to add a movie?</a></div>
<?php } ?>

</div>
</div>
