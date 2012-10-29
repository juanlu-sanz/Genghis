<?php session_start(); ?>
<? ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Genghis, another Khan</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link REL="SHORTCUT ICON" HREF="http://www.uc3m.es/favicon.ico">
<link href="./assets/css/bootstrap.css" rel="stylesheet">
<style type="text/css">
body {
	padding-top: 60px;
	padding-bottom: 40px;
}
</style>
<link href="./assets/css/bootstrap-responsive.css" rel="stylesheet">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="../assets/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="114x114"
	href="../assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72"
	href="../assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed"
	href="../assets/ico/apple-touch-icon-57-precomposed.png">

<script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-26989540-3']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
            </script>
<script type="text/javascript" src="./tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	
	// O2k7 skin (silver)
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "subj_text",
		theme : "advanced",
		skin : "o2k7",
		skin_variant : "silver",
		plugins : "lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

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
<!-- /TinyMCE -->

</head>

<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse"
					data-target=".nav-collapse"> <span class="icon-bar"></span> <span
					class="icon-bar"></span> <span class="icon-bar"></span>
				</a> <a class="brand" href="">Genghis, another Khan</a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="active"><a href="?p=fib">Fill in the Blank</a></li>
						<li><a href="?p=mc">Multiple Choice</a></li>
						<li><a href="?p=tf">True/False</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
	</div>

	<?php
	if ($_GET['p'] != "") {
                include($_GET['p'] . ".php");
            } else {
                include("home.php");
            }
            ?>

	<!-- Le javascript
        ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="./assets/js/bootstrap.js"></script>
	<script>  
        $(function ()  
            { $("a[rel=tooltip]").tooltip();  
        });  
        </script>
	<script>  
        $(function ()  
            { $("#modal").modal();  
        });  
        </script>
	<script>
        $(function () {
            $('.tabs a:last').tab('show')
        })
        </script>
	<script type="text/javascript">
        function remove_textbox() {
            var item = document.getElementById('var_type');
            var len = item.options.length;

            var index = item.selectedIndex;
            if (item.options[index].text == 'Person name' ) {
                document.getElementById('min').setAttribute('type','hidden');
                document.getElementById('max').setAttribute('type','hidden');
            }
            if (item.options[index].text == 'Number' ) {
                document.getElementById('min').setAttribute('type','');
                document.getElementById('max').setAttribute('type','');
            }
            
        }
        </script>
	<script language="text/javascript">
        function setOption(value) {
            var selectElement = document.getElementById('var_type');
            alert(value);
            var options = selectElement.getElementsByTagName('option');

            for (var i = 0, optionsLength = options.length; i < optionsLength; i++) {
                console.log(options[i].value);
                if (options[i].value == value) {
                    selectElement.selectedIndex = i;
                    return true;
                }
            }

            return false;

        }

        
        </script>

</body>
</html>
<? ob_flush(); ?>
