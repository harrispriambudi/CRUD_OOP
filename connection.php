<?php
class connection{
private $dbHost="localhost";
private $dbUser="root";
private $dbPass="";
private $dbName="latihan";

function connectMysql()
{
mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
mysql_select_db($this->dbName) or die ("Database not exist");
}

}
?>