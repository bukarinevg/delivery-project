
<p>Введите данные о доставке </p>

<script>
    function sendAjaxForm( ajax_form, url) {

        $.ajax({
            url: url,
            type: "POST",
            data: $("#" + ajax_form).serialize(),
            success: function (response) {
              alert(response);
            }
        });
    }
</script>

<script>
    function disp(form) {
        if (form === "SimpleOrder") {
            document.getElementById('TypicalOrder').style.display = "none";
            document.getElementById('SimpleOrder').style.display = "block";
        }
        else if (form === "TypicalOrder"){
            document.getElementById('SimpleOrder').style.display = "none";
            document.getElementById('TypicalOrder').style.display = "block";
        }


    }
</script>


<input type="button" value="обычная доставка" onclick="disp('TypicalOrder')" />
<input type="button" value="доставка письма" onclick="disp('SimpleOrder')" />

<form method="post" id="TypicalOrder" action="">
    <p>Город отправления </p>
    <select size="2" id="FirstCity" name="FirstCity">
        <option value="Saratov" id="Saratov"> Саратов </option>
        <option value="Moscow" id="Moscow"> Москва </option>
    </select>
    <p> Город назначения</p>
    <select size="2" name="SecondCity">
        <option value="Saratov" id="Saratov"> Саратов </option>
        <option value="Moscow" id="Moscow"> Москва </option>
    </select>
    <p> Адрес оправления</p>
    <input name="FirstAddress" id="FirstAddress">
    <p>Адрес назначения </p>
    <input id="TypicalOrder" name="TypicalOrder" type="hidden" value="cargo">
    <input name="SecondAddress" id="SecondAddress">
    <p> Вес</p>
    <input id="Weight" name="Weight">
    <p>Выберите скорость доставки </p>
    <select size="3" name="TimeType" id="TimeType">
        <option id="supperquickly" value="supperquickly">от 1-2 дней (срочная) </option>
        <option id="quickly" name="quickly" value="quickly">от 2-4 дней (быстрая) </option>
        <option id="simple" name="simple" value="simple">от 4-7 дней(обычная) </option>
    </select>
    <br />
    <input type="button" name="submit" id="submit" value="Сделать заказ" onclick="sendAjaxForm('TypicalOrder','http://deliivery.ru/makeorder')">
</form>

<form method="post" id="SimpleOrder" action=""  style="display:none"  >
    <p>Город отправления </p>
    <select size="2" id="FirstCity" name="FirstCity">
        <option value="Saratov" id="Saratov"> Саратов </option>
        <option value="Moscow" id="Moscow"> Москва </option>
    </select>
    <p> Город назначения</p>
    <select size="2" name="SecondCity">
        <option value="Saratov" id="Saratov"> Саратов </option>
        <option value="Moscow" id="Moscow"> Москва </option>
    </select>
    <p> Адрес оправления</  p>
    <input id="SimpleOrder" name="SimpleOrder" type="hidden" value="message">
    <input name="FirstAddress" id="FirstAddress">
    <p>Адрес назначения </p>
    <input name="SecondAddress" id="SecondAddress">
    <p>Выберите скорость доставки </p>
    <select size="3" name="TimeType" id="TimeType">
        <option id="supperquickly" value="supperquickly">от 1-2 дней (срочная) </option>
        <option id="quickly" name="quickly">от 2-4 дней (быстрая) </option>
        <option id="simple" name="simple">от 4-7 дней(обычная) </option>
    </select>
    <br />
    <input type="button" name="submit" id="submit" value="Сделать заказ" onclick="sendAjaxForm('SimpleOrder','http://deliivery.ru/makeorder')">
</form>



<script>
/*
    if ((document.getElementById("TypicalOrder"))  && (document.getElementById('SimpleOrder'))){

        document.getElementById('SimpleOrder').style.display = "none";
        document.getElementById('TypicalOrder').style.display = "block";
    }
    else if (document.getElementById("TypicalOrder")){

        document.getElementById('SimpleOrder').style.display = "none";
        document.getElementById('TypicalOrder').style.display = "block";
    }
    else if (document.getElementById('SimpleOrder')){

        document.getElementById('TypicalOrder').style.display = "none";
        document.getElementById('SimpleOrder').style.display = "block";
    }*/
</script>