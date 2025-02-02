<?php

$host = 'localhost';
$dbname = 'rnd_website';
$user = 'root';   
$password = '';   

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    error_log("Connection failed: " . $e->getMessage());
    die('Database connection error.');
}


try {
    // Fetch maximum 3 posts with status = 0 (newly launched)
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE status = '1' ORDER BY created_at DESC LIMIT 3");
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($posts)) {
        foreach ($posts as $post) {
            echo '
            <div class="card">
                <h3 class="card__title">' . htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8') . '</h3>
                <p class="card__content">' . htmlspecialchars(substr($post['description'], 0, 150), ENT_QUOTES, 'UTF-8') . '...</p>
                
                <div class="card__domain">' . htmlspecialchars($post['domain'], ENT_QUOTES, 'UTF-8') . '</div>
                <div class="card__date">' . date("F j, Y", strtotime($post['created_at'])) . '</div>

                <a class="button" type="button" target = "_blank" href= "R&D%20website/' . htmlspecialchars($post['file_path'], ENT_QUOTES, 'UTF-8') . '">
                    <span class="button__text">Download</span>
                    <span class="button__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" class="svg">
                            <path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path>
                            <path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path>
                            <path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path>
                        </svg>
                    </span>
                </a>

                <a href="template/login.php">
                    <div class="card__arrow">
                        Apply
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                            <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
                        </svg>
                    </div>
                </a>
            </div>';
        }
    } else {
        echo '<p>No projects available.</p>';
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>