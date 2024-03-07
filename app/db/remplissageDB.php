<?php



require 'C:/Users/imenm/Desktop/WAMP/www/imen.blog/vendor/autoload.php';


$faker = Faker\Factory::create('fr_FR');

require 'C:/Users/imenm/Desktop/WAMP/www/imen.blog/app/db/connexionDB.php';

$postes=[];
$categories=[];
$commentaires=[];
$users=[];

function generateSlug($string) {
    
    $slug = preg_replace('/[^\p{L}\p{N}]+/u', '-', $string);
  
    $slug = mb_strtolower($slug, 'UTF-8');
  
    $slug = trim($slug, '-');
  
    return $slug;
  }

// nettoyage des bases de données

$pdo-> exec("SET FOREIGN_KEY_CHECKS =0");

$pdo->exec( "TRUNCATE TABLE postes_categories");
$pdo->exec( "TRUNCATE TABLE postes_commentaires");
$pdo->exec( "TRUNCATE TABLE users_postes");
$pdo->exec( "TRUNCATE TABLE users");
$pdo->exec( "TRUNCATE TABLE postes");
$pdo->exec( "TRUNCATE TABLE categories");
$pdo->exec( "TRUNCATE TABLE commentaires");

$pdo-> exec("SET FOREIGN_KEY_CHECKS =1");

echo " bdd nettoyées ";

