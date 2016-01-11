<h1>GitHub:<a href="https://github.com/fifths/github_login"/>https://github.com/fifths/github_login</a></h1>
<br/>
<h1>Login:<a href="http://demo.admin1024.com/github_login/tests/login.php">登陆页面</a></h1>
<?php
session_start();
$github = isset($_SESSION['github']) ? $_SESSION['github'] : [];
if (!empty($github)) {
    ?>
    <table>
        <?php foreach ($github as $k => $v) { ?>
            <tr>
                <td><?php echo $k ?></td>
                <td><?php echo $v ?></td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>