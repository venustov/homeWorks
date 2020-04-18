<?php
session_start();
if (isset($_SESSION['auth']) && isset($_COOKIE['url'])) {
  $url = $_SESSION['auth']['url'] ? $_SESSION['auth']['url'] : $_COOKIE['url'];
}
else if (isset($_SESSION['auth'])){
  $url = $_SESSION['auth']['url'];
}
else if (isset($_POST['login']) && isset($_POST['password'])) {
  $users = ['unatoly'=>'password', 'georgy'=>'pass', 'snezhana'=>'malina'];
  foreach($users as $log => $pass) {
    if ( $log == $_POST['login'] && $pass == $_POST['password'] ){
      
      $url = isset($_COOKIE['url']) ? $_COOKIE['url'] : 'session.php';
      
      $_SESSION['auth']['url'] = $url;
      $_SESSION['auth']['login'] = $log;
      if ('yes' == $_POST['memory']) {
        setcookie('url', isset($_COOKIE['url']) ? $_COOKIE['url'] : 'session.php', time() + 3600 * 24 * 7);
      }
      break;
    }
    else $url = 'auth.php';
  }
}
else {
  $url = 'auth.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Refresh" content="5; URL=<?php echo $url ?>">
  <title>Document</title>
</head>
<body>
  
</body>
</html>