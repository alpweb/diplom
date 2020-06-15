<?php
include_once('connect_db.php');

/**
 * Получаем имена всех таблиц из БД
 * 
 * return - array
 */
function getTableNames() {
  $link = startup();

  $tableList = array();

  $result = mysqli_query($link, "SHOW TABLES");
  
  while($cRow = mysqli_fetch_array($result))
  {
    $tableList[] = $cRow[0];
  }
  
  return $tableList;
}

/**
 * Получаем содержимое таблицы $table
 * 
 * input $table
 */
function getTable($table) {
	
	$link = startup();
		
	$query = "SELECT * FROM $table";
	
  $result = mysqli_query($link, $query);
							
	if (!$result)
		die(mysql_error());
	
	// Извлечение из БД.
	$n = mysqli_num_rows($result);
	$articles = array();

	for ($i = 0; $i < $n; $i++) {
		$row = mysqli_fetch_assoc($result);		
		$articles[] = $row;
	}
	
	return $articles;
};

/**
 * Получаем названия столбцов из таблицы
 * 
 * input $table
 */
function getFields($table) {
  $fields = [];

  foreach($table[0] as $name => $val) {
    $fields[] = $name;
  }

  return $fields;
}

/**
 * Добавляет запись в таблицу
 * 
 * input $table
 */
function addRow($tableName, $data) {
  $link = startup();	

  $i = 0;

  foreach ($data as $field => $value) {
    if ($i > 0) {
      prepare($link, $field);
      prepare($link, $value);
      $fields = $fields . ", `" . $field . "`";
      $values = $values . ", '" . $value . "'";
    } else {
      prepare($link, $field);
      prepare($link, $value);
      $fields = "`" . $field . "`";
      $values = "'" . $value . "'";
    }
    $i++;
  }

  $query = "INSERT INTO `" .  $tableName . "` 
              (" . $fields . ") 
            VALUES 
              (" . $values . ")";
      
	$result = mysqli_query($link, $query);
							
	if (!$result)
		die(mysqli_error($link));

  return true;
}

/**
 * Получить значение поля в строке таблицы по id
 * 
 * Input $table
 * Input $field
 * Input $id
 * 
 * Output $value
 */
function getFieldFromTableById($field, $table, $id) {

  $link = startup();

  $query = "SELECT `" . $field . "` FROM `" . $table . "` WHERE `id` = " . $id . ";";
  $res = mysqli_query($link, $query);
  $row = mysqli_fetch_assoc($res);

  return $row[$field];  
}


/**
 * Подготовка 
 */
function prepare($link, $a) {
  $a = trim($a);
  return mysqli_real_escape_string($link, $a);
}

/**
 * Удаляем строку с id = $id из таблицы $table
 * 
 * input $table, $id
 */
function delRow($table, $nameID, $id) {
  $link = startup();

  // $sql = "DELETE FROM $table WHERE id = '$id';";
  // $res = mysqli_query ($link, $sql);
  
  $query = "DELETE FROM $table WHERE $nameID = '$id';";
  
  $result = mysqli_query($link, $query);
              
  // if (!$result)
  //   die(mysql_error());
    
  return true;  
}

function getCount($table) {
  $link = startup();

  $query = "SELECT COUNT(*) FROM $table";
  
  $result = mysqli_query($link, $query);

  $count = mysqli_num_rows($result);

  return $count;
}

// ----------------------------------------

function view($a) {
  echo '<pre>';
  print_r($a);
  echo '</pre>';
}

function query($query) {
  $query = mysqli_query($this->connection ,$query) or die($this->show_errors('Query Execution Error: '.mysqli_error($this->connection),'E'));
  return $query;  
}
function fetch_assoc($query) {
  $query = mysqli_fetch_assoc($query);
  return $query;  
}
