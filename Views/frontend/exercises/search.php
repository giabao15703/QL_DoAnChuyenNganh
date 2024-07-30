<?php
$title = "Show";
$style = '';
include "Views/frontend/partitions/header.php";
?>

<section class="relative bg-gradient-exercise min-h-[calc(100vh-133px)]">
    <div class="mx-auto max-w-[80rem] text-center p-32 text-4xl font-bold">
        <h1 class="text-3xl mb-5">Enter code exercise</h1>
        <form action="../../index.php/exercise/show" class="relative mr-auto flex w-full cursor-pointer  px-32">
            <input type="search" name="id"
                class="text-sm cursor-pointer relative z-10 h-8 w-full rounded-xl border bg-white p-8 outline-none transition-all duration-300 "
                placeholder="Code exercise..." />
            <button type="submit" class="absolute top-0 bottom-0 my-auto h-8 w-10 px-3 rounded-lg z-20 right-36">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                    <path
                        d="M 21 3 C 11.601563 3 4 10.601563 4 20 C 4 29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625 30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125 C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438 3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219 28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781 13.800781 7 21 7 Z">
                    </path>
                </svg>
            </button>

        </form>
    </div>
</section>

<?php include "Views/frontend/partitions/footer.php"; ?>