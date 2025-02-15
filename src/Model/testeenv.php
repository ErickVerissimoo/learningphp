<?php
namespace Src\Model;
require __DIR__ ."/../../vendor/autoload.php";

use Dotenv\Dotenv as env;

$dotent = env::createImmutable(__DIR__."/../../");
$dotent -> safeload();
echo $_ENV['APP_NAME'];
