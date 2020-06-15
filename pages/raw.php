<?php
  include_once("../functions/function_db.php");

  $tableName1 = 'сировина';
  $tableName2 = 'вид_сировини';

  $table1 = getTable($tableName1);
  $table2 = getTable($tableName2);

  $t1_count = getCount($tableName2);

  $fields = getFields($table1);
  $nameID = $fields[0];

  // $fields_1 = array_slice($fields, 1);

  if( isset($_POST['del']) ) {
    // view($_POST);
    $del = delRow($tableName1, $nameID, $_POST['del']);
    header("Refresh: 0");
  }

  if( isset($_POST['edit']) && ($_POST['edit']) == 'Редагувати!' ) {
    // view($_POST);
    echo 'Пошли на страницу редактирования';
  }

  if( isset($_POST['add']) ) {
    $data = $_POST;
    array_pop($data);

    $add = addRow($tableName1, $data);
    
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
              <span class="menu__link active">Сировина</span>              
              <ul class="sub-menu__list">
                <li>
                  <span class="menu__link active">Сировина</span>
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
                      <a href="longcut.php" class="sub-sub-menu__link">Довгорізана</a>
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
        <h1 class="title">Сировина</h1>
          <table class="center">
            <tr>
              <!-- <th>Код норми виготовлення продукції</th> -->
              <th>Назва сировини</th>
              <th>Назва виду сировини</th>
              <th class="white" colspan="2"></th>
            </tr>

          <?php foreach( $table1 as $row ) { ?>
            <tr>
            <?php
              $rowTemp = $row;

              $id1 = array_shift($rowTemp);
              
              // foreach($rowTemp as $key => $value) {
              //   echo '<td>' . $value . '</td>';
              // } 
              
              echo '<td>' . $rowTemp['Назва'] . '</td>';
              
              $id = $rowTemp['Код_виду_сировини'];
              $value = getFieldFromTableById("Назва_сировини", "вид_сировини", $id);

              echo '<td>' . $value . '</td>';              

            ?>

              <form action="#" method="POST">
                <td class="white">
                  <button class="btn" type="submit" name="del" value="<?php echo $id1; ?>">Видалити!</button>
                </td>
                <td class="white">
                  <button class="btn" type="submit" name="edit" value="<?php echo $id1; ?>">Редагувати!</button>
                </td>
              </form>        
            </tr>
          <?php } ?>

            <tr>
              <form action="#" method="POST">
                <td>
                  <select name="Назва" >    
                    <?php
                      foreach ($table1 as $key => $val) {
                        $v = $val['Код_сировини'];
                        $name = $val['Назва'];
                        echo '<option value="' . $v . '">' . $name . '</option>';
                      }                    
                    ?>
                  </select>
                </td>               
                <td>
                  <select name="Код_виду_сировини" >    
                    <?php
                      foreach ($table2 as $key => $val) {
                        $v = $val['Код_виду_сировини'];
                        $name = $val['Назва_сировини'];
                        echo '<option value="' . $v . '">' . $name . '</option>';
                      }                    
                    ?>
                  </select>
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
