<?php
/**
 * Created by PhpStorm.
 * User: DouglasSass
 * Date: 8/16/17
 * Time: 10:58 PM
 */

// Settings
class Settings {
    protected $conf;
    public function __construct() {
        $this->setConf();
    }
    public function getConf() {
        return $this->conf;
    }
    public function setConf() {
        $this->conf = [
            "db" => [
                "host" => "localhost",
                "dbname" => "cs3620",
                "user" => "foo",
                "pass" => "bar"
            ]
        ];
    }
}