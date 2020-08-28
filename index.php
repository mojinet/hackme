<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="robots" content="noindex,nofollow" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="icon" type="image/png" href="img/mask-1587566_1280.ico" />
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Press+Start+2P|Yeseva+One&display=swap"
        rel="stylesheet">
    <title>HackMe | Home</title>
</head>

<body>
    <!--Full view-->
    <section class="l-full-view_home">
        <!--header-->
        <header class="l-header">
            <img src="img/mask-1587566_1280.png" alt="" class="titre-logo">
            <p class="titre-site"><a href="index" class="link-title">HackMe</a></p>
            <span class="titre-beta">beta</span>
        </header>
        <!--big titre-->
        <h1 class="big_title">Serez vous à la hauteur ?</h1>
        <!--bouton jouer-->
        <div class="go_level">
            <img src="img/it'smyman.gif" alt="" class="gif-in_go_level">
            <a href="level"><input type="button" value="JOUER !" class="btn-go_level"></a>
        </div>
        <!--link fleche-->
        <a href="#kezako" class="js-scrollTo"><img src="img/fleche.gif" alt="" class="fleche"></a>
    </section>

    <div class="main-content-home">
        <!--kezako-->
        <section class="l-section" id="kezako">
            <header class="l-header-section">
                <h1 class="title-header-section">Tester vos connaissances sur quelques vulnérabilités web</h1>
                <p class="quote-title-header-section">
                    <img src="img/MrTomate.gif" alt="" class="gif-title-header-section">
                    <span>"L'erreur est humaine, mais parfois elle provient aussi d'une tomate"</span>
                </p>
            </header>
            <section class="l-content-section">
                <h2 class="title-content-section">Qu'est ce que c'est que ce site là ?</h2>
                <div class="content-section">
                <img src="img/MrTomateafter.gif" alt="" class="gif-content-section">
                    <span>
                        HackMe.modji.net est un serious game qui permet de tester et comprendre quelques vulnérabilités
                        web,
                        ces erreurs proviennent tant des utilisateurs qui ne sécurisent pas assez leurs mots de passe ainsi
                        que
                        des
                        développeurs qui négligent certains aspects ou tout simplement qu'ils oublient de les implémenter ! Plus
                        un
                        programme se complexifie et plus il laisse place aux failles.
                    </span>
                </div>
            </section>
        </section>


        <!--information niveaux-->
        <section class="l-section">
            <section class="l-content-section">
                <h2 class="title-content-section">Trois niveaux de difficultés pour vous tester !</h2>
                <div class="content-section">
                    <img src="img/mrdollard.gif" alt="" class="gif-content-section">
                    <span>
                        Trois niveaux de difficultés, allant de débutant à expert vous permettent de tester vos connaissances,
                        mais aussi un certain esprit logique, le but reste toujours le même : trouver le mot de passe
                        afin
                        de passer au
                        niveau suivant. Pour cela vous devez disposer de quelques connaissances en développement web et
                        ce
                        qui
                        gravite autour, comme les DNS, le code source de la page, la modification des élements HTML
                        etc...
                    </span>
                </div>
            </section>
        </section>
    </div>
    
    <!--footer-->
    <footer class="l-footer">
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
            <p class="copy">made by <a href="jbco.fr" class="link-footer" title="Developpeur back/front">jbco.fr</a></p>
        </form>
        </div>
    </footer>

    <!--smoothscroll-->
    <!--*******script pour un scroll plus smooth***************-->
    <!--*******ajouter la class js-scrollTo dans le lien*******-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.js-scrollTo').on('click', function () { // Au clic sur un élément
                var page = $(this).attr('href'); // Page cible
                var speed = 750; // Durée de l'animation (en ms)
                $('html, body').animate({ scrollTop: $(page).offset().top }, speed); // Go
                return false;
            });
        });
    </script>
</body>

</html>