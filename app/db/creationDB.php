<?php

//connection DB
require 'connexionDB.php';

$pdo->exec("CREATE TABLE users(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    username VARCHAR(255) NOT NULL,
    password CHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    ft_image VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tel VARCHAR(255) NOT NULL,
    role ENUM('Auteur','admin','abonné') NULL DEFAULT 'abonné',
    cree TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'USERS';

$pdo->exec("CREATE TABLE postes(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id INT UNSIGNED DEFAULT NULL,
    titre   VARCHAR(255),
    slug VARCHAR(255) NOT NULL,
    ft_image VARCHAR(255) NOT NULL,
    contenu text NOT NULL,
    cree TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    publie TINYINT NOT NULL,
    FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'postes';

$pdo->exec("CREATE TABLE commentaires(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    pseudo VARCHAR(255) NOT NULL,
    titre  VARCHAR(255) NOT NULL,
    contenu text NOT NULL,
    cree TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    publie TINYINT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'commentaires';

$pdo->exec("CREATE TABLE categories(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    titre   VARCHAR(255),
    slug VARCHAR(255) NOT NULL,
    ft_image VARCHAR(255) NOT NULL,
    contenu text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'categories';


$pdo->exec("CREATE TABLE postes_commentaires(
    poste_id INT UNSIGNED NOT NULL,
    commentaire_id INT UNSIGNED NOT NULL,
    PRIMARY KEY( poste_id, commentaire_id),
    CONSTRAINT fk_poste_commentaire
        FOREIGN KEY (poste_id)
        REFERENCES postes(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,

    CONSTRAINT fk_commentaire
        FOREIGN KEY (commentaire_id)
        REFERENCES commentaires(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'postes_commentaires'; 

$pdo->exec("CREATE TABLE users_postes(
    user_id INT UNSIGNED NOT NULL,
    poste_id INT UNSIGNED NOT NULL,
    PRIMARY KEY( user_id, poste_id),
    CONSTRAINT fk_user
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,

    CONSTRAINT fk_user_poste
        FOREIGN KEY (poste_id)
        REFERENCES postes(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo "users_postes";

$pdo->exec("CREATE TABLE postes_categories(
    poste_id INT UNSIGNED NOT NULL,
    categorie_id INT UNSIGNED NOT NULL,
    PRIMARY KEY( poste_id, categorie_id),
    CONSTRAINT fk_poste_categorie
        FOREIGN KEY (poste_id)
        REFERENCES postes(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,

    CONSTRAINT fk_categorie
        FOREIGN KEY (categorie_id)
        REFERENCES categories(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo "postes_categories";