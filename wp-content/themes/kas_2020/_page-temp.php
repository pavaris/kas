<?php  //Template Name: Temp

$args2 = array(
			'post_type' => 'video',
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
						'taxonomy' => 'video_type',
						'field'    => 'slug',
						'terms'    => 'legacy-project',
				)
			)); 
			$allVids = new WP_Query($args2);
		
		
if($allVids->have_posts()){
	foreach($allVids->posts as $post){
				
		$comm = get_field('communities',$post->ID);
		$gen = get_field('generation',$post->ID);
		$lang = get_field('language',$post->ID);


		print_r($comm);
		print_r($gen);
		print_r($lang);


		if($comm[0] == '-Select-'){
			echo 'changing';
			update_field('communities', array(), $post->ID);
		}
		if($gen[0] == '-Select-'){
			echo 'changing';
			update_field('generation', array(), $post->ID);
		}
		if($lang[0] == '-Select-'){
			echo 'changing';
			update_field('language', array(), $post->ID);
		}


		?> <br /><?php 
	} 
}



