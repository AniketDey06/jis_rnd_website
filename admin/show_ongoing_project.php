<?php

require_once '../config/database.php';

$srch = '';
$scr_data = '';
$output = "";

if (isset($_POST['inputvalue'])) {
    $scr_data = $_POST['inputvalue'];
    $srch .= "AND title like '%$scr_data%'";
}

try {
    // check project_application table status = 1
    $stmt1 = $pdo->prepare("SELECT * FROM project_applications WHERE status = '2'");
    // $stmt1->bindParam(':faculty_id', $_SESSION['faculty_id'], PDO::PARAM_STR);
    $stmt1->execute();
    $data = $stmt1->fetch(PDO::FETCH_ASSOC);
    $numrow1 = $stmt1->rowCount();

    if ($numrow1) {

        while ($data = $stmt1->fetch(PDO::FETCH_ASSOC)) {

            // check project_application table status = 1
            $stmt1 = $pdo->prepare("SELECT * FROM project_allocation WHERE post_id=:post_id and com_status = '1'");
            $post_id = $data['post_id'];
            // echo $post_id;
            $stmt1->execute([
                ':post_id' => $post_id
            ]);
            $numrow12 = $stmt1->rowCount();

            if (!$numrow12) {

                $stmt2 = $pdo->prepare("SELECT * FROM faculty_info WHERE faculty_id = :faculty_id");
                $stmt2->execute([
                    ":faculty_id" => $data['faculty_id']
                ]);
                $data2 = $stmt2->fetch(PDO::FETCH_ASSOC);

                $stmt = $pdo->prepare("SELECT * FROM posts WHERE post_id = :post_id $srch");
                $stmt->execute([
                    ':post_id' => $post_id
                ]);
                $numrow = $stmt->rowCount();
                $status = 'approved';

                // var_dump($posts);

                if ($numrow > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        //echo '<pre>';
                        //print_r($row); 
                        $output .= '
                                 <tr class="border-b :border-gray-700">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap :text-white">
                                        ' . $row['post_id'] . '
                                    </th>
                                    <td class="px-4 py-3">' . $row['title'] . '</td>
                                    <td class="px-4 py-3">' . $row['domain'] . '</td>
                                    <!-- <td class="px-4 py-3">JIS/NIT/6969</td> -->
                                    <td class="px-4 py-3">
                                        ' . $data2['faculty_id'] . '
                                    </td>
                                    <td class="px-4 py-3">
                                        ' . $data2['name'] . '
                                    </td>
                                    <td class="px-4 py-3">' . $data2['institute'] . '</td>
                                    
                                    <td class="px-4 py-3 ">
    
                                       <a href="progress_reports.php?post_id=' . $row['post_id'] . '&faculty_id=' . $data2['faculty_id'] . '">
                                        <button 
                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-green-600 :hover:bg-green-700 :focus:ring-green-800"
                                            type="button">
                                            
                                                View Progress Report
                                            
                                            <!-- <i class="fa-solid fa-arrow-up-right-from-square"></i> -->
                                        </button>
                                    </a>
                                        
                                        
                                    </td>
                                </tr>
                ';
                    }
                    echo $output;
                } else {
                    $output .= '<tr><td class="px-4 py-3 ">
    
                                        no record found
                                        
                                        
                                    </td></tr>';
                    echo $output;

                }
            } else {
                $output .= '<tr><td class="px-4 py-3 ">
    
                                        You are completed
                                        
                                        
                                    </td></tr>';
                echo $output;
            }
        }
    } else {
        $output .= '<tr><td class="px-4 py-3 ">
    
            no record found
        
        
        </td></tr>';
        echo $output;

    }

} catch (PDOException $e) {
    // Log and handle query errors
    echo $e->getMessage();
    die("Failed to fetch data. Please try again later.");
}








?>