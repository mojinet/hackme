<?php

class affiche{

    /**
     * affiche toutes les etoile gagner (AVEC animation)
     *
     * @param  mixed $access qui représente le niveau d'acces pour le level de l'utilisateur 
     *
     * @return void
     */
    public function afficheEtoileHome($access){
        for ($i = 1, $j = 1; $i < $access; $i++, $j++){
            echo '<img src="rss/icons-1293736_640.png" alt="" class="img-etoile img-etoile'. $j .'">';
        }
    }

    /**
     * affiche toutes les etoile gagner (SANS animation)
     *
     * @param  mixed $access qui représente le niveau d'acces pour le level de l'utilisateur 
     *
     * @return void
     */
    public function afficheEtoile($access){
        for ($i = 1, $j = 1; $i < $access; $i++, $j++){
            echo '<img src="rss/icons-1293736_640.png" alt="" class="final-position-etoile etoile'. $j .'">';
        }
    }

    public function winStars($level){
        
    }
    public function indice($level){
        switch($level){
            case 1 : echo ''; break;
            case 2 : echo ''; break;
            case 3 : echo ''; break;
            case 4 : echo ''; break;
            case 5 : echo ''; break;
            case 6 : echo 'Indice : 40x'; break;
            case 7 : echo ''; break;
            case 8 : echo ''; break;

        }    
    }    

    /**
     * affiche la derniere etoile gagné (AVEC animation)
     *
     * @param  mixed $access qui représente le niveau d'acces pour le level de l'utilisateur 
     *
     * @return void
     */
    public function afficheNewEtoile($access){
            echo '<img src="rss/icons-1293736_640.png" alt="" class="img-etoile img-etoile'. $access .'">';
    }
}

?>