<?php
require_once '/../include/dbConnect.php'; //import libary แต่นี้เป้นการ import การconnectเข้ามา
class StudentModel{
    private $con;
    private $col;

    function __construct() {
        $db = new dbConnect();
        $this->con = $db->connect();
        $this->col = new MongoCollection($this->con, "lecturer");
    }
}