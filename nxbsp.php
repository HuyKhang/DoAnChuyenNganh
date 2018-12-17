<?php 
	require_once __DIR__. "/autoload/autoload.php"; 
	$id = intval(getInput('id'));
	$nxb= $db -> fetchID("nxb",$id);
	$sql= "SELECT * FROM products WHERE publiser_id=$id";
	$product=$db -> fetchsql($sql);

?>
<?php require_once __DIR__. "/layouts/header.php"; ?>
			<section class="main-content">
				
				<div class="row">
					<div class="span12">
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line"><a href=""><?php echo $nxb['name'] ?></a></span></span></span></h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">	
											<?php foreach ($product as $item): ?>											
												<li class="span3">
													<div class="product-box">
																
															
																	<div class="col-md-3 item-product bor"> 
																	<a href="chitietsp.php?id=<?php echo $item['id'] ?>">
																	<img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="" width="300px" height="300px">
																	</a>
																	<div class="info-item">
																	<a href="chitietsp.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a><br/>
																	<p><b class="price"><?php echo formatgia($item['price']) ?></b></p>
																	
															    	</div>
															    	
																
														
																
													</div>
												</li>
											<?php endforeach ?>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>	 
						
						
<?php require_once __DIR__. "/layouts/footer.php"; ?>