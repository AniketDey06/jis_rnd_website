
<?php
require_once '../config/database.php'; // Ensure database connection is included

try {
    // Check if any project allocation has com_status = 1
    $stmt1 = $pdo->prepare("SELECT COUNT(*) FROM project_allocation WHERE com_status = '1'");
    $stmt1->execute();
    $numrow12 = $stmt1->fetchColumn();

    if ($numrow12 == 0) { // If no projects have com_status = 1
        // Count projects in "posts" where status = 1
        $stmt = $pdo->prepare("SELECT COUNT(*) AS ongoing_count FROM posts WHERE status = '1'");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode(['success' => true, 'count' => $result['ongoing_count']]);
        exit();
    }

    echo json_encode(['success' => false, 'message' => 'No ongoing projects found.']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>
