<?php
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/functions.php';

session_start();

if(is_logined() === true){
  redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/index.php');
}

include_once 'https://niko1105.github.io/bash-ec-portfolio/view/login_view.php';
