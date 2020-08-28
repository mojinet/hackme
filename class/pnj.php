<?php

class pnj{

    private $_level;
    private $_password;
    private $_niveauValide = false;

    /**
     * __construct : initialise les variable $_level et $_password
     *
     * @param  mixed $level qui représente le level sur lequel se trouve l'utilisateur
     *
     * @return void
     */
    public function __construct($level){
        $this->setLevel($level);
        $this->setPassword($level);
    }

    /**
     * private définie la variable $_level
     *
     * @param  mixed $level qui représente le level sur lequel se trouve l'utilisateur
     *
     * @return void
     */
    private function setLevel($level){ $this->_level = $level; }

    /**
     * definie le mot de passe du $_level en cours dans $_password
     *
     * @param  mixed $level qui représente le level sur lequel se trouve l'utilisateur
     *
     * @return void
     */
    private function setPassword($level){
        switch($level){
            case 1 : $this->_password = 'uioppoiu'; break;
            case 2 : $this->_password = 'rwdrbf'; break;
            case 3 : $this->_password = 'uyhbzf'; break;
            case 4 : $this->_password = 'sfeiub'; break;  
            case 5 : $this->_password = 'cezicuzne'; break;   
            case 6 : $this->_password = 'fzeinbc'; break;
            case 7 : $this->_password = 'zzivube'; break;
            case 8 : $this->_password = 'j@1m3bi3necr1redel0ngmotdep@ssec3stbeauc0upplu5secur1séqu@ndm3me'; break;
        }
    }

    /**
     * renvois vers la classe qui gerent les réponses du PNJ pour le $level en cours suivant le $code determiné
     *
     * @param  mixed $userPassword qui représente le password renseigner par l'utilisateur (avec htmlspécialchar)
     * @param  mixed $userPrivilege qui représente le niveau de privilege de l'utilisateur (utilisateur ou admin)
     * @param  mixed $save qui représente si l'utilisateur à deja validé au moins 1 niveau
     *
     * @return void
     */
    public function response($userPassword,$userPrivilege = 'utilisateur',$save = false){
        switch($this->_level){
            case 666 : $this->levelM1(); break;
            case -1 : echo 'Qu\'est ce que tu fait au sous sol ?? tu veux me voler mes bananes ?'; break;
            case 0 : $this->level0($save); break;
            case 1 : $this->level1($this->code($userPassword)); break;
            case 2 : $this->level2($this->code($userPassword)); break;
            case 3 : $this->level3($this->code($userPassword,$userPrivilege)); break;
            case 4 : $this->level4($this->code($userPassword)); break;
            case 5 : $this->level5($this->code($userPassword)); break;
            case 6 : $this->level6($this->code($userPassword)); break;
            case 7 : $this->level7($this->code($userPassword,$userPrivilege)); break;
            case 8 : $this->level8($this->code($userPassword)); break;
            case 1000 : echo 'Level pas encore implémenté, je travail sur la suite !';
        }
    }
    
    /**
     * determine la valeur de $code à renvoyer à la fonction level() du $level en cours
     * Les variable saisie par l'utilisateur $userPassword et $role sont echapper pour éviter attaque
     * 
     * code 0 = message initial
     * code 1 = le mot de passe est le bon
     * code 2 = le mot de passe est vide
     * code 3 = le mot de passe est non-vide mais faux
     * code 4 = le mot de passe est valide MAIS le role n'est pas admin
     * 
     * @param  mixed $userPassword
     * @param  mixed $role
     *
     * @return void
     */
    public function code($userPassword, $role = 'admin'){
        // si $userPassword est définie
        if (isset($userPassword) AND $userPassword != 'U53rPa55w0rdIsN0tD3fin3d'){
            $userPassword = htmlspecialchars($userPassword);  
            $role = htmlspecialchars($role);                     
            if($userPassword == $this->_password AND $role == 'admin'){return 1;}   
            elseif($userPassword == $this->_password){return 4;}                    
            elseif($userPassword == ''){return 2;}                                  
            elseif($userPassword != ''){return 3;}                                  
        }else {
            return 0;                                                               
        }
    }

