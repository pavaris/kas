<?php
/** WP Frontpage News Pro Add-on main class **/

//TODO: check if free (main) plugin is installed, generate installation error otherwise.

class wpcuWPFnProPlugin extends YD_Plugin {
	
	/** Drop-down menu values **/
	private $_autoanim_trans_values = array(
			'Fade',
			'Slide'
			//'Scroll to left',
			//'Scroll to right',
			//'Scroll to top',
			//'Scroll to bottom'
	);
	
	private $_autoanim_loop_values = array(
			'true',
			'false'
	);
	
	private $_autoanim_slidedir_values = array(
			'horizontal',
			'vertical'
	);
    /**
     *  this class cannot use _field_defaults property from wpcuWPFnPlugin class.
     *  fix notice message undefined  _field_defaults property.
     *  Field default values
     * @var array $_pro_field_defaults
     */
    private $_pro_field_defaults = array(
        'default_img'			=> '',
        'source_type'			=> 'src_category',
        'cat_post_source_order'	=> 'date',
        'cat_post_source_asc'	=> 'desc',
        'cat_source_order'		=> 'date',
        'cat_source_asc'		=> 'desc',
        'pg_source_order'		=> 'order',
        'pg_source_asc'			=> 'desc',
        'show_title'			=> 1,	// Wether or not to display the block title
        'amount_pages'			=> 1,
        'amount_cols'			=> 1,
        'pagination'			=> 0,
        'max_elts'				=> 5,
        'total_width'			=> 100,
        'total_width_unit'		=> 0,	//%
        'crop_title'			=> 2,
        'crop_title_len'		=> 1,
        'crop_text'				=> 2,
        'crop_text_len'			=> 2,
        'autoanimation'			=> 0,
        'autoanimation_trans'	=> 1,
        'theme'					=> 'default',
        'box_top'				=> array(),
        'box_left'				=> array('Thumbnail'),
        'box_right'				=> array('Date','Title','Text'),
        'box_bottom'			=> array(),
        'thumb_img'				=> 0,	// 0 == use featured image
        'thumb_width'			=> 60,	// in px
        'thumb_height'			=> 60,	// in px
        'crop_img'				=> 0,	// 0 == do not crop (== resize to fit)
        'margin_left'			=> 0,
        'margin_top'			=> 0,
        'margin_right'			=> 4,
        'custom_css'			=> '',
        'margin_bottom'			=> 4,
        'date_fmt'				=> '',
        'read_more'				=> '',
        'default_img_previous'	=> '',	// Overridden in constructor
        'default_img'			=> ''	// Overridden in constructor
    );
	
	/** 
	 * Constructor
	 * 
	 */
	public function __construct( $opts ) {

		parent::YD_Plugin( $opts );
		$this->form_blocks = $opts['form_blocks']; // YD Legacy (was to avoid "backlinkware")
		add_theme_support( 'post-formats', array( 'aside', 'gallery' ,'link' , 'image', 'quote', 'status', 'video', 'audio', 'chat') );
		
		if( is_admin() ) {
			
			/** our own filter and actions to plug the pro features into the free plugin **/
			add_filter( 'wpcufpn_src_type', array( $this, 'srcTypeFilter' ) );
			//add_filter('wpcufpn_terms_clauses', array( $this,'wpcufpn_terms_clauses'), 10, 3);
			add_action( 'wpcufpn_source_category_add_fields', array( $this, 'displayContentSourceCategoryTabAddFields' ) );
			add_action( 'wpcufpn_source_page_add_fields', array( $this, 'displayContentSourcePagesTabAddFields' ) );			
			//add_action( 'wpcufpn_displayandtheme_add_fields', array( $this, 'displayNumberOfLinesField' ) );
			add_action( 'wpcufpn_displaytheme_col1_add_fields', array( $this, 'displayDisplayThemeCol1AddFields' ) );
			add_action( 'wpcufpn_displayimagesource_crop_add_fields', array( $this, 'displayImageSourceCropAddFields' ) );
			add_action( 'wpcufpn_displayadvanced_add_fields', array( $this, 'displayAdvancedAddFields' ) );
			add_action( 'wpcufpn_display_about', array( $this, 'displayAbout' ) );
			
			add_filter( 'wpcufpn_themedirs', array( $this, 'themeDirsFilter' ) );
			
			/** Load calendar ui **/
			add_action('admin_enqueue_scripts', array( $this, 'loadAdminScripts' ) );
			add_action( 'wp_ajax_getTaxonomyWPLP', array( $this, 'getTaxonomyWPLP' ) );

			
		} else {
			
			/** front-end display **/
			//add_filter( 'wpcufpn_front_display', array( $this, 'displayFrontAdditionalSources' ), 10, 2 );
			add_filter( 'wpcufpn_src_category_args', array( $this, 'wpcufpn_src_category_argsFilter' ), 10, 2 );
		}
	}
	
	
	
