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

###
```
{
"login": "fifths",
"id": 6918354,
"avatar_url": "https://avatars.githubusercontent.com/u/6918354?v=3",
"gravatar_id": "",
"url": "https://api.github.com/users/fifths",
"html_url": "https://github.com/fifths",
"followers_url": "https://api.github.com/users/fifths/followers",
"following_url": "https://api.github.com/users/fifths/following{/other_user}",
"gists_url": "https://api.github.com/users/fifths/gists{/gist_id}",
"starred_url": "https://api.github.com/users/fifths/starred{/owner}{/repo}",
"subscriptions_url": "https://api.github.com/users/fifths/subscriptions",
"organizations_url": "https://api.github.com/users/fifths/orgs",
"repos_url": "https://api.github.com/users/fifths/repos",
"events_url": "https://api.github.com/users/fifths/events{/privacy}",
"received_events_url": "https://api.github.com/users/fifths/received_events",
"type": "User",
"site_admin": false,
"name": "lee",
"company": null,
"blog": null,
"location": "Arctique",
"email": null,
"hireable": null,
"bio": null,
"public_repos": 12,
"public_gists": 0,
"followers": 4,
"following": 1,
"created_at": "2014-03-11T12:02:13Z",
"updated_at": "2016-01-14T09:06:34Z"
}
```