    /**
     * renvoie true si l'utilisateur à reussie le $level en cours suivant ce que renvois la fonction code()
     *
     * @return void
     */
    public function isValid(){
        return $this->_niveauValide;
    }

    //*********************************************************************************************************************************************** */
    //*********************************************************** Dialogue PNJ ********************************************************************** */
    //*********************************************************************************************************************************************** */

    /**
     * Level 666 - l'utilisateur à voulu sauter les niveau ou à corrompu ses cookie niveau
     *
     * @return void
     */
    private function levelM1(){
        echo 'COIN COIN ! Soit tu as voulu sauter les étapes ... Soit ton navigateur refuse les cookies, ou pire encore, tu as CORROMPU ta sauvegarde en modifiant le cookie niveau !';
    }

    /**
     * Reponse PNJ Level 0
     *
     * @param  mixed $save qui représente si l'utilisateur à deja validé au moins 1 niveau
     *
     * @return void
     */
    private function level0($save){
        if ($save){
            echo 'Hum... je vois que tu as une sauvegarde, tu peux reprendre au niveau en cours !';
        }else{
            echo 'Ok, je t\'explique le topo, l\'objectif est de gravir tous les étages en réussissant à inscrire le bon mot de passe ! Ton navigateur doit accepter les cookies sinon tu ne pourra pas allez plus loin ! Attention ne modifie pas ton cookie \'niveau\' au risque de perdre ta sauvegarde !';
        }
    }

    /**
     * Reponse PNJ level1
     *
     * @param  mixed $code
     *
     * @return void
     */
    private function level1($code){
        switch($code){
            case 0 : echo 'Vous ne trouverez jamais le mot de passe ! AHAHA'; break;
            case 1 : echo 'ARGGG ! foutu POST-IT sur mon écran ! ça ne marchera qu\'une seule fois !'; $this->_niveauValide = true; break;
            case 2 : echo 'Il faudrait peut être rentrer QUELQUE CHOSE NON ? AHAHAH'; break;
            case 3 : echo 'WAOUW... quel essai incroyablement ... FAUX ! AHAHA'; break;
        }    
    }

    /**
     * Reponse PNJ level2
     *
     * @param  mixed $code
     *
     * @return void
     */
    private function level2($code){
        switch($code){
            case 0 : echo 'Bon ! Je l\'ai mieux caché cette fois-ci ! AHAHAH'; break;
            case 1 : echo 'ARGGG ! Il n\'y aura plus de POST-IT avec le mot de passe !'; $this->_niveauValide = true; break;
            case 2 : echo 'Il faudrait peut être rentrer QUELQUE CHOSE NON ? AHAHAH'; break;
            case 3 : echo 'Heu... tu vas rentrer des mots de passe aléatoires, c\'est ça ?'; break;
        }    
    }

    /**
     * Reponse PNJ level3
     *
     * @param  mixed $code
     *
     * @return void
     */
    private function level3($code){
        switch($code){
            case 0 : echo 'Tu sais quoi ? je te le donne le mot de passe : "uyhbzf". Mais tu sais quoi ? Seul l\'admin peut l\'utiliser... AHAHA'; break;
            case 1 : echo 'MAIS ! Comment... Ah oui je vois ! Grrrr ça ne peut plus continuer !'; $this->_niveauValide = true; break;
            case 2 : echo 'Il faudrait peut être rentrer QUELQUE CHOSE NON ? AHAHAH'; break;
            case 3 : echo 'HEU... je te l\'ai déjà donné le mot de passe ! c\'est "uyhbzf". Demi-cervelle de poisson rouge va ! AHAHA'; break;
            case 4 : echo 'HEU... ok c\'est bien le bon mot de passe mais tu n\'es qu\'un UTILISATEUR et moi un ADMIN ! AHAhA'; break;
        }    
    }

