<div class="hero-wrap hero-bread" style="background-image: url('https://news.detik.com/x/detail/intermeso/20180419/Kisah-Pipin-Jadi-Raja-Minyak-Indonesia/images/medco-rpnyu2.png');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
                <h1 class="mb-0 bread">Checkout</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 ftco-animate">
                <form action="#" class="billing-form">
                    <h3 class="mb-4 billing-heading">Data Diri</h3>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">Nama Depan</label>
                                <input type="text" value="<?= $this->session->userdata('fname'); ?>" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Nama Belakang</label>
                                <input type="text" value="<?= $this->session->userdata('lname'); ?>" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <!-- <div class="col-md-12">
                            <div class="form-group">
                                <label for="country">Kualitas</label>
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control">
                                        <option value="">Tidak Bersertifikat</option>
                                        <option value="">Sertifikat</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="streetaddress">Alamat</label>
                                <input type="text" class="form-control" placeholder="Alamat Pengiriman">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Alamat PT">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="towncity">Dari</label>
                                <input type="date" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postcodezip">Sampai</label>
                                <input type="date" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="towncity">Kota</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postcodezip">Kode Pos</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">No Telepon</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailaddress">Alamat Email</label>
                                <input type="text" value=<?= $this->session->userdata('email'); ?> class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="w-100"></div>
                       
                    </div>
                </form>
                <!-- END -->
            </div>
            <div class="col-xl-5">
                <div class="row mt-5 pt-3">
                    <div class="col-md-12 d-flex mb-5">
                        <div class="cart-detail cart-total p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Cart Total</h3>
                            <p class="d-flex">
                                <span>Subtotal</span>
                                <span>$20.60</span>
                            </p>
                            <p class="d-flex">
                                <span>Delivery</span>
                                <span>$0.00</span>
                            </p>
                            <p class="d-flex">
                                <span>Discount</span>
                                <span>$3.00</span>
                            </p>
                            <hr>
                            <p class="d-flex total-price">
                                <span>Total</span>
                                <span>$17.60</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="cart-detail p-3 p-md-4">
                            <p><a href="#" class="btn btn-primary py-3 px-4">Sewa</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .col-md-8 -->
        </div>
    </div>
</section>
<!-- .section -->