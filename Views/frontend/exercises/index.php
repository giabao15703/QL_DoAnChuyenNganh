<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>View exercise</title>
        <link rel="stylesheet" href="../../src/output.css" />
    </head>
    <?php
    $currentQuestion = 0;
    ?>

    <body class="relative">
        <header class="bg-primary-light">
            <div class="mx-auto max-w-[80rem]">
                <div class="border-b py-4">
                    <span class="font-primary_quicksand text-3xl font-bold text-secondary">Duolingo</span>
                </div>
                <nav class="flex justify-between py-4">
                    <ul
                        class="flex justify-between gap-8 font-bold [&_li>a]:z-10 [&_li]:relative [&_li]:flex [&_li]:gap-2 [&_li]:font-primary_quicksand">
                        <li class="relative">
                            <a class="flex font-primary_Bold text-secondary" href="#">Làm bài thi<svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6 scale-50 text-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </a>
                            <div class="active-page"></div>
                        </li>
                        <li>
                            <a class="flex font-primary_Bold text-secondary" href="#">Tổ chức đã chấp nhận<svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6 scale-50 text-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg></a>
                        </li>
                        <li>
                            <a class="flex font-primary_Bold text-secondary" href="#">Các nghiên cứu<svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6 scale-50 text-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg></a>
                        </li>
                    </ul>
                    <div>
                        <div>
                            <button
                                class="mr-4 rounded-lg border border-secondary bg-white px-5 py-[0.3rem] text-center text-sm font-bold leading-6 text-secondary hover:bg-secondary hover:text-white">
                                ĐĂNG NHẬP
                            </button>
                            <button
                                class="border-secondry ahover:text-white rounded-lg border bg-secondary px-5 py-[0.3rem] text-sm font-bold leading-6 text-primary hover:bg-primary hover:text-secondary">
                                ĐĂNG KÝ
                            </button>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <section class="bg-gradient-exercise p-32">
            <div class="relative mx-auto max-w-[80rem] font-primary_quicksand font-normal">
                <div class="flex items-center gap-8 pb-16">
                    <h1 class="w-fit text-2xl font-bold">Entrance Test</h1>
                    <div
                        class="relative h-5 w-3/5 rounded-2xl bg-white before:absolute before:h-full before:w-1/2 before:rounded-2xl before:bg-lime-600 before:bg-opacity-50 before:content-['']">
                    </div>
                    <div class="flex gap-3">
                        <button class="flex gap-2 rounded-3xl bg-white p-2 font-semibold">
                            <img src="../../img/previous.svg" alt="" />PREVIOUS
                        </button>
                        <button class="flex gap-2 rounded-3xl bg-white p-2 font-semibold">
                            NEXT<img src="../../img/next.svg" alt="" />
                        </button>
                    </div>
                </div>
                <div class="relative rounded-xl bg-white p-8">
                    <p class="mb-3 text-center text-2xl font-bold">
                        Question <span>1</span>/<span>5</span>
                    </p>
                    <p class="mx-auto mb-3 max-w-96 text-center">
                        <?= $exercises[$currentQuestion]['question'] ?>
                    </p>
                    <div class="mx-auto max-w-[40rem]">
                        <?php
                        $answersJson = $exercises[$currentQuestion]['answers'];
                        $answersArray = json_decode($answersJson, true);
                        foreach ($answersArray as $answer): ?>
                        <div class="mb-3 flex items-center gap-3 rounded-2xl border border-gray-200 p-4">
                            <div class="w-fit rounded-full bg-gray-200 p-3 font-bold leading-3">
                                A
                            </div>
                            <p class="font-semibold">
                                <?= $answer['answer'] ?>
                            </p>
                        </div>
                        <?php endforeach; ?>
                        <!-- <div class="mb-3 flex items-center gap-3 rounded-2xl border border-gray-200 p-4">
                            <div class="w-fit rounded-full bg-gray-200 p-3 font-bold leading-3">
                                A
                            </div>
                            <p class="font-semibold">
                                Lorem Ipsum has a more-or-less distribution
                            </p>
                        </div>
                        <div class="answer_false mb-3 flex items-center gap-3 rounded-2xl border border-gray-200 p-4">
                            <div class="w-fit rounded-full bg-gray-200 p-3 font-bold leading-3">
                                B
                            </div>
                            <p class="font-semibold">
                                Lorem Ipsum has a more-or-less distribution
                            </p>
                            <img class="ml-auto" src="../../img/false_icon.svg" alt="" />
                        </div>
                        <div class="answer_true mb-3 flex items-center gap-3 rounded-2xl border border-gray-200 p-4">
                            <div class="w-fit rounded-full bg-gray-200 p-3 font-bold leading-3">
                                C
                            </div>
                            <p class="font-semibold">
                                Lorem Ipsum has a more-or-less distribution
                            </p>
                            <img class="ml-auto fill-black" src="../../img/true_icon.png" alt="" />
                        </div>
                        <div class="mb-3 flex items-center gap-3 rounded-2xl border border-gray-200 p-4">
                            <div class="w-fit rounded-full bg-gray-200 p-3 font-bold leading-3">
                                D
                            </div>
                            <p class="font-semibold">
                                Lorem Ipsum has a more-or-less distribution
                            </p>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
        <img class="pointer-events-none absolute bottom-0 z-10 w-full" src="../../img/Groupfooter_exercise.svg"
            alt="" />
    </body>

</html>



<!-- <h1>view exercise</h1>
<?php

$answersJson = $exercises[0]['answers'];
// Chuyển đổi chuỗi JSON thành mảng PHP
$answersArray = json_decode($answersJson, true);
//$answersArray = $exercises[0]['answers'];
print_r($answersArray);
// Lặp qua từng đáp án và hiển thị
echo "<pre>";
foreach ($answersArray as $answer) {
    echo "Answer: " . $answer['answer'] . ", isCorrect: " . $answer['isCorrect'] . "<br>";
}

print_r($exercises);
?> -->