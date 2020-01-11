<?php if (!(isset($_COOKIE['authorize']))){?>
<p> Вход</p>

<form method="post" action="" >
    <input id="login" name="login">
    <input id="password"  type="password" name="password">
    <br />
    <input type="submit" name="submit" id="submit">
</form>

<a id="register" href="/register"> Зарегистрироваться </a>
<?php }
