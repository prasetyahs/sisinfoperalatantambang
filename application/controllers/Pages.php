<?php 

require_once FCPATH.'vendor/autoload.php';
use Phpml\Math\Distance\Euclidean;
use Phpml\Classification\KNearestNeighfbors;
use Phpml\Metric\ClassificationReport;
use Phpml\Metric\Accuracy;
use Phpml\Metric\ConfusionMatrix;
use Phpml\Dataset\CsvDataset;
use Phpml\Dataset\ArrayDataset;
use Phpml\Classification\KNearestNeighbors;
class Pages extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('RentalModel');
    }

    public function index(){
        redirect(base_url());
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
        $product['product_id'] = $this->uri->segment(3);
        $product['price']= $this->db->select("harga")->get_where('tb_product',array("id_product"=>$product['product_id']))->result_array();
        if($this->session->userdata("admin")){
            redirect(base_url());
        }
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_checkout",$product);
        $this->load->view("layout/home/footer");
         
    }


    public function proses_checkout(){
        $idProduct = $_POST['id_product'];
        $idRental = "SW"+date('s')+rand(0,100);
        $idUser = $this->session->userdata('users_id');
        $from = $_POST['from'];
        $to=$_POST['to'];
        $address = $_POST['address'];
        $addressPT = $_POST['address_pt'];
        $city = $_POST['city'];
        $zipcode =$_POST['zipcode'];  
        $total =$_POST['total'];  
        
        if(!empty($address) && !empty($from) && !empty($to) && !empty($city) && !empty($zipcode)){
            $data = array(
                "id_sewa"=>$idRental,
                "id_users"=>$idUser,
                "id_product"=>$idProduct,
                "tgl_sewa"=>$from,
                "tgl_pengembalian"=>$to,
                "alamat"=>$address,
                "alamat_pt"=>$addressPT,
                "kota"=>$city,
                "kode_pos"=>$zipcode,
                "biaya" =>$total
            );
            $this->RentalModel->insertRentalData($data);
            $this->session->set_flashdata('icon','success');
            $this->session->set_flashdata('title','success !');
            $this->session->set_flashdata('message','Sukes !');
            redirect(base_url()."pages/list_transaction");
        }else{
            $this->session->set_flashdata('icon','warning');
            $this->session->set_flashdata('title','Warning !');
            $this->session->set_flashdata('message','Field tidak boleh kosong !');
            redirect(base_url()."pages/checkout/".$idProduct);
        }
        if(isset($_POST['checkout'])){
        }else{
            redirect(base_url());
        }
    }


    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function list_transaction(){
        $idUser = $this->session->userdata('users_id');
        $data['transaction'] = $this->RentalModel->getDataRentalByUsersId($idUser);
        $data = $this->RentalModel->getDataRentalByUsersId($idUser);
        $arrayBaru = array();
        foreach($data as $dataBaru){
            $tglSewa = $dataBaru["tgl_sewa"];
            $tglPengembalian = $dataBaru['tgl_pengembalian'];
            $range = $this->getDatesFromRange($tglSewa,$tglPengembalian);
            $arr = $dataBaru;
            $arr += ['range' =>count($range)-1];
            array_push($arrayBaru,$arr);
        }

        $data['transaction2'] = $arrayBaru;
    
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_list_transaction",$data);
        $this->load->view("layout/home/footer");
    }


    
    public function search_recommended(){
        $labels = array();
        $trainData = $this->ProductModel->getDataProductTrain();
        foreach($trainData as $key=> $index){
            $labels[$key]= $index['nama_product'];
        }
        $dataset = new ArrayDataset($trainData,$labels);
        $dataset->removeColumns([null]);
        $dataset->removeColumns([0,1,2]);
        $samples = $dataset->getSamples();
        $labels = $dataset->getTargets();   
        $quality = $_POST['kualitas'];
        $merk = $_POST['merk'];
        $purpose = $_POST['tujuan'];
        $category = $_POST['category'];
        $deep = $_POST['kedalaman'];
        $price = $_POST['harga'];
        $weight = $_POST['berat'];
        $k = $_POST['paramsk'];

        $predictLabels;
        for($i=0;$i<count($samples);$i++){
            $classifier = new KNearestNeighbors($k);
            $classifier->train($samples,$labels);
            $predict = $classifier->predict([$samples[$i]]);
            $predictLabels[$i] = $predict[0];
        }
    
        $report = new ClassificationReport($labels, $predictLabels);
        $data['accuracy'] = Accuracy::score($labels, $predictLabels)*100;
        $data['average'] = $report->getAverage();
        $input = [$price,$quality,$merk,$purpose,$category,$weight,$deep];
        $newData = array();
        $euclidean = new Euclidean();
        for($i =0 ;$i<=count($samples)-1; $i++){
            $distance = $euclidean->distance($samples[$i], $input);
            $newData [$i]["distance"] = round($distance,2);
            $newData [$i]["data"] = $trainData[$i]; 
        }
        $data['recommend'] = $newData;
        sort($data['recommend']);
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_result_recommend",$data);
        $this->load->view("layout/home/footer");
    }
    public function getDatesFromRange($start, $end, $format = 'Y-m-d') {
        $array = array();
        $interval = new DateInterval('P1D');
    
        $realEnd = new DateTime($end);
        $realEnd->add($interval);
    
        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);
    
        foreach($period as $date) { 
            $array[] = $date->format($format); 
        }
    
        return $array;
    }


    public function profile(){
        $this->load->view("layout/home/header");
        $this->load->view("layout/home/navbar");
        $this->load->view("v_profile");
        $this->load->view("layout/home/footer");
    }
}


