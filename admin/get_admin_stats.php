<?php
require_once '../config/database.php'; // Ensure database connection is included

try {
    // Count total administrators
    $stmt = $pdo->prepare("SELECT COUNT(*) AS admin_count FROM admins");
    $stmt->execute();
    $adminResult = $stmt->fetch(PDO::FETCH_ASSOC);
    $admin_count = $adminResult['admin_count'];

    // Count total users (including admins)
    $stmt2 = $pdo->prepare("SELECT COUNT(*) AS total_users FROM admins");
    $stmt2->execute();
    $totalResult = $stmt2->fetch(PDO::FETCH_ASSOC);
    $total_users = $totalResult['total_users'];

    // Calculate admin percentage
    // $admin_percentage = ($total_users > 0) ? round(($admin_count / $total_users) * 100, 2) : 0;
    
    if ($total_users > 0) {
        $admin_percentage = round(($admin_count / ($admin_count + $total_users)) * 100, 2);
    } else {
        $faculty_percentage = 0;
    }

    echo json_encode([
        'success' => true,
        'admin_count' => $admin_count,
        'admin_percentage' => $admin_percentage
    ]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>