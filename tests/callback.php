<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 15/12/28
 * Time: 21:04
 */
require '../vendor/autoload.php';

use  GitHub\GitHub;
session_start();
if(isset($_GET['code'])){
    $code=$_GET['code'];
    $gitHub=new GitHub();
    $token=$gitHub->get_access_token($code);
    if(isset($token['access_token'])){
        $access_token=$token['access_token'];
        $getData=$gitHub->get_user_info($access_token);
        $info=json_decode($getData, true);
        //echo json_encode($info);
        //save userinfo
        $_SESSION['github']=$info;
        echo json_encode($_SESSION['github']);
    }
}
header("location:index.php");
