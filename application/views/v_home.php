<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url(<?= base_url(); ?>assets/home/images/minyak.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                    <div class="col-md-12 ftco-animate text-center">
                        <h1 class="mb-2">PT Nesitor</h1>
                        <h2 class="subheading mb-4">Jasa Penyewaaan Alat Pertambangan Minyak</h2>
                        <p><a href="#" class="btn btn-primary">View Details</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if($this->session->flashdata('message')){ ?>
    <p id="alert"></p>
    <p style="display:none;" id="icon"><?= $this->session->flashdata('icon');  ?></p>
    <p style="display:none;" id="title"><?= $this->session->flashdata('title');  ?></p>
    <p style="display:none;" id="message"><?= $this->session->flashdata('message');  ?></p>
<?php } ?>
<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
    <div class="row">
        <div class="col ftco-animate">
            <img src="https://dev.nabors.com/sites/default/files/rigs-offshore-platform-bigfoot_0.jpg">
        </div>
        <div class="col heading-section text-center ftco-animate">
            <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
                    <br>
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2 class="mb-4"></h2>
                        <p>Cari rekomendasi produk</p>
                    </div>
                </div>
            </div>
            <br>
            <form action="<?= base_url(); ?>home/rekomendasi" method="post">
                <div class="form-group-inner">
                    <div class="row" style="margin-bottom:10px;">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label class="login2 pull-right pull-right-pro">Tujuan</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <input id="id" type="text" name="email" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="form-group-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label class="login2 pull-right pull-right-pro">Password</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <input type="password" id="nama" name="password" class="form-control" />
                        </div>
                    </div>
                </div>

        </div>
        <div class="modal-footer">

        </div>
        </form>
    </div>
    </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Produk</h2>
                <p>Beberapa Jenis Alat Tambang yang di sewakan</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach($product as $row){ ?>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="#" class="img-prod"><img style="height:166px;" class="img-fluid" src="<?= base_url() ?>/assets/home/images/product/<?= $row['foto'] ?>" alt="Colorlib Template">
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center ">
                        <h3><a href="#"><?= $row['nama_product']; ?></a></h3>
                        
                        <div class="d-flex">
                            <div class="pricing">
                            <p style="color:#fff;">asd</p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex  style="margin-bottom:100px;">
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
    </div>
</section>
<hr>