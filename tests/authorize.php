<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 15/12/28
 * Time: 20:56
 */
require '../vendor/autoload.php';

use  GitHub\GitHub;

$gitHub=new GitHub();
echo $gitHub->getAuthorizeUrl('ceshi');