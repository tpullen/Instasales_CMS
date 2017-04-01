<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charts extends MX_Controller {

    public function __construct(){
        parent::__construct();
    }

   public function stacked_bar(){

   		
   		$query = $this->db->query('SELECT * FROM `orders` WHERE `date` = CURRENT_DATE()');
		$neword = $query->num_rows();

		$query = $this->db->query('SELECT * FROM `customer_details` WHERE  `date_registered` = CURRENT_DATE()');
		$newcust = $query->num_rows();
        
		$query = $this->db->query('SELECT * FROM `products` WHERE  `added` = CURRENT_DATE()');
		$added = $query->num_rows();

		$series_data = array($neword, $newcust, $added);
       
        $data['series_data'] = json_encode($series_data);
        $this->load->view('stacked_bar', $data);

    }

    public function donut_chart(){
    	$query = $this->db->query('SELECT * FROM `orders` WHERE `status` = "Pending"');
        $pending = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE `status` = "Dispatched"');
        $dispatched = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE `status` = "Cancelled"');
        $cancelled = $query->num_rows();
   

        $series_data = array(
        	array('Pending', $pending),
        	array('Dispatched', $dispatched),
        	array('Cancelled', $cancelled));
       
        $data['series_data'] = json_encode($series_data);
        $this->load->view('popular', $data);

    }

    public function monthly_sales_chart(){
    	
    	$query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 01 AND YEAR(`date`) = 2016');
        $jan = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 02 AND YEAR(`date`) = 2016');
        $feb = $query->num_rows();
    	$query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 03 AND YEAR(`date`) = 2016');
        $march = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 04 AND YEAR(`date`) = 2016');
        $april = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 05 AND YEAR(`date`) = 2016');
        $may = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 06 AND YEAR(`date`) = 2016');
        $june = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 07 AND YEAR(`date`) = 2016');
        $july = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 08 AND YEAR(`date`) = 2016');
        $august = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 09 AND YEAR(`date`) = 2016');
        $september = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 10 AND YEAR(`date`) = 2016');
        $october = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 11 AND YEAR(`date`) = 2016');
        $november = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 12 AND YEAR(`date`) = 2016');
        $december = $query->num_rows();

        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 01 AND YEAR(`date`) = 2015');
        $jan_2015 = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 02 AND YEAR(`date`) = 2015');
        $feb_2015 = $query->num_rows();
    	$query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 03 AND YEAR(`date`) = 2015');
        $march_2015 = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 04 AND YEAR(`date`) = 2015');
        $april_2015 = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 05 AND YEAR(`date`) = 2015');
        $may_2015 = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 06 AND YEAR(`date`) = 2015');
        $june_2015 = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 07 AND YEAR(`date`) = 2015');
        $july_2015 = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 08 AND YEAR(`date`) = 2015');
        $august_2015 = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 09 AND YEAR(`date`) = 2015');
        $september_2015 = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 10 AND YEAR(`date`) = 2015');
        $october_2015 = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 11 AND YEAR(`date`) = 2015');
        $november_2015 = $query->num_rows();
        $query = $this->db->query('SELECT * FROM `orders` WHERE MONTH(`date`) = 12 AND YEAR(`date`) = 2015');
        $december_2015 = $query->num_rows();

        $series_data[] = array('name' => '2016', 'data' => array($jan,$feb,$march,$april,$may,$june,$july,$august,$september,$october,$november,$december));
        $series_data[] = array('name' => '2015', 'data' => array($jan_2015,$feb_2015,$march_2015,$april_2015,$may_2015,$june_2015,$july_2015,$august_2015,$september_2015,$october_2015,$november_2015,$december_2015));
        
       
        $data['series_data'] = json_encode($series_data);
        $this->load->view('monthly_orders', $data);
	
	}




    	
}