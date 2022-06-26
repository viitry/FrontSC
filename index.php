
<!DOCTYPE html>
<html>
    <head>
        <title>SlashClean</title>
        <meta charset ="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet">
        <link href="footer.css" rel="stylesheet">
        <link href="popup_inscr.css" rel="stylesheet">
        <link href="popup_log.css" rel="stylesheet">
    </head>
    <?php
if(isset($_POST['logout']))
{
    unset($_COOKIE['login']);
    unset($_COOKIE['password']);
    setcookie('login', '', -1);
    setcookie('password', '', -1);
    $boule = true;
}?>
    <body>
        <!-- Header -->
        <header>
            <!-- Logo -->
            <img class="logo" src="logo_white_large.png" alt="logo">
            <nav>
                <ul class="nav__links">
                    <li><a href="profile.php">Telechargement</a></li>
                    <li><button id="show-login" href="#">Connexion</button></li>
                    <li><button id="show-signup"href="#">Inscription</button></li>    
                    <!-- connecte ... <li><button id="show-signup"href="profile.html">Mon Compte</button></li>  -->
                </ul>
            </nav>
            <a class="cta" href="#"><button>Contact</button></a>
        </header>
        <!-- POPUP LOGIN -->
        <div class="popup">
            <div class="close-btn">&times;</div>
            <div class="form">
                <form action="" method="POST">
                    <h2>Log in</h2>
                    <div class="form-element">
                        <label for="email">Email</label>
                        <input type="text" id="email" placeholder="Adresse e-mail" name="login1" required> <!--value=""-->
                    </div>
                    <div class="form-element">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" placeholder="Votre mot de passe" name="password1" required>
                    </div>
                    <div class="form-element">
                        <input type="checkbox" id="remember-me">
                        <label for="remember-me">Remember me</label>
                    </div>
                        <div class="form-element" name="connect">
                        <button type="submit" name="connect" value="se connecter">Sign in</button>
                     <?php
				if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }?>
                    </div>
                    <div class="form-element">
                        <a href="#">Mot de passe oublie ?</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- POPUP INSCRIPTION-->
        <div class="popup2">
            <div class="close-btn">&times;</div>
            <div class="form">
                <form action="profile.php" method="POST">
                    <h2>Inscription</h2>
                    <div class="form-element">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" id="pseudo" placeholder="Votre pseudo" name="pseudo"  required> 
                    </div>
                    <div class="form-element">
                        <label for="email">Email</label>
                        <input type="text" id="email" placeholder="Adresse e-mail" name="mail"  required> <!-- -->
                    </div>
                    <div class="form-element">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" placeholder="Mot de passe" name="password" required><!--  -->
                    </div>
                    <div class="form-element">
                        <label for="password">Repeter Mot de passe</label>
                        <input type="password" id="password" placeholder="Mot de passe" name="confirm_password" required><!--  -->
                    </div>
                    <div class="form-element">
                        <label for="prenom">Telephone</label>
                        <input type="text" id="phone" placeholder="Votre numero" name="phone"  required> 
                    </div>
                    <div class="form-element">
                        <button type="submit" name="add_user" value="Creer">Creer</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- nom, prenom, email, confirm email, mdp confirm mdp -->
        <div class="main_up">
            <img class="screens" src="screens.png" alt="">
        </div>
        <div class="title">
            <h3>Qu'est ce que SlashClean ?</h3>
        </div>
        <div class="container">
            <div class="children left">
                <p>SlashClean est un gestionnaire de disque dur pour votre telephone !  <br>SlashClean vous permet de vous notifier lorsque vous n'avez pas utiliser une application depuis longtemps et vous permet de la supprimer en un seul clic.</p>
            </div>
            <div class="children right">
                <p>SlashClean en telechargement sur l'Appstore et GooglePlay !</p>
                <img src="appstorebadge.png"><br>
                <img src="google-play-badge.png"></div>
        </div>
        <!-- Footer -->
        <footer class="footer">
            <div class="l-footer">
                <h1><img class="logo-footer" src="logo_white_large.png" alt=""></h1>
                <p>Description de SlashCleanDescription de SlashCleanDescription de SlashCleanDescription de SlashCleanDescription de
                    SlashCleanDescription de SlashCleanDescription de SlashClean</p>
            </div>
            <ul class="r-footer">
                <li>
                    <h2>Explore</h2>
                    <ul class="box">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Explore</a></li>
                    </ul>
                </li>   
                <li class="features">
                    <h2>Nous contacter</h2>
                    <ul class="box h-box">
                        <li><a href="#">Adresse</a></li>
                        <li><a href="#">Telephone</a></li>
                    </ul>
                </li>
                <li>
                    <h2>Legal</h2>
                    <ul class="box">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms Of Use</a></li>
                        <li><a href="#">Contract</a></li>
                    </ul>
                </li>     
            </ul>
            <div class="b-footer">
                <p>All Right Reserver by SlashClean</p>
            </div>
        </footer>
        <script type="text/javascript" src="script.js"></script>
    </body>
        
</html>