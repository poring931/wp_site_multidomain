<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
// Файлы phpmailer
require './PHPMailer.php';
require './SMTP.php';
require './Exception.php';
$from_server= $_SERVER['HTTP_REFERER'];

if ($_POST['surname']!=''){die();}

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
		$subject = "Заявка с ".$_SERVER["HTTP_HOST"];
		
            $title = "Заявка с ".$_SERVER["HTTP_HOST"];
            $body = "
            <h2>Заявка с ".$_SERVER["HTTP_HOST"]."</h2>
            <b>Имя:</b> $name<br>
            <b>Телефон:</b> $phone<br><br>
            <b>Аренда:</b> $addition<br><br>
              <br><br>
            <b>Откуда пришел запрос </b>$from_server";



// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    //Настройки вашей почты  //это рабочее
    $mail->Host       = 'ssl://smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'grandtaxi2021@gmail.com'; // Логин на почте
    $mail->Password   = 'L8H-xrZ-kLA-JjY'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('grandtaxi2021@gmail.com', 'Grand-Taxi'); // Адрес самой почты и имя отправителя
   

    // Получатель письма
    $mail->addAddress('grandtaxi2021@gmail.com');  
    // $mail->addAddress('poring.m@mail.ru');  
    //$mail->addAddress('youremail@gmail.com'); // Ещё один, если нужен

  





    // Прикрипление файлов к письму
if (!empty($file['name'][0])) {
    for ($ct = 0; $ct < count($file['tmp_name']); $ct++) {
        $uploadfile = tempnam(sys_get_temp_dir(), sha1($file['name'][$ct]));
        $filename = $file['name'][$ct];
        if (move_uploaded_file($file['tmp_name'][$ct], $uploadfile)) {
            $mail->addAttachment($uploadfile, $filename);
            $rfile[] = "Файл $filename прикреплён";
        } else {
            $rfile[] = "Не удалось прикрепить файл $filename";
        }
    }   
}
// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);



    $message__telegram = 'Имя: '.$name."\r\n"
        .'Телефон: '.$phone."\r\n"
        .'Аренда: '.$addition."\r\n"
        .'Откуда пришел запрос: '.$from_server;

    $token = "2063057290:AAFoxmvnV4KIErljIgkqIROyAv0bUrldlhw";
    $data = [
        'text' => $message__telegram,
        'chat_id' => '-350639083'
    ];

file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . strip_tags(http_build_query($data)) );


} else {
    echo json_encode(["result" =>'fail', "resultfile" => $rfile, "status" => $status]);
}