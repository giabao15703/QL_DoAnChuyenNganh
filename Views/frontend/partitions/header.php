<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?= $title ?? '' ?></title>
        <link rel="stylesheet" href=<?php echo CSS_OUTPUT_URL; ?> />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- Thêm jQuery từ CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <style>
    <?=$style ?? ''?>
    </style>

    <body class="relative min-h-[100vh] font-primary_quicksand bg-[#FDFDFD]">
        <!-- Modal -->
        <div id="myModal" class="hidden fixed z-50 inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"
            onclick="closeModal(event)">
            <!-- Add the event parameter here -->
            <div class="relative mx-auto p-5 border w-96 shadow-lg rounded-md bg-white top-1/2 -translate-y-1/2"
                onclick="event.stopPropagation()">
                <!-- Prevent click inside the modal from closing it -->
                <div class="mt-3 text-center">
                    <div id="modal-icon" class="mx-auto flex items-center justify-center h-12 w-12 rounded-full mb-3">
                        <!-- SVG icon will be changed dynamically -->
                    </div>
                    <h3 class="text-xl leading-6 font-bold text-gray-900 tracking-wider" id="modal-title">Status</h3>
                    <div class="mt-2 px-7 py-3">
                        <p class="text-lg text-gray-500" id="modal-content">Your message here.</p>
                    </div>
                    <div class="items-center px-4 py-3" id="modal-buttons">
                        <!-- Buttons will be changed dynamically -->
                    </div>
                </div>
            </div>
        </div>


        <header class="bg-primary-light">
            <div class="mx-auto max-w-[80rem]">
                <div class="flex justify-between border-b items-center">
                    <a href=<?= BASE_URL . "/index.php/home/index" ?> class="block border-b py-4">
                        <span class="font-primary_quicksand text-3xl font-bold text-secondary">GOODGOAT</span>
                    </a>
                    <form action=<?= BASE_URL . "/index.php/exercise/show" ?>
                        class="relative ml-auto flex w-[300px] cursor-pointer mr-5">
                        <input type="search" name="id"
                            class="text-sm cursor-pointer relative z-10 h-8 w-full rounded-lg border bg-transparent  pr-6 p-3 outline-none transition-all duration-300 "
                            placeholder="Code exercise..." />
                        <button type="submit"
                            class="absolute top-0 right-0 bottom-0 my-auto h-8 w-10 px-3 rounded-lg z-20">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                viewBox="0 0 50 50">
                                <path
                                    d="M 21 3 C 11.601563 3 4 10.601563 4 20 C 4 29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625 30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125 C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438 3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219 28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781 13.800781 7 21 7 Z">
                                </path>
                            </svg>
                        </button>

                    </form>
                    <div class="flex items-center">
                        <?php if (!isset($_COOKIE['user_id'])): ?>
                        <div>
                            <div>
                                <a href=<?= BASE_URL . '/index.php/user/login' ?>
                                    class="button mr-4 rounded-2xl border border-secondary bg-white px-5 py-[0.3rem] text-center text-sm font-bold leading-6 text-secondary hover:bg-secondary hover:text-white">
                                    ĐĂNG NHẬP
                                </a>

                                <a href=<?= BASE_URL . '/index.php/user/signup' ?>
                                    class="button border-secondary ahover:text-white rounded-2xl border bg-secondary px-5 py-[0.3rem] text-sm font-bold leading-6 text-primary hover:bg-primary hover:text-secondary">
                                    ĐĂNG KÝ
                                </a>
                            </div>
                        </div>
                        <?php else: ?>
                        <a href="<?= BASE_URL ?>/index.php/user/detail?id=<?= $_COOKIE['user_id'] ?>"
                            class="flex gap-2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-nowrap">
                                <?= $_COOKIE['user_displayName'] ?>
                            </span>
                        </a>
                        <span>/</span>
                        <a href="<?= BASE_URL ?>/index.php/user/LogOut">Đăng xuất</a>
                        <?php endif; ?>
                    </div>
                </div>

                <nav class="flex justify-between py-4 items-center gap-3 ">
                    <ul
                        class="flex justify-between gap-8 font-bold [&_li>a]:z-10 mr-5 [&_li]:relative [&_li]:flex [&_li]:gap-2">
                        <li class="relative">
                            <a class="flex  font-bold text-secondary" href="<?= BASE_URL ?>/index.php/home/index">Home
                            </a>
                        </li>
                        <li class="relative">
                            <a class="flex  font-bold text-secondary"
                                href="<?= BASE_URL ?>/index.php/exercise/search">Do
                                exercise
                            </a>
                        </li>
                        <li>
                            <a class="flex font-bold text-secondary" href="<?= BASE_URL ?>/index.php/new/index">News</a>
                        </li>
                        <li>
                            <a class="flex font-bold text-secondary"
                                href="<?= BASE_URL ?>/index.php/grammar/index">Grammar</a>
                        </li>
                    </ul>
                </nav>
            </div>
            </div>
        </header>