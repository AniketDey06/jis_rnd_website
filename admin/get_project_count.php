<?php
require_once '../config/database.php'; // Ensure database connection is included

try {
    // Count projects where status = 0
    $stmt = $pdo->prepare("SELECT COUNT(*) AS project_count FROM posts WHERE status = '0'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode(['success' => true, 'count' => $result['project_count']]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>
