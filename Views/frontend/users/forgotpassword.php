<?php
$title = "LOGIN";
$style = '';
include "Views/frontend/partitions/header.php";
?>

<div class="relative">
    <div class="pointer-events-none top-[20px] -z-10 w-full">
        <img class="absolute h-full w-full object-cover" src=<?= IMAGE_URL . "bg_login.png" ?> alt="" />
        <img class="absolute right-0 top-44 w-[1127px]" src=<?= IMAGE_URL . "leaf.png" ?> alt="" />
        <img class="absolute left-1/2 top-44 w-[181px]" src=<?= IMAGE_URL . "cloud.png" ?> alt="" />
        <img class="absolute top-[calc(50%)] right-0 w-[793px]" src=<?= IMAGE_URL . "book.png" ?> alt="" />
        <img class="absolute top-[calc(50%-23.7rem)] right-24 w-[550px]" src=<?= IMAGE_URL . "goat.png" ?> alt="" />
    </div>

    <section class="relative mx-auto flex max-w-[80rem] items-start py-32">
        <div class="flex w-full max-w-[35rem] flex-col items-center gap-8">
            <form action="login.php" method="post"
                class="submit-login flex w-full flex-col gap-4 rounded-xl bg-white p-16 shadow-lg shadow-slate-400">
                <h1 class="text-3xl font-bold pointer-events-none">Forgot Password</h1>
                <p class="mb-3">Enter the email you used to register</p>
                <label class="font-semibold">Your Email</label>
                <div class="flex items-center rounded-lg border border-gray-300 bg-slate-50 p-2">
                    <input class="w-full bg-inherit p-2 outline-none" type="text" name="email"
                        placeholder="Enter your email" />
                    <img class="size-7" src="../../img/user_icon.svg" alt="" />
                </div>

                <label id="verification_label" class="font-semibold hidden">Verification Code</label>
                <div id="verification_div"
                    class="flex items-center rounded-lg border border-gray-300 bg-slate-50 p-2 cursor-pointer relative hidden">
                    <input class="w-full bg-inherit p-2 outline-none" type="text" name="verification_code"
                        placeholder="Enter your verification code" />
                    <button type="button" id="send-verification-code" class="text-sm text-nowrap font-normal">Send
                        Code</button>
                    <span id="countdown" class="text-sm hidden px-3 font-semibold">60</span>
                </div>

                <label id="newpassword_label" class="font-semibold hidden">Your New Password</label>
                <div id="newpassword_div"
                    class="flex items-center rounded-lg border border-gray-300 bg-slate-50 p-2 hidden">
                    <input id="password" class="w-full bg-inherit p-2 outline-none" name="password" type="password"
                        placeholder="Enter your password" />
                    <img id="show-icon" class="size-7" src="../../img/viewshowPass.svg" alt="" />
                </div>
                <button class="rounded-full bg-orange-500 p-4 font-bold text-white" type="submit">
                    SUBMIT
                </button>
            </form>
            <span class="font-bold">Or</span>
            <a href="./login"
                class="mx-16 text-center w-[calc(100%-8rem)] rounded-full bg-lime-500 p-4 font-bold text-white"
                type="submit">
                LOG IN
            </a>
        </div>
    </section>
</div>
<script>
function randomCode() {
    var code = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    for (var i = 0; i < 8; i++) {
        code += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return code;
}

$(document).ready(function() {
    var verificationCode = '';
    document
        .getElementById("show-icon")
        .addEventListener("click", function() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        });

    document.querySelector('.submit-login').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission
        var verification_code = document.querySelector('input[name="verification_code"]').value;
        // If the verification code input is visible, then check email is used register in database
        if (document.getElementById('verification_div').classList.contains('hidden')) {
            // Get form data
            var email = document.querySelector('input[name="email"]').value;

            // Perform data validation or other operations
            $.ajax({
                url: 'existsEmail',
                type: 'POST',
                data: {
                    email: email
                },
                success: function(response) {
                    if (response.status == 1) {
                        document.getElementById('verification_label').classList.remove(
                            'hidden');
                        document.getElementById('verification_div').classList.remove(
                            'hidden');
                    } else {
                        alert('Email is not registered');
                    }
                }
            });
        } else {
            // If the verification code input is visible, then check verification code is correct


            if (document.getElementById('newpassword_div').classList.contains('hidden')) {
                $.ajax({
                    url: '../register/checkVerificationCode',
                    type: 'POST',
                    data: {
                        verificationCode: verificationCode,
                        userVerificationCode: verification_code
                    },
                    success: function(response) {
                        if (response.status == 1) {
                            document.getElementById('newpassword_label').classList.remove(
                                'hidden');
                            document.getElementById('newpassword_div').classList.remove(
                                'hidden');
                            alert(response.message);
                        } else {
                            alert('Verification code is incorrect');
                        }
                    }
                });
            } else {
                // If the new password input is visible, then update new password
                var email = document.querySelector('input[name="email"]').value;
                var newPassword = document.querySelector('input[name="password"]').value;

                $.ajax({
                    url: 'forgotpassword',
                    type: 'POST',
                    data: {
                        email: email,
                        newPassword: newPassword,
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response == 1) {
                            alert('Change password successfully');
                            window.location.href = './login';
                        } else {
                            alert('Change password failed');
                        }
                    }
                });
            }
        }
    });

    document.getElementById('send-verification-code').addEventListener('click', function() {
        var email = document.querySelector('input[name="email"]').value;
        var button = this;
        var countdownElement = document.getElementById('countdown');
        var seconds = 60; // Đồng hồ đếm ngược bắt đầu từ 60 giây

        verificationCode = randomCode();
        if (email == '') {
            alert('Please enter your email');
            return;
        } else {
            button.classList.add('hidden'); // Ẩn nút
            countdownElement.classList.remove('hidden'); // Hiển thị đồng hồ đếm ngược

            countdownElement.textContent = seconds; // Cập nhật text đồng hồ đếm ngược

            var interval = setInterval(function() {
                seconds--; // Giảm giây đi mỗi lần
                countdownElement.textContent = seconds; // Cập nhật text đồng hồ đếm ngược

                if (seconds <= 0) {
                    clearInterval(interval); // Dừng đếm ngược
                    countdownElement.classList.add('hidden'); // Ẩn đồng hồ đếm ngược
                    button.classList.remove('hidden'); // Hiển thị lại nút
                }
            }, 1000); // Đặt thời gian cập nhật là 1000ms (1 giây)
        }

        $.ajax({
            url: '../register/sendVerificationEmail', // Replace with the actual server-side script URL
            method: 'POST',
            data: {
                userEmail: email,
            },
            success: function(response) {
                verificationCode = response.verificationCode;
            },
            error: function(xhr, status, error) {
                // Handle AJAX error
                console.error(error);
            }
        });
    });
});
</script>