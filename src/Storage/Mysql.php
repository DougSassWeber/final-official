<?php
/**
 * Created by PhpStorm.
 * User: DouglasSass
 * Date: 8/16/17
 * Time: 9:34 PM
 */

namespace Storage;
// database functions ************************************************
function ConnectToMySQL($dsn, $usr, $pass)
{
    $db = new PDO($dsn, $usr, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $db;
}