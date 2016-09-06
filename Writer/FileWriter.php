<?php
namespace Service\Logger\Writer;
/*
  20160304:
* Exception вынесен за пределі конструктора
+ Exceptin когда не указан путь к файлу
*/

class FileWriter{
  public $logfile;

  public function __construct($logfile){
    if (empty($logfile)) throw new \Exception("LOGGER ERROR: Name is empty in log", 1);
    $this->logfile = $logfile;
  }

  public function Write($msg){
    try {
      if (empty($this->logfile)) return ;
      file_put_contents($this->logfile, $msg, FILE_APPEND);
    } catch (\Exception $e) {
       throw new \Exception($e->getMessage(), 1);
    }
  }
}

