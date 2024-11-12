<?php
// Inclut le fichier de connexion à la base
require_once '../src/Config/Database.php';
// Indique que la réponse sera en JSON
header('Content-Type: application/json');

try {
    // Crée une instance de la classe Database
    $database = new \Config\Database();
    
    // Teste la connexion à la base de données
    $connection = $database->getConnection();
    
    // Test simple pour vérifier que l'API fonctionne
    echo json_encode(['status' => 'API is running', 'db_status' => 'Connected to the database']);
} catch (Exception $e) {
    // En cas d'erreur, renvoie un code 500 et le message d'erreur
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
