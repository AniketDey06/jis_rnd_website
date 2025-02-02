<?php

require_once '../config/database.php';

$srch = '';
$scr_data = '';
$output = "";

// Check if input is provided for search filter
if (isset($_POST['inputvalue'])) {
    $scr_data = $_POST['inputvalue'];
    $srch = "AND title LIKE '%$scr_data%'"; // Correctly append condition for search
}


// try {
//     // Query to fetch posts where status = '0' (New posts)
//     $stmt1 = $pdo->prepare("SELECT * FROM posts WHERE status = '0' $srch");
//     $stmt1->execute();
//     $numrow = $stmt1->rowCount();

//     // Initialize output variable
//     $output = '';

//     // If there are posts
//     if ($numrow > 0) {

//         // Query to check project applications for faculty
//         $stmt = $pdo->prepare("SELECT * FROM project_applications WHERE faculty_id = :faculty_id and status = '1'");
//         $stmt->execute([ ':faculty_id' => $_SESSION['faculty_id'] ]);
//         $numrow1 = $stmt->rowCount();

//         // Check if there are no project applications with status '1'
//         if ($numrow1 == 0) {
//             while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
//                 $output .= '<tr class="border-b :border-gray-700">
//                                             <th scope="row"
//                                                 class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap :text-white">
//                                                 ' . $row['post_id'] . '
//                                             </th>
//                                             <td class="px-4 py-3">' . $row['title'] . '</td>
//                                             <td class="px-4 py-3">' . $row['domain'] . '</td>
//                                             <td class="px-4 py-3 ">
//                                                 ' . $row['description'] . '
//                                             </td>
//                                             <td class="px-4 py-3 ">
//                                                 <a data-modal-target="static-modal" data-modal-toggle="static-modal"
//                                                     href="../forms/' . $row['file_path'] . '"
//                                                     class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-green-600 :hover:bg-green-700 :focus:ring-green-800"
//                                                     type="button">
//                                                     <!-- View Applications -->
//                                                     <i class="fa-solid fa-arrow-up-right-from-square"></i>
//                                                 </a>
//                                             </td>


//                                             <td class="px-4 py-3 ">

//                                                 <!-- Modal toggle -->
//                                                 <button data-modal-target="static-modal" data-modal-toggle="static-modal" onclick="toggleModal()"
//                                                     class="crud focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-green-600 :hover:bg-green-700 :focus:ring-green-800"
//                                                     type="button">
//                                                     Apply

//                                                 </button>

//                                                 <!-- Main modal -->
//                                                 <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
//                                                     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
//                                                     <div class="relative m-auto p-4 w-full max-w-2xl max-h-full">
//                                                         <!-- Modal content -->
//                                                         <div class="relative bg-white rounded-lg shadow :bg-gray-700">
//                                                             <!-- Modal header -->
//                                                             <div
//                                                                 class="flex items-center justify-between p-4 md:p-5 border-b rounded-t :border-gray-600">
//                                                                 <div class="flex flex-col">

//                                                                     <h3 class="text-xl font-semibold text-gray-900 :text-white">
//                                                                         Upload your Proof of consept
//                                                                     </h3>

//                                                                     <h3 class="text-xs font-semibold text-gray-900 :text-white">
//                                                                         (On the basis of this project will be allocated)
//                                                                 </div>
//                                                                 </h3>

//                                                                 <button type="button" onclick="toggleModal()"
//                                                                     class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center :hover:bg-gray-600 :hover:text-white"
//                                                                     data-modal-hide="static-modal">
//                                                                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
//                                                                         fill="none" viewBox="0 0 14 14">
//                                                                         <path stroke="currentColor" stroke-linecap="round"
//                                                                             stroke-linejoin="round" stroke-width="2"
//                                                                             d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
//                                                                     </svg>
//                                                                     <span class="sr-only">Close modal</span>
//                                                                 </button>
//                                                             </div>
//                                                             <!-- Modal body -->
//                                                             <div class="p-4 md:p-5 flex-wrap">

//                                                                 <form id="postForm" method="POST" enctype="multipart/form-data">
//                                                                     <input type="hidden" name="post_id" value=' . $row['post_id'] . '>
//                                                                     <input
//                                                                         class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  :text-gray-400 focus:outline-none  :bg-gray-700  :border-gray-600  :placeholder-gray-400"
//                                                                         aria-describedby="file_input_help" id="file_input" name="file"
//                                                                         type="file">


//                                                             </div>
//                                                             <!-- Modal footer -->
//                                                             <div
//                                                                 class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b :border-gray-600">
//                                                                 <button type="submit" onclick="submitForm(' . $row['post_id'] . ')"
//                                                                     class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center :bg-blue-600 :hover:bg-blue-700 :focus:ring-blue-800">Submit</button>
//                                                                 <button data-modal-hide="static-modal" type="button" onclick="toggleModal()"
//                                                                     class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 :focus:ring-gray-700 :bg-gray-800 :text-gray-400 :border-gray-600 :hover:text-white :hover:bg-gray-700">Back</button>
//                                                             </div>
//                                                             </form>
//                                                         </div>

//                                                     </div>
//                                                 </div>


//                                             </td>
//                                         </tr>';
//             }
//             echo $output; // Output the table rows
//         } else {
//             $output .= '<tr><td colspan="6" class="text-center py-3">No project applications found.</td></tr>';
//             echo $output;
//         }
//     } else {
//         $output .= '<tr><td colspan="6" class="text-center py-3">No records found.</td></tr>';
//         echo $output;
//     }
// } catch (PDOException $e) {
//     echo '<tr><td colspan="6" class="text-center py-3 text-red-500">Error: ' . $e->getMessage() . '</td></tr>';
// }



