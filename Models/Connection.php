<?php
class Connection
{
  private $host = "localhost";
  private $db_name = "tourist";
  private $username = "root";
  private $password = "";
  var $db = null;
  public function __construct()
  {
    $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;

    try {
      $this->db = new PDO($dsn, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch (\Throwable $th) {
      echo 'Database was not connected';
    }
  }

  public function SelectData($select)
  {
    $result = $this->db->query($select);
    return $result;
  }

  public function SelectOneData($select)
  {
    $result = $this->db->query($select);
    return $result = $result->fetch();
  }

  public function Execute($query)
  {
    $result = $this->db->exec($query);
    return $result;
  }

  public function lastIdInsert()
  {
    return $this->db->lastInsertId();
  }
}
?>