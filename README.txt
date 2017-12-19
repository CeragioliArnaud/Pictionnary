champ obligatoire = required;
indication grisée = placeholder="Arnaud"


Action: L'attribut "action" spécifie où envoyer les données de form quand une form(un formulaire) est soumis.
Method: L'attribut de méthode spécifie comment envoyer des données de forme (les données de forme sont
 	envoyées à la page indiquée dans l'attribut d'action).

-- Qu'y a-t-il d'autre comme possiblité que post pour l'attribut method --
GET.

-- Quelle est la différence entre les attributs name et id ? --

La distinction entre les deux peut se résumer ainsi : __id__ est un attribut lu par le navigateur 
(en HTML, CSS ou Javascript) ; __name__ sert à PHP lors de la validation d'un formulaire.

-- C'est lequel qui doit être égal à l'attribut for du label ? --

C'est l'id.

-- Quels sont les deux scénarios où l'attribut title sera affiché ? --

Hover sur le champ ; Le champ vide retourne une erreur qui renvoi le title.

-- Encore une fois, quelle est la différence entre name et id pour un input ? --
 
Name est récupéré par PHP, Id est utilisé par le JS le CSS ou les balises <label>

-- Pourquoi est-ce qu'on a pas mis un attribut name ici ? -- 

On a pas besoin d'utiliser le PHP ici car on fait uniquement une comparaison avec le champ précédent.

-- Quel scénario justifie qu'on ait ajouté l'écouter validateMdp2() à l'évènement onkeyup de l'input mdp1 ? --

Pour qu'a chaque modification de la saisie, on compare les deux éléments.

-- A quoi sert l'attribut disabled ? --

Rendre inclickable, inselectable un élément en le désactivant.



