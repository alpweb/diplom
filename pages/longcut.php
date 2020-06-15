<?php
  include_once("../functions/function_db.php");

  $tableName = 'змінний_журнал';
  $tableName1 = 'вид_продукції';
  $tableName2 = 'сировина';
  $tableName3 = 'автоматизовані_лінії';

  $table = getTable($tableName);
  $table1 = getTable($tableName1);
  $table2 = getTable($tableName2);
  $table3 = getTable($tableName3);

  // view($table1);
  // view($select1);
  // view($select2);
  // view($select3);

  $fields = getFields($table);
  $nameID = $fields[0];

  // $fields_1 = array_slice($fields, 1);

  if( isset($_POST['del']) ) {
    // view($_POST);
    $del = delRow($tableName, $nameID, $_POST['del']);
    header("Refresh: 0");
  }

  if( isset($_POST['edit']) && ($_POST['edit']) == 'Редагувати!' ) {
    // view($_POST);
    echo 'Пошли на страницу редактирования';
  }

  if( isset($_POST['add']) ) {
    $data = $_POST;
    array_pop($data);

    // view($data);

    $add = addRow($tableName, $data);
    
    if( $add ) {
      echo 'Запис додано!';
      header("Refresh: 2");
    }    
  }

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
              <a href="journal.php" class="menu__link">Змінний журнал</a>              
            </li>
            <li class="menu__item">
              <a href="#" class="menu__link">Сировина</a>              
              <ul class="sub-menu__list">
                <li>
                  <a href="raw.php" class="sub-menu__link">Сировина</a>
                </li>
                <li>
                  <a href="typeofraw.php" class="sub-menu__link">Вид сировини</a>
                </li>
              </ul>
            </li>
            <li class="menu__item">
              <a href="#" class="menu__link">Продукція</a>
              <ul class="sub-menu__list">
                <li>
                  <a href="product.php" class="sub-menu__link">Продукція</a>
                </li>
                <li>
                  <a href="#" class="sub-menu__link">Вид продукції</a>
                  <ul class="sub-sub-menu__list">
                    <li>
                      <span class="sub-sub-menu__link active">Довгорізана</span>
                    </li>
                    <li>
                      <a href="shortcut.php" class="sub-sub-menu__link">Короткорізана</a>
                    </li>
                    <li>
                      <a href="typeofproduct.php" class="sub-sub-menu__link">Вид продукції</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="menu__item">
              <a href="#" class="menu__link">Обладнання</a>
              <ul class="sub-menu__list">
                <li>
                  <a href="mashins.php" class="sub-menu__link">Пакувальні машини</a>
                </li>
                <li>
                  <a href="lines.php" class="sub-menu__link">Автоматизовані лінії</a>
                </li>
                <li>
                  <a href="mashinslines.php" class="sub-menu__link">Пакувальні машини - лінії</a>
                </li>
              </ul>
            </li>
            <li class="menu__item">
              <a href="request.php" class="menu__link">Заявка на виробництво</a>
            </li>
            <li class="menu__item">
              <a href="reports.php" class="menu__link">Звіти</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="main">
      <div class="container">
        <div class="main__row">
        <h1 class="title">Довгорізана</h1>
          <table>
            <tr>
              <!-- <th>Код норми виготовлення продукції</th> -->
              <th>Код продукції</th>
              <th>Кількість виготовленної продукції, кг</th>
              <th>Код сировини</th>
              <th>Код лінії</th>
              <th>Номер бригади</th>
              <th>Дата</th>
              <th>Кількість використанної продукції</th>
              <th class="white" colspan="2"></th>
            </tr>

          <?php foreach( $table as $row ) { ?>
            <tr>
            <?php
              $rowTemp = $row;
              
              $id = array_shift($rowTemp);
              foreach($rowTemp as $value) {
                echo '<td>' . $value . '</td>';
              } ?>
              <form action="#" method="POST">
                <td class="white">
                  <button class="btn" type="submit" name="del" value="<?php echo $id; ?>">Видалити!</button>
                </td>
                <td class="white">
                  <button class="btn" type="submit" name="edit" value="<?php echo $id; ?>">Редагувати!</button>
                </td>
              </form>        
            </tr>
          <?php } ?>

            <tr>
              <form action="#" method="POST">
                <td>
                  <select name="Код_продукції" >    
                    <?php
                      foreach ($table1 as $key => $val) {
                        $v = $val['Код_виду_продукції'];
                        $name = $val['Назва_продукції'];
                        echo '<option value="' . $v . '">' . $name . '</option>';
                      }                    
                    ?>
                  </select>
                </td>
                <td>
                  <input class="input" type="text" name="К_сть_виготовлен_прод_кг">
                </td>
                <td>
                  <select name="Код_сировини" >    
                    <?php
                      foreach ($table2 as $key => $val) {
                        $v = $val['Код_сировини'];
                        $name = $val['Назва'];
                        echo '<option value="' . $v . '">' . $name . '</option>';
                      }                    
                    ?>
                  </select>
                </td>
                <td>
                  <select name="Код_лінії" >    
                    <?php
                      foreach ($table3 as $key => $val) {
                        $v = $val['Код_лінії'];
                        $name = $val['Назва_лінії'];
                        echo '<option value="' . $v . '">' . $name . '</option>';
                      }                    
                    ?>
                  </select>
                </td>
                <td>
                  <input class="input" type="text" name="Номер_бригади">
                </td>
                <td>
                  <input class="input" type="date" name="Дата">
                </td>
                <td>
                  <input class="input" type="text" name="Кількість_використаної_сировини">
                </td>
                <td class="white" colspan="2">
                  <button class="btn add-btn" type="submit" name="add">Додати запис!</button>
                </td>
              </form>
            </tr>

          </table>

        </div>
      </div>        
    </div>
  </div> 
  
  <!-- Подключаем файл скриптов -->
  <!-- <script src="js/script.js"></script> -->
</body>
</html>
