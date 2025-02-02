<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>


    <title>New Password</title>
</head>

<body>
    <div class="min-h-screen bg-gray-100 flex items-center justify-around p-4 pl-20 pr-20">
       
        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Set New Password</h2>

            <form class="space-y-4" id="passwordForm">
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                        placeholder="••••••••" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <input type="password" id="confirmPassword"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                        placeholder="••••••••" />
                </div>



                
                <button
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg transition-colors">
                    Submit
                </button>
            </form>

            <p id="statusMessage" class="mt-4 text-center text-sm"></p>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#passwordForm').on('submit', function (event) {
                event.preventDefault(); // Prevent default form submission

                const password = $('#password').val();
                const confirmPassword = $('#confirmPassword').val();

                $.ajax({
                    url: '../utils/change_password.php', // The same PHP script
                    type: 'POST',
                    data: { password: password, confirm_password: confirmPassword },
                    dataType: 'json',
                    success: function (response) {
                        const statusMessage = $('#statusMessage');
                        if (response.success) {
                            statusMessage.text(response.message).css('color', 'green');
                            setTimeout(() => {
                                window.location.href = 'login.php';
                            }, 1000);
                        } else {
                            statusMessage.text(response.message).css('color', 'red');
                        }
                    },
                    error: function () {
                        $('#statusMessage').text('An error occurred. Please try again.').css('color', 'red');
                    }
                });
            });
        });
    </script>
</body>

</html>