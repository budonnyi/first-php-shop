<?php

$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$text = htmlspecialchars($_POST["message"]);

$message = "Имя: $name \nТекст сообщения: $text";

$pagetitle = "Новое сообщение с сайта \"HANDYcars (Carospeed)\"";

mail('budonnyi@gmail.com', $pagetitle, $message, "From:" . $email);
mail('budonnaya@me.com', $pagetitle, $message, "From:" . $email);