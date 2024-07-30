<?php
$title = "Update Quiz";
$style = '';
include "Views/frontend/partitions/header.php";
/* echo '<pre>';
print_r($exercise); */
?>
<section class="relative bg-gradient-exercise min-h-[calc(100vh-133px)]">
    <div class="container mx-auto px-4 py-16 max-w-[80rem]">
        <h1 class="text-xl font-bold mb-6">Updade a Quiz</h1>
        <form id="quizForm" class="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4 relative">
            <div class="flex gap-5 mb-5 items-center text-nowrap">
                <label for="topic">Chủ đề:</label>
                <select id="topic" name="topic" class="bg-white p-2 border border-gray-300 rounded-md">
                    <?php foreach ($topics as $topic): ?>
                    <option value="<?= $topic['id'] ?>" <?= $topic['id'] == $exercise['topic_id'] ? 'selected' : '' ?>>
                        <?= $topic['name'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>

                <!-- Select input cho cấp độ -->
                <label for="level">Cấp độ:</label>
                <select id="level" name="level" class="bg-white p-2 border border-gray-300 rounded-md">
                    <?php foreach ($levels as $level): ?>
                    <option value="<?= $level['id'] ?>" <?= $level['id'] == $exercise['level_id'] ? 'selected' : '' ?>>
                        <?= $level['name'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>

                <label for="hasLimitTime">Số lượt làm bài:</label>
                <input type="number" id="hasLimitTime" name="hasLimitTime"
                    class="bg-white p-2 border border-gray-300 rounded-md w-16" min="1"
                    value="<?= $exercise['has_time_limit'] ?>">

                <label for="timeLimitMinutes">Thời gian làm bài (phút):</label>
                <input type="number" id="timeLimitMinutes" name="timeLimitMinutes"
                    class="bg-white p-2 border border-gray-300 rounded-md w-16" min="1"
                    value="<?= $exercise['time_limit_minutes'] ?>">
                <span id="Exercise_ID" data-id=<?= $exercise['id'] ?>>ID: <?= $exercise['id'] ?></span>
            </div>
            <div class="mb-3">
                <label for="title"> Title</label>
                <input type="text" name="title" id="title"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="<?= $exercise['title'] ?> "required>
            </div>
            <div id="questionsContainer">
                <?php foreach ($questions as $index => $question): ?>
                <div class="question-block mb-4 border-b border-gray-200 pb-4" id=<?= $question['id'] ?>>
                    <div class="flex justify-between items-end mb-3">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Question <?= $index + 1 ?></label>
                        <!-- <button type="button" onclick="removeQuestion(<?= $index + 1 ?>)"
                            class="text-red-500 px-2 py-1 border border-red-500 hover:bg-red-500 hover:text-white transition-all duration-300 rounded-lg">Remove</button> -->
                    </div>
                    <input type="text" name="question_<?= $index + 1 ?>" placeholder="Enter your question"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        value="<?= $question['question'] ?>">
                    <div class="mt-3">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Answers</label>
                        <?php
                            /* echo '<pre>';
                            print_r($question['answers']); */
                            $questionAnswers = json_decode($question['answers'], true);
                            foreach ($questionAnswers as $ansIndex => $answer): ?>
                        <div class="flex items-center mb-2">
                            <input type="radio" name="correct_<?= $index + 1 ?>"
                                value="answer<?= $ansIndex + 1 ?>_<?= $index + 1 ?>" class="mr-2"
                                <?= $answer['isCorrect'] == 1 ? 'checked' : '' ?>>
                            <input type="text" name="answer<?= $ansIndex + 1 ?>_<?= $index + 1 ?>"
                                placeholder="Answer <?= $ansIndex + 1 ?>"
                                class="answer-input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                value="<?= $answer['answer'] ?>">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- <button type="button" id="addQuestion"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add Question
            </button> -->
            <input type="submit" value="Submit Quiz"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded right-0 relative">
        </form>
    </div>
</section>

<script>
document.getElementById('quizForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Ngăn không cho form gửi theo cách thông thường

    let formData = new FormData();

    // Thu thập thông tin về chủ đề, cấp độ, số lượt làm bài và thời gian làm bài
    formData.append('id', document.getElementById('Exercise_ID').dataset.id);
    formData.append('topic', document.getElementById('topic').value);
    formData.append('level', document.getElementById('level').value);
    formData.append('title', document.getElementById('title').value);
    formData.append('timeLimit', document.getElementById('timeLimitMinutes').value);
    formData.append('hasLimitTime', document.getElementById('hasLimitTime').value);

    // Khởi tạo mảng để giữ các câu hỏi
    let questions = [];
    let isValid = true;
    // Thêm các câu hỏi và câu trả lời vào mảng
    document.querySelectorAll('.question-block').forEach((block, index) => {
        let id = block.id;
        let questionText = block.querySelector('input[name^="question_"]').value;
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
            id: id,
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
    fetch('update', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            showModal('Success', `${data.message}`, 'success');
        })
        .catch((error) => {
            console.error('Error:', error);
            showModal('Error', `Failed to create quiz`, 'error');
            //alert('Failed to create quiz');
        });
});
</script>
<?php include "Views/frontend/partitions/footer.php"; ?>