<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Nest</title>
    <link rel="stylesheet" href="<?=base_url()?>css/styles.css?v=1.0">
    <script src="<?=base_url()?>js/jquery-3.7.1.js"></script>
</head>
<body>
    <script>
        console.log("jQuery version:", jQuery.fn.jquery);
    </script>

    <div>
        <section class="grid grid-cols-12">
            <div id="left" class="col-start-1 col-end-7 w-full bg-gray-300" style="background-image: url('<?=base_url()?>/sl4.webp'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                <div class="grid place-items-center h-screen"></div>
            </div>
            <div id="right" class="flex items-center justify-center col-start-7 col-end-13 bg-white">
                <div id="changeToRegister" class="flex justify-center items-center px-20 min-h-screen min-w-full text-xl">
                    <div class="flex flex-col min-w-full">
                        <div>
                            <form class="mx-auto w-2/3" id="loginForm">
                                <div class="text-3xl flex justify-center">Login Here</div>
                                <div class="flex">
                                    <input class="w-full flex-1 p-3 mt-8 border-t-0 border-r-0 border-l-0 border-b-2 border-gray-400 placeholder-gray-600 text-lg font-normal rounded-t-lg" type="text" id="username" name="username" placeholder="User Name" />
                                </div>
                                <div class="flex">
                                    <input class="w-full flex-1 p-3 mt-8 border-t-0 border-r-0 border-l-0 border-b-2 border-gray-400 placeholder-gray-600 text-lg font-normal rounded-t-lg" type="password" id="password" name="password" placeholder="Password" />
                                </div>
                            </form>
                            <div class="flex justify-center">
                                <button id="loginButton" class="w-full flex justify-center items-center rounded-lg bg-purple-600 hover:bg-green-700 mt-12 py-2 font-bold text-white">Login</button>
                            </div>
                        </div>
                        <div>
                            <div class="text-xl mt-6 flex flex-col justify-center items-center space-y-3">
                                <div id="errorMessage"></div>
                                <p id="showforget" class="text-lg cursor-pointer">Forget your Password?</p>
                                <p id="register" class="text-lg cursor-pointer">Register User</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            function showRegisterForm() {
                $('#changeToRegister').fadeOut(500, function() {
                    $('#changeToRegister').html(`
                        <div class="flex justify-center items-center min-h-screen min-w-full text-xl">
                            <div class="flex flex-col min-w-full">
                                <div>
                                    <form class="mx-auto w-full" id="registerForm">
                                        <div class="text-3xl flex justify-center mb-8">Register</div>
                                        <div class="grid grid-cols-2 gap-6">
                                            <div class="flex flex-col">
                                                <input class="w-full p-3 border-t-0 border-r-0 border-l-0 border-b-2 border-gray-400 placeholder-gray-600 text-lg font-normal rounded-t-lg" type="text" id="reg_username" name="username" placeholder="User Name" />
                                            </div>
                                            <div class="flex flex-col">
                                                <input class="w-full p-3 border-t-0 border-r-0 border-l-0 border-b-2 border-gray-400 placeholder-gray-600 text-lg font-normal rounded-t-lg" type="email" id="reg_email" name="email" placeholder="Email" />
                                            </div>
                                            <div class="flex flex-col">
                                                <input class="w-full p-3 border-t-0 border-r-0 border-l-0 border-b-2 border-gray-400 placeholder-gray-600 text-lg font-normal rounded-t-lg" type="password" id="reg_password" name="password" placeholder="Password" />
                                            </div>
                                        </div>
                                    </form>
                                    <div class="flex justify-center">
                                        <button id="submitRegister" type="button" class="w-1/2 flex justify-center items-center rounded-lg bg-purple-600 hover:bg-green-700 mt-12 py-2 font-bold text-white">Register</button>
                                    </div>
                                    <div class="flex justify-center mt-6">
                                        <p id="backToLogin" class="text-lg cursor-pointer">Back To Login</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `).fadeIn(500, function() {
                        $('#backToLogin').on('click', function() {
                            showLoginForm();
                        });

                        $('#submitRegister').click(function(event) {
                            event.preventDefault();
                            $(this).prop('disabled', true);
                            var registerData = $('#registerForm').serialize();
                            if (registerValidation()) {
                                $.ajax({
                                    type: 'POST',
                                    url: '<?= base_url('auth/register') ?>',
                                    data: registerData,
                                    dataType: 'json',
                                    success: function(response) {
                                        if (response.success) {
                                            window.location.href = '<?= base_url('login') ?>';
                                        } else {
                                            $('#errorMessage').text(response.error).addClass('text-red-500').slideDown();
                                            setTimeout(function() {
                                                $('#errorMessage').slideUp();
                                            }, 3000);
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        $('#errorMessage').text("Registration failed. Please try again later.")
                                                        .addClass('text-red-500')
                                                        .slideDown();
                                        console.error('Error:', error);
                                        setTimeout(function() {
                                            $('#errorMessage').slideUp();
                                        }, 3000);
                                    },
                                    complete: function() {
                                        $('#submitRegister').prop('disabled', false);
                                    }
                                });
                            } else {
                                $('#submitRegister').prop('disabled', false);
                            }
                        });
                    });
                });
            }

            function showLoginForm() {
                $('#changeToRegister').fadeOut(500, function() {
                    $('#changeToRegister').html(`
                        <div class="flex justify-center items-center px-20 min-h-screen min-w-full text-xl">
                            <div class="flex flex-col min-w-full">
                                <div>
                                    <form class="mx-auto w-2/3" id="loginForm">
                                        <div class="text-3xl flex justify-center">Login Here</div>
                                        <div class="flex">
                                            <input class="w-full flex-1 p-3 mt-8 border-t-0 border-r-0 border-l-0 border-b-2 border-gray-400 placeholder-gray-600 text-lg font-normal rounded-t-lg" type="text" id="username" name="username" placeholder="User Name" />
                                        </div>
                                        <div class="flex">
                                            <input class="w-full flex-1 p-3 mt-8 border-t-0 border-r-0 border-l-0 border-b-2 border-gray-400 placeholder-gray-600 text-lg font-normal rounded-t-lg" type="password" id="password" name="password" placeholder="Password" />
                                        </div>
                                        <div class="flex justify-center">
                                            <button id="loginButton" class="w-full flex justify-center items-center rounded-lg bg-purple-600 hover:bg-green-700 mt-12 py-2 font-bold text-white" type="button">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="text-xl mt-6 flex flex-col justify-center items-center space-y-3">
                                    <div id="errorMessage"></div>
                                    <p id="showforget" class="text-lg cursor-pointer">Forget your Password?</p>
                                    <p id="register" class="text-lg cursor-pointer">Register User</p>
                                </div>
                            </div>
                        </div>
                    `).fadeIn(500, function() {
                        $('#register').on('click', function() {
                            showRegisterForm();
                        });
                        $('#showforget').on('click', function() {
                            showForgetForm();
                        });

                        // Attach event listener to the login button after rendering the form
                        $('#loginButton').on('click', function(event) {
                            event.preventDefault();
                            $(this).prop('disabled', true);

                            var loginData = $('#loginForm').serialize();

                            $.ajax({
                                type: 'POST',
                                url: '<?= base_url('auth/login') ?>',
                                data: loginData,
                                dataType: 'json',
                                success: function(response) {
                                    if (response.success) {
                                        window.location.href = '<?= base_url('dashboard') ?>';
                                    } else {
                                        $('#errorMessage').text(response.error).addClass('text-red-500').slideDown();
                                        setTimeout(function() {
                                            $('#errorMessage').slideUp();
                                        }, 3000);
                                    }
                                },
                                error: function(xhr, status, error) {
                                    $('#errorMessage').text("Login failed. Please try again later.")
                                                    .addClass('text-red-500')
                                                    .slideDown();
                                    console.error('Error:', error);
                                    setTimeout(function() {
                                        $('#errorMessage').slideUp();
                                    }, 3000);
                                },
                                complete: function() {
                                    $('#loginButton').prop('disabled', false);
                                }
                            });
                        });
                    });
                });
            }

            function showForgetForm() {
                $('#changeToRegister').fadeOut(500, function() {
                    $('#changeToRegister').html(`
                        <div class="flex justify-center items-center px-20 min-h-screen min-w-full text-xl">
                            <div class="flex flex-col min-w-full">
                                <div>
                                    <form class="mx-auto w-2/3" id="forgetForm">
                                        <div class="text-3xl flex justify-center">Forget Password</div>
                                        <div class="flex">
                                            <input class="w-full flex-1 p-3 mt-8 border-t-0 border-r-0 border-l-0 border-b-2 border-gray-400 placeholder-gray-600 text-lg font-normal rounded-t-lg" type="email" id="forget_email" name="email" placeholder="Email" />
                                        </div>
                                    </form>
                                    <div class="flex justify-center">
                                        <button class="w-full flex justify-center items-center rounded-lg bg-purple-600 hover:bg-green-700 mt-12 py-2 font-bold text-white" type="button">Reset Password</button>
                                    </div>
                                    <div class="flex justify-center mt-6">
                                        <p id="backToLogin" class="text-lg cursor-pointer">Back To Login</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `).fadeIn(500, function() {
                        $('#backToLogin').on('click', function() {
                            showLoginForm();
                        });
                    });
                });
            }

            $('#register').on('click', function() {
                showRegisterForm();
            });

            $('#showforget').on('click', function() {
                showForgetForm();
            });
        });
    </script>
</body>
</html>
