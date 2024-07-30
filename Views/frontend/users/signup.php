<?php
$title = "LOGIN";
$style = '

';
include "Views/frontend/partitions/header.php";
?>
<style>
.file-upload {
    position: relative;
    overflow: hidden;
    display: inline-block;
}

.file-upload input[type="file"] {
    font-size: 100px;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
}

.file-upload-button {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}

.error {
    color: #f87171;
    /* red-500 */
}
</style>
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
            <form action="signup" method="post"
                class="submit-login flex w-full flex-col gap-4 rounded-xl bg-white p-16 shadow-lg shadow-slate-400">
                <h1 class="text-3xl font-bold pointer-events-none">Sign up</h1>
                <p class="mb-3">Create your account</p>
                <label class="font-semibold">Your Name</label>
                <div class="flex items-center rounded-lg border border-gray-300 bg-slate-50 p-2 relative">
                    <input class="invalid:border-red-500 w-full bg-inherit p-2 outline-none " type="text"
                        name="display_name" placeholder="Enter your name" />
                </div>

                <label class="font-semibold">Your Email</label>
                <div class="flex items-center rounded-lg border border-gray-300 bg-slate-50 p-2 relative">
                    <input class="w-full bg-inherit p-2 outline-none" type="text" name="email"
                        placeholder="Enter your email" />

                </div>

                <label class="font-semibold">Your Phone</label>
                <div class="flex items-center rounded-lg border border-gray-300 bg-slate-50 p-2 relative">
                    <input class="w-full bg-inherit p-2 outline-none " type="text" name="phone"
                        placeholder="Enter your phone" />

                </div>
                <label class="font-semibold">Select Your Role</label>
                <select class="p-4 rounded-lg  border border-gray-300 bg-slate-50 " name="role" id="">
                    <option class="bg-white p-2" value="student">Student</option>
                    <option class="bg-white p-2" value="teacher">Teacher</option>
                </select>

                <label class="font-semibold">Your Password</label>
                <div class="flex items-center rounded-lg border border-gray-300 bg-slate-50 p-2 relative">
                    <input id="password" class="w-full bg-inherit p-2 outline-none " name="password" type="password"
                        placeholder="Enter your password" onkeyup="validatePassword(this.value)" />
                    <img id="show-icon" class="size-7" src=<?= IMAGE_URL . "viewshowPass.svg" ?> alt="" />
                </div>
                <ul id="password-requirements" class="hidden">
                    <li id="req-length" class="text-red-500 text-sm">Có ít nhất 8 kí tự</li>
                    <li id="req-uppercase" class="text-red-500 text-sm">Có chứa kí tự viết hoa</li>
                    <li id="req-number" class="text-red-500 text-sm">Có chứa kí tự số</li>
                    <li id="req-special" class="text-red-500 text-sm">Có chứa kí tự đặt biệt</li>
                </ul>

                <label class="font-semibold">Upload Image</label>
                <div class="file-upload">
                    <button type="button" class="file-upload-button rounded-lg">Chọn tập tin...</button>
                    <input type="file" onchange="document.getElementById('fileName').innerHTML = this.files[0].name"
                        accept="image/png, image/jpeg, image/gif">
                </div>
                <p id="fileName"></p>

                <label class="font-semibold">Verification Code</label>
                <div
                    class="flex items-center rounded-lg border border-gray-300 bg-slate-50 p-2 cursor-pointer relative">
                    <input class="w-full bg-inherit p-2 outline-none" type="text" name="verification_code"
                        placeholder="Enter your verification code" />
                    <button type="button" id="send-verification-code" class="text-sm text-nowrap font-normal">Send
                        Code</button>
                    <span id="countdown" class="text-sm hidden px-3 font-semibold">60</span>
                </div>

                <div class="mb-5 flex items-center gap-2">
                    <input type="checkbox" id="remember" />
                    <label for="remember">Duy trì đăng nhập</label>
                    <a href="#" class="ml-auto text-gray-400">Forgot password?</a>
                </div>
                <button class="rounded-full bg-orange-500 p-4 font-bold text-white" type="submit">
                    SIGN UP
                </button>

                <p class="text-center mt-5">Already have an account? <a href="login.php"
                        class="text-orange-500">Login</a>
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
//create function random code 8 character
function randomCode() {
    var code = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    for (var i = 0; i < 8; i++) {
        code += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return code;
}


function validatePassword(password) {
    // Regex patterns
    const lengthPattern = /.{8,}/; // At least 8 characters
    const uppercasePattern = /[A-Z]/; // Contains an uppercase letter
    const numberPattern = /[0-9]/; // Contains a number
    const specialCharPattern =
        /[\!\@\#\$\%\^\&\*\(\)\_\+\-\=\[\]\{\}\:\;\"\'\<\>\,\.\?\/\|\\]/; // Contains a special character

    // Validate each requirement
    const isLengthValid = lengthPattern.test(password);
    const isUppercaseValid = uppercasePattern.test(password);
    const isNumberValid = numberPattern.test(password);
    const isSpecialCharValid = specialCharPattern.test(password);

    validateRequirement(isLengthValid, 'req-length');
    validateRequirement(isUppercaseValid, 'req-uppercase');
    validateRequirement(isNumberValid, 'req-number');
    validateRequirement(isSpecialCharValid, 'req-special');

    // Check if all requirements are met
    return isLengthValid && isUppercaseValid && isNumberValid && isSpecialCharValid;
}


function validateRequirement(isValid, elementId) {
    const element = document.getElementById(elementId);
    if (isValid) {
        element.classList.remove('text-red-500');
        element.classList.add('text-green-500');
    } else {
        element.classList.remove('text-green-500');
        element.classList.add('text-red-500');
    }
}

$(document).ready(function() {
    var verificationCode = '';
    var formData = new FormData();
    var checkEmailExist = false;

    const passwordInput = document.getElementById('password');
    if (passwordInput.value) {
        validatePassword(passwordInput.value);
    }

    document.getElementById("show-icon").addEventListener("click", function() {
        var passwordInput = document.getElementById("password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    });

    function validateInput() {
        var isValid = true;

        const displayName = document.querySelector('input[name="display_name"]');
        const email = document.querySelector('input[name="email"]');
        const phone = document.querySelector('input[name="phone"]');
        const password = document.querySelector('input[name="password"]');
        const verificationCode = document.querySelector('input[name="verification_code"]');
        // Clear previous errors
        document.querySelectorAll('.error').forEach(el => el.classList.add('hidden'));
        // Validate Display Name
        if (!displayName.value.trim()) {
            showError(displayName, 'Tên không được để trống');
            isValid = false;
        }

        // Validate Email
        if (!email.value.trim() && !validateEmail(email.value)) {
            showError(email, 'Email không hợp lệ');
            isValid = false;
        }

        // Validate Phone
        if (!phone.value.trim() || isNaN(phone.value)) {
            showError(phone, 'Số điện thoại không hợp lệ');
            isValid = false;
        }

        // Validate Password
        if (!validatePassword(password.value)) {
            isValid = false;
        }

        // Validate Verification Code
        if (!verificationCode.value.trim()) {
            showError(verificationCode, 'Mã xác nhận không được để trống');
            isValid = false;
        }

        return isValid;
    }

    function showError(input, message) {
        const container = input.parentElement;
        let error = container.querySelector('.error');
        if (!error) {
            error = document.createElement('div');
            error.className = 'error text-red-500 text-sm mt-1 hidden absolute -bottom-5';
            container.appendChild(error);
        }
        error.textContent = message;
        error.classList.remove('hidden');
    }

    function validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    document.getElementById('password').addEventListener('focus', function showRequirements() {
        const requirements = document.getElementById('password-requirements');
        requirements.classList.remove('hidden'); // Hiện các yêu cầu
        this.removeEventListener('focus', showRequirements); // Gỡ bỏ sự kiện sau khi đã hiển thị
    }, {
        once: true
    }); // Option {once: true} đảm bảo bộ lắng nghe chỉ được kích hoạt một lần

    document.querySelector('.submit-login').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission
        if (!validateInput()) {
            console.log('Invalid input');
            return;
        }
        var verificationCodeInput = document.querySelector('input[name="verification_code"]').value;

        $.ajax({
            url: '../../index.php/register/checkVerificationCode',
            method: 'POST',
            data: {
                verificationCode: verificationCode,
                userVerificationCode: verificationCodeInput
            },
            success: function(data) {
                if (data.status == 1) {
                    // Create FormData object
                    formData.append('email', document.querySelector(
                            'input[name="email"]')
                        .value);
                    formData.append('display_name', document
                        .querySelector(
                            'input[name="display_name"]').value);
                    formData.append('phone', document.querySelector(
                            'input[name="phone"]')
                        .value);
                    formData.append('role', document.querySelector(
                            'select[name="role"]')
                        .value);
                    formData.append('password', document
                        .querySelector(
                            'input[name="password"]').value);
                    formData.append('image', document.querySelector(
                            'input[type="file"]')
                        .files[0]);

                    showModal('Success', data.message, 'success');

                } else {
                    showModal('Error', data.message, 'error');
                    return;
                }

                $.ajax({
                    url: 'signup', // Replace with the actual server-side script URL
                    type: 'POST',
                    data: formData,
                    processData: false, // Important: tell jQuery not to process the data
                    contentType: false, // Important: tell jQuery not to set contentType
                    success: function(data) {
                        console.log(data);
                        if (data != null) {
                            showModal('Success',
                                'Login successful! Redirecting to the loginpage...',
                                'success');
                            window.location.href = '../../index.php/user/login';
                        } else {
                            showModal('Error',
                                'Invalid email or password',
                                'error');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            },
            error: function(xhr, status, error) {
                // Handle AJAX error
                console.error(error);
            }
        });




        // Send form data to the server using AJAX or fetch API

    });

    document.getElementById('send-verification-code').addEventListener('click', function() {
        var email = document.querySelector('input[name="email"]').value;
        var button = this;
        var countdownElement = document.getElementById('countdown');
        var seconds = 60; // Đồng hồ đếm ngược bắt đầu từ 60 giây

        if (email == '') {
            showModal('Error', 'Please enter your email', 'error');
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
            url: './existsEmail',
            method: 'POST',
            data: {
                email: email
            },
            success: function(data) {
                if (!data.status) {
                    $.ajax({
                        url: '../../index.php/register/sendVerificationEmail',
                        method: 'POST',
                        data: {
                            userEmail: email,
                        },
                        success: function(data) {
                            verificationCode = data.verificationCode;
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else {
                    showModal('Error', 'Email already exists', 'error')
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

});

// add listen to send code
</script>
<?php include "Views/frontend/partitions/footer.php"; ?>