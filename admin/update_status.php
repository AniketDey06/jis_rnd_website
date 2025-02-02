<?php
require_once '../utils/admin_auth.php';
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $facultyId = $_POST['faculty_id'] ?? null;
        $postId = $_POST['post_id'] ?? null;

        if ($facultyId && $postId) {
           
                // Update the status of the post to 2
                $stmt1 = $pdo->prepare("UPDATE project_applications SET status = '2' WHERE post_id = :post_id and faculty_id = :faculty_id");
                $stmt1->execute([':post_id' => $postId,
                    ':faculty_id' => $facultyId]);

                echo json_encode(['success' => true, 'message' => 'Record inserted successfully']);
            
        } else {
            echo json_encode(['success' => false, 'error' => 'Missing parameters']);
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        echo json_encode(['success' => false, 'error' => 'Database error']);
    }
}
?>

