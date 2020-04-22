<?php 

class database {

    protected $_host;
    protected $_dbname;
    protected $_username;
    protected $_password;

    public function __construct($_host, $_dbname, $_username, $_password) {
        $this->_host = $_host;
        $this->_dbname = $_dbname;
        $this->_username = $_username;
        $this->_password = $_password;
    }

    public function PDOConnect() {
        $bdd = new PDO('mysql:host='.$this->_host.'; dbname='.$this->_dbname, $this->_username, $this->_password);
        // $bdd ->setAttribute(PDO::ATTR_EMULATE_PREPARE, false);
        // $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }
}

?>