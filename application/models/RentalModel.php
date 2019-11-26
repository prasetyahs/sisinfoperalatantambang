<?php 

    class RentalModel extends CI_Model{
        public function getAllDataRental(){
            $sql = "SELECT nama_depan,nama_belakang,id_sewa,tb_users.id_users,tb_penyewaaan.id_product,nama_product,nama_kualitas,nama_tujuan,tgl_sewa,                        tgl_pengembalian,biaya,status_penyewaan,tb_kualitas.nilai as n_kualitas,tb_merk.nilai as n_merk,tb_category.nilai as n_category,tb_tujuan.nilai as n_tujuan
                            From tb_penyewaaan,tb_users,tb_product,tb_kualitas,tb_tujuan,tb_merk,tb_category
                            WHERE tb_penyewaaan.id_users = tb_users.id_users AND
                                    tb_penyewaaan.id_product = tb_product.id_product AND
                                    tb_kualitas.id_kualitas = tb_product.id_kualitas AND
                                    tb_tujuan.id_tujuan  = tb_product.id_tujuan AND
                                    tb_merk.id_merk = tb_product.id_merk AND
                                    tb_category.id_category=tb_product.id_category
                                    ";
            return $this->db->query($sql)->result_array();
        }

        public function getDataRentalByUsersId($idUsers){
            $sql = "SELECT nama_depan,nama_belakang,id_sewa,tb_users.id_users,tb_penyewaaan.id_product,nama_product,nama_kualitas,nama_tujuan,tgl_sewa,                        tgl_pengembalian,biaya,status_penyewaan,tb_tujuan.id_tujuan,tb_kualitas.id_kualitas,foto
                                From tb_penyewaaan,tb_users,tb_product,tb_kualitas,tb_tujuan
                                WHERE tb_penyewaaan.id_users = tb_users.id_users AND
                                        tb_penyewaaan.id_product = tb_product.id_product AND
                                        tb_kualitas.id_kualitas = tb_product.id_kualitas AND
                                        tb_tujuan.id_tujuan  = tb_product.id_tujuan AND
                                        tb_penyewaaan.id_users = ?";
            return $this->db->query($sql,$idUsers)->result_array();
        }

        public function insertRentalData($data){
            return $this->db->insert("tb_penyewaaan",$data);
        }
    }