$hashPassword= null;
for($i=0 ; $i<13 ; $i++){
    $username = $faker->name;
    $hashPassword=password_hash($faker->password, PASSWORD_BCRYPT);
    
    $pdo->exec(" INSERT INTO users
            SET username ='{$username}',
            password ='{$hashPassword}',
            slug='{$faker->slug}',
            ft_image='image{$faker->numberBetween(1,5)}.jpg',
            email='{$faker->email}',
            tel='{$faker->phoneNumber}',
            role='abonné',
            cree='{$faker->date} {$faker->time}'
    ");
    $users[]=$pdo->lastInsertId();

}

echo "users remplie";


// creation de l'admin
$hashPassword=password_hash('test', PASSWORD_BCRYPT);

$pdo->exec(" INSERT INTO users
        SET username ='imen',
        password ='{$hashPassword}',
        slug='{$faker->slug}',
        ft_image='image{$faker->numberBetween(1,5)}.jpg',
        email='{$faker->email}',
        tel='{$faker->phoneNumber}',
        role='admin',
        cree='{$faker->date} {$faker->time}'
");
$users[]=$pdo->lastInsertId();

// creation des postes

$pdo->exec(" INSERT INTO postes    
        SET user_id= '14',
        titre= 'bénévole LPA',
        slug='benevole-lpa',
        ft_image='image{$faker->numberBetween(1,5)}.jpg',
        contenu ='Les bénévoles sont très importants pour le bon fonctionnement de notre association. Devenir bénévole pour la LPA-NF est un véritable engagement dans la protection animale. Nous nous réservons le droit d entrée pour le bon fonctionnement de l association',
        cree='2024-02-29 14:00:00',
        publie= '1'
");
$postes[]=$pdo->lastInsertId();

$pdo->exec(" INSERT INTO postes    
        SET user_id= '14',
        titre= 'bénévole ',
        slug='benevole-tunisie',
        ft_image='image{$faker->numberBetween(1,5)}.jpg',
        contenu ='Les bénévoles sont très importants pour le bon fonctionnement de notre association. Devenir bénévole pour la LPA-NF est un véritable engagement dans la protection animale. Nous nous réservons le droit d’entrée pour le bon fonctionnement de l’association.',
        cree='2024-01-29 18:00:00',
        publie= '1'
");
$postes[]=$pdo->lastInsertId();



$pdo->exec(" INSERT INTO postes    
        SET user_id= '14',
        titre= 'sports ',
        slug='sport-muscu',
        ft_image='image{$faker->numberBetween(1,5)}.jpg',
        contenu ='La musculation est un sport visant au développement des muscles squelettiques pratiquée dans le but d acquérir plus de force d endurance ou de volume musculaire',
        cree='2023-12-29 20:15:00',
        publie= '1'
");
$postes[]=$pdo->lastInsertId();


$pdo->exec(" INSERT INTO postes    
        SET user_id= '14',
        titre= 'sports danse ',
        slug='sport-danse',
        ft_image='image{$faker->numberBetween(1,5)}.jpg',
        contenu ='La danse est une forme d art vivant. C est un mode d expression éphémère constitué de séquences de mouvements de corps dans l espace souvent accompagnés par de la musique.',
        cree='2023-12-29 20:15:00',
        publie= '1'
");
$postes[]=$pdo->lastInsertId();

$pdo->exec(" INSERT INTO postes    
        SET user_id= '14',
        titre= 'support ',
        slug='support',
        ft_image='image{$faker->numberBetween(1,5)}.jpg',
        contenu ='Choisir Nexylan, c est choisir l accompagnement hors pair de nos ingénieurs systèmes  ingénieurs cloud  développeurs experts en performance et experts en sécurité au quotidien.',
        cree='2023-11-10 20:15:00',
        publie= '1'
");
$postes[]=$pdo->lastInsertId();

$pdo->exec(" INSERT INTO postes    
        SET user_id= '14',
        titre= 'job ',
        slug='job-etudiant',
        ft_image='image{$faker->numberBetween(1,5)}.jpg',
        contenu ='Boulangerie Laziza Un large choix de produits de qualité faits maison aussi bien pour les pâtisseries orientales pâtisseries occidentales que pour la boulangerie et le service traiteur.',
        cree='2023-11-10 20:15:00',
        publie= '1'
");
$postes[]=$pdo->lastInsertId();

echo 'postes remplie' ;

//creation commentaires

for($i=0 ; $i<12 ; $i++){

    $pdo->exec(" INSERT INTO commentaires
            SET pseudo ='{$faker->name}',
            titre ='{$faker->sentence(2)}',
            contenu='{$faker->paragraphs(rand(1,3),true)}',
            cree='{$faker->date} {$faker->time}',
            publie= '1'
    ");
    $commentaires[]=$pdo->lastInsertId();

}
echo "commentaires remplie";


//creation categories

$pdo->exec(" INSERT INTO categories    
        SET titre= 'expériences associatives',
        slug='experience-associative',
        ft_image='C:/Users/imenm/Desktop/WAMP/www/imen.blog/public/images/Associations.jpg',
        contenu ='L engagement bénévole associatif participe au développement d une société plus solidaire et fraternelle attachée à servir l intérêt général et le bien commun et favorise l expression d une conscience citoyenne attentive à la construction d un « vivre ensemble » respectueux de sa diversité.'
        
        
");
$categories[]=$pdo->lastInsertId();

$pdo->exec(" INSERT INTO categories    
        SET titre= 'expériences professionnelles',
        slug='experience-professionnelle',
        ft_image='C:/Users/imenm/Desktop/WAMP/www/imen.blog/public/images/Associations.jpg',
        contenu ='Ensemble des connaissances acquises par une personne lors de l exercice de sa (ou ses) profession(s).'
        
");
$categories[]=$pdo->lastInsertId();

$pdo->exec(" INSERT INTO categories    
        SET titre= 'Centres d''intérêt',
        slug='centre-interet',
        ft_image='C:/Users/imenm/Desktop/WAMP/www/imen.blog/public/images/Associations.jpg',
        contenu ='il s agit d une activité ou d une chose qui intéresse particulièrement une personne voire la passionne.'
");
$categories[]=$pdo->lastInsertId();

echo "catégories remplie";


 // replissage postes_categories


 $pdo->exec("INSERT INTO postes_categories (poste_id, categorie_id) VALUES (1, 1)");
 $pdo->exec("INSERT INTO postes_categories (poste_id, categorie_id) VALUES (2, 1)");
 $pdo->exec("INSERT INTO postes_categories (poste_id, categorie_id) VALUES (5, 2)");
 $pdo->exec("INSERT INTO postes_categories (poste_id, categorie_id) VALUES (6, 2)");
 $pdo->exec("INSERT INTO postes_categories (poste_id, categorie_id) VALUES (3, 3)");
 $pdo->exec("INSERT INTO postes_categories (poste_id, categorie_id) VALUES (4, 3)");
 

echo "postes_catégories remplie";


//remplissage postes_commentaires

foreach ($postes as $poste) {
        $randomCommentaire = $faker->randomElements($categories, rand(2, 2));
        foreach ($randomCommentaire as $commentaire) {
            $pdo->exec("INSERT INTO postes_commentaires SET poste_id={$poste},  commentaire_id={$commentaire}");
        }
    }

echo "postes_commentaires remplie" ;


foreach ($postes as $poste) {
       
        $pdo->exec("INSERT INTO users_postes SET user_id=14, poste_id={$poste}");
    }

echo "users_postes remplie" ;
 