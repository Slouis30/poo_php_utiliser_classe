<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Site test POO PHP & Bootstrap 4">
    <meta name="author" content="Simon LOUIS">
    <title>POO PHP + Bootstrap 4</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
      /*require("env.php");
        try{
          $pdo_attr = [PDO::MYSQL_ATTR_FOUND_ROWS => true, 
                      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
          $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=UTF8mb4", DB_USER, DB_PASS, $pdo_attr);
        }
          catch(PDOException $e){
              echo 'Échec lors de la connexion : ' . $e->getMessage();
        }*/

        function chargerCLasse($classe){
          require $classe . ".php";
        }
        spl_autoload_register("chargerClasse");

        /*$perso_1 = new Personnage("Perso 1", Personnage::FORCE_PETITE);
        $perso_2 = new Personnage("Perso 2", Personnage::FORCE_MOYENNE);
        $perso_1->frapper($perso_2);
        $perso_2->frapper($perso_1);
        Personnage ::fonctionStatique();*/

        //$request = $db->prepare("SELECT id, nom, niveau, experience, pointsDeVie, forcePerso FROM personnages");
        //$request->execute();
        
        /*while($data = $request->fetch(PDO::FETCH_ASSOC)){
          $hero = new Hero($data);
          echo $hero->nom();
          //print_r($data);
        }*/
        $hero = new Hero(["nom" => "test", 
                          "niveau" => 1, 
                          "experience" => 0, 
                          "pointsDeVie" => 100, 
                          "forcePerso" => 12]);
        try{
          $pdo_attr = [PDO::MYSQL_ATTR_FOUND_ROWS => true, 
                      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
          $db = new PDO("mysql:host=localhost;dbname=personnages;charset=UTF8mb4", "root", "dofusien30", $pdo_attr);
        }
        catch(PDOException $e){
          echo $e->getMessage();
        }
        $heroManager = new HeroManager($db);
        //$heroManager->addHero($hero);
        echo "<pre>";
        print_r($heroManager->getHeros());
        echo "</pre>";
    ?>
    <pre>
                ／＞__/フ
        　　　　| 　_　 _|
        　 　　／` ミ＿xノ
        　　 /　　　 　 |
        　　 /　 ヽ　　 ﾉ
        　 │　　|　|　|
        ／￣|　　 |　|　|
    </pre>
    <p id = "HeroManagerAddSuccess">Le personnage a bien été ajouté à la BDD!</p>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
  </body>
</html>