	/**
	 * Loads js/ajax scripts for admin back-office
	 *
	 */
	public function loadAdminScripts( $hook ) {
		
		
		/** Only load on post edit admin page **/
		if( 'post.php' != $hook && 'post-new.php' != $hook )
			return $hook;
		
		if( wpcuWPFnPlugin::CUSTOM_POST_NEWS_WIDGET_NAME != get_post_type() )
			return $hook;
		
		wp_enqueue_script('jquery-ui-datepicker');
		

		/* already loaded by free plugin
		
		wp_deregister_script('jquery');
		
		wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js", null, "1.9.0");
		wp_register_script('jquery-ui', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js", "jquery", "1.10.2");
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui');
	
		*/
		/*		
		wp_enqueue_script(
			'jquery-ui',
			'http://code.jquery.com/ui/1.9.1/jquery-ui.js',
			array( 'jquery' ),
			'1.0',
			true
		);
		*/
		
		
		
		/** choose right language for datepicker js, if available **/
		$lang = defined('WPLANG')?str_replace('_','-',WPLANG):'en-us';
		$shortlang = preg_replace( '/\-.*$/', '', $lang );
		$dir = dirname( plugin_dir_path( __FILE__ ) );
		
		
		/** if the right language file is not present, this will default to already loaded jquery-ui **/
		$file = 'js/jquery.ui.datepicker-' . $shortlang . '.js'; 
		if( file_exists( $dir . '/' . $file ) ) {
			wp_enqueue_script(
				'datepicker-lang',
				plugins_url( $file, dirname( __FILE__ ) ),
				array( 'jquery', 'jquery-ui' ),
				'1.0',
				true
			);
		}

		/** if the right language file is not present, this will default to already loaded jquery-ui **/
		$file = 'js/date-' . $lang . '.js';
		if( file_exists( $dir . '/' . $file ) ) {
			wp_enqueue_script(
					'date-js',
					plugins_url( $file, dirname( __FILE__ ) ),
					array( 'jquery', 'jquery-ui' ),
					'1.0',
					true
			);
		}
	}
	
	/**
	 * Adds pro tabs to the src_type tabbed menu
	 * 
	 * @param array $tabs	array of tab menu generation data
	 * @return array $tabs
	 */
	public function srcTypeFilter( $tabs ) {
		$mytabs = array(
			'tab-1-3' => array(
				'id'	=> 'tab-src_tags',
				'name'	=> __( 'Tags', 'wpcufpn' ),
				'value'		=> 'src_tags',
				'method'	=> array( $this, 'displayContentSourceTagsTab' )
			),
			'tab-1-4' => array(
				'id'	=> 'tab-src_custom_post_type',
				'name'	=> __( 'Custom Post Type', 'wpcufpn' ),
				'value'		=> 'src_custom_post_type',
				'method'	=> array( $this, 'displayContentCustomPostTypeTab' )
			)
		);
		$tabs = array_merge( $tabs, $mytabs );
		return $tabs;
	}
	
	/**
	 * Adds list of pro theme directories
	 * 
	 * @param array $dirs	free plugin list of theme dirs
	 * @return array		complete list of theme dirs merges with pro
	 */
	public function themeDirsFilter( $idirs=array() ) {

        $theme_root = dirname( dirname( __FILE__ ) ) . '/themes';
		//echo 'pro theme dir: ' . $theme_root . '<br/>';	//Debug
		$dirs = @ scandir( $theme_root );
		foreach ( $dirs as $k=>$v ) {
			if( ! is_dir( $theme_root . '/' . $v ) || $v[0] == '.' || $v == 'CVS' ) {
				unset( $dirs[$k] );
			} else {
				$dirs[$k] = array(
					'path' => $theme_root . '/' . $v,
					'url' => plugins_url( 'themes/' . $v, dirname( __FILE__ ) )
				);
			}
		}
		
		$idirs = array_merge( $idirs, $dirs );
		
		return (array)$idirs;
	}


