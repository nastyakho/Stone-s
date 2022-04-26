<!DOCTYPE html>
<html>
	<head>
        <base href="<?=BASE_URL;?>" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link href="css/reset.css" rel="stylesheet" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <script src="js/bootstrap.min.js"></script>
    	<title>Store</title>	
	</head>
	<body style="background-color: #F8F8FF;">
        <div style="width: 90%; margin: 0 auto; min-height: 600px; background-color: white;">
		<h1 class="bg-success" style="padding: 1%;"><a href="">Store</a></h1>
        <p style="float: right; margin-right: 2%; " >
            <a class="btn btn-default" href="admin" style="margin-right: 10px;">Admin panel</a>
            <a class="btn btn-info" href="cart" >Cart</a>
        </p>
        <?php include 'application/views/'.$content_view; ?>
		</div>				
	</body>
</html>