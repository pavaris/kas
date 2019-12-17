<?php global $qode_options_infographer; 
$qode_animation="";
if (isset($_SESSION['qode_animation'])) $qode_animation = $_SESSION['qode_animation'];
?>
<div id="panel" style="margin-left: -318px;">
        
    <div id="panel-admin">
		<div class="panel-admin-heading">
			<h4>INFOGRAPHER OPTIONS</h4>
		</div>
		<div class="panel-admin-box">
			<h5>page transition</h5>
			<div class="panel-admin-options-holder panel-admin-ajax">
				<span data-animation="leftright"<?php if ($qode_animation == "leftright" || $qode_options_infographer['page_transitions'] != 0) { echo " class='active'"; } ?>>on</span>
				<span data-animation="no"<?php if (($qode_animation == "no" || $qode_animation == "") && $qode_options_infographer['page_transitions'] == 0) { echo " class='active'"; } ?>>off</span>
			</div>
		</div>
		<div class="panel-admin-box">
			<h5>CHOOSE COLORS</h5>
			<div class="panel-admin-options-holder panel-admin-colors">
				<span data-color="#e91b23" class="panel-admin-option-color red"></span>
				<span data-color="#00a2ff" class="panel-admin-option-color blue"></span>
				<span data-color="#bdcd00" class="panel-admin-option-color green"></span>
				<span data-color="#00a0a0" class="panel-admin-option-color purple"></span>
				<span data-color="#b07596" class="panel-admin-option-color darkgreen"></span>
				<span data-color="#b39964" class="panel-admin-option-color brown"></span>
			</div>
		</div>
		<div class="panel-admin-box no-border">
			<h5>BOXED LAYOUT</h5>
			<div class="panel-admin-options-holder panel-admin-layout">
				<span data-layout="boxed background_boxed">on</span>
				<span class="active" data-layout="wide">off</span>
			</div>
		</div>
    </div>
    
    <a class="open" href="#"></a>

</div>