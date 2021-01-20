<?php

declare(strict_types=1);

namespace App;

use App\DB\DB;

require_once __DIR__ . "/../vendor/autoload.php";

$db = new DB();
echo $db->hello();
// phpinfo();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/style.css">
    <title>Document</title>
</head>

<body>
    <ul class="list">
        <li class="list-item">tarou</li>
        <li class="list-item">tarou</li>
        <li class="list-item">tarou</li>
    </ul>
</body>

</html>