	// Handle the post_type parameter given in get_terms function
	public function wpcufpn_terms_clauses($clauses, $taxonomy, $args) {
		if (!empty($args['post_type']))	{
			global $wpdb;
	
			$post_types = array();
	
			foreach($args['post_type'] as $cpt)	{
				$post_types[] = "'".$cpt."'";
			}
	
		    if(!empty($post_types))	{
				$clauses['fields'] = 'DISTINCT '.str_replace('tt.*', 'tt.term_taxonomy_id, tt.term_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields']).', COUNT(t.term_id) AS count';
				$clauses['join'] .= ' INNER JOIN '.$wpdb->term_relationships.' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN '.$wpdb->posts.' AS p ON p.ID = r.object_id';
				$clauses['where'] .= ' AND p.post_type IN ('.implode(',', $post_types).')';
				$clauses['orderby'] = 'GROUP BY t.term_id '.$clauses['orderby'];
			}
	    }
	    return $clauses;
	}
	
	public function getTaxonomyWPLP($postType=null,$currentoption=null,$terms=null) {
		global $wpdb; // this is how you get access to the database
	
	
		if(isset($_POST["postType"]))	
			$postType=$_POST["postType"];
		if(isset($_POST["TaxChoose"]))
			$currentoption=$_POST["TaxChoose"];
		 
		//var_dump($currentoption);
		
		$taxonomy_names = get_object_taxonomies( $postType );   		
		
		if (count($taxonomy_names)>0) {
			
			echo '<li id="taxonomySelector"><label for="custom_post_select" class="post_cb">Choose a taxonomy (optionnal) : </label>
		 
			<select id="custom_post_select_tax" name="wpcufpn_custom_post_taxonomy">
			<option value="">all taxonomies</option>' .
					'';
			foreach($taxonomy_names as $cat) {
				if ($cat==$currentoption){
					$taxname=$currentoption;
				}
				echo '<option value="' .
					$cat . '"  '. (($cat==$currentoption)?' selected="selected"':"") .'> '.$cat.' </option>';
			}
			echo '</select></li>'; //field
			
			if (isset($taxname)) {
				$termsname = get_terms($taxname, array(
			 		'post_type' => array($postType),
			 		'hide_empty'=> false, 
				));
			}
			
			if (isset($termsname) && count($termsname)>0) {
				
				echo '<li id="termSelector"><label for="custom_post_select_term" class="post_cb">Choose a terms (optionnal) : </label>
			
				<select id="custom_post_select_term" name="wpcufpn_custom_post_term">
				<option value="">all terms</option>' .
						'';
				foreach($termsname as $cat) {
					echo '<option value="' .
						$cat->term_id . '"  '. (($cat->term_id==$terms)?' selected="selected"':"") .'> '.$cat->name.' </option>';
				}
				echo '</select></li>'; //field
			}
			
			
			
		}
		
		
		
		
		
		
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			/* special ajax here */
			wp_die(); 
		}
		// this is required to terminate immediately and return a proper response
	}
	
	
	
	public function displayContentCustomPostTypeTab() {
		
		wp_enqueue_script(
				'ajaxcustomposttype',
				plugins_url( 'js/ajaxcustomposttype.js', dirname( __FILE__ ) ),
				array( 'jquery' ),
				'1.0',
				true
		);
		
		echo '<ul id="customposttypetab" class="fields">';
		
		echo '<li class="field" id="postSelector">';
		echo '<ul>';
		
		
		global $post;
		$checked = array(); 
		
		
		$settings = get_post_meta( $post->ID, '_wpcufpn_settings', true );
		
		if( empty( $settings ) )
			$settings = $this->_pro_field_defaults;
		
		if( !isset($settings['custom_post_type']) || empty($settings['custom_post_type']) || !$settings['custom_post_type'] )
			$settings['custom_post_type'] = "";
		
			$source_custom_post_type_checked[$settings['custom_post_type']] = ' selected="selected"';
		
		$args = array(
		   'public'   => true,
		   '_builtin' => false
		);		
		$output = 'names'; // names or objects, note names is the default
		$operator = 'and'; // 'and' or 'or'
		
		$custom_post_types = get_post_types( $args, $output, $operator ); 
		//$custom_post_types = get_post_types(); 	
		 echo '
		<li> 
			<label for="custom_post_select" class="post_cb">Choose a custom post type : </label>		
			<select id="custom_post_select" name="wpcufpn_custom_post_type">
				<option value="">Choose a custom post type</option>' . '';
					foreach ($custom_post_types as $custom_post_type => $val) {
						echo '<option value="' . $val . '" ' . $source_custom_post_type_checked[$val] . ' > ' . $val . ' </option>';
					}
					echo '
			</select>
		</li></ul>';
		echo '</li>';
			//field
			
			
		$tax=$this->getTaxonomyWPLP(
			(isset($settings['custom_post_type'])?$settings['custom_post_type']:null),
			(isset($settings['custom_post_taxonomy'])?$settings['custom_post_taxonomy']:null),
			(isset($settings['custom_post_term'])?$settings['custom_post_term']:null)
		);
		//echo $tax;
		
		if( isset($settings['cat_source_order']) )
			$source_order_selected[$settings['cat_source_order']] = ' selected="selected"';
		if( isset($settings['cat_source_asc']) )
			$source_asc_selected[$settings['cat_source_asc']] = ' selected="selected"';
		
		
		echo '<li class="field"><hr/>';
		echo '<label for="cat_source_order" class="coltab">' . __( 'Order by', 'wpcufpn' ) . '</label>';
		echo '<select name="wpcufpn_cat_source_order" id="cat_source_order" >';
		echo '<option value="date" ' . (isset($source_order_selected['date'])?$source_order_selected['date']:'') . '>' . __( 'By date', 'wpcufpn' ) . '</option>';
		echo '<option value="title" ' . (isset($source_order_selected['title'])?$source_order_selected['title']:'') . '>' . __( 'By title', 'wpcufpn' ) . '</option>';
        echo '<option value="random" ' . (isset($source_order_selected['random'])?$source_order_selected['random']:"") . '>' . __( 'By random', 'wpcufpn' ) . '</option>';
		//echo '<option value="order" ' . $source_order_selected['order'] . '>' . __( 'By order', 'wpcufpn' ) . '</option>';
		echo '</select>';
		echo '</li>';	//field
		
		echo '<li class="field">';
		echo '<label for="cat_source_asc" class="coltab">' . __( 'post sort order', 'wpcufpn' ) . '</label>';
		echo '<select name="wpcufpn_cat_source_asc" id="cat_source_asc">';
		echo '<option value="asc" ' . (isset($source_asc_selected['asc'])?$source_asc_selected['asc']:'') . '>' . __( 'Ascending', 'wpcufpn' ) . '</option>';
		echo '<option value="desc" ' . (isset($source_asc_selected['desc'])?$source_asc_selected['desc']:'') . '>' . __( 'Descending', 'wpcufpn' ) . '</option>';
		echo '</select>';
		echo '</li>';	//field
		
		echo '</ul>';	//fields
		
		
		
		// $terms = get_terms($taxonomy_names); $count = count($terms); if ( $count > 0 ){ foreach ( $terms as $term ) { echo $term->name; } }
		
		// Get the categories for post and product post types
		
		
	}
	
	/**
	 * Content source Page
	 *
	 */
	public function displayContentSourcePagesTabAddFields() {
		echo '<ul class="fields">';
		
		echo '<li class="field">';
		echo '<ul>';
		
		global $post;
		$checked = array(); 
		$settings = get_post_meta( $post->ID, '_wpcufpn_settings', true );
		
		if( empty( $settings ) )
			$settings = $this->_pro_field_defaults;
		
		if( !isset($settings['source_pages']) || empty($settings['source_pages']) || !$settings['source_pages'] )
			$settings['source_pages'] = array( '_all' );
		
		foreach( $settings['source_pages'] as $page ) {
			$source_page_checked[$page] = ' checked="checked"';
		}; 
		
		
		echo '<li><input id="tags_all" type="checkbox" name="wpcufpn_source_pages[]" value="_all" ' . (isset($source_page_checked['_all'])?$source_page_checked['_all']:'') . ' />' .
				'<label for="tags_all" class="post_cb">All Pages</li>';
		
		
		$pages = get_pages();		
		foreach ($pages as $page){
			echo '<li><input id="ccb_' . $page->ID . '" type="checkbox" name="wpcufpn_source_pages[]" value="' .
				$page->ID . '" ' . (isset($source_page_checked[$page->ID])?$source_page_checked[$page->ID]:"") . ' class="tag_cb" />';
			echo '<label for="ccb_' . $page->ID . '" class="post_cb">' . $page->post_title . '</label></li>';
		}


				
		echo '</ul>';
		
		echo '</li>';	//field
		
		echo '</ul>';	//fields
	}
	
	
	
	/**
	 * Content source tab for tags
	 *
	 */
	public function displayContentSourceTagsTab() {
		echo '<ul class="fields">';
		
		echo '<li class="field">';
		echo '<ul>';
		
		
		/*
		foreach ($tags as $tag){
			
			echo '<li><input id="'.$tag->slug.'" type="checkbox" name="wpcufpn_source_tags[]" value="'.$tag->term_id.'" />' .
				'<label for="'.$tag->slug.'" class="post_cb">'.$tag->name.'</li>';
			
		}	
		*/
		
		global $post;
		$checked = array(); 
		$settings = get_post_meta( $post->ID, '_wpcufpn_settings', true );
		if( empty( $settings ) )
			$settings = $this->_pro_field_defaults;
		
		if( !isset($settings['source_tags']) || empty($settings['source_tags']) || !$settings['source_tags'] )
			$settings['source_tags'] = array( '_all' );
		
		foreach( $settings['source_tags'] as $tag ) {
			$source_tag_checked[$tag] = ' checked="checked"';
		};

		
		echo '<li><input id="tags_all" type="checkbox" name="wpcufpn_source_tags[]" value="_all" ' . (isset($source_tag_checked['_all'])?$source_tag_checked['_all']:'') . ' />' .
				'<label for="tags_all" class="post_cb">All tags</li>';
		
		
		$tags = get_tags();
		foreach ($tags as $tag){
			echo '<li><input id="ccb_' . $tag->term_id . '" type="checkbox" name="wpcufpn_source_tags[]" value="' .
				$tag->term_id . '" ' . (isset($source_tag_checked[$tag->term_id])?$source_tag_checked[$tag->term_id]:"") . ' class="tag_cb" />';
			echo '<label for="ccb_' . $tag->term_id . '" class="post_cb">' . $tag->name . '</label></li>';
		}


				
		echo '</ul>';
		
		echo '</li>';	//field
		
		echo '</ul>';	//fields
	}
	
	/**
	 * Adds fields of the pro plugin to the content_source:category admin settings tab
	 * 
	 */
	public function displayContentSourceCategoryTabAddFields( $settings ) {
		
		echo '<li class="field">';
		echo '<label for="source_date_min" class="coltab">' . __( 'Show articles created', 'wpcufpn' )
		.'<select name="wpcufpn_source_date_min_switch">'
		.'<option value="after" '.((isset($settings['source_date_min_switch']) && $settings['source_date_min_switch']=="after")?"selected":"").'>after</option>'
		.'<option value="before" '.((isset($settings['source_date_min_switch']) && $settings['source_date_min_switch']=="before")?"selected":"").'>before</option>'
		.'</select>'
		.'</label>';
		echo '<input id="source_date_min" type="text" name="wpcufpn_source_date_min" class="datepicker short-text" '.
			'value="' . htmlspecialchars( isset($settings['source_date_min'])?$settings['source_date_min']:"" ) . '" />';
		echo '</li>';	//field
		
		//TODO: externalize js
		$calendar_icon = plugins_url( 'img/calendar.jpg', dirname( __FILE__ ) );

?>
<script type="text/javascript">
		(function($) {
	$(document).ready(function() {

	$('.datepicker').datepicker({
	showOn: "button",
	buttonImage: "<?php echo $calendar_icon; ?>
		",
		buttonImageOnly: false
		});

		});
		})( jQuery );
</script>
<?php
}

