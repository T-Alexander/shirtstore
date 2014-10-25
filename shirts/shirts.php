<?php 

	require_once("../inc/config.php");
	require_once(ROOT_PATH . "inc/products.php"); 
	$products = get_products_all();
?><?php 
	$pageTitle = "Flock Of Three's Full Catalog";
	$section = "shirts";
	include(ROOT_PATH . 'inc/header.php'); 
?>

	<div class="section shirts page">

		<div class="wrapper">

			<h1>Flock Of Three&rsquo;s Full Catalog Of Clutches</h1>

			<ul class="products">

				<?php foreach($products as $product) {
						echo get_list_view_html($product);
					}
				?>
			</ul>	
		
		</div>	

	</div>	

<?php include(ROOT_PATH . 'inc/footer.php'); ?>	