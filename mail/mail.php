<?php

$name = htmlspecialchars($_POST["name"]);
$phone = htmlspecialchars($_POST["phone"]);
$email = htmlspecialchars($_POST["email"]);
$text = htmlspecialchars($_POST["message"]);

$message = "Имя: $name \nТелефон: $phone \nТекст сообщения: $text";

$pagetitle = "Новое сообщение с сайта \"HANDYcars (Full website)\"";

mail('budonnyi@gmail.com', $pagetitle, $message, "From:" . $email);
mail('budonnaya@me.com', $pagetitle, $message, "From:" . $email);
