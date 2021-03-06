<?php

// echo '<style>';
// echo file_get_contents("css/style.css");;
// echo '</style>';

// header('content-type: text/html; charset="utf-8";');

include_once("functions/function_db.php");

// echo '<br><h1>Перелік таблиць:</h1><br>';

// $tableList = [
//   'довгорізана',
//   'короткорізана',
//   'пакувальні_машини',
//   // 'пакувальні_машини_лінії',
//   'продукція',
//   'автоматизовані_лінії',
//   'вид_продукції',
//   'вид_сировини',
//   'змінний_журнал',
//   'заявка_на_виробництво',
//   'сировина',
// ];

// foreach ($tableList as $name => $value) {
//   echo '<a href="table.php/?tablename=' . $value . '">';
//   echo $value;
//   echo '</a><br>';
// }

?>

<!-- <h2>
  <a href="performance.php/?tablename='активне_завдання_та_бригада'">Представлення</a>
</h2> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KMF</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="wrapper">
    
    <div class="header">
      <div class="container">
        <div class="header__row">
          <div class="header__logo">
            <a href="index.php">
              <img src="img/logo-1.png" alt="">
            </a>          
          </div>
          <div class="header__text">
            <p>ВАТ "КИЇВСЬКА МАКАРОННА ФАБРИКА"</p>
          </div>
        </div>
      </div>
    </div>

    <div class="nav">
      <div class="container">
        <div class="menu">
          <ul class="menu__list">              
            <li class="menu__item">
              <a href="pages/journal.php" class="menu__link">Змінний журнал</a>              
            </li>
            <li class="menu__item">
              <a href="#" class="menu__link">Сировина</a>
              <ul class="sub-menu__list">
                <li>
                  <a href="pages/raw.php" class="sub-menu__link">Сировина</a>
                </li>
                <li>
                  <a href="pages/typeofraw.php" class="sub-menu__link">Вид сировини</a>
                </li>
              </ul>
            </li>
            <li class="menu__item">
              <a href="#" class="menu__link">Продукція</a>
              <ul class="sub-menu__list">
                <li>
                  <a href="pages/product.php" class="sub-menu__link">Продукція</a>
                </li>
                <li>
                  <a href="#" class="sub-menu__link">Вид продукції</a>
                  <ul class="sub-sub-menu__list">
                    <li>
                      <a href="pages/longcut.php" class="sub-sub-menu__link">Довгорізана</a>
                    </li>
                    <li>
                      <a href="pages/shortcut.php" class="sub-sub-menu__link">Короткорізана</a>
                    </li>
                    <li>
                      <a href="pages/typeofproduct.php" class="sub-sub-menu__link">Вид продукції</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="menu__item">
              <a href="#" class="menu__link">Обладнання</a>
              <ul class="sub-menu__list">
                <li>
                  <a href="pages/mashins.php" class="sub-menu__link">Пакувальні машини</a>
                </li>
                <li>
                  <a href="pages/lines.php" class="sub-menu__link">Автоматизовані лінії</a>
                </li>
                <li>
                  <a href="pages/mashinslines.php" class="sub-menu__link">Пакувальні машини - лінії</a>
                </li>
              </ul>
            </li>
            <li class="menu__item">
              <a href="pages/request.php" class="menu__link">Заявка на виробництво</a>
            </li>
            <li class="menu__item">
              <a href="pages/reports.php" class="menu__link">Звіти</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="main">
      <div class="container">
        <div class="main__row">
          <h1 class="title">ВАТ "КИЇВСЬКА МАКАРОННА ФАБРИКА"</h1>
          <img class="left" src="img/foto-1.jpg" alt="">
          <p>Макаронні вироби виробництва ТОВ «Київська макаронна фабрика» в черговий раз успішно пройшли повторну екологічну сертифікацію за схемою згідно ISO 14024.</p>
          <p>Оцінювання макаронних виробів здійснювалося на відповідність вимогам екологічного стандарту СОУ ОЕМ 08.002.03.010:2016 Продукція хлібопекарська, макаронна, кондитерська, кулінарна, сухарна та борошняна. Екологічні критерії оцінювання життєвого циклу. Цей стандарт встановлює вимоги до макаронних виробів щодо їх поліпшених характеристик на усіх етапах життєвого циклу.</p>
          <p>Стандарт розроблений у відповідності з принципами та структурою оцінювання життєвого циклу продукції згідно ДСТУ ISO 14040 на основі результатів аналізування кращого виробничого досвіду.</p>
          <p>Для виробництва екологічно сертифікованої продукції використовують сировину високої якості без ГМО. У продукції відсутні ароматизатори, барвники та харчові добавки, які є шкідливими та забороненими згідно вимог СОУ ОЕМ 08.002.03.010:2016.</p>
          <p>Рівні вмісту токсичних елементів (свинець, кадмій, миш'як, ртуть), мікотоксинів, радіонуклідів, пестицидів у готовій продукції є значно нижчими за допустимі рівні, встановлені СОУ ОЕМ 08.002.03.010:2016 (встановлені за показниками більш жорсткими ніж за державними нормами в 2-10 разів), а у деяких найменуваннях – такі елементи не виявлені.</p>
          <p>На підприємстві встановлено і експлуатуються швейцарські та італійські автоматичні лінії, фасувальне устаткування італійського, чеського та українського виробництва.</p>
          <p>На підприємстві введені в експлуатацію автомати для пакетування фасованої продукції в термоусадочну плівку, автомати для обандеролювання групової упаковки, що дозволило збільшити обсяги фасованої продукції в 2 рази, два водогрійні котли ТНН 2100 (Чехія), що дозволяє значно економити енергетичні ресурси (газ та воду).</p>
          <p>Підприємство має власну атестовану лабораторію, впроваджені та сертифіковані системи управління згідно ISO 9001 та ISO 22000.</p>
        </div>
      </div>        
    </div>

    <div class="footer">
        <div class="container">
          <div class="footer__row">
            <div class="footer__text">&copyI.Chernyshov 2020</div>
          </div>
        </div>
      </div>
  </div> 
  
  <!-- Подключаем файл скриптов -->
  <!-- <script src="js/script.js"></script> -->
</body>
</html>

