<?php
/**
 * Created by PhpStorm.
 * User: DouglasSass
 * Date: 8/16/17
 * Time: 10:41 PM
 */

$dic = $app->getContainer();
$conf = new Settings();
$dic['db'] = function($dic) use ($conf) {
    $c = $conf->getConf();
    $dsn = 'mysql:host='.$c["db"]["host"].';dbname='.$c["db"]["dbname"];
    $pdo = new PDO($dsn, $c["db"]["user"], $c["db"]["pass"]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};
$dic['new_chat_room'] = function($dic) use ($rowSet) {
    $o = new Domain/CHAT_ROOM();
    $o->chatName($rowSet['chatName'])->chatCreationDate($rowSet['chatCreationDate'])->chatLastActive($rowSet['chatLastActive'])->active($rowSet['chatLastActive']);
    return $o;
};
$dic['new_message'] = function($dic) use ($rowSet) {
    $o = new Domain/Message();
    $o->chatRoomId($rowSet['chatRoomId'])->userId($rowSet['userId'])->messageContent($rowSet['messageContent'])->messageSent($rowSet['messageSent']);
    return $o;
};
$dic['new_user'] = function($dic) use ($rowSet) {
    $o = new Domain/USER();
    $o->alias($rowSet['alias'])->email($rowSet['email']);
    return $o;
};
$dic['get_messages'] = function($dic) use ($rowSet) {
    $o = new Domain/Message()/ChatRoomId();
    $o->alias(chatRoomId['chatRoomId']);
    return $o;
};
$dic['get_chatrooms'] = function($dic) use ($rowSet) {
    $o = new Domain/CHAT_ROOM();
    return $o;
};