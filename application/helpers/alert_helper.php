<?php 


	function alert($url="")
	{
		switch ($url) {
			case 'free':
				$alert 		= 'alert alert-warning';

				$subject	= 'Lütfen boş alan bırakmayınız!';
				$text		= '';
				break;

			case 'fielduser':
				$alert 		= 'alert alert-danger';
				$subject	= 'Email veya Şifre yanlış!';
				$text		= '';
				break;

			case 'addsuccess':
				$alert 		= 'alert alert-success';
				$subject	= 'Kayd edildi!';
				$text		= '';
				break;
			case 'addunsuccess':
				$alert 		= 'alert alert-danger';
				$subject	= 'Kayd edildimedi!';
				$text		= ' Lütfen tekrar deneyiniz! Düzelmediği takdirde İT yöneticisine bilgi veriniz!';
				break;
			case 'updatesuccess':
				$alert 		= 'alert alert-success';
				$subject	= 'Güncellendi!';
				$text		= '';
				break;

			case 'updateunsuccess':
				$alert 		= 'alert alert-danger';
				$subject	= 'Güncelleme Yapılamadı!';
				$text		= ' Lütfen tekrar deneyiniz! Düzelmediği takdirde İT yöneticisine bilgi veriniz!';
				break;

			case 'has':
				$alert 		= 'alert alert-warning';
				$subject	= 'Aynı Kayit Veritabanda Mevcut!';
				$text		= ' (TEL & AD & EMAIL olabilir)';
				break;

			case 'unenter':
				$alert 		= 'alert alert-warning';
				$subject	= 'Yetkiniz Yok! DİKKAT:';
				$text		= ' Yetkisiz sayfaya girmeyı devam ederseniz SİSTEME GİRİŞİNİZ ENGELLENCEKTİR!';
				break;
			case 'deleted':
				$alert 		= 'alert alert-success';
				$subject	= 'Silindi !';
				$text		= '';
				break;		
				
					
				
			
			
			
			default:
				$alert 		= '';
				$subject	= '';
				$text		= '';
				break;
		}

		return $message = '<div class="'.$alert.'">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>'.$subject.'</strong>'.@$text.'
			</div>';
	}