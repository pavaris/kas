/* French initialisation for the jQuery UI date picker plugin. */
/* Written by Keith Wood (kbwood{at}iinet.com.au),
			  Stéphane Nahmani (sholby@sholby.net),
			  Stéphane Raimbault <stephane.raimbault@gmail.com> */
jQuery(function($){
	$(document).ready(function(){
		$('body').on('change',"#custom_post_select", function(){
			var data = {
			'action': 'getTaxonomyWPLP',
			'postType': $(this).val()
			};
			$.post(ajaxurl, data, function(response) {
				$parent=$("#postSelector");
				$("#taxonomySelector").remove();
				$("#termSelector").remove();
				$parent.after(response); 
			});
		});
		$('body').on('change',"#custom_post_select_tax", function(){
			var data = {
			'action': 'getTaxonomyWPLP',
			'postType': $("#custom_post_select").val(),
			'TaxChoose': $(this).val()
			};
			$.post(ajaxurl, data, function(response) {
				$parent=$("#postSelector");
				$("#taxonomySelector").remove();
				$("#termSelector").remove();
				$parent.after(response);
			});
		});
	});
});