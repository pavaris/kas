<?php
$ajaxloader        = WAPT_PLUGIN_URL . "/admin/assets/img/ajax-loader-line.gif";
$apt_content_nonce = wp_create_nonce( 'apt_content' );
?>

<div class="tabs">
    <ul>
		<?php $i = 1;
		foreach ( $this->sources as $src => $slug ) {
			$is_pro = "";
			if ( empty( $slug ) && ! WAPT_Plugin::app()->premium->is_activate() ) {
				$is_pro = " (PRO)";
			}
			$is_pro = "<sup class='wapt-sup-pro'>" . $is_pro . "</sup>";

			echo "<li id='tabs-" . $i ++ . "'>" . strtoupper( $src ) . $is_pro . "</li>";
		} ?>
    </ul>
    <div id='ajaxloader' style='display:none;'><img src='<?php echo $ajaxloader; ?>' width='150px' alt=''></div>
    <div id="media-frame-content">
		<?php foreach ( $this->sources as $src => $slug ) {
			echo "<div id='tab-" . strtolower( $src ) . "' class='tab'></div>";
		} ?>
    </div>
</div>

<style>
    sup {
        font-size: 10px;
    }

    .tabs {
        display: inline-block;
        width: 100%;
        margin: 5px 0px 10px 0px;
    }

    .tabs > div {
        padding-top: 10px;
    }

    .tabs ul {
        margin: 0px;
        padding: 0px;
    }

    .tabs ul:after {
        content: "";
        display: block;
        clear: both;
        height: 1px;
        background: #008ec2;
    }

    .tabs ul li {
        padding: 0px;
        cursor: pointer;
        display: block;
        float: left;
        padding: 10px 0px;
        background: #f1f1f1;
        color: #0073aa;
        width: 15%;
        border-radius: 10px 10px 0px 0px;
        font-weight: bold;
        text-align: center;
    }

    .tabs ul li.active, .tabs ul li.active:hover {
        background: #008ec2;
        color: #ffffff;
        width: 15%;
    }

    .tabs ul li:hover {
        background: #008ec2;
        color: #dddddd;
    }

    .tabs li {
        margin-bottom: 0;
    }

    .tab {
        padding: 10px;
    }

    #ajaxloader {
        margin: 20px 10px 10px 30px;
    }

    #page_num_div {
        display: inline;
        font-weight: bold;
        padding: 20px;
    }

    .apt_pages {
        padding-top: 20px;
    }

    .divform {
        line-height: 1.5;
        margin: 1em 0;
        max-width: 500px;
        position: relative;
    }

    .input_query {
        width: 100%;
        padding: 7px 32px 7px 9px;
    }

    .submit_button {
        height: 90%;
        width: 70px;
        border: 0;
        cursor: pointer;
        position: absolute;
        right: 0px;
        top: 2px;
        outline: 0;
    }

    .custom-media-button {
        float: right;
        padding: 0px 20px 20px 0px;
        position: absolute;
        right: 0px;
    }
</style>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery.fn.lightTabs = function (options) {

            var createTabs = function () {
                tabs = this;
                i = 0;

                showPage = function (i) {
                    jQuery(tabs).children("div").children("div").hide();
                    jQuery(tabs).children("ul").children("li").removeClass("active");
                    jQuery('#' + jQuery(tabs).children("div").children("div").attr('id')).html('');

                    jQuery('#' + jQuery(tabs).children("div").children("div").eq(i).attr('id')).html('');
                    jQuery(tabs).children("div").children("div").eq(i).show();
                    jQuery(tabs).children("ul").children("li").eq(i).addClass("active");

                    jQuery('#ajaxloader').show();
                    jQuery.post(ajaxurl, {
                        action: 'source_content',
                        source: jQuery(tabs).children("div").children("div").eq(i).attr('id'),
                        wpnonce: '<?php echo $apt_content_nonce; ?>',
                    }).done(function (content) {
                        jQuery('#ajaxloader').hide();
                        jQuery('#' + jQuery(tabs).children("div").children("div").eq(i).attr('id')).html(content);
                    });

                };

                showPage(0);

                jQuery(tabs).children("ul").children("li").each(function (index, element) {
                    jQuery(element).attr("data-page", i);
                    i++;
                });

                jQuery(tabs).children("ul").children("li").click(function () {
                    showPage(parseInt(jQuery(this).attr("data-page")));
                });
            };
            return this.each(createTabs);
        };
        jQuery(".tabs").lightTabs();
    });
</script>