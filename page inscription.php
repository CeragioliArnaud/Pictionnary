<!DOCTYPE html>  
<html>  
<head>  
    <meta charset=utf-8 />
    <link rel="stylesheet" media="screen" href="css/styles.css" >  
    <title>Pictionnary - Inscription</title>  
    <?php include 'header.php';?>

</head>  
<body>  
  
<h2>Inscrivez-vous</h2>  
<form class="inscription" action="req_inscription.php" method="post" name="inscription">
      
    <span class="required_notification">Les champs obligatoires sont indiqués par *</span>  
    <ul>  
         
        <li>  
            <label for="email">E-mail :</label>  
            <input type="email" name="email" id="email" autofocus required/>
            <span class="form_hint">Format attendu "name@something.com"</span>  
        </li>  
        <li>  
            <label for="prenom">Prénom :</label>  
            <input type="text" name="prenom" id="prenom" placeholder="Arnaud" required/>  
            
        </li>
        <li>  
            <label for="nom">Nom :</label>  
            <input type="text" name="nom" id="nom" placeholder="CERAGIOLI"/>  
            
        </li>
        <li>  
            <label for="telephone">Téléphone :</label>  
            <input type="tel" name="tel" id="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$"/>  
              
        </li>
            <!--Mot de passe-->
        <li>  
            <label for="mdp1">Mot de passe :</label>  
            <input type="password" name="password" id="mdp1" onkeyup="validateMdp2()" title = "Le mot de passe doit contenir de 6 à 8 caractères alphanumériques." required placeholder="Entrez votre mot de passe" maxlength="8" pattern="[a-zA-Z0-9]{6,8}"> 
            
             
            <span class="form_hint">De 6 à 8 caractères alphanumériques.</span>  
        </li>  
        <li>  
            <label for="mdp2">Confirmez mot de passe :</label>  
            <input type="password" id="mdp2" required onkeyup="validateMdp2()" placeholder="Entrez le même mot de passe" required pattern="[a-zA-Z0-9]{6,8}" maxlength="8"> 
            <span class="form_hint">Les mots de passes doivent être égaux.</span>  
            <script>  
                validateMdp2 = function(e) {  
                    var mdp1 = document.getElementById('mdp1');  
                    var mdp2 = document.getElementById('mdp2');  
                    if (mdp1.value.match(/[a-zA-Z0-9]{6,8}/) && mdp1.value == mdp2.value) {  
                          
                        document.getElementById('mdp2').setCustomValidity('');  
                    } else {  
                          
                        document.getElementById('mdp2').setCustomValidity('Les mots de passes doivent être égaux.');  
                    }  
                }  
            </script>  
        
             <!--Date de naissance-->
        <li>  
            <label for="birthdate">Date de naissance:</label>  
            <input type="date" name="birthdate" id="birthdate" placeholder="JJ/MM/AAAA" required onchange="computeAge()"/>  
            <script>  
                computeAge = function(e) {  
                    try{  
                        // j'affiche dans la console quelques objets javascript, ce qui devrait vous aider.  
                        console.log(Date.now());  
                        console.log(document.getElementById("birthdate"));  
                        console.log(document.getElementById("birthdate").valueAsDate);  
                        console.log(Date.parse(document.getElementById("birthdate").valueAsDate));  
                        console.log(new Date(0).getYear());  
                        console.log(new Date(65572346585).getYear());  
                        // modifier ici la valeur de l'élément age  
                    } catch(e) {  
                        // supprimez ici la valeur de l'élément age  
                    }  
                }  
            </script>  
            <span class="form_hint">Format attendu "JJ/MM/AAAA"</span>  
        </li>  
        <li>  
            <label for="age">Age:</label>  
            <input type="number" name="age" id="age" disabled/>  
              
        </li>
            <!--Image de profil-->
        <li>  
            <label for="profilepicfile">Photo de profil:</label>  
            <input type="file" id="profilepicfile" onchange="readImage(this)"/>  
            <!-- l'input profilepic va contenir le chemin vers l'image sur l'ordinateur du client -->  
            <!-- on ne veut pas envoyer cette info avec le formulaire, donc il n'y a pas d'attribut name -->  
            <span class="form_hint">Choisissez une image.</span>  
            <input type="hidden" name="profilepic" id="profilepic"/>  
            <!-- l'input profilepic va contenir l'image redimensionnée sous forme d'une data url -->   
            <!-- c'est cet input qui sera envoyé avec le formulaire, sous le nom profilepic -->  
            <canvas id="preview" width="0" height="0"></canvas>  
            <!-- le canvas (nouveauté html5), c'est ici qu'on affichera une visualisation de l'image. -->  
            <!-- on pourrait afficher l'image dans un élément img, mais le canvas va nous permettre également   
            de la redimensionner, et de l'enregistrer sous forme d'une data url-->  
            <script>  
                
                var canvas = document.getElementById("preview");
                var context = canvas.getContext("2d");
                var MAX_WIDTH = 96;
                var MAX_HEIGHT = 96;

                function readImage(img) {
                    if (img.files && img.files[0]) {
                        var width = img.width;
                        var height = img.width;

                        var fr = new FileReader();
                        fr.onload = (e) => {
                            var img = new Image();
                            img.addEventListener("load", () => {

                                var h = 0;
                                var w = 0;

                                if (img.width > img.height) {
                                    w = MAX_WIDTH;
                                    h = MAX_HEIGHT / img.width * img.height;
                                } else {
                                    w = MAX_WIDTH / img.height * img.width;
                                    h = MAX_HEIGHT;
                                }
                                preview.width = w;
                                preview.height = h;
                                context.drawImage(img, 0, 0, w, h);
                            });
                            img.src = e.target.result;
                        };
                        fr.readAsDataURL(img.files[0]);
                    }
                }
            </script>  
        </li>  
            
            <!--Ville-->
        <li>  
            <label for="ville">Ville :</label>  
            <input type="text" name="ville" id="ville"/>  
             
        </li>
        <li>  
            <label for="sexe">Sexe :</label>  
            <input type="radio" name="sexe" id="sexe" value="H"/>Male
            <input type="radio" name="sexe" id="sexe" value="F"/>Female 
        </li>
        <li>  
            <label for="couleur">Couleur préférée :</label>  
            <input type="color" name="couleur" id="couleur" value="#000"/>   
        </li>
        <li>  
            <label for="taille">Taille :</label>  
            <input type="range" name="taille" id="taille" max="2.50" min="0" step="0.1"/>   
        </li>
        <li>  
            <label for="site">Site web :</label>  
            <input type="url" name="website" id="website" value="http://"/>   
        </li>
        
        <li>  
            <input type="submit" value="Soumettre Formulaire">  
        </li>  
    </ul>  
</form>  
</body>  
</html> 