<?php
require_once '../config/database.php'; // Ensure database connection is included

try {
    // Count projects in project_application where status = '2'
    $stmt1 = $pdo->prepare("SELECT post_id FROM project_applications WHERE status = '2'");
    $stmt1->execute();
    $dataList = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    $ongoingProjects = 0;

    foreach ($dataList as $data) {
        $stmt = $pdo->prepare("SELECT * FROM project_allocation WHERE post_id = :post_id AND com_status = '1'");
        $stmt->execute([':post_id' => $data['post_id']]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the result properly

        if (!$result) {
            $ongoingProjects++;
        }
    }

    if ($ongoingProjects > 0) {
        echo json_encode(['success' => true, 'count' => $ongoingProjects]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No ongoing projects found.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>
