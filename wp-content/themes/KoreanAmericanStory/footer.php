<?php global $qode_options_infographer; ?>
				
		</div>
	</div>
		<footer>
					
			<?php	
			$display_footer_widget = false;
			if ($qode_options_infographer['footer_widget_area'] == "yes") $display_footer_widget = true;
			if($display_footer_widget): ?> 
			<div class="footer_top_holder">
				<div class="container">
					<div class="container_inner">
						<div class="footer_top">
							<div class="four_columns clearfix">
								<div class="column1">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_1' ); ?>
									</div>
								</div>
								<div class="column2">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_2' ); ?>
									</div>
								</div>
								<div class="column3">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_3' ); ?>
									</div>
								</div>
								<div class="column4">
									<div class="column_inner">
										<?php dynamic_sidebar( 'footer_column_4' ); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			
			<?php
			$display_footer_text = false;
			if (isset($qode_options_infographer['footer_text'])) {
				if ($qode_options_infographer['footer_text'] == "yes") $display_footer_text = true;
			}
			if($display_footer_text): ?>
			<div class="footer_bottom_holder">
				<div class="footer_bottom">
					<div class="container">
						<div class="container_inner">
						<?php dynamic_sidebar( 'footer_text' ); ?>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			
		</footer>
</div>
<?php
global $qode_toolbar;
if(isset($qode_toolbar)) include("toolbar.php")
?>
	<?php wp_footer(); ?>
</body>
</html>