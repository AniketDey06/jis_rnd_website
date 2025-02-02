<?php
// filepath: /C:/laragon/www/R&D website/template/otp.php
$email = isset($_GET['email']) ? $_GET['email'] : '';


?>

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


    <title>OTP</title>

</head>

<body>
    <!-- component -->


    <div class="min-h-screen bg-gray-100 flex items-center justify-around p-4 pl-20 pr-20">

        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
            <div class="flex  flex-col text-sm font-medium text-gray-400 mb-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-2 text-center">Verify OTP</h2>
                <p class="">We have sent a code to your email <?php echo htmlspecialchars($email); ?></p>
                <input type="text" id="email" value="<?php echo htmlspecialchars($email); ?>" hidden>
            </div>

            <form class="space-y-4" id="otpForm">




                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">OTP</label>
                    <input type="text" id="otp"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                        placeholder="123456" />
                </div>

                <button
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg transition-colors">

                    Verify OTP

                </button>
            </form>
            <p id="statusMessage"></p>

            <div class="mt-6 text-center text-sm text-gray-600">
                Didn't recieve code?
                <a href="" class="text-indigo-600 hover:text-indigo-500 font-medium" id="resendOtp">Resend </a>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $(document).ready(function () {
            $('#otpForm').on('submit', function (event) {
                event.preventDefault(); // Prevent default form submission

                const otp = $('#otp').val();
                

                $.ajax({
                    url: '../utils/verify_otp.php', // Backend script to verify OTP
                    type: 'POST',
                    data: { otp: otp },

                    success: function (response) {
                        if (response.success) {
                            window.location.href = 'new_password.php'; // Redirect on success
                        } else {
                            $('#statusMessage').text(response.message).css('color', 'red');
                        }
                    },
                    error: function () {
                        $('#statusMessage').text('Error verifying OTP.').css('color', 'red');
                    }
                });
            });
        });


        $(document).ready(function () {
            $('#resendOtp').on('click', function (event) {
                event.preventDefault(); // Prevent default link behavior

                const email = $('#email').val();
                // console.log(email);

                $.ajax({
                    url: '../utils/resend_otp.php', // Endpoint for resending OTP
                    type: 'POST',
                    data: { email: email },

                    success: function (response) {
                        if (response.success) {
                            $('#statusMessage').text(response.message).css('color', 'green');
                        } else {
                            $('#statusMessage').text(response.message).css('color', 'red');
                        }
                    },
                    error: function () {
                        $('#statusMessage').text('Error resending OTP. Please try again.').css('color', 'red');
                    }
                });
            });
        });




    </script>
</body>

</html>