public function displayNumberOfLinesField( $settings ) {
/* Deactivated for now (vertical sliders) , TODO: reactivate */
echo '<li class="field"><label for="amount_rows" class="coltab">' . __( 'Number of rows', 'wpcufpn' ) . '</label>' .
'<input id="amount_rows" type="text" name="wpcufpn_amount_rows" value="' . htmlspecialchars( $settings['amount_rows'] ) . '" class="short-text" /></li>';
/* */
}

/**
* Adds fields of the pro plugin version to the Display&Theme admin settings tab
*
*/
public function displayDisplayThemeCol1AddFields( $settings ) {

if( isset($settings['crop_title']) )
$crop_title_checked[$settings['crop_title']] = ' checked="checked"';

// -block---------------------------------- //
echo '<div class="wpcu-inner-admin-block with-title with-border">';
echo '<h4>Title</h4>';
echo '<ul class="fields">';

/** Crop title radio button set **/
echo '<li class="field"><label class="coltab">' . __( 'Crop title type', 'wpcufpn' ) . '</label>' .
'<span class="radioset">' .
'<input id="crop_title1" type="radio" name="wpcufpn_crop_title" value="0" ' . (isset($crop_title_checked[0])?$crop_title_checked[0]:'') . '/>' .
'<label for="crop_title1">' . __('Words', 'wpcufpn') . '</label>' .
'<input id="crop_title2" type="radio" name="wpcufpn_crop_title" value="1" ' . (isset($crop_title_checked[1])?$crop_title_checked[1]:'') . '/>' .
'<label for="crop_title2">' . __('Chars', 'wpcufpn') . '</label>' .
'<input id="crop_title3" type="radio" name="wpcufpn_crop_title" value="2" ' . (isset($crop_title_checked[2])?$crop_title_checked[2]:'') . '/>' .
'<label for="crop_title3">' . __('Lines', 'wpcufpn') . '</label>' .
'</span>';
echo '</li>';

echo '<li class="field"><label for="crop_title_len" class="coltab">' . __( 'Crop length', 'wpcufpn' ) . '</label>' .
'<input id="crop_title_len" type="text" name="wpcufpn_crop_title_len" value="' . htmlspecialchars( isset($settings['crop_title_len'])?$settings['crop_title_len']:'' ) . '" class="short-text" /></li>';
echo '</ul>';	//fields
echo '</div>';	//wpcu-inner-admin-block
// ---------------------------------------- //

if( isset($settings['crop_text']) )
$crop_text_checked[$settings['crop_text']] = ' checked="checked"';

    $classdisabledPortfolio = "";
    if (strpos($settings["theme"],'portfolio'))
    {
        $classdisabledPortfolio = " disabled";
    }

// -block---------------------------------- //
echo '<div id="wpcufpn_config_cropText" class="wpcu-inner-admin-block with-title with-border'.$classdisabledPortfolio.'">';
echo '<h4>Text</h4>';
echo '<ul class="fields">';

/** Crop text radio button set **/
echo '<li class="field"><label class="coltab">' . __( 'Crop text type', 'wpcufpn' ) . '</label>' .
'<span class="radioset">' .
'<input id="crop_text1" type="radio" name="wpcufpn_crop_text" value="0" ' . (isset($crop_text_checked[0])?$crop_text_checked[0]:'') . '/>' .
'<label for="crop_text1">' . __('Words', 'wpcufpn') . '</label>' .
'<input id="crop_text2" type="radio" name="wpcufpn_crop_text" value="1" ' . (isset($crop_text_checked[1])?$crop_text_checked[1]:'') . '/>' .
'<label for="crop_text2">' . __('Chars', 'wpcufpn') . '</label>' .
'<input id="crop_text3" type="radio" name="wpcufpn_crop_text" value="2" ' . (isset($crop_text_checked[2])?$crop_text_checked[2]:'') . '/>' .
'<label for="crop_text3">' . __('Lines', 'wpcufpn') . '</label>' .
'</span>';
echo '</li>';

echo '<li class="field"><label for="crop_text_len" class="coltab">' . __( 'Crop length', 'wpcufpn' ) . '</label>' .
'<input id="crop_text_len" type="text" name="wpcufpn_crop_text_len" value="' . htmlspecialchars( isset($settings['crop_text_len'])?$settings['crop_text_len']:'' ) . '" class="short-text" /></li>';
echo '</ul>';	//fields
echo '</div>';	//wpcu-inner-admin-block
// ---------------------------------------- //

if( isset($settings['autoanimation']) )
$autoanim_checked[$settings['autoanimation']] = ' checked="checked"';
if( isset($settings['autoanimation_trans']) )
$transition_selected[$settings['autoanimation_trans']] = ' selected="selected"';
if( isset($settings['autoanim_loop']) )
$loop_selected[$settings['autoanim_loop']] = ' selected="selected"';
if( isset($settings['autoanim_pause_hover']) )
$pause_hover_selected[$settings['autoanim_pause_hover']] = ' selected="selected"';
if( isset($settings['autoanim_pause_action']) )
$pause_action_selected[$settings['autoanim_pause_action']] = ' selected="selected"';
if( isset($settings['autoanimation_slidedir']) )
$slidedir_selected[$settings['autoanimation_slidedir']] = ' selected="selected"';
if( isset($settings['autoanim_slideshowspeed']) )
$autoanim_slideshowspeed = $settings['autoanim_slideshowspeed'];
if( isset($settings['autoanim_slidespeed']) )
$autoanim_slidespeed = $settings['autoanim_slidespeed'];

/*
*
* Specific parameters with Mansonry and portfolio theme
*
*/
$classdisabled="";
if (strpos($settings["theme"],'masonry') ||
    strpos($settings["theme"],'timeline') ||
    strpos($settings["theme"],'portfolio')
    )
    {
        $classdisabled=" disabled";
    }

// -block---------------------------------- //
echo '<div id="wpcufpn_config_animation" class="wpcu-inner-admin-block with-title with-border '.$classdisabled.'">';
echo '<h4>Animation</h4>';
echo '<ul class="fields">';

/** Autoanimation radio button set **/
echo '<li class="field"><label class="coltab">' . __( 'Autoanimation', 'wpcufpn' ) . '</label>' .
'<span class="radioset">' .
'<input id="autoanimation1" type="radio" name="wpcufpn_autoanimation" value="0" ' . (isset($autoanim_checked[0])?$autoanim_checked[0]:'') . $classdisabled .'/>' .
'<label for="autoanimation1">' . __('Off', 'wpcufpn') . '</label>' .
'<input id="autoanimation2" type="radio" name="wpcufpn_autoanimation" value="1" ' . (isset($autoanim_checked[1])?$autoanim_checked[1]:'') .  $classdisabled .'/>' .
'<label for="autoanimation2">' . __('On', 'wpcufpn') . '</label>' .
'</span>';
echo '</li>';


/** Autoanimation Speed of the slideshow cycling**/
echo '<li class="field"><label class="coltab" for="autoanim_slideshowspeed">' . __( 'Speed of the autoanimation cycling <i>in milliseconds</i>', 'wpcufpn' ) . '</label>' .
'<input id="autoanim_slideshowspeed" type="number" name="wpcufpn_autoanim_slideshowspeed" value="' . (isset($autoanim_slideshowspeed)?$autoanim_slideshowspeed:'7000') .'" '  . $classdisabled .'/>';
echo '</li>';

/**  Speed of animations **/
echo '<li class="field"><label class="coltab" for="autoanim_slidespeed">' . __( 'Speed of animations, in milliseconds', 'wpcufpn' ) . '</label>' .
'<input id="autoanim_slidespeed" type="number" name="wpcufpn_autoanim_slidespeed" value="' . (isset($autoanim_slidespeed)?$autoanim_slidespeed:'600') .'" '  . $classdisabled .'/>';
echo '</li>';

$classdisabledsmooth="";
if (strpos($settings["theme"],'smooth')){
$classdisabledsmooth=" disabled";
}
 
/** Autoanimation transition drop-down **/
echo '<li class="field"><label for="autoanimation_trans" class="coltab">' . __( 'Autoanimation transition', 'wpcufpn' ) . '</label>' .
'<select id="autoanimation_trans" name="wpcufpn_autoanimation_trans"'.$classdisabled.$classdisabledsmooth.'>';
foreach( $this->_autoanim_trans_values as $value=>$text ) {
echo '<option value="' . $value . '" ' . (isset($transition_selected[$value])?$transition_selected[$value]:'') . '>' .
$text . '</option>';
}
echo '</select></li>';

/** Autoanimation slide direction drop-down **/
echo '<li class="field"><label for="autoanimation_slidedir" class="coltab">' . __( 'Slide transition direction', 'wpcufpn' ) . '</label>' .
'<select id="autoanimation_slidedir" name="wpcufpn_autoanimation_slidedir"'.$classdisabled.$classdisabledsmooth.'>';
foreach( $this->_autoanim_slidedir_values as $value=>$text ) {
echo '<option value="' . $value . '" ' . (isset($slidedir_selected[$value])?$slidedir_selected[$value]:'') . '>' .
$text . '</option>';
}
echo '</select></li>';




/** Animation LOOP **/
echo '<li class="field"><label for="autoanim_loop" class="coltab">' . __( 'Animation loop', 'wpcufpn' ) . '</label>' .
'<select id="autoanim_loop" name="wpcufpn_autoanim_loop"'.$classdisabled.'>';
foreach( $this->_autoanim_loop_values as $value=>$text ) {
echo '<option value="' . $value . '" ' . (isset($loop_selected[$value])?$loop_selected[$value]:'') . '>' .
$text . '</option>';
}
echo '</select></li>';





// pause on Hover
echo '<li class="field"><label for="autoanim_pause_hover" class="coltab">' . __( 'Pause on Hover', 'wpcufpn' ) . '</label>' .
'<select id="autoanim_pause_hover" name="wpcufpn_autoanim_pause_hover"'.$classdisabled.'>';
foreach( $this->_autoanim_loop_values as $value=>$text ) {
echo '<option value="' . $value . '" ' . (isset($pause_hover_selected[$value])?$pause_hover_selected[$value]:'') . '>' .
$text . '</option>';
}
echo '</select></li>';



// pause on Action
echo '<li class="field"><label for="autoanim_pause_action" class="coltab">' . __( 'Pause on Action', 'wpcufpn' ) . '</label>' .
'<select id="autoanim_pause_action" name="wpcufpn_autoanim_pause_action"'.$classdisabled.'>';
foreach( $this->_autoanim_loop_values as $value=>$text ) {
echo '<option value="' . $value . '" ' . (isset($pause_action_selected[$value])?$pause_action_selected[$value]:'') . '>' .
$text . '</option>';
}
echo '</select></li>';





echo '</ul>';	//fields
echo '</div>';	//wpcu-inner-admin-block
// ---------------------------------------- //

$classdisabled=" disabled";
if (strpos($settings["theme"],'masonry')  ||
    strpos($settings["theme"],'smooth')   ||
    strpos($settings["theme"],'portfolio') ||
    strpos($settings["theme"],'timeline'))
    {
        $classdisabled="";
    }

    $classdisabledsmooth=" disabled";
    if (strpos($settings["theme"],'portfolio'))
    {
        $classdisabledsmooth = "";
    }
    $checkbox = 'checked="checked"';
    if (isset($settings['defaultColor']))
    {
        if ($settings['defaultColor'] == "yes")
        {
            $checkbox = 'checked="checked"';
        } else {
            $checkbox = "";
        }
    }

// -block---------------------------------- //
echo '<div id="wpcufpn_config_color" class="wpcu-inner-admin-block with-title with-border '.$classdisabled.'">';

    echo '<h4>Color</h4>';
echo '<ul class="fields">';
    echo '<li class="field">';
    echo '<div class="field'.$classdisabledsmooth.'" >';
    echo '<label class="coltab">'. __( "Don't use background color", 'wpcufpn' ) .'</label>
        <span class="checkbox">
            <input type="hidden" value="no" name="wpcufpn_defaultColor">
            <input type="checkbox" id="defaultColorTheme" name="wpcufpn_defaultColor" value="yes" '.(isset($checkbox)?$checkbox:'').' '.$classdisabledsmooth.'/>
        </span>
    </div>';
    echo '</li>';


/** Color Picker **/
echo '<li class="field"><label class="coltab" style="vertical-align: top;">' . __( 'Choose Color', 'wpcufpn' ) . '</label>';
echo '
<div id="colorPicker">
    <input id="colorpicker" name="wpcufpn_colorpicker" class="wpcufpn_colorPicker" value="' .(isset($settings['colorpicker'])?$settings['colorpicker']:'#ff0000') . '"/>
</div>

<script type="text/javascript">
jQuery(document).ready(function()
{


});
</script>
';
echo '</li>';
echo '</ul>';	//fields
echo '</div>';	//wpcu-inner-admin-block
// ---------------------------------------- //

}

