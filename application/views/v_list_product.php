
    <div class="hero-wrap hero-bread" style="background-image: url('https://petrotrainingasia.com/wp-content/uploads/2016/11/minyak-dan-gas-1024x576.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="#" class="active">All</a></li>
    					<li><a href="#">Truck</a></li>
    					<li><a href="#">Mesin Bor</a></li>
    				</ul>
    			</div>
    		</div>
    		<div class="row">
				<?php foreach($product as $row){ ?>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="product">
							<a href="#" class="img-prod"><img class="img-fluid" src="<?= base_url() ?>/assets/home/images/product/<?= $row['foto'] ?>" alt="Colorlib Template">
								<div class="overlay"></div>
							</a>
							<div class="text py-3 pb-4 px-3 text-center ">
								<h3><a href="#"><?= $row['nama_product']; ?></a></h3>
								
								<div class="d-flex">
									<div class="pricing">
									<p >Rp.<?= number_format($row['harga']); ?></p>
									</div>
								</div>
								<div class="bottom-area d-flex px-3">
									<div class="m-auto d-flex"  style="margin-bottom:100px;">
										<a href="<?= base_url();?>pages/singleproduct/<?= $row['id_product'] ?>/" class="add-to-cart d-flex justify-content-center align-items-center text-center">
											<span><i class="ion-ios-menu"></i></span>
										</a>
										<a href="<?= base_url();?>pages/checkout" class="buy-now d-flex justify-content-center align-items-center mx-1">
											<span><i class="ion-ios-cart"></i></span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
    		</div>
    		<div class="row mt-5">
				<div class="col text-center">
					<div class="block-27">
					<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>
		</div>
	</div>
    </section>