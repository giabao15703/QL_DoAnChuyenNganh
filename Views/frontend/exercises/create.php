<?php
$title = "Create Quiz";
$style = '';
include "Views/frontend/partitions/header.php";
?>
<section class="relative bg-gradient-exercise min-h-[calc(100vh-133px)]">
    <div class="container mx-auto px-4 py-12 max-w-[80rem]">
        <h1 class="text-xl font-bold mb-6">Create a Quiz</h1>
        <form id="quizForm" class="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4">
            <div class="flex gap-5 mb-5 items-center text-nowrap">
                <label for="topic">Chủ đề:</label>
                <select id="topic" name="topic" class="bg-white p-2 border border-gray-300 rounded-md">
                    <?php foreach ($topics as $topic): ?>
                        <option value="<?= $topic['id'] ?>"><?= $topic['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <!-- Select input cho cấp độ -->
                <label for="level">Cấp độ:</label>
                <select id="level" name="level" class="bg-white p-2 border border-gray-300 rounded-md">
                    <?php foreach ($levels as $level): ?>
                        <option value="<?= $level['id'] ?>"><?= $level['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="hasLimitTime">Số lượt làm bài:</label>
                <input type="number" id="hasLimitTime" name="hasLimitTime"
                    class="bg-white p-2 border border-gray-300 rounded-md w-16" min="1" value="1">

                <label for="timeLimitMinutes">Thời gian làm bài (phút):</label>
                <input type="number" id="timeLimitMinutes" name="timeLimitMinutes"
                    class="bg-white p-2 border border-gray-300 rounded-md w-16" min="1" value="1">
            </div>
            <div class="mb-3">
                <label for="title"> Title</label>
                <input type="text" name="title" id="title"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>
            <div id="questionsContainer">
                <!-- Questions will be added here dynamically -->
            </div>
            <button type="button" id="addQuestion"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add Question
            </button>
            <input type="submit" value="Submit Quiz"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded float-right">
        </form>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let questionCount = 0;
        document.getElementById('addQuestion').addEventListener('click', function () {
            questionCount++;
            let newQuestionHtml = `
                    <div class="question-block mb-4 border-b border-gray-200 pb-4" id="question_${questionCount}">
                    <div class="flex justify-between items-end mb-3">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Question ${questionCount}</label>
                        <button type="button" onclick="removeQuestion(${questionCount})" class="text-red-500 px-2 py-1 border border-red-500 hover:bg-red-500 hover:text-white transition-all duration-300 rounded-lg">Remove</button>
                    </div>
                    <input type="text" name="question_${questionCount}" placeholder="Enter your question" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <div class="mt-3">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Answers</label>
                        ${[1, 2, 3, 4].map(i => `
                            <div class="flex items-center mb-2">
                                <input type="radio" name="correct_${questionCount}" value="answer${i}_${questionCount}" class="mr-2" ${i == 1 ? 'checked' : ''}>
                                <input type="text" name="answer${i}_${questionCount}" placeholder="Answer ${i}" class="answer-input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                        `).join('')}
                    </div>
                </div>
    `;
            document.getElementById('questionsContainer').insertAdjacentHTML('beforeend',
                newQuestionHtml);
        });
    });

    function removeQuestion(questionId) {
        var element = document.getElementById('question_' + questionId);
        element.parentNode.removeChild(element);
    }


    document.getElementById('quizForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Ngăn không cho form gửi theo cách thông thường
        var questionBlock = document.querySelectorAll('.question-block');
        let formData = new FormData();

        if (questionBlock.length === 0) {
            showModal('Error', `Please add at least one question.`, 'error');
            return;
        }

        // Thu thập thông tin về chủ đề, cấp độ, số lượt làm bài và thời gian làm bài
        formData.append('topic', document.getElementById('topic').value);
        formData.append('level', document.getElementById('level').value);
        formData.append('title', document.getElementById('title').value);
        formData.append('timeLimit', document.getElementById('timeLimitMinutes').value);
        formData.append('hasLimitTime', document.getElementById('hasLimitTime').value);

        // Khởi tạo mảng để giữ các câu hỏi
        let questions = [];
        let isValid = true;
        // Thêm các câu hỏi và câu trả lời vào mảng
        questionBlock.forEach((block, index) => {
            let questionText = block.querySelector('input[name^="question_"]').value;
            console.log('QuestionText:', questionText);
            let answers = [];
            if (!questionText.trim()) {
                showModal('Error', `Please enter a question text.`, 'error');
                //alert('Please enter a question text.');
                isValid = false;
                return;
            }

            block.querySelectorAll('.answer-input').forEach((answerInput, ansIndex) => {
                if (!answerInput.value.trim()) {
                    showModal('Error', `Please enter all answer texts.`, 'error');
                    //alert('Please enter all answer texts.');
                    isValid = false;
                    return;
                }
                let isCorrect = block.querySelector(
                    `input[name="correct_${index + 1}"]:checked`) === answerInput
                        .previousElementSibling;
                answers.push({
                    answer: answerInput.value,
                    isCorrect: isCorrect ? 1 : 0
                });
            });
            console.log('QuestionElement:', questionText);
            console.log('Answers:', answers);
            questions.push({
                question: questionText,
                answers: answers
            });
        });

        if (!isValid) {
            return;
        }

        console.log('Question:', questions);
        // Thêm câu hỏi dưới dạng chuỗi JSON vào FormData
        formData.append('questions', JSON.stringify(questions));
        console.log('Quiz data:', formData);
        // Gửi dữ liệu qua AJAX tới server
        fetch('create', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                var codeExercise = data.codeExercise;
                showModal('Success', `Quiz created successfully! Code Exercise: ${codeExercise}`,
                    'success');
                // alert(`Quiz created successfully! Code Exercise: ${codeExercise}`);
            })
            .catch((error) => {
                console.error('Error:', error);
                showModal('Error', `Failed to create quiz`, 'error');
                //alert('Failed to create quiz');
            });
    });
</script>
<?php include "Views/frontend/partitions/footer.php"; ?>