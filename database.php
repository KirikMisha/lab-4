<?php

$db = mysqli_connect('localhost','root','','Misha_Lab');

if (mysqli_connect_errno()){
    echo('Ошибка в подключении('.mysqli_connect_errno().'):'.mysqli_connect_error);
    exit();
}