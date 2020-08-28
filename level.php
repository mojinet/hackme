<?php 

//CLASS
include 'class/save.php'; 
include 'class/affiche.php';
include 'class/pnj.php'; 
include 'class/son.php'; 
$son = new son();
$save = new save();         // class qui gere les cookies de sauvegarde

//test back level
if( isset($_GET['level']) ){
    $level = htmlspecialchars($_GET['level']);
    if($level < -1){
        $level =-1;
    }
    $save->giveMeBack($level);
}else{
    if(isset($_COOKIE['back'])){
        $level = $_COOKIE['back'];
    }else{
        $level = $save->access();   // determine le level en cours
    }
}

//fin test
//annule le niveau 8 et le remplace par le 1000 (pas encore fait)
if($level == 8){$level = 1000;}
$pnj = new pnj($level);     // class d'interaction PNJ qui renvois un message suivant la saisie de l'utilisateur
$affiche = new affiche;     // class qui renvois l'affichage des étoiles gagner
//VAR
$access = $save->access();                                                                      // Renvois le niveau d'access via le cookies
$userPassword = isset($_POST['password']) ? $_POST['password'] : 'U53rPa55w0rdIsN0tD3fin3d';    // si l'utilisateur a rentrer un mot de passe l'enregistre sinon lui donne un mot de passe par defaut
// si level 3 MODIFIE le role à utilisateur pour le LEVEL 3
if ($level == 3){
    $userPassword = isset($_GET['password']) ? $_GET['password'] : 'U53rPa55w0rdIsN0tD3fin3d'; 
    $userRole = isset($_GET['role']) ? $_GET['role'] : 'utilisateur'; 
    if ($pnj->code($userPassword, $userRole) == 1 ){$save->giveMeCookie((4));} 
}
// si level 5 donne un cookie avec le mot de passe, si c'est niveau 6 le detruit
if($level == 5){
    setcookie('MotDePasse', 'cezicuzne', time() + 365*24*3600, null, null, false, true);}
    else {
        setcookie('MotDePasse', 'cezicuzne', time() - 365*24*3600, null, null, false, true);
    }
// si level 7 donne un cookie rôle si l'utilisateur n'en as pas, si level 8 le detruit
if($level == 7){
    if (!isset($_COOKIE['role'])){
        setcookie('role', 'utilisateur', time() + 365*24*3600, null, null, false, true);              
    }   
}elseif ($level == 8){
    setcookie('role', 'utilisateur', time() - 365*24*3600, null, null, false, true);
    $level = 1000;
}
$userPrivilege = isset($_COOKIE['role']) ? $_COOKIE['role'] : 'utilisateur';
//TODO GERE COOKIE
if($level != 3 AND $level != 7){
    if ($pnj->code($userPassword) == 1){ $save->giveMeCookie(($level+1)); $save->removeBack();}
}elseif ($level == 3){
    if ($pnj->code($userPassword,$userRole) == 1){ $save->giveMeCookie(($level+1)); $save->removeBack();}
}elseif ($level == 7){
    if ($pnj->code($userPassword,$userPrivilege) == 1){ $save->giveMeCookie(($level+1)); $save->removeBack();}    
}
// Si l'utilisateur n'a pas de cookie OU un cookie corrompu
if ($access == 0 OR $access == -666){$save->giveMeCookie((666));}
// RENVOIS vers page triche si l'utilisateur tente d'acceder à un niveau supérieur a son access ou un cookie corrompu
if($level == 1000){

}elseif ($access < $level OR $access == -666){header('Location: triche'); exit();}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="robots" content="noindex,nofollow" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" type="image/png" href="img/mask-1587566_1280.ico" />
    <?php 
    if ($level==2){?>
    <link rel="stylesheet" href="style/postit.css">
    <?php } ?>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Press+Start+2P|Yeseva+One&display=swap"
        rel="stylesheet">
    <title>HackeMe | Debutant Lv<?php echo $level; ?></title>
