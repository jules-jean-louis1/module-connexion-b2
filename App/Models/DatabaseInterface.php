<?php

namespace App\Models;

use PDO;

interface DatabaseInterface
{
    public function getBdd(): PDO;
}