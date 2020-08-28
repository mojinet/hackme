<?php
class save{

    /**
     * renvois une valeur représentant à quel niveau maximum à access l'utilisateur, en fonction de la valeur du cookie ['niveau']
     * renvois 0    SI aucun cookie n'est detecter
     * renvois -666 SI le cookie a été traffiqué
     *
     * @return void
     */
    public function access(){
        if(isset($_COOKIE['niveau'])){
            switch($_COOKIE['niveau']){
                case 'DefaultValue' : return 1; break;         
                case 'f6es8f4s6ef15sef6se8' : return 2; break;
                case 'gze68g6gze54gz6e8gg4' : return 3; break;
                case 'gj6tfyjytfj6yjnyg6jn' : return 4; break;
                case 'brb6re84br8ny8ny4ny8' : return 5; break;
                case 'sehj468jtyd6ge4r8gre' : return 6; break;
                case 'hrdth49dnrd49nt8nt4r' : return 7; break;
                case 'feqfs9f84se9f87fesf7' : return 8; break;
                case 'kyu9jthdrg4fezf9v8v1' : return 9; break;
                default : return -666;
            } 
        } else{ return 0;
        }
    }

    public function giveMeBack($level){
        setcookie('back', $level, time() + 365*24*3600, null, null, false, true); 
    }

    public function removeBack(){
        if (isset($_COOKIE['back'])){
            setcookie('back', '', time() - 365*24*3600, null, null, false, true); 
        }     
    }

    /**
     * fournis un cookie ['niveau'] à l'utilisateur en fonction de son access
     *
     * @param  mixed $level
     *
     * @return void
     */
    public function giveMeCookie($level){
        // si l'utilisateur à un access à 0 ou négatif lui donne un cookie de base
        if ($this->access() <= 0 ){
            setcookie('niveau', 'DefaultValue', time() + 365*24*3600, null, null, false, true);
        // si l'utilisateur à un cookie d'access inférieurs a l'access en cours
        }elseif ($this->access() < $level){
            switch($level){ 
            case 2 : setcookie('niveau', 'f6es8f4s6ef15sef6se8', time() + 365*24*3600, null, null, false, true); break;
            case 3 : setcookie('niveau', 'gze68g6gze54gz6e8gg4', time() + 365*24*3600, null, null, false, true); break;
            case 4 : setcookie('niveau', 'gj6tfyjytfj6yjnyg6jn', time() + 365*24*3600, null, null, false, true); break;
            case 5 : setcookie('niveau', 'brb6re84br8ny8ny4ny8', time() + 365*24*3600, null, null, false, true); break;
            case 6 : setcookie('niveau', 'sehj468jtyd6ge4r8gre', time() + 365*24*3600, null, null, false, true); break;
            case 7 : setcookie('niveau', 'hrdth49dnrd49nt8nt4r', time() + 365*24*3600, null, null, false, true); break;
            case 8 : setcookie('niveau', 'feqfs9f84se9f87fesf7', time() + 365*24*3600, null, null, false, true); break;
            case 9 : setcookie('niveau', 'kyu9jthdrg4fezf9v8v1', time() + 365*24*3600, null, null, false, true); break;
            default :  
            }
        }
    }

    /**
     * detruit le cookie ['niveau']
     *
     * @return void
     */
    public function destroyCookie(){
        setcookie('niveau', 'ThisCookieIsNotExist', time() - 365*24*3600, null, null, false, true);
    }
}

?>