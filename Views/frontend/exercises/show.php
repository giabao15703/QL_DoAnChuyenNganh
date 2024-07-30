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
/* print_r($userHistoryExercise) */
?>
<section class="relative">
    <div class="bg-gradient-exercise py-32 px-16">

        <div class="relative mx-auto max-w-[80rem] font-primary_quicksand font-normal">
            <div class="flex items-center gap-8 pb-8 justify-between">
                <h1 class="w-fit text-2xl text-nowrap font-bold">Entrance Test</h1>
                <div
                    class="completion-level relative h-5 w-3/5 rounded-2xl bg-white before:absolute before:h-full  before:rounded-2xl before:bg-lime-600 before:bg-opacity-50 before:content-[''] border border-gray-200 before:transition-all">
                </div>
                <span class="completion-level-text font-bold text-nowrap">0 / 4</span>
                <div class="flex gap-3 float-end relative">
                    <div class="absolute -top-10 flex items-center gap-3">Time: <span id="time"
                            class="font-bold text-2xl text-red-500"
                            data-time=<?= $exercise[0]['time_limit_minutes'] ?>></span>
                    </div>
                    <button class="button previous-button flex gap-2 rounded-3xl bg-white p-2 font-semibold">
                        <img src="../../img/previous.svg" alt="" />PREVIOUS
                    </button>
                    <button class="button next-button flex gap-2 rounded-3xl bg-white p-2 font-semibold">
                        NEXT<img src="../../img/next.svg" alt="" />
                    </button>
                </div>
            </div>
            <div type="text" name="title" id="title" class="p-4 text-2xl font-bold text-center">
                <?= $exercise[0]['title'] ?>
            </div>
            <div class="relative rounded-xl bg-white p-8">
                <form id="exercise-form" class=<?= $questions[0]['exercise_id'] ?> action="result" method="POST">
                    <input type="hidden" name="exercise_title" value="<?= $exercise[0]['title'] ?>">
                    <div>
                        <?php
                        $cnt = 1;
                        /* echo "<pre>";
                        print_r($questions); */
                        foreach ($questions as $question): ?>
                        <div id="<?= $question['id'] ?>"
                            class="question mx-auto max-w-[40rem] mb-12 <?= $cnt != 1 ? 'hidden' : '' ?>">
                            <p class="mb-5 max-w-96 text-xl">
                                <span class="font-bold">Question <?= $cnt++ ?>:</span>
                                <?= $question['question'] ?>
                            </p>
                            <?php
                                $answersJson = $question['answers'];
                                $answersArray = json_decode($answersJson, true);
                                $ascii_A = ord('A');
                                foreach ($answersArray as $index => $answer): ?>
                            <div class="answer mb-3 flex items-center gap-3 rounded-2xl border border-gray-200 p-4 cursor-pointer transition-all duration-500"
                                data-answer="<?= $index ?>" data-question="<?= $question['id'] ?>">
                                <div
                                    class="text-amber-400 w-fit rounded-full border border-gray-300 bg-gray-50 p-3 font-bold leading-3">
                                    <?= chr($ascii_A++) ?>
                                </div>
                                <p class="font-semibold">
                                    <?= $answer['answer'] ?>
                                </p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="answers" id="answers-input" value="">
                    <input type="hidden" name="dataIdHistory" id="dataIdHistory" value="123">
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
                </form>
            </div>
        </div>
    </div>
    <img class="pointer-events-none absolute bottom-0 z-10 w-full" src="../../img/Groupfooter_exercise.svg" alt="" />
