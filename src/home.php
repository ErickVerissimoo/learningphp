<?php
echo filter_input(INPUT_GET,"name", FILTER_SANITIZE_STRING);
setcookie('erick', 'verissimo');
print_r($_COOKIE['erick']);
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
     <a href="<?php echo $_SERVER['PHP_SELF']; ?>?name=erick">Clique aqui</a>
     
    </body>
</html>