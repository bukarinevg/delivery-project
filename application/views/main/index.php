
<?php if (!(isset($_COOKIE['authorize']))){?>
<a href="/account" id="Login"> Войти или зарегистрироваться чтобы сделать заказ</a>
<? }?>

<?php if(isset($_COOKIE['authorize'])){

    ?>
<a href="/makeorder">Сделать заказ </a>
<form method="post" action="/">
    <input type="submit" name="submit" id="submit" value="Выход">
</form>
<?php }?>
