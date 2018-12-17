<?php
	require_once __DIR__. "/autoload/autoload.php";
	$user= $db-> fetchID("users",intval($_SESSION['name_id']));
	
	if($_SERVER['REQUEST_METHOD']== 'POST' )
	{
		$data =	
		[
			'amount'  => $_SESSION['tongtien'],
			'user_id' => $_SESSION['name_id'],
			'note'    => postInput("note"),
		];

		$idorder = $db -> insert("orders",$data);
		if($idorder > 0)
		{
			foreach ($_SESSION['cart'] as $key => $value)
			{
				$data2=
				[
					'order_id' 		=> $idorder,
					'product_id'	=> $key,
					'qty'			=> $value['Qty'],
					'price'			=> $value['price']

				];

				$iddetail = $db -> insert("order_detail",$data2);

			}
			$_SESSION['success']="Đã lưu thông tin đặt hàng || Chúng tôi sẽ liên hệ đến số điện thoại của bạn để xác nhận !!!";
			header("location:thongbao.php"); 	
		}
		
	}

?>

<?php require_once __DIR__. "/layouts/header.php" ?>
	<hr>

	<section class="main-content">
				<div class="row">
					<div class="span12" >

						
									<h2 class="title-main" align="center"><a href="">Thanh toán đơn hàng</a></h2>
									<form action="" method="POST" class="form-horizontal" role="form" style="text-align: 10px">
									<table align="center" cellpadding="5">
										<tr>
											<td>	
												<label class="col-md-2 control-label" style="padding-right: 10px">Tên thành viên</label>
											</td>
											<td>
												<div class="col-md-8">
													<input type="text" readonly="" name="name" placeholder="Tên thành viên" class="form-control" value="<?php echo $user['name'] ?>">
												</div>
											</td>
										</tr>

										<tr>
											<td>
												<label class="col-md-2 control-label" style="padding-right: 10px">Email</label>
											</td>
											<td>
												<div class="col-md-8">
													<input type="email" readonly="" name="email" placeholder="email" class="form-control" value="<?php echo $user['email'] ?>">
												</div>
											</td>
										</td>

										<tr>
											<td>
												<label class="col-md-2 control-label" style="padding-right: 10px">Số điện thoại</label>
											</td>
											<td>
												<div class="col-md-8">
													<input type="number" readonly="" name="phone" placeholder="phone" class="form-control" value="<?php echo $user['phone'] ?>">
												</div>
											</td>
										</td>	

										<tr>
											<td>
												<label class="col-md-2 control-label" style="padding-right: 10px">Địa chỉ</label>
											</td>
											<td>
												<div class="col-md-8">
													<input type="text" readonly="" name="address" placeholder="Địa chỉ" class="form-control" value="<?php echo $user['address'] ?>">
												</div>
											</td>
										</td>	

										<tr>
											<td>
												<label class="col-md-2 control-label" style="padding-right: 10px">Số tiền</label>
											</td>
											<td>
												<div class="col-md-8">
													<input type="text" readonly="" name="gia" placeholder="Địa chỉ" class="form-control" value="<?php echo formatgia($_SESSION['tongtien']) ?>">
												</div>
											</td>
										</td>	

										<tr>
											<td>
												<label class="col-md-2 control-label" style="padding-right: 10px">Ghi chu</label>
											</td>
											<td>
												<div class="col-md-8">
													<input type="text"  name="note" placeholder="" class="form-control" value="">
												</div>
											</td>
										</td>		

										<tr>	
											<td colspan="2" align="center">	
												<button type="submit" class="btn btn-success " >Xác nhận</button>
											</td>
										</tr>
									</table>
									</form>				              
								                                                                                         
					</div>
				</div>
	</section>		
<?php require_once __DIR__. "/layouts/footer.php" ?>