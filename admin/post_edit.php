<?php
require_once '../utils/admin_auth.php';

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE post_id = :post_id");
    $stmt->execute([
        ':post_id' => $post_id
    ]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // print_r($row);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">

    <title>Post</title>

    <style>
        body {
            background: white !important;
        }

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
        <div class="mx-auto w-1/2 px-4 lg:px-12">
            <div class="bg-white :bg-gray-800 relative shadow-md sm:rounded-lg">
                <div
                    class="flex flex-col md:flex-row items-center justify-center space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <h1 class="title-box">Post new Research Paper/Project opening</h1>
                </div>

                <!-- Form for Posting -->
                <form id="postForm" class="mb-6 editor mx-auto flex flex-col text-gray-800 p-4 max-w-5xl"
                    enctype="multipart/form-data">

                    <input type="hidden" name="post_id" value="<?= htmlspecialchars($row['post_id'], ENT_QUOTES, 'UTF-8') ?>">

                    <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 rounded-lg outline-none"
                        name="title" spellcheck="false" placeholder="Title" type="text"
                        value="<?= htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') ?>">
                    <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 rounded-lg outline-none"
                        name="domain" spellcheck="false" placeholder="Domain" type="text"
                        value="<?= htmlspecialchars($row['domain'], ENT_QUOTES, 'UTF-8') ?>">
                    <input
                        class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 :text-gray-400 focus:outline-none :bg-gray-700 :border-gray-600 :placeholder-gray-400"
                        aria-describedby="file_input_help" name="file" id="file_input" type="file"
                        value="<?= htmlspecialchars($row['file_path'], ENT_QUOTES, 'UTF-8') ?>">
                    <p class="mt-1 mb-4 text-sm text-gray-500 :text-gray-300" id="file_input_help">
                        *Upload new project requirement document to update(pdf only) .
                    </p>
                    <textarea
                        class="description mb-4 bg-gray-100 sec p-3 h-60 border rounded-lg border-gray-300 outline-none"
                        name="description" spellcheck="false"
                        placeholder="Describe everything about this post here"><?= htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8') ?></textarea>

                    <!-- Buttons -->
                    <div class="buttons flex">
                        <div
                            class="btn rounded border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">
                            Cancel</div>
                        <div
                            class="btn rounded bg-green-700 hover:bg-green-800 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2">
                            <button type="submit">Post</button>
                        </div>
                    </div>
                </form>
                <div id="responseMessage" class="mt-4 text-center text-sm"></div>
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

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#postForm').on('submit', function (e) {
                e.preventDefault(); // Prevent default form submission

                // Collect form data
                var formData = new FormData(this);

                // Send AJAX POST request
                $.ajax({
                    type: 'POST',
                    url: 'post_edit_submit.php', // The PHP file handling the login
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        var res = JSON.parse(response);
                        if (res.success) {
                            alert(res.message);
                            location.reload(); // Reload page to reflect changes
                        } else {
                            alert("Error: " + res.message);
                        }
                    },
                    error: function () {
                        $('#responseMessage').text('An error occurred. Please try again.').css('color', 'red');
                    },
                });
            });
        });
    </script>

</body>

</html>