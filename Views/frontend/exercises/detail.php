<?php
$title = "Detail Quiz";
$style = '';
include "Views/frontend/partitions/header.php";
/* echo '<pre>';
print_r($exercise); */
?>
<section class="relative bg-gradient-exercise min-h-[calc(100vh-133px)]">
    <div class="container mx-auto px-4 py-16 max-w-[80rem]">
        <div id="quizForm" class="bg-white shadow-md rounded-xl px-8 pt-6 pb-8 mb-4 relative">
            <div id="Detail-Question">
                <h1 class="text-xl font-bold mb-6">Detail a Quiz <button id="show"
                        class="bg-blue-500 text-white rounded-lg p-2 text-sm right-0 float-end">Show
                        History Completed</button> </h1>
                <div class="flex gap-5 mb-5 items-center text-nowrap">
                    <label for="topic">Chủ đề:</label>
                    <span id="topic" name="topic" class="bg-white p-2 border border-gray-300 rounded-md">
                        <?php foreach ($topics as $topic) {
                            if ($topic['id'] == $exercise['topic_id']) {
                                echo $topic['name'];
                            }
                        }
                        ?>
                    </span>
                    <!-- Select input cho cấp độ -->
                    <label for="level">Cấp độ:</label>
                    <span id="level" name="level" class="bg-white p-2 border border-gray-300 rounded-md">
                        <?php foreach ($levels as $level) {
                            if ($level['id'] == $exercise['level_id']) {
                                echo $level['name'];
                            }
                        }
                        ?>
                    </span>
                    <label for="hasLimitTime">Số lượt làm bài:</label>
                    <span id="hasLimitTime" class="bg-white p-2 border border-gray-300 rounded-md w-16">
                        <?= $exercise['has_time_limit'] ?></span>
                    <label for="timeLimitMinutes">Thời gian làm bài (phút):</label>
                    <span id="timeLimitMinutes"
                        class="bg-white p-2 border border-gray-300 rounded-md w-16"><?= $exercise['time_limit_minutes'] ?></span>
                    <span id="Exercise_ID" data-id=<?= $exercise['id'] ?>>ID: <?= $exercise['id'] ?></span>
                </div>
                <div class="mb-3">
                    <label for="title"> Title</label>
                    <span type="text" name="title" id="title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline block"><?= $exercise['title'] ?></span>
                </div>
                <div id="questionsContainer">
                    <?php foreach ($questions as $index => $question): ?>
                    <div class="question-block mb-4 border-b border-gray-200 pb-4" id=<?= $question['id'] ?>>
                        <div class="flex justify-between items-end mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Question <?= $index + 1 ?></label>
                        </div>
                        <span name="question_<?= $index + 1 ?>"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline block">
                            <?= $question['question'] ?></span>
                        <div class="mt-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Answers</label>
                            <?php
                                $questionAnswers = json_decode($question['answers'], true);
                                foreach ($questionAnswers as $ansIndex => $answer): ?>
                            <div class="flex items-center mb-2">
                                <input type="radio" name="correct_<?= $index + 1 ?>"
                                    value="answer<?= $ansIndex + 1 ?>_<?= $index + 1 ?>" class="mr-2"
                                    <?= $answer['isCorrect'] == 1 ? 'checked' : '' ?> disabled>
                                <span
                                    class="answer-input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline block">
                                    <?= $answer['answer'] ?>
                                </span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="Detail-History-Complete" class="container mx-auto  hidden">
                <h1 class="text-xl font-bold mb-6">History Completed <button id="back"
                        class="bg-blue-500 text-white rounded-lg p-2 text-sm right-0 float-end">
                        <--Back to detail</button>
                </h1>
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                                User</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                User
                                Name</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                                Completed</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Score
                            </th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php foreach ($historyCompleteds as $historyCompleted): ?>
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                <?= htmlspecialchars($historyCompleted['user_ids']) ?>
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                <?= htmlspecialchars($historyCompleted['display_name']) ?>
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                <?= htmlspecialchars($historyCompleted['date_completed']) ?>
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                <?= htmlspecialchars($historyCompleted['score']) ?>
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                <a href="../UserHistoryExercise/result?id=<?= $historyCompleted['id'] ?>&title=<?= $exercise['title'] ?>"
                                    class="text-blue-500 hover:underline">Detail</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

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

document.getElementById('show').addEventListener('click', function() {
    document.getElementById('Detail-Question').classList.add('hidden');
    document.getElementById('Detail-History-Complete').classList.remove('hidden');
});

document.getElementById('back').addEventListener('click', function() {
    document.getElementById('Detail-Question').classList.remove('hidden');
    document.getElementById('Detail-History-Complete').classList.add('hidden');
});
</script>
<?php include "Views/frontend/partitions/footer.php"; ?>