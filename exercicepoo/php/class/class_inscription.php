<?php 

class inscription {
   
   protected $_id;
   protected $_sname;
   protected $_semail;
   protected $_smdp;
   protected $_cmdp;

   public function __construct($_id,$_sname,$_semail, $_smdp, $_cmdp) {
      $this->_id = $_id;
      $this->_sname = $_sname;
      $this->_semail = $_semail;
      $this->_smdp = $_smdp;
      $this->_cmdp = $_cmdp;
      
   }

   public function cryptPassword() {
      
      $smdp = $_POST['smdp']; 
      $this->_smdp = $smdp;

      $cmdp = $_POST['cmdp']; 
      $this->_cmdp = $cmdp;

      if ($this->_smdp === $this->_cmdp) {
         $option = [
             'cost' => 10,
         ];
         $hashp = password_hash($this->_smdp, PASSWORD_BCRYPT, $option);
         return $hashp;
      }
   }

   public function username() {
      $sname = $_POST['sname'];
      $this->_sname = $sname;
   }
   
   public function email() {
      $mdp->cryptPassword();
      $semail = $_POST['semail']; 
      $this->_semail = $semail;

      require_once('class_database.php');
      $connexion = new database ('db5000303633.hosting-data.io', 'dbs296620', 'dbu526547', '[&4zSW6x');
      $bdd = $connexion->PDOConnect();

      $c = $bdd->prepare("SELECT email FROM users WHERE email = :email");
      $c->execute(['email' => $this->_semail]);
      $result = $c->rowcount();

      if ($result == 0) {
         $q = $bdd->prepare ("INSERT INTO users (utilisateur, email, mdp)
                       VALUES ( :utilisateur, :email, :mdp)");

         $q->execute(array(
            ':utilisateur' => username(),
            ':email' => $this->_semail,
            ':mdp' => $hashp,
            ));

         $q-> closeCursor();
      
         header('location:../../index.php');
      } else {
       echo "un compte existe deja";
         }

   }
}
?>