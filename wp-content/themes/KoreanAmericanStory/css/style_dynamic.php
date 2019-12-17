<?php

$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}
header("Content-type: text/css; charset=utf-8");
?>
<?php if (!empty($qode_options_infographer['selection_color'])) { ?>
/* Webkit */
::selection {
    background: <?php echo $qode_options_infographer['selection_color'];  ?>;
}
<?php } ?>
<?php if (!empty($qode_options_infographer['selection_color'])) { ?>
/* Gecko/Mozilla */
::-moz-selection {
    background: <?php echo $qode_options_infographer['selection_color'];  ?>;
}
<?php } ?>
<?php if (!empty($qode_options_infographer['background_color']) || !empty($qode_options_infographer['text_color']) || !empty($qode_options_infographer['text_fontsize']) || $qode_options_infographer['google_fonts'] != "-1") { ?>
body {
	<?php if (!empty($qode_options_infographer['background_color'])) { ?> background-color:<?php echo $qode_options_infographer['background_color'];  ?>; <?php } ?>
	<?php if($qode_options_infographer['google_fonts'] != "-1"){ ?>
	<?php $font = str_replace('+', ' ', $qode_options_infographer['google_fonts']); ?>
	font-family: <?php echo $font; ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_infographer['text_color'])) { ?> color: <?php echo $qode_options_infographer['text_color'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_infographer['text_fontsize'])) { ?> font-size: <?php echo $qode_options_infographer['text_fontsize']; ?>px; <?php } ?>
	
}
<?php } ?>
<?php
if (!empty($qode_options_infographer['first_color'])) {
?>
nav.main_menu > ul > li.active > a, 
nav.main_menu > ul > li.has_sub:hover > a, 
nav.main_menu > ul > li:hover > a,
nav.content_menu,
.button, 
input[type='submit'], 
.load_more a,
.flip_image.back,
.flip_icon.back,
.highlight,
.filter_holder ul,
.projects_holder article .hover_inner .hover_inner_link_text_holder,
.flex-direction-nav .flex-next:hover,
.flex-direction-nav .flex-prev:hover,
.two_columns_66_33 .column1 .flex-direction-nav .flex-prev:hover,
.two_columns_66_33 .column1 .flex-direction-nav .flex-next:hover,
.progress_bars_vertical.background_color .progress_content_outer .progress_content,
.portfolio_navigation .portfolio_prev a:hover, 
.portfolio_navigation .portfolio_next a:hover, 
.portfolio_navigation .portfolio_button a:hover,
.progress_bars.normal .progress_content,
.tabs .tabs-nav li.active a,
.message,
.testimonials_text_holder,
.pie_graf_legend ul li .color_holder,
.line_graf_legend ul li .color_holder,
.price_tables.light .puchase_cell,
.price_table_inner ul li .button,
.active_best_price,
.pagination ul li a:hover, 
.pagination ul li.active span,
.back_to_previous:hover,
#back_to_top,
#back_to_top:hover,
.widget.widget_search form input[type="submit"],
.widget .tagcloud a:hover
{
	background-color: <?php echo $qode_options_infographer['first_color'];?>;
}
.progress_bars.gradient .progress_content{
	background-color: <?php echo $qode_options_infographer['first_color'];?>;
	background: -moz-linear-gradient(left,  #262626 9%, <?php echo $qode_options_infographer['first_color'];?> 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, right top, color-stop(9%,#262626), color-stop(100%,<?php echo $qode_options_infographer['first_color'];?>)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(left,  #262626 9%,<?php echo $qode_options_infographer['first_color'];?> 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(left,  #262626 9%,<?php echo $qode_options_infographer['first_color'];?> 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(left,  #262626 9%,<?php echo $qode_options_infographer['first_color'];?> 100%); /* IE10+ */
	background: linear-gradient(to right,  #262626 9%,<?php echo $qode_options_infographer['first_color'];?> 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#262626', endColorstr='<?php echo $qode_options_infographer['first_color'];?>',GradientType=1 ); /* IE6-8 */
}
.portfolio_single_text_holder h4,
.post .read_more,
.comment_holder .comment .text .replay:hover,
.comment_holder .comment .text .comment-reply-link:hover,
.progress_bars_vertical.pattern .progress_number
{
	color: <?php echo $qode_options_infographer['first_color'];?>;
}
nav.content_menu ul li .arrow,
.tabs .tabs-nav li.active .arrow,
.message_arrow
{
	border-color: <?php echo $qode_options_infographer['first_color'];?> transparent transparent transparent;
}
.testimonial_arrow
{
	border-color: transparent <?php echo $qode_options_infographer['first_color'];?> transparent transparent;
}
blockquote
{
	border-color: <?php echo $qode_options_infographer['first_color'];?>;
}
<?php } ?>

<?php
if (!empty($qode_options_infographer['second_color'])) {
?>
blockquote,
.portfolio_navigation .portfolio_prev a, 
.portfolio_navigation .portfolio_next a, 
.portfolio_navigation .portfolio_button, 
.portfolio_navigation .portfolio_button a,
input[type='text'],
.social-share ul li a,
textarea,
table.standard_table th,
table.standard_table tr:nth-child(odd) td,
.price_table_inner,
.price_tables.light .price_cell,
.comment_holder .comment,
.pagination ul li span,
.pagination ul li a,
.tabs .tabs-container,
.progress_bars .progress_content_outer
{
	background-color: <?php echo $qode_options_infographer['second_color'];?>;
}
<?php } ?>
<?php
if (!empty($qode_options_infographer['header_background_color'])) {
?>
header .header_outer,
.selectnav ul {
	background-color: <?php echo $qode_options_infographer['header_background_color'];  ?>;
}
<?php
}
?> 

<?php
$boxed = "no";
if (isset($qode_options_infographer['boxed']))
	$boxed = $qode_options_infographer['boxed'];
?>
<?php if($boxed == "yes"){ ?>
body.boxed{
<?php if (!empty($qode_options_infographer['background_color_box'])) { ?> background-color:<?php echo $qode_options_infographer['background_color_box'];  ?>; <?php } ?>
	<?php if($qode_options_infographer['pattern_background_image'] != ""){  ?>
		background-image: url('<?php echo $qode_options_infographer['pattern_background_image'] ?>');
		background-position: 0px 0px;
		background-repeat: repeat;
	<?php } ?>
	
	<?php if($qode_options_infographer['background_image'] != ""){  ?>
		background-image: url('<?php echo $qode_options_infographer['background_image'] ?>');
		background-attachment: fixed;
		background-position: center 0px;
		background-repeat: no-repeat;
	<?php } ?>
}

<?php if (!empty($qode_options_infographer['background_color'])) { ?>
body.boxed .content{
	 background-color:<?php echo $qode_options_infographer['background_color'];  ?>; 
}
<?php } ?>

<?php } ?>

<?php if (!empty($qode_options_infographer['menu_lineheight']) && $qode_options_infographer['header_hide'] == "no") { ?>
.content{
	margin-top: <?php echo $qode_options_infographer['menu_lineheight']; ?>px;
}
<?php }else if($qode_options_infographer['header_hide'] == "no" || !isset($qode_options_infographer['header_hide'])){ ?>
.content{	
	margin-top: 80px;
}

<?php } ?>

<?php if (!empty($qode_options_infographer['h1_color']) || !empty($qode_options_infographer['h1_fontsize']) || !empty($qode_options_infographer['h1_lineheight']) || !empty($qode_options_infographer['h1_fontstyle']) || !empty($qode_options_infographer['h1_fontweight']) || $qode_options_infographer['h1_google_fonts'] != "-1") { ?>
h1{
	<?php if (!empty($qode_options_infographer['h1_color'])) { ?>	color: <?php echo $qode_options_infographer['h1_color'];  ?>; <?php } ?>
	<?php if($qode_options_infographer['h1_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_infographer['h1_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_infographer['h1_fontsize'])) { ?>font-size: <?php echo $qode_options_infographer['h1_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['h1_lineheight'])) { ?>line-height: <?php echo $qode_options_infographer['h1_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['h1_fontstyle'])) { ?>font-style: <?php echo $qode_options_infographer['h1_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_infographer['h1_fontweight'])) { ?>font-weight: <?php echo $qode_options_infographer['h1_fontweight'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_infographer['page_title_color']) || !empty($qode_options_infographer['page_title_fontsize']) || !empty($qode_options_infographer['page_title_lineheight']) || !empty($qode_options_infographer['page_title_fontstyle']) || !empty($qode_options_infographer['page_title_fontweight']) || $qode_options_infographer['page_title_google_fonts'] != "-1") { ?>
.title h1{
	<?php if (!empty($qode_options_infographer['page_title_color'])) { ?>color: <?php echo $qode_options_infographer['page_title_color'];  ?>; <?php } ?>
	<?php if($qode_options_infographer['page_title_google_fonts'] != "-1"){ ?>
    text-transform: uppercase;
	font-family: <?php echo str_replace('+', ' ', $qode_options_infographer['page_title_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_infographer['page_title_fontsize'])) { ?>font-size: <?php echo $qode_options_infographer['page_title_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['page_title_lineheight'])) { ?>line-height: <?php echo $qode_options_infographer['page_title_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['page_title_fontstyle'])) { ?>font-style: <?php echo $qode_options_infographer['page_title_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_infographer['page_title_fontweight'])) { ?>font-weight: <?php echo $qode_options_infographer['page_title_fontweight'];  ?>; <?php } ?>
	
}
<?php } ?>

<?php if ($qode_options_infographer['page_title_position'] != "0") { ?>
.title .title_text{
	<?php if($qode_options_infographer['page_title_position'] != "0"){ ?>
		text-align: <?php if($qode_options_infographer['page_title_position'] == "1"){echo "left";} if($qode_options_infographer['page_title_position'] == "2"){echo "center";} if($qode_options_infographer['page_title_position'] == "3"){echo "right";}  ?>;
	<?php } ?>
}
<?php } ?>

<?php if (!empty($qode_options_infographer['page_title_color'])){ ?>
.title .title_text span{
	color: <?php echo $qode_options_infographer['page_title_color'];  ?>;
}
<?php } ?>

<?php if (!empty($qode_options_infographer['h2_color']) || !empty($qode_options_infographer['h2_fontsize']) || !empty($qode_options_infographer['h2_lineheight']) || !empty($qode_options_infographer['h2_fontstyle']) || !empty($qode_options_infographer['h2_fontweight']) || $qode_options_infographer['h2_google_fonts'] != "-1") { ?>
h2, h2 a,
.blog_single_holder h2
{
	<?php if (!empty($qode_options_infographer['h2_color'])) { ?>color: <?php echo $qode_options_infographer['h2_color'];  ?>; <?php } ?>
	<?php if($qode_options_infographer['h2_google_fonts'] != "-1"){ ?>
		font-family: <?php echo str_replace('+', ' ', $qode_options_infographer['h2_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_infographer['h2_fontsize'])) { ?>font-size: <?php echo $qode_options_infographer['h2_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['h2_lineheight'])) { ?>line-height: <?php echo $qode_options_infographer['h2_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['h2_fontstyle'])) { ?>font-style: <?php echo $qode_options_infographer['h2_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_infographer['h2_fontweight'])) { ?>font-weight: <?php echo $qode_options_infographer['h2_fontweight'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_infographer['h3_color']) || !empty($qode_options_infographer['h3_fontsize']) || !empty($qode_options_infographer['h3_lineheight']) || !empty($qode_options_infographer['h3_fontstyle']) || !empty($qode_options_infographer['h3_fontweight']) || $qode_options_infographer['h3_google_fonts'] != "-1") { ?>
h3, h3 a{
	<?php if (!empty($qode_options_infographer['h3_color'])) { ?>color: <?php echo $qode_options_infographer['h3_color'];  ?>; <?php } ?>
	<?php if($qode_options_infographer['h3_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_infographer['h3_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_infographer['h3_fontsize'])) { ?>font-size: <?php echo $qode_options_infographer['h3_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['h3_lineheight'])) { ?>line-height: <?php echo $qode_options_infographer['h3_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['h3_fontstyle'])) { ?>font-style: <?php echo $qode_options_infographer['h3_fontstyle'];?>; <?php } ?>
	<?php if (!empty($qode_options_infographer['h3_fontweight'])) { ?>font-weight: <?php echo $qode_options_infographer['h3_fontweight'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_infographer['h4_color']) || !empty($qode_options_infographer['h4_fontsize']) || !empty($qode_options_infographer['h4_lineheight']) || !empty($qode_options_infographer['h4_fontstyle']) || !empty($qode_options_infographer['h4_fontweight']) || $qode_options_infographer['h4_google_fonts'] != "-1") { ?>
h4, h4 a{
	<?php if (!empty($qode_options_infographer['h4_color'])) { ?>color: <?php echo $qode_options_infographer['h4_color'];  ?>; <?php } ?>
	<?php if($qode_options_infographer['h4_google_fonts'] != "-1"){ ?>
		font-family: <?php echo str_replace('+', ' ', $qode_options_infographer['h4_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_infographer['h4_fontsize'])) { ?>font-size: <?php echo $qode_options_infographer['h4_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['h4_lineheight'])) { ?>line-height: <?php echo $qode_options_infographer['h4_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['h4_fontstyle'])) { ?>font-style: <?php echo $qode_options_infographer['h4_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_infographer['h4_fontweight'])) { ?>font-weight: <?php echo $qode_options_infographer['h4_fontweight'];  ?>; <?php } ?>
}
<?php } ?>

<?php if (!empty($qode_options_infographer['h5_color']) || !empty($qode_options_infographer['h5_fontsize']) || !empty($qode_options_infographer['h5_lineheight']) || !empty($qode_options_infographer['h5_fontstyle']) || !empty($qode_options_infographer['h5_fontweight']) || $qode_options_infographer['h5_google_fonts'] != "-1") { ?>
h5{
	<?php if (!empty($qode_options_infographer['h5_color'])) { ?>color: <?php echo $qode_options_infographer['h5_color'];  ?>; <?php } ?>
	<?php if($qode_options_infographer['h5_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_infographer['h5_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_infographer['h5_fontsize'])) { ?>font-size: <?php echo $qode_options_infographer['h5_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['h5_lineheight'])) { ?>line-height: <?php echo $qode_options_infographer['h5_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['h5_fontstyle'])) { ?>font-style: <?php echo $qode_options_infographer['h5_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_infographer['h5_fontweight'])) { ?>font-weight: <?php echo $qode_options_infographer['h5_fontweight'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_infographer['h6_color']) || !empty($qode_options_infographer['h6_fontsize']) || !empty($qode_options_infographer['h6_lineheight']) || !empty($qode_options_infographer['h6_fontstyle']) || !empty($qode_options_infographer['h6_fontweight']) || $qode_options_infographer['h6_google_fonts'] != "-1") { ?>
h6{
	<?php if (!empty($qode_options_infographer['h6_color'])) { ?>color: <?php echo $qode_options_infographer['h6_color'];  ?>; <?php } ?>
	<?php if($qode_options_infographer['h6_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_infographer['h6_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_infographer['h6_fontsize'])) { ?>font-size: <?php echo $qode_options_infographer['h6_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['h6_lineheight'])) { ?>line-height: <?php echo $qode_options_infographer['h6_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['h6_fontstyle'])) { ?>font-style: <?php echo $qode_options_infographer['h6_fontstyle'];  ?>;  <?php } ?>
	<?php if (!empty($qode_options_infographer['h6_fontweight'])) { ?>font-weight: <?php echo $qode_options_infographer['h6_fontweight'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_infographer['text_color']) || !empty($qode_options_infographer['text_fontsize']) || !empty($qode_options_infographer['text_lineheight']) || !empty($qode_options_infographer['text_fontstyle']) || !empty($qode_options_infographer['text_fontweight']) || $qode_options_infographer['text_google_fonts'] != "-1") { ?>
p,
.title span{
	<?php if (!empty($qode_options_infographer['text_color'])) { ?>color: <?php echo $qode_options_infographer['text_color'];  ?>;<?php } ?>
	<?php if($qode_options_infographer['text_google_fonts'] != "-1"){ ?>
		font-family: <?php echo str_replace('+', ' ', $qode_options_infographer['text_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_infographer['text_fontsize'])) { ?>font-size: <?php echo $qode_options_infographer['text_fontsize'];  ?>px;<?php } ?>
	<?php if (!empty($qode_options_infographer['text_lineheight'])) { ?>line-height: <?php echo $qode_options_infographer['text_lineheight'];  ?>px;<?php } ?>
	<?php if (!empty($qode_options_infographer['text_fontstyle'])) { ?>font-style: <?php echo $qode_options_infographer['text_fontstyle'];  ?>;<?php } ?>
	<?php if (!empty($qode_options_infographer['text_fontweight'])) { ?>font-weight: <?php echo $qode_options_infographer['text_fontweight'];  ?>;<?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_infographer['text_color']) || !empty($qode_options_infographer['text_fontsize']) || !empty($qode_options_infographer['text_lineheight']) || !empty($qode_options_infographer['text_fontstyle']) || !empty($qode_options_infographer['text_fontweight']) || $qode_options_infographer['text_google_fonts'] != "-1") { ?>
.post_info .author, 
.post_info .category,
.post_info .author span, 
.post_info .category span,
.post_info .category span a,
.post_info .comment_number a,
.post_date .month
{
	<?php if (!empty($qode_options_infographer['text_color'])) { ?>color: <?php echo $qode_options_infographer['text_color'];  ?>;<?php } ?>
	<?php if($qode_options_infographer['text_google_fonts'] != "-1"){ ?>
		font-family: <?php echo str_replace('+', ' ', $qode_options_infographer['text_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_infographer['text_fontsize'])) { ?>font-size: <?php echo $qode_options_infographer['text_fontsize'];  ?>px;<?php } ?>
	<?php if (!empty($qode_options_infographer['text_lineheight'])) { ?>line-height: <?php echo $qode_options_infographer['text_lineheight'];  ?>px;<?php } ?>
	<?php if (!empty($qode_options_infographer['text_fontstyle'])) { ?>font-style: <?php echo $qode_options_infographer['text_fontstyle'];  ?>;<?php } ?>
	<?php if (!empty($qode_options_infographer['text_fontweight'])) { ?>font-weight: <?php echo $qode_options_infographer['text_fontweight'];  ?>;<?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_infographer['text_color'])) { ?>
.post_date .day{
	<?php if (!empty($qode_options_infographer['text_color'])) { ?>color: <?php echo $qode_options_infographer['text_color'];  ?>;<?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_infographer['link_color']) || !empty($qode_options_infographer['link_fontstyle']) || !empty($qode_options_infographer['link_fontweight']) || !empty($qode_options_infographer['link_fontdecoration'])) { ?>
a, p a{
	<?php if (!empty($qode_options_infographer['link_color'])) { ?>color: <?php echo $qode_options_infographer['link_color'];  ?>;<?php } ?>
	<?php if (!empty($qode_options_infographer['link_fontstyle'])) { ?>font-style: <?php echo $qode_options_infographer['link_fontstyle'];  ?>;<?php } ?>
	<?php if (!empty($qode_options_infographer['link_fontweight'])) { ?>font-weight: <?php echo $qode_options_infographer['link_fontweight'];  ?>;<?php } ?>
	<?php if (!empty($qode_options_infographer['link_fontdecoration'])) { ?>text-decoration: <?php echo $qode_options_infographer['link_fontdecoration'];  ?>;<?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_infographer['link_hovercolor']) || !empty($qode_options_infographer['link_fontdecoration'])) { ?>
a:hover, p a:hover{
	<?php if (!empty($qode_options_infographer['link_hovercolor'])) { ?>color: <?php echo $qode_options_infographer['link_hovercolor'];  ?>;<?php } ?>
	<?php if (!empty($qode_options_infographer['link_fontdecoration'])) { ?>text-decoration: <?php echo $qode_options_infographer['link_fontdecoration'];  ?>;<?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_infographer['separator_thickness']) || !empty($qode_options_infographer['separator_topmargin']) || !empty($qode_options_infographer['separator_bottommargin']) || !empty($qode_options_infographer['separator_color'])) { ?>
.separator{
<?php if (!empty($qode_options_infographer['separator_thickness'])) { ?>	height: <?php echo $qode_options_infographer['separator_thickness'];  ?>px; <?php } ?>
<?php if (!empty($qode_options_infographer['separator_topmargin'])) { ?>	margin-top: <?php echo $qode_options_infographer['separator_topmargin'];  ?>px; <?php } ?>
<?php if (!empty($qode_options_infographer['separator_bottommargin'])) { ?>	margin-bottom: <?php echo $qode_options_infographer['separator_bottommargin'];  ?>px; <?php } ?>
<?php if (!empty($qode_options_infographer['separator_color'])) { ?>	background-color: <?php echo $qode_options_infographer['separator_color'];  ?>; <?php } ?>
}
<?php if (!empty($qode_options_infographer['separator_color'])) { ?>
.blog_single_holder,
.blog_holder.blog_sidebar article,
.blog_holder section,
.latest_post_small
{
	 border-color: <?php echo $qode_options_infographer['separator_color'];  ?>;
}

<?php } ?>

<?php } ?>
<?php if (!empty($qode_options_infographer['separator_pattern_topmargin']) || !empty($qode_options_infographer['separator_pattern_bottommargin']) || !empty($qode_options_infographer['separator_pattern_color'])) { ?>
.separator.pattern {
	<?php if (!empty($qode_options_infographer['separator_pattern_color'])) { ?>
    background-color: <?php echo $qode_options_infographer['separator_pattern_color'];  ?>;
	<?php } ?>
	<?php if (!empty($qode_options_infographer['separator_pattern_topmargin'])) { ?>
    margin-top: <?php echo $qode_options_infographer['separator_pattern_topmargin'];  ?>px;
	<?php } ?>
	<?php if (!empty($qode_options_infographer['separator_pattern_bottommargin'])) { ?>
	margin-bottom: <?php echo $qode_options_infographer['separator_pattern_bottommargin'];  ?>px;
	<?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_infographer['button_title_color']) || !empty($qode_options_infographer['button_title_fontsize']) || !empty($qode_options_infographer['button_title_lineheight']) || !empty($qode_options_infographer['button_title_fontstyle']) || !empty($qode_options_infographer['button_title_fontweight']) || !empty($qode_options_infographer['button_backgroundcolor']) || $qode_options_infographer['button_title_google_fonts'] != "-1") { ?>
.button, input[type="submit"],
input[type="password"], .load_more a{
<?php if (!empty($qode_options_infographer['button_title_color'])) { ?>	color: <?php echo $qode_options_infographer['button_title_color'];  ?>; <?php } ?>
	<?php if($qode_options_infographer['button_title_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_infographer['button_title_google_fonts']); ?>, sans-serif;
	<?php } ?>
<?php if (!empty($qode_options_infographer['button_title_fontsize'])) { ?>	font-size: <?php echo $qode_options_infographer['button_title_fontsize'];  ?>px; <?php } ?>
<?php if (!empty($qode_options_infographer['button_title_lineheight'])) { ?>	line-height: <?php echo $qode_options_infographer['button_title_lineheight'];  ?>px; <?php } ?>
<?php if (!empty($qode_options_infographer['button_title_fontstyle'])) { ?>	font-style: <?php echo $qode_options_infographer['button_title_fontstyle'];  ?>; <?php } ?>
<?php if (!empty($qode_options_infographer['button_title_fontweight'])) { ?>	font-weight: <?php echo $qode_options_infographer['button_title_fontweight'];  ?>; <?php } ?>
<?php if (!empty($qode_options_infographer['button_backgroundcolor'])) { ?>	background-color: <?php echo $qode_options_infographer['button_backgroundcolor'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_infographer['button_title_hovercolor'])) { ?>
.button:hover,
input[type='submit']:hover, .load_more a:hover{
	<?php if (!empty($qode_options_infographer['button_title_hovercolor'])) { ?> color: <?php echo $qode_options_infographer['button_title_hovercolor'];?> !important; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_infographer['message_backgroundcolor'])) { ?>
.message{
	background-color: <?php echo $qode_options_infographer['message_backgroundcolor'];  ?>; 
}
.message_arrow {
	  border-color: <?php echo $qode_options_infographer['message_backgroundcolor'];  ?> transparent transparent;
}
<?php } ?>
<?php if (!empty($qode_options_infographer['blockquote_background_color'])) { ?>
	blockquote{
		background-color: <?php echo $qode_options_infographer['blockquote_background_color'];  ?>;
	}
<?php } ?>
<?php if (!empty($qode_options_infographer['blockquote_font_color'])) { ?>
	blockquote p{
		color: <?php echo $qode_options_infographer['blockquote_font_color'];  ?>;  
	}
<?php } ?>
<?php if (!empty($qode_options_infographer['message_title_color']) || $qode_options_infographer['message_title_google_fonts'] != "-1") { ?>
.message *{
	<?php if (!empty($qode_options_infographer['message_title_color'])) { ?>
	color: <?php echo $qode_options_infographer['message_title_color'];  ?> !important;
	<?php } ?>
	<?php if($qode_options_infographer['message_title_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_infographer['message_title_google_fonts']); ?>, sans-serif !important;
	<?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_infographer['highlight_color'])) { ?>
.highlight {
	background-color: <?php echo $qode_options_infographer['highlight_color'];  ?>;
}
<?php } ?>
<?php
$parallax_onoff = "on";
if (isset($qode_options_infographer['parallax_onoff']))
	$parallax_onoff = $qode_options_infographer['parallax_onoff'];
if ($parallax_onoff == "off"){
?>

	.touch .parallax section{
		height: auto !important;
		min-height: 300px;  
		background-position: center top !important;  
		background-size: 100% auto !important;  
		background-attachment: scroll;
	}
		
	.touch	.parallax section.no_background{
		padding: 0px;
	}

<?php } ?>
<?php if (!empty($qode_options_infographer['menu_color']) || !empty($qode_options_infographer['menu_fontsize']) || !empty($qode_options_infographer['menu_lineheight']) || !empty($qode_options_infographer['menu_fontstyle']) || !empty($qode_options_infographer['menu_fontweight']) || $qode_options_infographer['menu_google_fonts'] != "-1") { ?>
nav.main_menu ul li > a{
	<?php if (!empty($qode_options_infographer['menu_color'])) { ?> color: <?php echo $qode_options_infographer['menu_color'];  ?>; <?php } ?>
	<?php if($qode_options_infographer['menu_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_infographer['menu_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_infographer['menu_fontsize'])) { ?> font-size: <?php echo $qode_options_infographer['menu_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['menu_lineheight'])) { ?> line-height: <?php echo $qode_options_infographer['menu_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['menu_fontstyle'])) { ?> font-style: <?php echo $qode_options_infographer['menu_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_infographer['menu_fontweight'])) { ?> font-weight: <?php echo $qode_options_infographer['menu_fontweight'];  ?>; <?php } ?>

}
<?php } ?>
<?php if (!empty($qode_options_infographer['menu_hovercolor']) || !empty($qode_options_infographer['menu_hoverbackgroundcolor'])) { ?>
nav.main_menu > ul > li.active > a, 
nav.main_menu > ul > li.has_sub:hover > a, 
nav.main_menu > ul > li:hover > a{
	color: <?php echo $qode_options_infographer['menu_hovercolor'];  ?>;
	background-color: <?php echo $qode_options_infographer['menu_hoverbackgroundcolor'];  ?>;
}
<?php } ?>

<?php if (!empty($qode_options_infographer['menu_lineheight'])){ ?>
	.header_right_widget{
		line-height: <?php echo $qode_options_infographer['menu_lineheight'];  ?>px;
	}

<?php } ?>

<?php if(!empty($qode_options_infographer['dropdown_color']) || !empty($qode_options_infographer['dropdown_fontsize']) || !empty($qode_options_infographer['dropdown_lineheight']) || !empty($qode_options_infographer['dropdown_fontstyle']) || !empty($qode_options_infographer['dropdown_fontweight']) || $qode_options_infographer['dropdown_google_fonts'] != "-1"){ ?>
.drop_down .second .inner2 > ul > li > a{
	<?php if (!empty($qode_options_infographer['dropdown_color'])) { ?> color: <?php echo $qode_options_infographer['dropdown_color']; ?>; <?php } ?>
	<?php if($qode_options_infographer['dropdown_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_infographer['dropdown_google_fonts']) ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_infographer['dropdown_fontsize'])) { ?> font-size: <?php echo $qode_options_infographer['dropdown_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['dropdown_lineheight'])) { ?> line-height: <?php echo $qode_options_infographer['dropdown_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['dropdown_fontstyle'])) { ?> font-style: <?php echo $qode_options_infographer['dropdown_fontstyle'];  ?>;  <?php } ?>
	<?php if (!empty($qode_options_infographer['dropdown_fontweight'])) { ?>font-weight: <?php echo $qode_options_infographer['dropdown_fontweight'];  ?>; <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_infographer['dropdown_hovercolor'])) { ?>
.drop_down .second .inner2 > ul > li:hover > a{
	color: <?php echo $qode_options_infographer['dropdown_hovercolor'];  ?>;
}
<?php } ?>
<?php if(!empty($qode_options_infographer['dropdown_color_thirdlvl']) || !empty($qode_options_infographer['dropdown_fontsize_thirdlvl']) || !empty($qode_options_infographer['dropdown_lineheight_thirdlvl']) || !empty($qode_options_infographer['dropdown_fontstyle_thirdlvl']) || !empty($qode_options_infographer['dropdown_fontweight_thirdlvl']) || $qode_options_infographer['dropdown_google_fonts_thirdlvl'] != "-1"){ ?>
.drop_down .second .inner2 ul li.sub ul li a
{
	<?php if (!empty($qode_options_infographer['dropdown_color_thirdlvl'])) { ?> color: <?php echo $qode_options_infographer['dropdown_color_thirdlvl'];  ?> !important;  <?php } ?>
	<?php if($qode_options_infographer['dropdown_google_fonts_thirdlvl'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_infographer['dropdown_google_fonts_thirdlvl']) ?>, sans-serif !important;
	<?php } ?>
	<?php if (!empty($qode_options_infographer['dropdown_fontsize_thirdlvl'])) { ?> font-size: <?php echo $qode_options_infographer['dropdown_fontsize_thirdlvl'];  ?>px !important;  <?php } ?>
	<?php if (!empty($qode_options_infographer['dropdown_lineheight_thirdlvl'])) { ?> line-height: <?php echo $qode_options_infographer['dropdown_lineheight_thirdlvl'];  ?>px !important;  <?php } ?>
	<?php if (!empty($qode_options_infographer['dropdown_fontstyle_thirdlvl'])) { ?> font-style: <?php echo $qode_options_infographer['dropdown_fontstyle_thirdlvl'];  ?> !important;   <?php } ?>
	<?php if (!empty($qode_options_infographer['dropdown_fontweight_thirdlvl'])) { ?> font-weight: <?php echo $qode_options_infographer['dropdown_fontweight_thirdlvl'];  ?> !important;  <?php } ?>
}
<?php } ?>
<?php if (!empty($qode_options_infographer['dropdown_hovercolor_thirdlvl'])) { ?>
.drop_down .second .inner2 ul li.sub ul li:hover a{
	color: <?php echo $qode_options_infographer['dropdown_hovercolor_thirdlvl'];  ?> !important;
}
<?php } ?>



<?php
if (!empty($qode_options_lounge['background_color'])) {
$bg_color = hex2rgb($qode_options_lounge['background_color']);
?>
.header_inner {

	background-color: rgb(<?php echo $bg_color[0]; ?>,<?php echo $bg_color[1]; ?>,<?php echo $bg_color[2]; ?>);
	background-color: rgba(<?php echo $bg_color[0]; ?>,<?php echo $bg_color[1]; ?>,<?php echo $bg_color[2]; ?>,0.85);
}
<?php
}
?>

<?php if (!empty($qode_options_infographer['dropdown_background_color'])) { 
$dropdown_background_color = hex2rgb($qode_options_infographer['dropdown_background_color']);
?>
	.drop_down .second .inner2, .drop_down .second .inner ul li ul {
		background-color: rgb(<?php echo $dropdown_background_color[0]; ?>,<?php echo $dropdown_background_color[1]; ?>,<?php echo $dropdown_background_color[2]; ?>);
		background-color: rgba(<?php echo $dropdown_background_color[0]; ?>,<?php echo $dropdown_background_color[1]; ?>,<?php echo $dropdown_background_color[2]; ?>,0.95);
	}
<?php } ?>
<?php if (!empty($qode_options_infographer['content_menu_backgroundcolor'])) { ?>
nav.content_menu{
	background-color: <?php echo $qode_options_infographer['content_menu_backgroundcolor'];  ?>;
}
nav.content_menu ul li .arrow{
	border-color: <?php echo $qode_options_infographer['content_menu_backgroundcolor'];  ?> transparent transparent transparent;
}
<?php } ?>

<?php if (!empty($qode_options_infographer['content_menu_color']) || !empty($qode_options_infographer['content_menu_fontsize']) || !empty($qode_options_infographer['content_menu_lineheight']) || !empty($qode_options_infographer['content_menu_fontstyle']) || !empty($qode_options_infographer['content_menu_fontweight']) || $qode_options_infographer['content_menu_google_fonts'] != "-1") { ?>
nav.content_menu ul li > a{
	<?php if (!empty($qode_options_infographer['content_menu_color'])) { ?> color: <?php echo $qode_options_infographer['content_menu_color'];  ?>; <?php } ?>
	<?php if($qode_options_infographer['content_menu_google_fonts'] != "-1"){ ?>
	font-family: <?php echo str_replace('+', ' ', $qode_options_infographer['content_menu_google_fonts']); ?>, sans-serif;
	<?php } ?>
	<?php if (!empty($qode_options_infographer['content_menu_fontsize'])) { ?> font-size: <?php echo $qode_options_infographer['content_menu_fontsize'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['content_menu_lineheight'])) { ?> line-height: <?php echo $qode_options_infographer['content_menu_lineheight'];  ?>px; <?php } ?>
	<?php if (!empty($qode_options_infographer['content_menu_fontstyle'])) { ?> font-style: <?php echo $qode_options_infographer['content_menu_fontstyle'];  ?>; <?php } ?>
	<?php if (!empty($qode_options_infographer['content_menu_fontweight'])) { ?> font-weight: <?php echo $qode_options_infographer['content_menu_fontweight'];  ?>; <?php } ?>

}
<?php } ?>
<?php if (!empty($qode_options_infographer['content_menu_hovercolor'])) { ?>
nav.content_menu > ul > li:hover > a{
	color: <?php echo $qode_options_infographer['content_menu_hovercolor'];  ?>;
}
<?php } ?>

<?php if (!empty($qode_options_infographer['content_menu_position']) && $qode_options_infographer['content_menu_position'] == "left") { ?>
nav.content_menu ul{
	text-align: <?php echo $qode_options_infographer['content_menu_position'];  ?>;
}

.content_menu .logo{
	position: relative;
	margin: 0px;
	left: 0px;
}
<?php } ?>

<?php if (!empty($qode_options_infographer['content_menu_lineheight'])) { ?>
nav.content_menu .back_outer,
nav.content_menu .back,
nav.content_menu .nav_select_menu .nav_select_button{
	height: <?php echo $qode_options_infographer['content_menu_lineheight'];  ?>px;
}
<?php } ?>

<?php if ($qode_options_infographer['header_fixed'] == "no") { ?>
	header{
		position: relative;
	}
	.content {
		margin: -3px 0px 0px 0px;
    padding-top: 0px;
	}
	
<?php } ?>

<?php if (!empty($qode_options_infographer['footer_top_title_color'])) { ?>
.footer_top h4{
	 color: <?php echo $qode_options_infographer['footer_top_title_color'];  ?>;
}
<?php } ?>

<?php if (!empty($qode_options_infographer['footer_top_text_color'])) { ?>
.footer_top ul li a, .footer_top a, .footer_top p {
    color: <?php echo $qode_options_infographer['footer_top_text_color'];  ?>;
}
<?php } ?>

<?php if (!empty($qode_options_infographer['footer_top_background_color'])) { ?>
	footer {
		background-color: <?php echo $qode_options_infographer['footer_top_background_color'];  ?>;
	}
<?php } ?>

<?php if (!empty($qode_options_infographer['footer_bottom_background_color'])) { ?>
	.footer_bottom {
		background-color:<?php echo $qode_options_infographer['footer_bottom_background_color'];  ?>;
	}
<?php } ?>

<?php if (!empty($qode_options_infographer['footer_bottom_text_color'])) { ?>
.footer_bottom, .footer_bottom p, .footer_bottom p a{
	color:<?php echo $qode_options_infographer['footer_bottom_text_color'];  ?>;
}
<?php } ?>