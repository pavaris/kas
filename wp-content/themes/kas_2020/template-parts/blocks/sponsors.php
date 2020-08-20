<?php $sponsors = get_field('sponsors'); ?>

<section block="<?php echo $block['id']; ?>" class='sponsors-block'>
	<?php foreach($sponsors as $sponsor){ ?> 
		<div class="sponsor">
			<h4><?php echo $sponsor['title']; ?></h4>
			<h3><sup>$</sup><?php echo $sponsor['value']; ?></h3>
			<hr>
			<?php echo $sponsor['description']; ?>
		</div>
	<?php } ?>
</section>