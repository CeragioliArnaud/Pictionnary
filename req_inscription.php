<?php  
  
// récupérer les éléments du formulaire  
// et se protéger contre l'injection MySQL (plus de détails ici: http://us.php.net/mysql_real_escape_string)  
$email=stripslashes($_POST['email']);  
$password=stripslashes($_POST['password']);  
$nom=stripslashes($_POST['nom']);  
$prenom=stripslashes($_POST['prenom']);  
$tel=stripslashes($_POST['tel']);  
$website=stripslashes($_POST['website']);  
$sexe='';  
if (array_key_exists('sexe',$_POST)) {  
    $sexe=stripslashes($_POST['sexe']);  
}  
$birthdate=stripslashes($_POST['birthdate']);  
$ville=stripslashes($_POST['ville']);  
$taille=stripslashes($_POST['taille']);  
$couleur=stripslashes($_POST['couleur']);  
$profilepic=stripslashes($_POST['profilepic']);  
$couleur = str_replace("#","",$couleur);
include 'header.php';
try {  
    // Connect to server and select database.  
    $dbh = new PDO('mysql:host=localhost;dbname=pictionnary', 'root', 'Pythonisso2017');  
  
    // Vérifier si un utilisateur avec cette adresse email existe dans la table.
    if (isset($email))
    {
        echo '<p>'.'l email '.$email.' existe'.'</p>';
    }
    // En SQL: sélectionner tous les tuples de la table USERS tels que l'email est égal à $email.  
    $sql = $dbh->query("SELECT * FROM users WHERE email='".$email."'");  
    
    if ( $sql -> fetchColumn() > 1) {  
        // rediriger l'utilisateur ici, avec tous les paramètres du formulaire plus le message d'erreur 
        
        echo '<p>'.'Ca marche pas!'.'</p>';
        // utiliser à bon escient la méthode htmlspecialchars http://www.php.net/manual/fr/function.htmlspecialchars.php          // et/ou la méthode urlencode http://php.net/manual/fr/function.urlencode.php  
    }  
    else {  
        // Tenter d'inscrire l'utilisateur dans la base  
        $sql = $dbh->prepare("INSERT INTO users (email, password, nom, prenom, tel, website, sexe, birthdate, ville, taille, couleur, profilepic) "  
                . "VALUES (:email, :password, :nom, :prenom, :tel, :website, :sexe, :birthdate, :ville, :taille, :couleur, :profilepic)");  
        $sql->bindValue(":email", $email);
        $sql->bindValue(":password", $password);
        // lier la valeur pour le nom, attention le nom peut être nul, il faut alors lier avec NULL, ou DEFAULT  +demander confirmation
        
        //$sexe= ($_POST)
        
        if(isset($nom))
        {
            $sql->bindValue(":nom", $nom);    
        }
        else
        {
            $sql->bindValue(":nom", null); 
        }
         
        // idem pour le prenom, tel, website, birthdate, ville, taille, profilepic 
        if(isset($prenom))
        {
            $sql->bindValue(":prenom", $prenom);    
        }
        else
        {
            $sql->bindValue(":prenom", null); 
        }
        
        if(isset($tel))
        {
            $sql->bindValue(":tel", $tel);    
        }
        else
        {
            $sql->bindValue(":tel", null); 
        }
        
        if(isset($website))
        {
            $sql->bindValue(":website", $website);    
        }
        else
        {
            $sql->bindValue(":website", null); 
        }
        
        if(isset($birthdate))
        {
            $sql->bindValue(":birthdate", $birthdate);    
        }
        else
        {
            $sql->bindValue(":birthdate", null); 
        }
        
        if(isset($tel))
        {
            $sql->bindValue(":ville", $ville);    
        }
        else
        {
            $sql->bindValue(":ville", null); 
        }
        
        if(isset($tel))
        {
            $sql->bindValue(":taille", $taille);    
        }
        else
        {
            $sql->bindValue(":taille", null); 
        }
        
        if(isset($couleur))
        {
            $sql->bindValue(":couleur", $couleur);    
        }
        else
        {
            $sql->bindValue(":couleur", null); 
        }
        
        if(isset($tel))
        {
            $sql->bindValue(":profilepic", $profilepic);    
        }
        else
        {
            $sql->bindValue(":profilepic", null); 
        }
        
        $sql->bindValue(":sexe", $sexe);    
        
            
        // idem pour la couleur, attention au format ici (7 caractères, 6 caractères attendus seulement)  
        // idem pour le prenom, tel, website  
        // idem pour le sexe, attention il faut être sûr que c'est bien 'H', 'F', ou ''  
  
        // on tente d'exécuter la requête SQL, si la méthode renvoie faux alors une erreur a été rencontrée.  
        if (!$sql->execute()) {  
            echo "PDO::errorInfo():<br/>";  
            $err = $sql->errorInfo();  
            print_r($err);  
        } else {  
  
            // ici démarrer une session  
            session_start();
            
            // ensuite on requête à nouveau la base pour l'utilisateur qui vient d'être inscrit, et   
            $sql = $dbh->query("SELECT u.id, u.email, u.nom, u.prenom, u.couleur, u.profilepic FROM USERS u WHERE u.email='".$email."'");  
            if ($sql->rowCount()<1) {  
                header("Location: main.php?erreur=".urlencode("un problème est survenu"));  
            }  
            else {
                $sql = $sql->fetch(PDO::FETCH_ASSOC);
                $_SESSION["u.email"]= $email ;
                $_SESSION["u.nom"]= $nom ;
                $_SESSION["u.prenom"]= $prenom ;
                $_SESSION["u.couleur"]= $couleur ;
                $_SESSION["u.profilepic"]= $profilepic ;
                 
                    
                // on récupère la ligne qui nous intéresse avec $sql->fetch(),
                
                // et on enregistre les données dans la session avec $_SESSION["..."]=...  
            }  
            header('Location: main.php');
            // ici,  rediriger vers la page main.php  
        }  
        $dbh = null;  
    }  
} catch (PDOException $e) {  
    print "Erreur !: " . $e->getMessage() . "<br/>";  
    $dbh = null;  
    die();  
}  
?>  