try {
    // First, fetch posts where status = '0'
    $stmt1 = $pdo->prepare("SELECT * FROM posts WHERE status = '0' $srch");
    $stmt1->execute();
    $numrow = $stmt1->rowCount();

    // Initialize output variable
    $output = '';

    // If there are posts (numrow > 0)
    if ($numrow > 0) {
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
            // For each post, check if the faculty has already applied with status = 1
            $post_id = $row['post_id'];
            $faculty_id = $_SESSION['faculty_id'];

            // Check if the faculty has already applied to this post
            $stmt2 = $pdo->prepare("SELECT * FROM project_applications WHERE faculty_id = :faculty_id AND post_id = :post_id AND status = '1'");
            $stmt2->execute([':faculty_id' => $faculty_id, ':post_id' => $post_id]);
            $numrow2 = $stmt2->rowCount();

            // Only display the post if no application with status '1' exists
            if ($numrow2 == 0) {
                $output .= '<tr class="border-b :border-gray-700">
                                             <th scope="row"
                                                 class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap :text-white">
                                                 ' . htmlspecialchars($row['post_id'], ENT_QUOTES, 'UTF-8') . '
                                             </th>
                                             <td class="px-4 py-3">' . htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') . '</td>
                                             <td class="px-4 py-3">' . htmlspecialchars($row['domain'], ENT_QUOTES, 'UTF-8') . '</td>
                                             <td class="px-4 py-3 ">' . htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8') . '</td>
                                             <td class="px-4 py-3 ">
                                                 <a data-modal-target="static-modal" data-modal-toggle="static-modal"
                                                     href="../forms/' . htmlspecialchars($row['file_path'], ENT_QUOTES, 'UTF-8') . '"
                                                     class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-green-600 :hover:bg-green-700 :focus:ring-green-800"
                                                     >
                                                     <!-- View Applications -->
                                                     <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                 </a>
                                             </td>    
                                             <td class="px-4 py-3 ">  
                                                 <!-- Modal toggle -->
                                                 <button data-modal-target="static-modal" data-modal-toggle="static-modal" onclick="toggleModal()"
                                                     class="crud focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-green-600 :hover:bg-green-700 :focus:ring-green-800"
                                                     type="button">
                                                     Apply  
                                                 </button>  
                                                 <!-- Main modal -->
                                                 <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                                                     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                     <div class="relative m-auto p-4 w-full max-w-2xl max-h-full">
                                                         <!-- Modal content -->
                                                         <div class="relative bg-white rounded-lg shadow :bg-gray-700">
                                                             <!-- Modal header -->
                                                             <div
                                                                 class="flex items-center justify-between p-4 md:p-5 border-b rounded-t :border-gray-600">
                                                                 <div class="flex flex-col">  
                                                                     <h3 class="text-xl font-semibold text-gray-900 :text-white">
                                                                         Upload your Proof of consept
                                                                     </h3>  
                                                                     <h3 class="text-xs font-semibold text-gray-900 :text-white">
                                                                         (On the basis of this project will be allocated)
                                                                 </div>
                                                                 </h3>  
                                                                 <button type="button" onclick="toggleModal()"
                                                                     class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center :hover:bg-gray-600 :hover:text-white"
                                                                     data-modal-hide="static-modal">
                                                                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                         fill="none" viewBox="0 0 14 14">
                                                                         <path stroke="currentColor" stroke-linecap="round"
                                                                             stroke-linejoin="round" stroke-width="2"
                                                                             d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                     </svg>
                                                                     <span class="sr-only">Close modal</span>
                                                                 </button>
                                                             </div>
                                                             <!-- Modal body -->
                                                             <div class="p-4 md:p-5 flex-wrap">  
                                                                 <form id="postForm" method="POST" enctype="multipart/form-data">
                                                                     <input type="hidden" name="post_id" value=' . $post_id . '>
                                                                     <input
                                                                         class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  :text-gray-400 focus:outline-none  :bg-gray-700  :border-gray-600  :placeholder-gray-400"
                                                                         aria-describedby="file_input_help" id="file_input" name="file"
                                                                         type="file">    
                                                             </div>
                                                             <!-- Modal footer -->
                                                             <div
                                                                 class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b :border-gray-600">
                                                                 <button type="submit" onclick="submitForm(' . $post_id . ')"
                                                                     class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center :bg-blue-600 :hover:bg-blue-700 :focus:ring-blue-800">Submit</button>
                                                                 <button data-modal-hide="static-modal" type="button" onclick="toggleModal()"
                                                                     class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 :focus:ring-gray-700 :bg-gray-800 :text-gray-400 :border-gray-600 :hover:text-white :hover:bg-gray-700">Back</button>
                                                             </div>
                                                             </form>
                                                         </div>  
                                                     </div>
                                                 </div>                                                
                                             </td>
                                         </tr>';
            }
        }
        echo $output; // Output the table rows
    } else {
        $output .= '<tr><td colspan="6" class="text-center py-3">No records found.</td></tr>';
        echo $output;
    }
} catch (PDOException $e) {
    echo '<tr><td colspan="6" class="text-center py-3 text-red-500">Error: ' . $e->getMessage() . '</td></tr>';
}




?>