</head>
<?php 
if ($level==1){?>
<!-------------------------------->
<!--          POST-IT           -->
<!-- Mot de passe : uioppoiu    -->
<!-- Penser à racheter du lait  -->
<!--                            -->
<!-------------------------------->
<?php } 
if ($level > 1){?>
<!-------------------------------->
<!--          POST-IT           -->
<!-- FINIS LES POST IT ICI !!   -->
<!--                            -->
<!--                            -->
<!-------------------------------->
<?php } 
//if($level >5 AND $level <= 10){   
//    echo '<style>.score, .entete-game-area, .btn-in_level, .niveau{background-color: #00A236;}.l-header-level{background-color: #00A236c0 !important;}</style>';
//}elseif($level > 10){
//    echo '<style>.score, .entete-game-area, .btn-in_level, .niveau{background-color: rgb(50, 51, 99);}.l-header-level{background-color: rgba(50, 51, 99,0.5) !important;}</style>';
//}?>

<body>
    <!--Full view-->
    <section class="l-full-view_level">
        <!--header-->
        <header class="l-header-level">
            <img src="img/mask-1587566_1280.png" alt="" class="titre-logo">
            <p class="titre-site"><a href="index" class="link-title">HackMe</a></p>
            <span class="titre-beta">beta</span>
        </header>
        <!--Droite-->
        <!--Score-->
        <div class="level-right">
            <div class="score">
                <span>SCORE</span>
                <div class="section-etoile">
                    <?php 
                        if($level != 1000){
                        for( $i = 2; $i <= $access ; $i++){
                            echo '<img src="img/icons-1293736_640.png" alt="">';
                        }
                        // 8 représente le niveau max +1
                        for($i = 0; $i < (8 - $access ); $i++){
                            echo '<img src="img/icons-grey.png" alt="">';    
                        }
                    }else{
                        for( $i = 2; $i <= 7 ; $i++){
                            echo '<img src="img/icons-1293736_640.png" alt="">';
                        }                        
                    }
                    ?>                         
                </div>
            </div>
            <!--PNJ + niveau-->
            <div class="grp-lvl_pnj">
                <!--PNJ-->
                <div class="pnj-area">
                    <?php if($level==3){ ?>
                        <p class="dialogue-pnj"><?php $pnj->response($userPassword,$userRole);?></p>
                    <?php } elseif($level == 7){ ?>
                        <p class="dialogue-pnj"><?php $pnj->response($userPassword,$userPrivilege);?></p>
                    <?php } else{?>
                        <p class="dialogue-pnj"><?php $pnj->response($userPassword);?></p>
                    <?php }?>
                    <?php if ($pnj->isValid()){
                        $level++;
                        //$son->win();
                        //$save->giveMeCookie($level);
                        ?>
                        <form action="level" method="post">
                            <input type="submit" value="Bien fait !" class="btn-next">
                        </form>
                        <?php 
                    }elseif ($level == 0){ ?>
                        <form action="level?level=1" method="post"><input type="submit" value="OK !" class="btn-next"></form>
                    <?php }elseif ($level ==-1){ echo '<form action="level?level=0" method="post"><input type="submit" value="Bah non !" class="btn-next"></form>';} ?>
                    <?php if($level >5 AND $level <= 10){ 
                            echo '<img src="img/mrdollard.gif" alt="">';
                        }elseif($level == 1000){
                            echo '<img src="img/mascotte.gif" alt="">';
                        }elseif($level > 10){
                            echo '<img src="img/it\'smyman2.gif" alt="">';
                        }else{
                            echo '<img src="img/MrTomate.gif" alt="">';
                        } ?>
                </div>
                <!--niveau-->
                <div class="niveau">
                    <span>
                        <?php if($level >5 AND $level <= 10){ 
                            echo 'INTERMEDIAIRE';
                        }elseif($level > 10){
                            echo 'EXPERT';
                        }else{
                            echo 'DEBUTANT';
                        } ?></span>
                </div>
            </div>
        </div>

        <!--Gauche-->
        <!--fake web page-->
        <div class="game-area">
            <div class="entete-game-area">
            <?php if ($pnj->isValid()){ 
                $affiche->winStars($level);
                ?>
                <span>LEVEL <?php echo $level - 1; ?></span>
            <?php }else{ ?>
                <span></a>
                <form action="#" method="get" class="form-access">
                    <input type="submit" value="<=" class="btn-access-back">
                    <input type="hidden" name="level" value="<?php echo ($level - 1)?>">
                </form>
                LEVEL <?php echo $level; ?>
                <?php //NEXT
                 if (!($level+1 > $access)){ ?>
                    <form action="#" method="get" class="form-access">
                        <input type="submit" value="=>" class="btn-access-next">
                        <input type="hidden" name="level" value="<?php echo ($level + 1)?>">
                    </form>
                <?php }?></span>
            <?php } ?>    
            </div>
            <div class="game-content">
                <?php if ($pnj->isValid()){ ?>
                <div class="game-header">
                <?php if($level >5 AND $level <= 10){ 
                            echo '<img src="img/mrdollardexib.gif" alt="">';
                        }elseif($level > 10){
                            echo '<img src="img/it\'smyman2.gif" alt="">';
                        }else{
                            echo '<img src="img/MrTomateafter.gif" alt="">';
                        } ?>
                    <span> 
                    <?php if($level >5 AND $level <= 10){ 
                            echo 'Mr Dallord';
                        }elseif($level == 1000){
                            echo 'Modji';
                        }elseif($level > 10){
                            echo 'Mr strange';
                        }else{
                            echo 'Mr Ketchup';
                        } ?>
                    </span>
                </div>
                <?php }else{ ?>
                <div class="game-header">
                <?php if($level >5 AND $level <= 10){ 
                            echo '<img src="img/mrdollard.gif" alt="">';
                        }elseif($level == 1000){
                            echo '<img src="img/mascotte.gif" alt="">';
                        }elseif($level > 10){
                            echo '<img src="img/it\'smyman2.gif" alt="">';
                        }else{
                            echo '<img src="img/MrTomate.gif" alt="">';
                        } ?>
                    <span>
                    <?php if($level >5 AND $level <= 10){ 
                            echo 'Mr Dallord';
                        }elseif($level == 1000){
                            echo 'Modji';
                        }elseif($level > 10){
                            echo 'Mr strange';
                        }else{
                            echo 'Mr Ketchup';
                        } ?>
                    </span>
                    </span>
                </div>
                    <?php if($level!=0 AND $level !=3 AND $level != 1000 AND $level !=-1){?>
                    <form action="level.php" method="post">
                        <label for="password">Mot de passe : </label>
                        <input type="password" name="password" id="password" <?php if($level == 4){echo 'disabled';} ?>>
                        <input type="submit" value="GO !" class="btn-in_level">
                        <p class="indice"><?php $affiche->indice($level); ?></p>
                    </form>
                    <?php }elseif($level == 3){ ?>
                    <form action="level.php" method="get">
                        <input name="role" value="utilisateur" hidden>
                        <label for="password">Mot de passe : </label>
                        <input type="password" name="password" id="password">
                        <input type="submit" value="GO !" class="btn-in_level">
                        <p class="indice"><?php $affiche->indice($level); ?></p>
                    </form>
                    <?php }elseif($level == 1000){
                        echo 'Merci d\'avoir joué !';
                    } ?>
                <?php } ?>
            </div>
        </div>
    </section>

    <!--footer-->
    <footer class="l-footer">
        <p class="small-device">Attention jeux jouable uniquement sur navigateur pour ordinateur.</p>
        <h1 class="title-footer">À propos de l'auteur</h1>
        <div class="content-footer">
            <img src="img/mascotte.gif" alt="" class="pixofmodji">
            <span>
                Je suis un développeur web junior, les personnages en pixel, le design ainsi que les musiques ont été
                crées sur mesure par mes soins. Le site est actuellement en beta et évoluera au fur et à mesure de mes
                connaissances dans le domaine et de l'intérêt manifeste des utilisateurs ! Vous pouvez me contacter
                sur contact@modji.net et je me ferais un plaisir de répondre à vos questions.
                Pour soutenir le projet vous pouvez faire un don paypal en cliquant sur le bouton faire un don<br />
            </span>
        </div>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" class="go_paypal" target="_blank">
            <input type="hidden" name="cmd" value="_s-xclick" />
            <input type="hidden" name="hosted_button_id" value="QB3TY8JKSFPWG" />
            <img src="img/it'smyman.gif" alt="" class="gif-in_go_paypal">
            <input type="submit" value="Faire un don" class="btn-go_paypal" title="Faire un don via paypal">
            <p class="copy">made by <a href="http://www.jbco.fr" class="link-footer" title="Developpeur back/front">jbco.fr</a></p>
        </form>
        </div>
    </footer>
</body>

</html>