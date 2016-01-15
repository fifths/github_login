# GitHub Login
[![Build Status](https://travis-ci.org/fifths/github_login.svg?branch=master)](https://travis-ci.org/fifths/github_login)
[![Latest Stable Version](https://poser.pugx.org/fifths/github_login/v/stable)](https://packagist.org/packages/fifths/github_login)
[![Total Downloads](https://poser.pugx.org/fifths/github_login/downloads)](https://packagist.org/packages/fifths/github_login)
[![Latest Unstable Version](https://poser.pugx.org/fifths/github_login/v/unstable)](https://packagist.org/packages/fifths/github_login)
[![License](https://poser.pugx.org/fifths/github_login/license)](https://packagist.org/packages/fifths/github_login)


GitHub 第三方登陆

### Installation(安装)

    composer require fifths/github_login

### authorize
```php
require '../vendor/autoload.php';

use  GitHub\GitHub;

$gitHub=new GitHub();
$gitHub->authorize('abc');
```

### get_user_info
```php
require '../vendor/autoload.php';

use  GitHub\GitHub;

if(isset($_GET['code'])){
    $code=$_GET['code'];
    $gitHub=new GitHub();
    $token=$gitHub->get_access_token($code);
    $access_token=$token['access_token'];
    $getData=$gitHub->get_user_info($access_token);
    $info=json_decode($getData, true);
    print_r($info);
}
```