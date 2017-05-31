<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>AutoComplete Search Example in PHP MySQL</title>


<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="style.css" />

</head>

<body>

	<div class="container">
    
    	<div class="page-header">
        <h3 style="color:#00a2d1; font-size:30px; font-family: Impact, Charcoal, sans-serif; text-align: center;">
        <a href="http://www.codingcage.com/2016/12/autocomplete-search-with-href-link-php.html" target="_blank">AutoComplete Search with Href Link in PHP MySQL</a></h3>
        </div>
         
        <div class="row">
        
        	<div class="col-lg-12 text-center">
        		
        		<div class="col-lg-offset-2">
            	<form>
            	<div class="form-group">
            		<div class="input-group">
            		<input id="txtSearch" class="form-control input-lg" type="text" placeholder="Search for PHP, MySQL, Ajax and jQuery" />
            		<div class="input-group-addon"><i class="glyphicon glyphicon-search"></i></div>
            		</div>
            	</div>
            	</form>  
            	</div> 
                
            </div>
        
        </div>
        
    </div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
	
	$('#txtSearch').autocomplete({
	    source: "post_search.php",
	    minLength: 2,
	    select: function(event, ui) {
	        var url = ui.item.id;
	        if (url != '#') {
	            location.href = url
	        }
	    },
	    open: function(event, ui) {
	        $(".ui-autocomplete").css("z-index", 1000)
	    }
	})
	
});
</script>

</body>
</html>