<?php

require_once("database.php");
error_reporting(-1);
ini_set('display_errors', 'On');

join_database("database.json");
$tab = select_fields("user");
$new_bool = false;
$detector = 0;
$bool = true;
$var_log = "";
$var_mail ="";
$var_phone = "";
$var_login = "";
$new_tab = select_fields("user");

//$app = new_select_fields("name", "app");
/*while(($v = $app->fetch_aray()) != NULL){
    //print_r($v);
    echo($v['name']);
}*/
/*$app = select_fields("app");
foreach($app as $v){
    var_dump($v['name'][0]);

}*/



//$response->closeCursor();

if (isset($_POST['add_user'])) {
    $hash_key = hash_hmac('md5',htmlentities($_POST['password']), 'secret');
    $user = array ("pseudo" => htmlentities($_POST["pseudo"]), "mail" => htmlentities($_POST["mail"]), "password" => $hash_key, "phone_number" => htmlentities($_POST["phone"]));
    $confirm_password = htmlentities($_POST["confirm_password"]);
    $var_log = $user['pseudo'];
    $var_mail = $user['mail'];
    $var_phone = $user['phone_number'];

    foreach($tab as $v)
	{
	    if($user["pseudo"] == $v["pseudo"]){
		$bool = false;
	    echo "<p class='error_gestion'> Le login existe déjà </p>"; }
	}

	foreach($tab as $v)
	{
		if($user['phone_number'] == $v['phone_number']){
			$bool = false;
			echo "<p class='error_gestion'> Numéro de téléphone déjà pris </p>";
		}
	}
    if($_POST["password"] != $confirm_password){
	$bool = false;
	echo "<p class='error_gestion'> Les mots de passe ne correspondent pas</p>";
        }
	if(!filter_var($user["mail"], FILTER_VALIDATE_EMAIL)){
	    $bool = false;
	echo "<p class='error_gestion'> Mail invalide </p>";
	}
    if($bool == true)
	{
	    $new_id =  insert_fields("user", $user);
	    $new_tab = select_fields("user", $new_id);
	    setcookie("pseudo", $new_tab[0]["pseudo"]);
	    setcookie("password", $new_tab[0]["password"]);
		echo "<p id='inscription'> Inscription réussie ! </p>";
	}
}


if(isset($_POST['logout']))
{
    unset($_COOKIE['mail']);
    unset($_COOKIE['password']);
    setcookie('mail', '', -1);
    setcookie('password', '', -1);
}
?>
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
    <body>
        <!-- Header -->
        <header>
            <!-- Logo -->
            <img class="logo" src="logo_white_large.png" alt="logo"/>
            <nav>
                <ul class="nav__links">
                    <form method="POST" action="<?=$_SERVER['REQUEST_URI']?>">
                        <li><a href="index.php"><button name="logout">Se deconnecter</button></a></li>   
                    </form> 
                    <!-- connecte ... <li><button id="show-signup"href="profile.html">Mon Compte</button></li>  -->
                </ul>
            </nav>
            <a class="cta" href="index.php"><button>Accueil</button></a>
        </header>
        <div class="main">
        <?php if(isset($_COOKIE["mail"]) && isset($_COOKIE["password"]))
                    { ?>
            <h2>Adresse email : <?= $_COOKIE['mail'] ?> </h2>
            <?php } ?>
            <h2>Mes applications desinstalees : <?php $response = $Database->query('SELECT name FROM app');
while($donnees = $response->fetch_array()){
    echo $donnees['name'].'<br/>';
} ?></h2>
        </div>
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
    </body>
</html>