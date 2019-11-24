<?php 

    class RentalModel extends CI_Model{
        public function getAllDataRental(){
            $sql = "SELECT fname,lname,id_sewa,tb_users.id_users,tb_sewa.id_product,nama_product,nama_kualitas,nama_tujuan,tgl_sewa,                        tgl_pengembalian,biaya,status_penyewaan 
                            From tb_penyewaan,tb_users,tb_product,tb_kualitas,tb_tujuan
                            WHERE tb_penyewaan.id_users = tb_users.id_users AND
                                    tb_penyewaan.id_product = tb_product.id_product AND
                                    tb_kualitas.id_kualitas = tb_product.id_kualitas AND
                                    tb_tujuan.id_tujuan  = tb_product.id_tujuan";
            return $this->db->query($sql)->result_array();
        }

        public function getDataRentalByUsersId($idUsers){
            $sql = "SELECT fname,lname,id_sewa,tb_users.id_users,tb_sewa.id_product,nama_product,nama_kualitas,nama_tujuan,tgl_sewa,                        tgl_pengembalian,biaya,status_penyewaan,tb_tujuan.id_tujuan,tb_kualitas.id_kualitas
                                From tb_penyewaan,tb_users,tb_product,tb_kualitas,tb_tujuan
                                WHERE tb_penyewaan.id_users = tb_users.id_users AND
                                        tb_penyewaan.id_product = tb_product.id_product AND
                                        tb_kualitas.id_kualitas = tb_product.id_kualitas AND
                                        tb_tujuan.id_tujuan  = tb_product.id_tujuan AND
                                        tb_penyewaan.id_users = ?";
            return $this->db->query($sql,$idUsers)->result_array();
        }
    }