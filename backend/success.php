<?php if(count($valids) > 0):    ?>
	<div id="success">
		<?php foreach ($valids as $valid): ?>

			<p><?php echo $valid; ?></p>
		<?php endforeach  ?>
	</div>


<?php endif ?>