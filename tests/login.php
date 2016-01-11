<h1><a href="authorize.php">授权登陆</a></h1>
<?php
require '../vendor/autoload.php';

use  GitHub\GitHub;

$gitHub=new GitHub();
echo $gitHub->getAuthorizeUrl('ceshi');
?>