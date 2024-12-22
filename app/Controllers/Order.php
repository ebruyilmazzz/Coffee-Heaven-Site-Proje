<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('mongo_db'); // MongoDB kitaplığını yüklüyoruz
        $this->load->helper('url'); // URL yardımı
    }

    public function create() {
        // Formdan gelen veriyi alıyoruz
        $customer_name = $this->input->post('customer_name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $drink = $this->input->post('drink');
        $note = $this->input->post('note');
        
        // MongoDB'ye kaydedilecek veri
        $order_data = [
            'customer_name' => $customer_name,
            'email' => $email,
            'phone' => $phone,
            'drink' => $drink,
            'note' => $note,
            'created_at' => new MongoDB\BSON\UTCDateTime(), // Sipariş oluşturulma zamanı
        ];

        // MongoDB'ye siparişi ekliyoruz
        $order_id = $this->mongo_db->create_order($order_data);

        if ($order_id) {
            // Sipariş başarılıysa bir teşekkür mesajı göster
            $this->session->set_flashdata('message', 'Siparişiniz başarıyla alındı.');
            redirect('order/success');
        } else {
            // Sipariş eklenemediyse hata mesajı
            $this->session->set_flashdata('message', 'Bir hata oluştu, lütfen tekrar deneyin.');
            redirect('order/create');
        }
    }

    public function success() {
        // Başarı mesajı ile sipariş başarıyla alındı ekranını göster
        $data['message'] = $this->session->flashdata('message');
        $this->load->view('order_success', $data);
    }
}
