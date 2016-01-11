GitHub:<a href="https://github.com/fifths/github_login"/>https://github.com/fifths/github_login</a>
<br/>
Login:<a href="http://demo.admin1024.com/github_login/tests/login.php">登陆</a>
<table>
    <?php
    $github = isset($_SESSION['github']) ? $_SESSION['github'] : [];
    ?>
    <?php foreach ($github as $k => $v) { ?>
        <tr>
            <td><?php echo $k ?></td>
            <td><?php echo $v ?></td>
        </tr>
    <?php } ?>
</table>