/**
* Adds cropping feature field of the pro plugin version to the Image Source admin settings tab
*
*/
public function displayImageSourceCropAddFields( $settings ) {

if( isset($settings['crop_img']) )
$crop_img_checked[$settings['crop_img']] = ' checked="checked"';

/** Crop images switch **/
echo '<li class="field"><label class="coltab">' . __( 'Crop images to fit size', 'wpcufpn' ) . '</label>' .
'<span class="radioset">' .
'<input id="crop_img1" type="radio" name="wpcufpn_crop_img" value="0" ' . (isset($crop_img_checked[0])?$crop_img_checked[0]:'') . '/>' .
'<label for="crop_img1">' . __('Off', 'wpcufpn') . '</label>' .
'<input id="crop_img2" type="radio" name="wpcufpn_crop_img" value="1" ' . (isset($crop_img_checked[1])?$crop_img_checked[1]:'') . '/>' .
'<label for="crop_img2">' . __('On', 'wpcufpn') . '</label>' .
'</span>
        <span class="width_height_settings">
        <input id="thumb_width" type="text" name="wpcufpn_thumb_width" value="' . htmlspecialchars( isset($settings['thumb_width'])?$settings['thumb_width']:'' ) . '" class="short-text" />' .
        'x' .
        '<input id="thumb_height" type="text" name="wpcufpn_thumb_height" value="' . htmlspecialchars( isset($settings['thumb_height'])?$settings['thumb_height']:'' ) . '" class="short-text" />' .
        'px' .
        '</span></li>';
echo '</ul>';	//fields

}

