<?php
namespace App\Controllers;
use App\Models\AnasayfaModel;
use MongoDB;// composerla yüklendi
//genel dokümantasyon --> https://www.mongodb.com/docs/php-library/current/get-started/
//veri okuma için dokümantasyon --> https://www.mongodb.com/docs/php-library/current/read/
//veri yazma için dokümantasyon --> https://www.mongodb.com/docs/php-library/current/write/

//mongo kurulum için dokümantasyon --> https://www.mongodb.com/developer/languages/php/php-setup/
//ek bilgi için dokümantasyon --> https://www.mongodb.com/developer/languages/php/php-crud/

class Anasayfa extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {   
     return view('tema/header').view('sayfalar/anasayfa').view('tema/footer');
    }

    public function icecekler()
    {
        $data = [];
        $model = model('AnasayfaModel');
        $kayitlar = $model->kayitlar();
    
        if (count($kayitlar) > 0) {
            $data['kayitlar'] = $kayitlar;
        }
    
        $session = session(); 
        $data['isim'] = $session->get('isim');
        $data['durum'] = $session->get('durum');
    
        return view('tema/header', $data)
            . view('sayfalar/icecekler',$data)
            . view('tema/footer');
    }
    
   
    public function order_form()
    {
        return view('tema/header').view('sayfalar/order_form').view('tema/footer');
    }
    public function login()
    {
        $session= session();
        if ( $session->has('durum') && $session->get('durum')) 
        {
           return redirect()->to(base_url('panel'));
        }
        else
        {
            if (! $this->request->is('post')) {
                return view('tema/header').view('sayfalar/login').view('tema/footer');

            }
    
            $rules = [
                'kulad' => 'required',
                'sifre' => 'required',
            ];
    
    
            if (! $this->validate($rules)) {
                return view('tema/header').view('sayfalar/login').view('tema/footer');

            }
    
            $veri = $this->validator->getValidated();
            $model=model('AnasayfaModel');

            $sor=$model->where(['kulad'=>$veri['kulad'],'sifre'=>$veri['sifre']])->find();
            if (count($sor)>0) 
            {
                $kul_bilgi=[
                   'isim'=>'admin' ,
                   'durum'=>true 
                ];

                   $session->set($kul_bilgi);

                   return redirect()->to(base_url('panel'));
            }
            else{
                 return view('tema/header',['uyari'=>'Yanlış Kullanıcı'] ).view('sayfalar/login').view('tema/footer');

            }
       }
    }

    public function  logout()
    {
       $session=session();
       $session->destroy();
       return redirect()->to(base_url('login'));
    }


    public function test($ornek)
    {
        $kul_adi="creepa";
        $sifre="UTuNwGx03EBUNJjn";
        $adres="cluster0.9sywh.mongodb.net";
        $veritabani="sample_mflix";

        switch ($ornek)
        {
            case 1:{//tek veri sorgulama
                $koleksiyon_adi='users';
                $client = new MongoDB\Client("mongodb+srv://$kul_adi:$sifre@$adres");

                $koleksiyon = $client->selectCollection($veritabani, $koleksiyon_adi);
                $document = $koleksiyon->findOne(['email' => 'sean_bean@gameofthron.es']);
                //var_dump($document);
                foreach ($document as $key => $value)
                {
                    echo $key.' -> '.$value.'<br>';
                }
            }break;
            case 2:{//çoklu veri sorgulama
                $koleksiyon_adi='comments';
                $client = new MongoDB\Client("mongodb+srv://$kul_adi:$sifre@$adres");

                $koleksiyon = $client->selectCollection($veritabani, $koleksiyon_adi);
                $document = $koleksiyon->find(['email' => 'john_bishop@fakegmail.com']);
                //var_dump($document);
                foreach ($document as $doc) {
                    foreach ($doc as $key => $value)
                    {
                        echo $key.' -> '.$value.'<br>';
                    }
                    echo '<hr>';
                }
            }break;
            case 3:{//koleksiyondaki toplam veri miktarı
                $koleksiyon_adi='users';
                $client = new MongoDB\Client("mongodb+srv://$kul_adi:$sifre@$adres");

                $koleksiyon = $client->selectCollection($veritabani, $koleksiyon_adi);
                $toplam = $koleksiyon->countDocuments([]);

                echo $toplam;
            }break;
            case 4:{//bir sorguyla dönen veri miktarı
                $koleksiyon_adi='comments';
                $client = new MongoDB\Client("mongodb+srv://$kul_adi:$sifre@$adres");

                $koleksiyon = $client->selectCollection($veritabani, $koleksiyon_adi);
                $toplam = $koleksiyon->countDocuments(['email' => 'john_bishop@fakegmail.com']);

                echo $toplam;
            }break;
            case 5:{//tek bir veri ekleme
                $koleksiyon_adi='comments';
                $client = new MongoDB\Client("mongodb+srv://$kul_adi:$sifre@$adres");

                $koleksiyon = $client->selectCollection($veritabani, $koleksiyon_adi);
                $sonuc = $koleksiyon->insertOne([
                    'name' => 'Veli Özcan',
                    'email' => 'ozcan@test.com',
                    'text' => 'örnek yorum',
                ]);
                //var_dump($sonuc);
            }break;
            case 6:{//çoklu veri ekleme
                $koleksiyon_adi='comments';
                $client = new MongoDB\Client("mongodb+srv://$kul_adi:$sifre@$adres");

                $koleksiyon = $client->selectCollection($veritabani, $koleksiyon_adi);
                $sonuc = $koleksiyon->insertMany([
                    [
                        'name' => 'Veli Özcan',
                        'email' => 'ozcan@test.com',
                        'text' => 'örnek yorum',
                    ],
                    [
                        'name' => 'Veli Özcansd',
                        'email' => 'ozcan@test.com',
                        'text' => 'örnek yorum2',
                    ],
                ]);

                //var_dump($sonuc);
            }break;
            case 7:{//tek bir veriyi güncelleme (sorgulamada ilk çıkan veri güncellenir)
                $koleksiyon_adi='comments';
                $client = new MongoDB\Client("mongodb+srv://$kul_adi:$sifre@$adres");

                $koleksiyon = $client->selectCollection($veritabani, $koleksiyon_adi);
                $sonuc = $koleksiyon->updateOne(
                    [
                        'email' => 'ozcan@test.com'
                    ],
                    ['$set' => ['text' => 'yorum güncellendi']]
                );
            }break;
            case 8:{//çoklu veri güncelleme
                $koleksiyon_adi='comments';
                $client = new MongoDB\Client("mongodb+srv://$kul_adi:$sifre@$adres");

                $koleksiyon = $client->selectCollection($veritabani, $koleksiyon_adi);
                $sonuc = $koleksiyon->updateMany(
                    [
                        'email' => 'ozcan@test.com'
                    ],
                    ['$set' => ['text' => 'yorum güncellendi']]
                );
            }break;
            case 9:{//tek bir veriyi silme (sorgulamada ilk çıkan veri silinir)
                $koleksiyon_adi='comments';
                $client = new MongoDB\Client("mongodb+srv://$kul_adi:$sifre@$adres");

                $koleksiyon = $client->selectCollection($veritabani, $koleksiyon_adi);
                $sonuc = $koleksiyon->deleteOne(
                    [
                        //'_id' => new MongoDB\BSON\ObjectId('67519057a2600000f80045d2') //id ile silmek için
                        'email' => 'ozcan@test.com' //normal silme için
                    ]
                );
            }break;
            case 10:{//çoklu veri silme
                $koleksiyon_adi='comments';
                $client = new MongoDB\Client("mongodb+srv://$kul_adi:$sifre@$adres");

                $koleksiyon = $client->selectCollection($veritabani, $koleksiyon_adi);
                $sonuc = $koleksiyon->deleteMany(
                    [
                        'email' => 'ozcan@test.com'
                    ]
                );
            }break;
        }

    }
}
