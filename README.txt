champ obligatoire = required;
indication gris�e = placeholder="Arnaud"


Action: L'attribut "action" sp�cifie o� envoyer les donn�es de form quand une form(un formulaire) est soumis.
Method: L'attribut de m�thode sp�cifie comment envoyer des donn�es de forme (les donn�es de forme sont
 	envoy�es � la page indiqu�e dans l'attribut d'action).

-- Qu'y a-t-il d'autre comme possiblit� que post pour l'attribut method --
GET.

-- Quelle est la diff�rence entre les attributs name et id ? --

La distinction entre les deux peut se r�sumer ainsi : __id__ est un attribut lu par le navigateur 
(en HTML, CSS ou Javascript) ; __name__ sert � PHP lors de la validation d'un formulaire.

-- C'est lequel qui doit �tre �gal � l'attribut for du label ? --

C'est l'id.

-- Quels sont les deux sc�narios o� l'attribut title sera affich� ? --

Hover sur le champ ; Le champ vide retourne une erreur qui renvoi le title.

-- Encore une fois, quelle est la diff�rence entre name et id pour un input ? --
 
Name est r�cup�r� par PHP, Id est utilis� par le JS le CSS ou les balises <label>

-- Pourquoi est-ce qu'on a pas mis un attribut name ici ? -- 

On a pas besoin d'utiliser le PHP ici car on fait uniquement une comparaison avec le champ pr�c�dent.

-- Quel sc�nario justifie qu'on ait ajout� l'�couter validateMdp2() � l'�v�nement onkeyup de l'input mdp1 ? --

Pour qu'a chaque modification de la saisie, on compare les deux �l�ments.

-- A quoi sert l'attribut disabled ? --

Rendre inclickable, inselectable un �l�ment en le d�sactivant.



