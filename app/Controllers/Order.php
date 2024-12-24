<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('mongo_db'); // MongoDB kitaplığını yüklüyoruz
        $this->load->helper('url'); // URL yardımı
        $this->load->library('session'); // Session kütüphanesi
    }

    public function create() {
        // Formdan gelen veriyi alıyoruz
        $siparis_no = $this->input->post('siparis_no');
        $musteri_adi = $this->input->post('musteri_adi');
        $urun = $this->input->post('urun');
        $tarih = $this->input->post('tarih');
        $adet = $this->input->post('adet');
        
        // MongoDB'ye kaydedilecek veri
        $order_data = [
            'siparis_no' => $siparis_no,
            'musteri_adi' => $musteri_adi,
            'urun' => $urun,
            'tarih' => $tarih,
            'adet' => (int)$adet, // Adet sayısını tam sayı olarak kaydediyoruz
        ];

        // MongoDB'ye siparişi ekliyoruz
        try {
            $result = $this->mongo_db->insert('siparisler', $order_data);

            if ($result) {
                // Sipariş başarılıysa bir teşekkür mesajı göster
                $this->session->set_flashdata('message', 'Siparişiniz başarıyla alındı. Sipariş No: ' . $siparis_no);
                redirect('order/success');
            } else {
                // Sipariş eklenemediyse hata mesajı
                $this->session->set_flashdata('message', 'Bir hata oluştu, lütfen tekrar deneyin.');
                redirect('order/create');
            }
        } catch (Exception $e) {
            // Hata durumunda mesaj göster
            $this->session->set_flashdata('message', 'Bir hata oluştu: ' . $e->getMessage());
            redirect('order/create');
        }
    }

    public function success() {
        // Başarı mesajı ile sipariş başarıyla alındı ekranını göster
        $data['message'] = $this->session->flashdata('message');
        $this->load->view('order_success', $data);
    }
}
