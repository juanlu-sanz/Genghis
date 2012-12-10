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
<script type="text/javascript" src="./tinymce/jscripts/tiny_mce/plugins/asciimath/js/ASCIIMathMLwFallback.js"></script>
<script type="text/javascript">
var AMTcgiloc = "http://www.imathas.com/cgi-bin/mimetex.cgi";  		//change me
</script>
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
<script type="text/javascript"
	src="./tinymce/jscripts/tiny_mce/tiny_mce.js"></script>

<?php include("tinymceinits.php");?>

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
						<li class="active"><a href="?p=home">Fill in the Blank</a></li>
						<li><a href="#">Multiple Choice</a></li>
						<li><a href="#">True/False</a></li>
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
                document.getElementById('dec').setAttribute('type','hidden');
            }
            if (item.options[index].text == 'Number' ) {
                document.getElementById('min').setAttribute('type','');
                document.getElementById('max').setAttribute('type','');
                document.getElementById('dec').setAttribute('type','');
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
	<!--<script language="text/javascript">
        function showeditor(x) {
            x.className="spam6 active_textbox";
        }

        
        </script>    -->

</body>
</html>
<? ob_flush(); ?>
