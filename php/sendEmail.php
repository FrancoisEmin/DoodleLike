<?php
include_once('email.class.php');

$oEmail = new email();
$oEmail->__set('to','nissanr380@hotmail.com');
$oEmail->__set('subject','Email test');
$oEmail->__set('body','JSEvents vous contacte pour vous prévenir que votre inscription à un évènement a bien été effectué.');
$oEmail->send();