<?php $guests  = get_field('guests'); ?>
<?php $length = count($guests) ?>

<section block="<?php echo $block['id']; ?>" class='guests-block count-<?php echo $length; ?>' guestType='<?php echo get_field('guest_type'); ?>'>
	
	<?php foreach($guests as $guest ){ ?> 
		<div class="guest">
			<div class="guest-img-wrap">
				<?php echo wp_get_attachment_image($guest['image']['ID'], 'medium'); ?>
			</div>
			<p class='center guest-name'><?php echo $guest['name']; ?></p>
			<?php if($guest['title']){
				?> 
				<p class="caption center"><?php echo $guest['title']; ?></p>
				<?php 
			} ?>
			<div class="description">
				<?php echo $guest["description"]; ?>
			</div>
		</div>
	<?php } ?>
</section>