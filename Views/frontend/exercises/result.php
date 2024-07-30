<?php
$title = "Entrance Test";
$style = '
    .completion-level::before {
        ---completion-percentage: 0;
        width: var(--completion-percentage);
    }
    
';
include "Views/frontend/partitions/header.php";
?>

<?php
//echo '
// <pre> Result:';
// print_r(json_decode($result['question_answer'], true));
?>

<section class="relative bg-gradient-exercise min-h-[calc(100vh-133px)]">
    <div class="relative mx-auto max-w-[80rem] font-primary_quicksand font-normal p-16">
        <div class="flex items-center gap-8 pb-8 justify-between py-8">
            <h1 class="w-fit text-2xl font-bold">Entrance Test</h1>
            <div class=" flex flex-nowrap gap-3 rounded-lg bg-white border border-gray-300 w-fit px-4 py-2 text-nowrap">
                Scrore: <span id="Score" class="min-w-12 block font-bold" data-score=<?= $result['score'] ?>></span>
            </div>
            <div class="flex flex-nowrap gap-3 rounded-lg bg-white border border-gray-300 w-fit px-4 py-2 text-nowrap">
                Correct
                Answer:
                <span id="Correct-Answer" class="min-w-12 block font-bold"></span>
            </div>
            <div class="flex gap-3 float-end relative">
                <button class="button previous-button flex gap-2 rounded-3xl bg-white p-2 font-semibold">
                    <img src="../../img/previous.svg" alt="" />PREVIOUS
                </button>
                <button class="button next-button flex gap-2 rounded-3xl bg-white p-2 font-semibold">
                    NEXT<img src="../../img/next.svg" alt="" />
                </button>
            </div>
        </div>
        <div type="text" name="title" id="title" class="p-4 text-2xl font-bold text-center">
            
        </div>
        <div class="relative rounded-xl bg-white p-8">
            <div>
                <?php
                $cnt = 1;

                $question_answer = json_decode($result['question_answer'], true);
                /* echo "<pre>";
                print_r($result); */
                foreach ($question_answer as $question):
                    ?>
                    <div class="question mx-auto max-w-[40rem] mb-12 <?= $cnt != 1 ? 'hidden' : '' ?>">
                        <p class="mb-5 max-w-96 text-xl">
                            <span class="font-bold">Question <?= $cnt++ ?>:</span>
                            <?= $question['question'] ?>
                        </p>
                        <div id="User-Answer"
                            class="answer_false answer mb-3 flex items-center gap-3 rounded-2xl border border-gray-200 p-4 cursor-pointer transition-all duration-500 <?= $question['user_answer'] == $question['correct_answer'] ? "!hidden" : "" ?>">
                            <p class="font-semibold">
                                <?= $question['user_answer'] != 'null' ? $question['user_answer'] : 'Chưa chọn đáp án' ?>
                            </p>
                        </div>
                        <div
                            class="answer_true answer mb-3 flex items-center gap-3 rounded-2xl border border-gray-200 p-4 cursor-pointer transition-all duration-500">
                            <p class="font-semibold">
                                <?= $question['correct_answer'] ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <input type="hidden" name="answers" id="answers-input" value="">
            <!-- <button type="submit" class="submit-button ml-52">Submit</button> -->
            <button type="submit"
                class="submit-button complete animate-bounce mx-auto h-10 w-36 flex justify-center items-center absolute right-10 top-10 hidden">
                <div
                    class="h-full w-full bg-gradient-to-br from-rose-400 to-rose-600 items-center rounded-xl shadow-2xl  cursor-pointer absolute overflow-hidden transform hover:scale-x-110 hover:scale-y-105 transition duration-300 ease-out">
                </div>
                <div
                    class="text-center text-white font-semibold z-10 pointer-events-none flex justify-content items-center">
                    Complete!
                </div>
            </button>
        </div>
    </div>
    <img class="pointer-events-none absolute bottom-0 z-10 w-full" src="../../img/Groupfooter_exercise.svg" alt="" />
</section>
<script>
    const nextButton = document.querySelector('.next-button');
    const previousButton = document.querySelector('.previous-button');

    nextButton.addEventListener('click', function () {
        const currentQuestion = document.querySelector('.question:not(.hidden)');
        const nextQuestion = currentQuestion.nextElementSibling;
        if (nextQuestion) {
            currentQuestion.classList.add('hidden');
            nextQuestion.classList.remove('hidden');
            nextQuestion.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }
    });

    previousButton.addEventListener('click', function () {
        const currentQuestion = document.querySelector('.question:not(.hidden)');
        const previousQuestion = currentQuestion.previousElementSibling;
        if (previousQuestion) {
            currentQuestion.classList.add('hidden');
            previousQuestion.classList.remove('hidden');
            previousQuestion.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }

    });
    document.addEventListener('DOMContentLoaded', function () {
        const scoreSpan = document.getElementById('Score');
        const correctAnswerSpan = document.getElementById('Correct-Answer');
        const totalQuestions = document.querySelectorAll('.question').length;
        const score = parseInt(scoreSpan.getAttribute('data-score'));
        const correctAnswers = Math.round((score / 100) * totalQuestions);

        // Hàm để tạo hiệu ứng tăng số
        function animateValue(obj, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                obj.textContent = Math.floor(progress * (end - start) + start);
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        // Kích hoạt hiệu ứng tăng số
        animateValue(scoreSpan, 0, score, 2000);

        // Hiển thị số câu trả lời đúng / tổng số câu
        correctAnswerSpan.textContent = correctAnswers + ' / ' + totalQuestions;
    });
</script>
<?php include "Views/frontend/partitions/footer.php"; ?>