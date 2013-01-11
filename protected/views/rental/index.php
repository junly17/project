<h1>All Rentals</h1>
<ul>
<?php foreach($rentals as $r): ?>
	<li>id: <?php echo $r->id; ?> days: <?php echo $r->getDaysLabel(); ?></li>
<?php endforeach; ?>
</ul>
