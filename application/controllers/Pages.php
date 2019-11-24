<?php 

class Pages extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductModel');
    }

    public function about(){
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_about");
        $this->load->view("layout/home/footer");
    }

  
    public function listProduct(){
        $totalProduct = count($this->db->get('tb_product')->result_array());
        $config['base_url'] = base_url().'pages/listproduct/';
        $config['total_rows'] = $totalProduct;
        $config['per_page'] = 4;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['next_tag_open'] = '<li style="margin-left:5px">';
        $config['next_tag_close'] = '</li'>
        $config['prev_tag_open'] = '<li style="margin-left:5px">';
        $config['prev_tag_close'] ='</li>';
        $config['cur_tag_open'] = '<li style="margin-left:5px" class="active"><span>';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li style="margin-left:5px">';
        $config['num_tag_close'] = '</li>';
        $page = $this->uri->segment(3);
        if($page == null){
            $page = 0;
        }
        $this->pagination->initialize($config);
        $data['product'] = $this->ProductModel->getListDataProduct($config['per_page'],$page);
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_list_product",$data);
        $this->load->view("layout/home/footer");
    }

    public function contact(){
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_contact");
        $this->load->view("layout/home/footer");
    }

    public function singleProduct(){
        $idProduct = $this->uri->segment(3);
        $data['detail'] = $this->ProductModel->getDataProductById($idProduct);
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_single_product",$data);
        $this->load->view("layout/home/footer");
    }

    public function checkout(){
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_checkout");
        $this->load->view("layout/home/footer");
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function list_transaction(){
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_transaction");
        $this->load->view("layout/home/footer");
    }
}


