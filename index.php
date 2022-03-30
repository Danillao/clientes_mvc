<?php
require __DIR__ . "/config/connection.php";

//AutoLoad para importar classes diretamente
spl_autoload_register(function ($class) {

  if (file_exists('controllers/' . $class . '.php')) {
    require __DIR__ . '/controllers/' . $class . '.php';
  } else if (file_exists('models/' . $class . '.php')) {
    require __DIR__ . '/models/' . $class . '.php';
  } else if (file_exists('core/' . $class . '.php')) {
    require __DIR__ . '/core/' . $class . '.php';
  }
});

$core = new Core();
$core->Run();