</section>
<?php $script = "" ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    //set value to dataIdHistory

    $.ajax({
        url: '../UserHistoryExercise/getUniqueIdAjax',
        type: 'POST',
        success: function(data) {
            console.log('Unique ID:', data.uniqueId);
            document.getElementById('dataIdHistory').value = data.id;
        },
        error: function(error) {
            console.error('Error fetching the unique ID:', error);
        }
    });
    const totalQuestions = document.querySelectorAll('.question').length;
    document.querySelector('.completion-level-text').textContent =
        `0 / ${totalQuestions}`;
    const answerElements = document.querySelectorAll('.answer');
    const completeButton = document.querySelector('.complete');
    const questions = document.querySelectorAll('.question');
    answerElements.forEach(answer => {
        answer.addEventListener('click', function() {
            const parent = this.closest('.question');
            const activeAnswer = parent.querySelector('.answer_checked');
            if (activeAnswer) {
                activeAnswer.classList.remove('answer_checked');
            }
            this.classList.add('answer_checked');
            checkCompletion();
            changeCompletionLevel();
        });
    });

    const nextButton = document.querySelector('.next-button');
    const previousButton = document.querySelector('.previous-button');

    nextButton.addEventListener('click', function() {
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

    previousButton.addEventListener('click', function() {
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

    completeButton.addEventListener('click', function() {
        const answers = [];
        questions.forEach(question => {
            const selectedAnswer = question.querySelector('.answer_checked');
            if (selectedAnswer) {
                answers.push({
                    questionId: question.getAttribute('id'),
                    answerIndex: selectedAnswer.getAttribute('data-answer')
                });
            }
        });
        document.getElementById('answers-input').value = JSON.stringify(answers);
        document.querySelector('.submit-button').click();
    });

    function checkCompletion() {
        let isComplete = true;
        questions.forEach(question => {
            if (!question.querySelector('.answer_checked')) {
                isComplete = false;
            }
        });

        if (isComplete) {
            completeButton.classList.remove('hidden');
        }
    }

    function changeCompletionLevel() {
        const completionLevel = document.querySelector('.completion-level');
        const totalQuestions = questions.length;
        const answeredQuestions = document.querySelectorAll('.answer_checked').length;
        const percentage = (answeredQuestions / totalQuestions) * 100;
        completionLevel.style.setProperty('--completion-percentage', `${percentage}%`);
        document.querySelector('.completion-level-text').textContent =
            `${answeredQuestions} / ${totalQuestions}`;
    }

    document.querySelector('.submit-button').addEventListener('click', function(event) {
        submitForm();
    });

    function formatLocalDateTime() {
        const now = new Date();
        const year = now.getFullYear();
        const month = (now.getMonth() + 1).toString().padStart(2, '0');
        const day = now.getDate().toString().padStart(2, '0');
        const hour = now.getHours().toString().padStart(2, '0');
        const minute = now.getMinutes().toString().padStart(2, '0');
        const second = now.getSeconds().toString().padStart(2, '0');
        return `${year}-${month}-${day} ${hour}:${minute}:${second}`;
    }

    function submitForm() {
        const answers = [];
        questions.forEach(question => {
            const selectedAnswer = question.querySelector('.answer_checked');
            const exerciseId = document.querySelector('#exercise-form').classList[0];
            console.log(selectedAnswer);
            if (selectedAnswer) {
                answers.push({
                    questionId: question.getAttribute('id'),
                    answerIndex: selectedAnswer.getAttribute('data-answer'),
                    exerciseId: exerciseId,
                    date_completed: formatLocalDateTime()
                });
            } else {
                answers.push({
                    questionId: question.getAttribute('id'),
                    answerIndex: -1,
                    exerciseId: exerciseId,
                    date_completed: formatLocalDateTime()
                });

            }
        });

        const answersJson = JSON.stringify(answers);
        console.log(answersJson); // In ra JSON trước khi gửi đi
        document.getElementById('answers-input').value = answersJson;
    }

    const timeSpan = document.getElementById('time');
    let time = parseInt(timeSpan.getAttribute('data-time')) * 60; // Chuyển đổi phút thành giây
    const form = document.getElementById('exercise-form');

    // Hàm cập nhật đồng hồ đếm ngược
    function updateCountdown() {
        const minutes = Math.floor(time / 60);
        const seconds = time % 60;
        timeSpan.textContent =
            `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        time--;

        if (time < 0) {
            clearInterval(timer); // Dừng bộ đếm ngược
            alert('Thời gian làm bài đã kết thúc!');
            setTimeout(() => {
                submitForm();
                form.submit();
            }, 5000);
        }
    }

    // Bắt đầu bộ đếm ngược
    const timer = setInterval(updateCountdown, 1000);

});
</script>
<?php include "Views/frontend/partitions/footer.php"; ?>