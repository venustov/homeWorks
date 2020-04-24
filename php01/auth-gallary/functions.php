<?php

// проверяем, авторизован ли пользователь
function isUser() {
  return isset($_SESSION['auth']) || isset($_COOKIE['auth']);
}
// получает логин пользователя (авторизованного). Нужна на случай, если index.php будет полнофункциональной страницей с контентом
function getUser() {
  return $_SESSION['auth'] || $_COOKIE['auth'];
}
// функция проверки логина-пароля
function CheckLoginPassword($log, $pass) {
  $users = ['unatoly'=>'password', 'georgy'=>'pass', 'snezhana'=>'malina'];
  return (isset($users[$log]) && $users[$log] == $pass);
}
// устанавливаем сессию и куки авторизованному пользователю
function login($login) {
  $_SESSION['auth'] = $login;
  if ('yes' == $_POST['memory']){
    setcookie('auth', $login, time() + 3600 * 24 * 7);
    setcookie('url', isset($_COOKIE['url']) ? $_COOKIE['url'] : 'session.php', time() + 3600 * 24 * 7);
  }
}
// функция выхода
function logout() {
  unset($_SESSION['auth']);
  session_destroy();
  setcookie('auth', '', time() - 3600);
  setcookie('style', '', time() - 3600);
}
// поиск изображений в заданной папке и формирование строки для вывода
function search_img($path){
   $html='';
  foreach (glob($path . "*.{jpg,png,gif,jpeg}", GLOB_BRACE) as $filename) {
    $html .= '<img class="pimg" src="' . $filename . '" alt="" />';
  }
  return $html; 
}
// то же, только формирование строки для занесения их в БД
function search_img_to_bd($path){
    $sql='INSERT INTO images (name, title) VALUES';
    foreach (glob($path . "*.{jpg,png,gif,jpeg}", GLOB_BRACE) as $filename) {
        $sql .= ' ("' . $filename . '", ""),';
    }
    return $sql;
}
// соединение с Базой Данных
function bdConnect(){
    $connect = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($connect, 'homeworks');
    return $connect;
}
// вывод картинок
function galleryBD($res){
    $str = '';
    while (false != ($row = mysqli_fetch_assoc($res))) {
        $str .= '<a href="photo.php?id=' . $row['id'] . '" target ="_blank"><img class="pimg" src="/img/' . $row['name'] . '" alt="' . $row['title'] . '"></a>';
    }
    return $str;
}
function viewPhoto($res){
    $row = mysqli_fetch_assoc($res);
    $str = '<div class="photo"><img class="photo" src="/img/' . $row['name'] . '"><p class="photo">' . $row['title'] . '</p></div>';
    return $str;
}
?>