<html>
<head>
	<title><?php echo $pageTitle; ?></title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css" type="text/css"> 
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700" type="text/css">
	<link rel="shortcut icon" href="<?php echo BASE_URL; ?>favicon.ico">
</head>
<body>

	<div class="header">

		<div class="wrapper">

			<h1 class="branding-title"><a href="<?php echo BASE_URL; ?>">Shirts 4 Mike</a></h1>

			<ul class="nav">
				<li class="shirts <?php if ($section == "shirts") { echo "on"; } ?>"><a href="<?php echo BASE_URL; ?>shirts/">Shirts</a></li>
				<li class="contact <?php if ($section == "contact") { echo "on"; } ?>"><a href="<?php echo BASE_URL; ?>contact/">Contact</a></li>
				<li class="search <?php if ($section == "search") { echo "on"; } ?>"><a href="<?php echo BASE_URL; ?>search/">Search</a></li>
				
				<li class="cart"><a href="#">Shopping Cart</a></li><!-- view treehouse video /php/stage7/deployingthesite/5:00 to activate paypal cart -->
			</ul>

		</div>

	</div>

	<div id="content">