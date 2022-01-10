<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$to='poring.m@mail.ru';
	$error=array ('response'=>'error');
    if ($_POST['surname']!=''){die();}
	$headers="MIME-Version: 1.0\r\n"
	."Content-type: text/html; charset=UTF-8\r\n"
	."From: citymobile.ru  <no-reply@".$_SERVER['HTTP_HOST'].">\r\n"
			."Reply-To: no-reply@".$_SERVER['HTTP_HOST']."\r\n"
			."X-Mailer: PHP/" . phpversion();
        $addition ='';
        if (isset($_POST['rent_mobile']) && $_POST['rent_mobile'] == 'on') 
        {
            $addition= 'Хочу арендовать автомобиль';
        }
        if (isset($_POST['rent_mobile_buy']) && $_POST['rent_mobile_buy'] == 'on') 
        {
            $addition.= ' Аренда авто с выкупом';
        }
        if($addition == ''){$addition = 'Не выбрали';}

			$name = htmlspecialchars($_POST['name']);
			$phone = htmlspecialchars($_POST['tel']);
			$surname = $_POST['surname'];
			if ($surname != ''){exit();}
			$subject = "Заявка с сайта citymobile форма: ОСТАВИТЬ ЗАЯВКУ";
			 $message = '<html><head><title>'.$subject.'</title></head><body>
				Имя: '.$name.'<br>
				Телефон: '.$phone.'<br>
				Аренда: '.$addition.'<br>
				Откуда пришел запрос: '.$_SERVER['HTTP_REFERER'].'</body></html>';
			if($_POST['port']=='') $mail = mail($to, $subject, $message, $headers);
			if($mail){
					$arrResult = array ('response'=>'success');
			}	else {
				$arrResult = array ('response'=>'error');
			}


			$message__telegram = 'Имя: '.$name."\r\n"
				.'Телефон: '.$phone."\r\n"
				.'Аренда: '.$addition."\r\n"
				.'Откуда пришел запрос: '.$_SERVER['HTTP_REFERER'];



			$token = "2063057290:AAFoxmvnV4KIErljIgkqIROyAv0bUrldlhw";
			$data = [
				'text' => $message__telegram,
				'chat_id' => '345604076'
			];

			file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . strip_tags(http_build_query($data)) );
			$token = "2063057290:1668788134:AAFQOSMBaQgvNfpoHM1JxVmjCJJOuDC1gXQ";
			$data = [
				'text' => $message__telegram,
				'chat_id' => '313875470'
			];

			file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . strip_tags(http_build_query($data)) );

				

}
echo json_encode($arrResult);
?>
