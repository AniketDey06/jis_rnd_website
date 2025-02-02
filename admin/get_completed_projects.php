
<?php
require_once '../config/database.php'; // Ensure database connection is included

try {
    // Count projects where status = 0
    $stmt1 = $pdo->prepare("SELECT * FROM project_allocation WHERE com_status = '1'");
    $stmt1->execute();
    $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
    if (!empty($result1)) {
        $stmt = $pdo->prepare("SELECT COUNT(*) AS project_count FROM posts WHERE post_id = :post_id and status = '1'");
        $stmt->execute([
            ':post_id' => $result1['post_id']
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

    }
    echo json_encode(['success' => true, 'count' => $result['project_count']]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>

