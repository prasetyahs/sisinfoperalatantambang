
<?php 
if($this->session->flashdata('message')){?>
    <p id="alert"></p>
    <p style="display:none;" id="icon"><?= $this->session->flashdata('icon');  ?></p>
    <p style="display:none;" id="title"><?= $this->session->flashdata('title');  ?></p>
    <p style="display:none;" id="message"><?= $this->session->flashdata('message');  ?></p>
<?php } ?>
<div class="hero-wrap hero-bread" style="background-image: url('https://news.detik.com/x/detail/intermeso/20180419/Kisah-Pipin-Jadi-Raja-Minyak-Indonesia/images/medco-rpnyu2.png');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Transaction</span></p>
                <h1 class="mb-0 bread">My Transaction</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">                              
                                <th>Nama Product</th>
                                <th>Jumlah Hari</th>
                                <th>Tanggal Sewa</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Harga/hari</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($transaction2 as $row){ ?>
                            <tr class="text-center">
                                <td><?= $row['nama_product']; ?></td>
                                <td id="range"><?= $row['range']; ?></td>
                                <td id="from"><?= $row['tgl_sewa']; ?></td>
                                <td id="to"><?= $row['tgl_pengembalian']; ?></td>
                                <td>Rp. <?= number_format($row['biaya'],2,",","."); ?></td>
                                <td><img src="<?= base_url() ?>assets/home/images/product/<?= $row['foto']; ?>" alt="" width="60px"></td>
                                <?php if($row['status_penyewaan'] == 1){ ?>
                                <td><i class="icon-check"></i></td>
                                <?php }else{ ?>
                                    <td><i class="icon-close"></i></td>
                                <?php }?>
                                <?php if($row['status_penyewaan'] == 0){ ?>
                                <td><a href="" class="btn" style="background:#f8a978;color:white">Batal</a></td>
                                <?php }else{ ?>
                                    <td><a href="" class="btn" style="background:#f8a978;color:white">DP</a></td>
                                <?php } ?>
                            </tr>                            
                            <!-- END TR-->
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>