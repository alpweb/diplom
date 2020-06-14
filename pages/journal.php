<?php
include_once("../functions/function_db.php");



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KMF</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="wrapper">
    <div class="header">
      <div class="container">
        <div class="header__row">
          <div class="header__logo">
            <a href="../index.php">
              <img src="../img/logo-1.png" alt="">
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
              <span class="sub-menu__arrow arrow"></span>
              <ul class="sub-menu__list">
                <li>
                  <a href="#" class="sub-menu__link">Сировина</a>
                </li>
                <li>
                  <a href="#" class="sub-menu__link">Вид сировини</a>
                </li>
              </ul>
            </li>
            <li class="menu__item">
              <a href="#" class="menu__link">Продукція</a>
            </li>
            <li class="menu__item">
              <a href="#" class="menu__link">Обладнання</a>
            </li>
            <li class="menu__item">
              <a href="#" class="menu__link">Заявка на виробництво</a>
            </li>
            <li class="menu__item">
              <a href="#" class="menu__link">Звіти</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="main">
      <div class="container">
        <div class="main__row">
         
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
