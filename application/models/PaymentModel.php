<?php

    class PaymentModel extends CI_Model
    {
        public function getAllDataPayment(){
            $sql = "SELECT id_pembayaran,tb_pembayaran.id_sewa,pembayaran_awal,pembayaran_akhir,status_pembayaran,tb_sewa.id_users
                           tb_sewa.id_product,tgl_sewa,tgl_pengembalian,biaya,status_pembayaran,nama_product,harga,nama_kualitas,
                           nama_tujuan,berat,kedalaman,fname,lname
                    FROM   tb_pembayaran,tb_penyewaan,tb_product,tb_kualitas,tb_tujuan,tb_users
                    WHERE  tb_pembayaran.id_sewa = tb_penyewaan.id_sewa AND
                           tb_penyewaan.id_users = tb_users.id_users AND
                           tb_product.id_kualitas = tb_kualitas.id_kualitas AND
                           tb_product.id_tujuan = tb_tujuan.id_tujuan AND
                           tb_penyewaan.id_product = tb_product.id_product";
            return $this->db->query($sql)->result_array();
        }

        public function getDataPaymentByIdUsers($idUsers){
            $sql = "SELECT id_pembayaran,tb_pembayaran.id_sewa,pembayaran_awal,pembayaran_akhir,status_pembayaran,tb_sewa.id_users
                            tb_sewa.id_product,tgl_sewa,tgl_pengembalian,biaya,status_pembayaran,nama_product,harga,nama_kualitas,
                            nama_tujuan,berat,kedalaman,fname,lname
                    FROM   tb_pembayaran,tb_penyewaan,tb_product,tb_kualitas,tb_tujuan,tb_users
                    WHERE  tb_pembayaran.id_sewa = tb_penyewaan.id_sewa AND
                            tb_penyewaan.id_users = tb_users.id_users AND
                            tb_product.id_kualitas = tb_kualitas.id_kualitas AND
                            tb_product.id_tujuan = tb_tujuan.id_tujuan AND
                            tb_penyewaan.id_product = tb_product.id_product AND
                            tb_penyewaan.id_users = ?";
            return $this->db->query($sql,$idUsers)->result_array();
        }
    }
    