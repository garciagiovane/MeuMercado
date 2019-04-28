<?php
$money = 100;
setlocale(LC_MONETARY, "pt_BR");
echo money_format('%i' ,$money) ;