<script src="/login/js/jquery-2.2.4.min.js"></script>
<script src="/login/js/bootstrap.js"></script>
<script type="text/javascript" src="/admin/js/tinymce_3_0_5/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js" ></script>
<script src="js/fSelect.js" ></script>
<script>
    $("#name").keyup(function(){
		var Text = $(this).val();
		Text = Text.toLowerCase();
		Text = Text.replace(/ /g,'-');
		Text = Text.replace(/[^\w-]+/g,'');
		$("#slug").val(Text);        
	});
</script>
<script>
	function getmerchant()
	{ 
	var ccat=$("#ccat").val();
	$.ajax({
			type:"post",
			dataType:"text",
			data:"ccat="+ccat,
			url:"/common/getMerchant.php",   // url of php page where you are writing the query
			success:function(html)
			{ 
				$("#merchants").html(html).show();  // setting the result from page as value of name field
			}
		});
	}
</script>
<script>
	(function($) {
		$(function() {
			window.fs_test = $('#categories').fSelect();
		});
	})(jQuery);
	
	(function($) {
		$(function() {
			window.fs_test = $('#subcategories').fSelect();
		});
	})(jQuery);
	
	(function($) {
		$(function() {
			window.fs_test = $('#methods').fSelect();
		});
	})(jQuery);
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
        $('#datetimepicker2').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker1").on("dp.change", function (e) {
            $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker2").on("dp.change", function (e) {
            $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
        
		// Theme options
        theme_advanced_buttons1 : "bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,undo,redo,link,unlink,code,image",
        theme_advanced_buttons2 : "",
        theme_advanced_buttons3 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : false,
	convert_urls: false,
	
	
forced_root_block : "", 
    force_br_newlines : true,
    force_p_newlines : false,
		// Example content CSS (should be your site CSS)
		content_css : "/css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<script type="text/javascript">
function setup(){
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
        
		// Theme options
        theme_advanced_buttons1 : "bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,undo,redo,link,unlink,code,image",
        theme_advanced_buttons2 : "",
        theme_advanced_buttons3 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : false,
	//forced_root_block : "p",
	
		// Example content CSS (should be your site CSS)
		content_css : "/css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
}
</script>