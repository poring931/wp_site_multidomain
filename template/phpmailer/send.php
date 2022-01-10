<?
$headers = "From: test@". $_SERVER['HTTP_HOST'] . "\r\n" .
    "Reply-To: test@". $_SERVER['HTTP_HOST'] . "\r\n" .
    "X-Mailer: PHP/" . phpversion();
if( mail("poring.m@mail.ru","my test theme","my test message") ){
    echo "Почта работает!";
}else{
    echo "Почта не работает! Скорее всего проблема в sendmail";
}

$mail="poring.m@mail.ru"; // ваша почта
$subject ="Test" ; // тема письма
$text= "Line 1\nLine 2\nLine 3"; // текст письма
if( mail($mail, $subject, $text) )
{
echo 'Успешно отправлено!'; }
else{
echo 'Отправка не удалась!';
}