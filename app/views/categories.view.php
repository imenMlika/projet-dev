<?php




require 'C:\Users\imenm\Desktop\WAMP\www\imen.blog\app\db/connexionDB.php';

try {
    $sql = "SELECT * FROM categories";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        while ($categorie = $stmt->fetch()) {
            echo '<div>';
            echo '<h2>' . htmlspecialchars($categorie['titre']) . '</h2>';
            // Vérifiez que l'index 'ft_image' existe dans le tableau $categorie
            if (isset($categorie['ft_image']) && file_exists($categorie['ft_image'])) {
                echo '<img src="' . htmlspecialchars($categorie['ft_image']) . '" alt="' . htmlspecialchars($categorie['titre']) . '">';
            }
            echo '<p>' . htmlspecialchars($categorie['contenu']) . '</p>';
            echo '</div>';
        }
    }
} catch (PDOException $e) {
    // Gérer l'exception ici
}
?>

