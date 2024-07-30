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
                <h1 class="text-3xl font-bold pointer-events-none">Get in touch</h1>
                <p class="mb-3">Log in to access your account</p>
                <label class="font-semibold">Your Email</label>
                <div class="flex items-center rounded-lg border border-gray-300 bg-slate-50 p-2">
                    <input class="w-full bg-inherit p-2 outline-none" type="text" name="email"
                        placeholder="Enter your email" />
                    <img class="size-7" src="../../img/user_icon.svg" alt="" />
                </div>

                <label class="font-semibold">Your Password</label>
                <div class="flex items-center rounded-lg border border-gray-300 bg-slate-50 p-2">
                    <input id="password" class="w-full bg-inherit p-2 outline-none" name="password" type="password"
                        placeholder="Enter your password" />
                    <img id="show-icon" class="size-7" src="../../img/viewshowPass.svg" alt="" />
                </div>
                <div class="mb-5 flex items-center gap-2">
                    <input type="checkbox" id="remember" />
                    <label for="remember">Duy trì đăng nhập</label>
                    <a href="forgotpassword" class="ml-auto text-gray-400">Forgot password?</a>
                </div>
                <button class="rounded-full bg-orange-500 p-4 font-bold text-white" type="submit">
                    LOG IN
                </button>
            </form>
            <span class="font-bold">Or</span>
            <a href="./signup"
                class="mx-16 text-center w-[calc(100%-8rem)] rounded-full bg-lime-500 p-4 font-bold text-white"
                type="submit">
                SIGN UP
            </a>
        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        document
            .getElementById("show-icon")
            .addEventListener("click", function () {
                var passwordInput = document.getElementById("password");
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                } else {
                    passwordInput.type = "password";
                }
            });

        document.querySelector('.submit-login').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent form submission

            // Get form data
            var email = document.querySelector('input[name="email"]').value;
            var password = document.querySelector('input[name="password"]').value;

            // Perform data validation or other operations
            // ...

            // Send form data to the server using AJAX or fetch API
            // ...

            // Example AJAX request using jQuery
            $.ajax({
                url: 'login', // Replace with the actual server-side script URL
                method: 'POST',
                data: {
                    email: email,
                    password: password
                },
                dataType: "json",
                success: function (data) {
                    // Handle the server response
                    console.log(data);
                    if (data.status == 1) {
                        // Redirect to another page
                        alert('Login successful! Redirecting to the homepage...');
                        window.location.href = '../home/index';
                    } else {
                        // Display an error message
                        alert('Invalid email or password');
                    }
                },
                error: function (xhr, status, error) {
                    // Handle AJAX error
                    console.error(error);
                }
            });
        });
    });
</script>
<?php include "Views/frontend/partitions/footer.php"; ?>