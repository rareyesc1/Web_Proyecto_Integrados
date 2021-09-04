<?php

/**
 * PHP version 8.0
 *
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <rareyesc19960629@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */

try {
    $dbo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>