    /**
     * Reponse PNJ level4
     *
     * @param  mixed $code
     *
     * @return void
     */
    private function level4($code){
        switch($code){
            case 0 : echo 'Bon... le mot de passe est "sfeiub" mais... tu ne peux plus écrire dans le champ du mot de passe ! AHAHA'; break;
            case 1 : echo 'ARGGG ! je pensais que cela allait enfin t\'arrêter...' ; $this->_niveauValide = true; break;
            case 2 : echo 'Heuuu tu réactives le champ mais tu n\'envois rien ?' ; break;
            case 3 : echo 'HEU... je te l\'ai déjà donné le mot de passe ! c\'est "sfeiub". Demi-cervelle de poisson rouge va ! AHAHA'; break;
        }    
    }

    /**
     * Reponse PNJ level5
     *
     * @param  mixed $code
     *
     * @return void
     */
    private function level5($code){
        switch($code){
            case 0 : echo 'J\'ai vraiment la dalle, t\'aurais pas un truc à manger?' ; break;
            case 1 : echo 'GRRR Tu as touché à son cookie ! voila maintenant il n\'en veux plus ! Je prend le relais tu es trop fort pour lui ! ' ; $this->_niveauValide = true; break;
            case 2 : echo 'La nature a horreur du vide ! Alors pourquoi un champs VIDE !' ; break;
            case 3 : echo 'Ah OUI OUI OUI, en faite non c\'est pas ça dutout ! AHAHA !'; break;
        }    
    }

    /**
     * Reponse PNJ level6
     *
     * @param  mixed $code
     *
     * @return void
     */
    private function level6($code){
        switch($code){
            case 0 : echo 'Parfois les erreurs nous permettent de percevoir la vérité ! Mais je deviens philosophe moi ! AHAHAH' ; break;
            case 1 : echo 'Oui c\'etais un peu vicieux de le cacher dans la page 404 ! je suis méchant ! AHAHAH' ; $this->_niveauValide = true; break;
            case 2 : echo 'Perdre, c\'est connaître le vide ! Et toi tu connais bien le vide ! hihihi' ; break;
            case 3 : echo 'QUE VOIS-JE ? Un mot de passe COMPLETEMENT FAUX! AHAHAH'; break;
        }    
    }

    /**
     * Reponse PNJ level7
     *
     * @param  mixed $code
     *
     * @return void
     */
    private function level7($code){
        switch($code){
            case 0 : echo 'Allez c\'est cadeau : t\'a juste à rentrer le mot de passe "zzivube"...'; break;
            case 1 : echo 'MAIS ! NON ! AH ! HEU... j\'en perd mes mots -_-\''; $this->_niveauValide = true; break;
            case 2 : echo 'Oui mais NON, n\'envois pas du vide comme ça, ça me stress !'; break;
            case 3 : echo 'Heu... je te rappel le BON mot de passe : "zzivube" !! '; break;
            case 4 : echo 'BRAVO !! c\'est bien le mot de passe... MAIS NON c\'est moi qui suis ADMIN ;) AHAHA !'; break;
        }    
    }    

    /**
     * Reponse PNJ level8
     *
     * @param  mixed $code
     *
     * @return void
     */
    private function level8($code){
        switch($code){
            case 0 : echo 'Tempête de refresh ! AHAHAH ! au fait tiens le mot de passe : "j@1m3bi3necr1redel0ngmotdep@ssec3stbeauc0upplu5secur1séqu@ndm3me"' ; break;
            case 1 : echo 'Wouaw ! tu as braver la tempête si facilement !' ; $this->_niveauValide = true; break;
            case 2 : echo 'HAHAHAHA tu n\'as pas le temps de rentrer quelque chose !' ; break;
            case 3 : echo 'QUE VOIS-JE ? Un mot de passe COMPLETEMENT FAUX, le bon mot de passe est "j@1m3bi3necr1redel0ngmotdep@ssec3stbeauc0upplu5secur1séqu@ndm3me"'; break;
        }    
    }       
}
?>