public function displayAdvancedAddFields( $settings ) {

echo '<li class="field"><label for="read_more" class="coltab">' . __( 'Read more text', 'wpcufpn' ) . '</label>' .
'<input id="read_more" type="text" name="wpcufpn_read_more" value="' . htmlspecialchars( isset($settings['read_more'])?$settings['read_more']:'' ) . '" class="short-text" /></li>';

/** Default image upload field **/
echo '<li class="field"><label for="default_img" class="coltab">' . __( 'Default image', 'wpcufpn' ) . '</label>' .
'<input id="default_img" type="file" name="wpcufpn_default_img" value="' . htmlspecialchars( isset($settings['default_img'])?$settings['default_img']:'' ) . '" class="regular-text" />';
if( isset($settings['default_img']) && $settings['default_img'] )
echo '<img class="default_preview" src="' . $settings['default_img'] .
'" alt="' . __( 'Default image preview', 'wpcufpn' ) .
'" title="' . __( 'Default image preview', 'wpcufpn' ) . '"/>';
echo '<input type="hidden" id="default_img_previous" name="wpcufpn_default_img_previous" value="' . htmlspecialchars( isset($settings['default_img'])?$settings['default_img']:'' ) . '" />';
echo '</li>';

}

public function displayAbout() {

echo '<p>' . __('Pro add-on plugin version ') . $this->version . __(' is installed and activated.') . '</p>';
echo '<p><em>' . __('Congratulations! and thank you for your support.') . '</em></p>';

}

/**
* Displays additional source types modes on the front-end
* WP Filter
*
* @param object $widget
*/
public function displayFrontAdditionalSources( $html, $widget ) {

if( 'src_tags' == $widget->settings['source_type'] ) {
$html .= '<p>TODO: list posts by tags</p>';
//TODO

}
return $html;
}

/**
* Filters front-end list display query
* to add additional pro feature arguments
*
*/
public function wpcufpn_src_category_argsFilter( $args , $settings) {

//TODO: apply source_date_min
//$args["test"]="SALUT";

if (isset($settings["source_date_min"]) && $settings["source_date_min"] ){
$args["date_query"] = array(
array(
$settings["source_date_min_switch"]     => $settings["source_date_min"]
)
);
}
return $args;
}
}
?>