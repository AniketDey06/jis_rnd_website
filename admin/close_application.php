<?php
require_once '../config/database.php'; // Ensure database connection is included

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];

    try {
        // Update the status of the post to '1' (Closed)
        $stmt = $pdo->prepare("UPDATE posts SET status = '1' WHERE post_id = :post_id");
        $stmt->execute([':post_id' => $post_id]);

        echo json_encode(['success' => true, 'message' => 'Applications closed successfully!']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
