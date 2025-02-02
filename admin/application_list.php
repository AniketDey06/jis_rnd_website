<?php
require_once '../utils/admin_auth.php';


require_once '../config/database.php';
try {

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $postId = $_GET['post_id'];
        // echo $postId;
        $stmt = $pdo->prepare("SELECT * FROM project_applications where post_id = :post_id and status = '1'");
        $stmt->execute(
            [
                ':post_id' => $postId
            ]
        );
        $project = $stmt->fetchAll();
        // var_dump($project);
        if ($project) {

            //loop
            foreach ($project as $projects) {
                // echo $projects['faculty_id'];
                $stmt = $pdo->prepare("SELECT * FROM faculty_info WHERE faculty_id = :faculty_id");
                $stmt->execute(
                    [
                        ':faculty_id' => $projects['faculty_id'],
                    ]
                );
                $facultyData = $stmt->fetchAll();
                if ($facultyData) {
                    $faculties[] = array_merge($projects, $facultyData); // Merge faculty + project data
                }
                // var_dump($facultyData);

            }
            // print_r($facultyData);
        }
        $stmt1 = $pdo->prepare("SELECT title FROM posts WHERE post_id = :post_id");
        $stmt1->execute(
            [
                ':post_id' => $postId
            ]
        );
        $posts = $stmt1->fetchAll();
        // var_dump($posts);
    }
} catch (PDOException $e) {
    // Log and handle query errors
    error_log($e->getMessage());
    die("Failed to fetch data. Please try again later.");
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Apply List</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
        nav img {
            height: 60px;
        }

        .title-box {
            border-bottom: 2px solid rgb(0, 0, 0);
            font-size: 30px;
            font-weight: 600;
        }
    </style>
</head>

<body>


    <nav class=" border-gray-200 :bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <!-- <span class="self-center text-2xl font-semibold whitespace-nowrap :text-white">JIS</span> -->
                <img src="unnamed.png" alt="">
            </a>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 :focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow :bg-gray-700 :divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 :text-white">Bonnie Green</span>
                        <span class="block text-sm  text-gray-500 truncate :text-gray-400">name@flowbite.com</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 :hover:bg-gray-600 :text-gray-200 :hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 :hover:bg-gray-600 :text-gray-200 :hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 :hover:bg-gray-600 :text-gray-200 :hover:text-white">Earnings</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 :hover:bg-gray-600 :text-gray-200 :hover:text-white">Sign
                                out</a>
                        </li>
                    </ul>
                </div>

                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 :text-gray-400 :hover:bg-gray-700 :focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white :bg-gray-800 md::bg-gray-900 :border-gray-700">

                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 :text-white md::hover:text-blue-500 :hover:bg-gray-700 :hover:text-white md::hover:bg-transparent :border-gray-700">Admin
                            Dashboard</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 :text-white md::hover:text-blue-500 :hover:bg-gray-700 :hover:text-white md::hover:bg-transparent :border-gray-700">Admin
                            Dashboard</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>



    <section class="h-screen bg-[#E5E7EB] :bg-gray-900 p-3 sm:p-5 ">
        <div class="h-full mx-auto max-w-screen-xl px-4 lg:px-12 ">
            <!-- Start coding here -->

            <div class="bg-white :bg-gray-800 relative shadow-md sm:rounded-lg ">

                <!-- Search, tools etc... -->
                <div
                    class=" flex flex-col md:flex-row items-center justify-center space-y-3 md:space-y-0 md:space-x-4 p-4">

                    <h1 class="title-box  "><?= htmlspecialchars($posts[0]['title'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>
                    </h1>

                </div>

                <!-- Search, tools etc... -->
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 :text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-primary-500 :focus:border-primary-500"
                                    placeholder="Search" required="">
                            </div>
                        </form>
                    </div>

                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">


                        <div class="flex items-center space-x-3 w-full md:w-auto">

                            <button type="button" id="deleteBtn"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2  :bg-red-600 :hover:bg-red-700 :focus:ring-red-900">
                                Delete All
                            </button>

                            <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 :focus:ring-gray-700 :bg-gray-800 :text-gray-400 :border-gray-600 :hover:text-white :hover:bg-gray-700"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                        clip-rule="evenodd" />
                                </svg>
                                Filter
                                <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>


                            <div id="filterDropdown"
                                class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow :bg-gray-700">
                                <h6 class="mb-3 text-sm font-medium text-gray-900 :text-white">Choose brand</h6>
                                <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                    <li class="flex items-center">
                                        <input id="apple" type="checkbox" value=""
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 :focus:ring-primary-600 :ring-offset-gray-700 focus:ring-2 :bg-gray-600 :border-gray-500">
                                        <label for="apple"
                                            class="ml-2 text-sm font-medium text-gray-900 :text-gray-100">Apple
                                            (56)</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="fitbit" type="checkbox" value=""
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 :focus:ring-primary-600 :ring-offset-gray-700 focus:ring-2 :bg-gray-600 :border-gray-500">
                                        <label for="fitbit"
                                            class="ml-2 text-sm font-medium text-gray-900 :text-gray-100">Microsoft
                                            (16)</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="razor" type="checkbox" value=""
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 :focus:ring-primary-600 :ring-offset-gray-700 focus:ring-2 :bg-gray-600 :border-gray-500">
                                        <label for="razor"
                                            class="ml-2 text-sm font-medium text-gray-900 :text-gray-100">Razor
                                            (49)</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="nikon" type="checkbox" value=""
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 :focus:ring-primary-600 :ring-offset-gray-700 focus:ring-2 :bg-gray-600 :border-gray-500">
                                        <label for="nikon"
                                            class="ml-2 text-sm font-medium text-gray-900 :text-gray-100">Nikon
                                            (12)</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="benq" type="checkbox" value=""
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 :focus:ring-primary-600 :ring-offset-gray-700 focus:ring-2 :bg-gray-600 :border-gray-500">
                                        <label for="benq"
                                            class="ml-2 text-sm font-medium text-gray-900 :text-gray-100">BenQ
                                            (74)</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- table -->
                <div class="overflow-x-auto">

                    <!-- main Table -->
                    <table class="w-full text-sm text-left text-gray-500 :text-gray-400">
                        <!-- Table hade -->
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 :bg-gray-700 :text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Faculty ID</th>
                                <th scope="col" class="px-4 py-3">Faculty Name</th>
                                <th scope="col" class="px-4 py-3">Institute</th>
                                <th scope="col" class="px-4 py-3">Deptment</th>
                                <th scope="col" class="px-4 py-3">Proof Of Consept(POC)</th>
                                <th scope="col" class="px-4 py-3 ">
                                    Actions
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>

                        <!-- Table Data -->
                        <tbody>
                            <?php if (!empty($faculties)): ?>
                                <?php foreach ($faculties as $faculty): ?>

                                    <tr class="border-b :border-gray-700">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap :text-white">
                                            <?= htmlspecialchars($faculty['faculty_id'], ENT_QUOTES, 'UTF-8') ?>
                                        </th>
                                        <td class="px-4 py-3">
                                            <?= htmlspecialchars($faculty[0]['name'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>
                                        </td>
                                        <td class="px-4 py-3">
                                            <?= htmlspecialchars($faculty[0]['institute'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>
                                        </td>
                                        <td class="px-4 py-3">
                                            <?= htmlspecialchars($faculty[0]['department'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>
                                        </td>


                                        <td class="px-4 py-3">
                                            <a href="../forms/<?= htmlspecialchars($faculty['poc'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>"
                                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-green-600 :hover:bg-green-700 :focus:ring-green-800"
                                                type="button">
                                                <!-- View Applications -->
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                            </a>
                                        </td>

                                        <!-- <td class="px-4 py-3">9679812051</td> -->
                                        <td class="px-4 py-3 ">

                                            <!-- Modal toggle -->
                                            <button
                                                onclick="updateStatus('<?= htmlspecialchars($faculty['faculty_id'], ENT_QUOTES, 'UTF-8') ?>', <?= htmlspecialchars($postId ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>)"
                                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-green-600 :hover:bg-green-700 :focus:ring-green-800"
                                                type="button">
                                                Accept
                                            </button>

                                            <button type="button" onclick="app_rej('<?= htmlspecialchars($faculty['faculty_id'], ENT_QUOTES, 'UTF-8') ?>')"
                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-red-600 :hover:bg-red-700 :focus:ring-red-900">Reject</button>



                                            <!-- Main modal -->


                                        </td>

                                    </tr>


                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td class="border-b :border-gray-700 px-4 py-3">No applications found</td>
                                </tr>

                            <?php endif; ?>






                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </section>





    <script>


        if (document.getElementById("default-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#default-table", {
                searchable: false,
                perPageSelect: false
            });
        }


    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function updateStatus(facultyId, postId) {
            if (confirm("Are you sure you want to accept this application?")) {
                fetch('update_status.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'faculty_id=' + encodeURIComponent(facultyId) +
                        '&post_id=' + encodeURIComponent(postId)
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("Status updated successfully!");
                            location.reload(); // Reload to reflect changes
                        } else {
                            alert("Failed to update status.");
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }



        document.getElementById('deleteBtn').addEventListener('click', function () {
            if (confirm("Are you sure you want to delete all data with status 1?")) {
                // Make an AJAX request to the backend to delete the data
                fetch('../utils/delete_data.php', {
                    method: 'POST',
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("All data with status 1 deleted successfully.");
                        } else {
                            alert("Failed to delete data.");
                        }
                    })
                    .catch(error => alert("An error occurred."));
            }
        });

        function app_rej(faculty_id) {

            if (confirm('Are You Sure ?') == true) {

                // formData.append('_s', st);
                //Update Status
                $.ajax({
                    type: "POST",
                    url: "../utils/delete_one_data.php",
                    data: { faculty_id: faculty_id },
                    success: function (response) {
                        //data000 == json response
                        if (response == 'success') {
                            alert('Data deleted successfully!');
                            location.reload();
                        }
                    },
                    error: function () {
                        alert('An error occurred while processing your request.');
                    }
                });
            }
        }


    </script>

</body>

</html>