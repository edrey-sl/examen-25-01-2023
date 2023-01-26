<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=db_univer_prodesat', 'root', '');
    
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>