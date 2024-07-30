<?php
$title = "Detail User";
$style = '';
include "Views/frontend/partitions/header.php";
?>
<style>
.tabs .slider {
    --slide: 3;
}
</style>
<?php include "Views/frontend/users/detail-partitions/_style-detail.php"; ?>

<!-- Main Content -->
<div id="choiceModal" class="hidden fixed z-50 inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative mx-auto p-5 border w-96 shadow-lg rounded-md bg-white top-1/2 -translate-y-1/2">
        <div class="mt-3 text-center">
            <div id="modal-icon" class="mx-auto flex items-center justify-center h-12 w-12 rounded-full mb-3">
                <!-- SVG icon will be changed dynamically -->
            </div>
            <h3 class="text-xl leading-6 font-bold text-gray-900" id="modal-title">Confirm Your Action</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-lg text-gray-500" id="modal-content">Are you sure you want to proceed?</p>
            </div>
            <div class="grid grid-cols-2 gap-3 items-center px-4 py-3">
                <button onclick="modalChoice('yes')"
                    class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300">
                    Yes
                </button>
                <button onclick="modalChoice('no')"
                    class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300">
                    No
                </button>
            </div>
        </div>
    </div>
</div>

<div id="Main-Content"
    class="flex-1 transition-all duration-300 mx-auto max-w-[80rem] items-center py-16 min-h-[calc(100vh-133px)]">
    <span class="flex items-center gap-2 p-6 text-2xl font-bold">
        Detail User
    </span>
    <div class="flex gap-6 px-6">
        <div class="h-fit w-64 flex-shrink-0 rounded-lg bg-white p-6">
            <div class="flex justify-center">
                <img class="h-24 w-24 rounded-full object-cover"
                    src=<?php echo IMAGE_URL . '/User_image/' . $user[0]['avata'] ?> alt="" />
            </div>
            <div class="my-3 text-center">
                <!--                 <?php
                print_r($user);
                ?> -->
                <h1 class="text-lg font-bold"><?= $user[0]['display_name'] ?></h1>
                <p class="text-gray-400"><?= $user[0]['role'] ?></p>
            </div>
            <hr />
            <div class="mt-6 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="{1.5}"
                    stroke="currentColor" class="size-4 text-gray-500">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                </svg>

                <p class="text-sm font-medium"><?= $user[0]['email'] ?></p>
            </div>
            <div class="mt-3 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                </svg>

                <p class="text-sm font-medium"><?= $user[0]['phone'] ?></p>
            </div>
        </div>
        <div class=" w-full rounded-lg bg-white p-6">
            <div class="tabs">
                <input type="radio" id="tab1" name="tab-control" checked>
                <input type="radio" id="tab2" name="tab-control">
                <input type="radio" id="tab3" name="tab-control">
                <ul>
                    <li title="Infomation"><label for="tab1" role="button"><br><span>Infomation</span></label></li>
                    <li title="Created Exercise"><label for="tab2" role="button"><br><span>Created
                                Exercise</span></label></li>
                    <li title="Completed Exercises"><label for="tab3" role="button"><br><span>Completed
                                Exercises</span></label></li>
                    <!-- <li title="Returns"><label for="tab4" role="button"><br><span>Returns</span></label></li> -->
                </ul>
                <div class="slider">
                    <div class="indicator"></div>
                </div>
                <div id="Content" class="content">
                    <?php include "Views/frontend/users/detail-partitions/_info.php"; ?>

                    <section id="Content_Created_Exercise">
                        <div id="Create_Exercise" class="rounded-lg border border-gray-300 p-4">
                            <div class="flex mb-2 ">
                                <h1 class=" text-lg font-semibold sm:text-xl">
                                    Create Exercise
                                </h1>
                                <a href="../../index.php/exercise/create"
                                    class="ml-auto flex gap-2 bg-blue-500 items-center px-3 button py-1 text-white  rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 ml-auto cursor-pointer">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Create
                                </a>


                            </div>
                            <hr />
                            <div class="container mx-auto px-4 py-5">
                                <table class="min-w-full table-auto">
                                    <thead class="bg-gray-200">
                                        <tr>
                                            <th
                                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ID</th>
                                            <th
                                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Title</th>
                                            <th
                                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Topic</th>
                                            <th
                                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Level</th>
                                            <th
                                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Time Limit (mins)</th>
                                            <th
                                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Has Time Limit</th>
                                            <th
                                                class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        <?php foreach ($createdExercises as $exercise): ?>
                                        <tr>
                                            <td class="px-4 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <?= htmlspecialchars($exercise['ExerciseID']) ?>
                                            </td>
                                            <td class="px-4 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <?= htmlspecialchars($exercise['ExerciseTitle']) ?? '' ?>
                                            </td>
                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                                <?= htmlspecialchars($exercise['TopicName']) ?>
                                            </td>
                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                                <?= htmlspecialchars($exercise['LevelName']) ?>
                                            </td>
                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                                <?= htmlspecialchars($exercise['time_limit_minutes']) ?>
                                            </td>
                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                                <?= htmlspecialchars($exercise['has_time_limit']) ?>
                                            </td>
                                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                                <a href="../exercise/detail?id=<?= $exercise['ExerciseID'] ?>"
                                                    class="text-blue-500 hover:underline">Detail</a>
                                                /
                                                <a href="../exercise/update?id=<?= $exercise['ExerciseID'] ?>"
                                                    class="text-yellow-500 hover:underline">Edit</a>
                                                /
                                                <span
                                                    class="delete-exercise text-red-500 hover:underline cursor-pointer"
                                                    data-id="<?= $exercise['ExerciseID'] ?>">Delete</span>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>

                    <?php include "Views/frontend/users/detail-partitions/_history-completed.php"; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<footer class="bg-black">
    <div
        class="mx-auto max-w-[80rem] items-center py-16 grid lg:grid-cols-3 grid-rows-[auto,auto] grid-cols-1 gap-5 text-white">
        <h1 class="text-3xl font-bold col-span-2">GOODGOAT</h1>
        <div class="flex gap-3 items-center">
            <p class="w-fit font-semibold mr-2">FOLLOW</p>
            <img src="../../img/telegram-icon.png" alt="">
            <img src="../../img/twitter-icon.png" alt="">
            <img src="../../img/youtube-icon.png" alt="">
            <img src="../../img/facebook-icon.png" alt="">
        </div>
        <div class="grid gap-3">
            <p class="font-semibold">THÔNG TIN DOANH NGHIỆP</p>
            <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd"
                        d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                        clip-rule="evenodd" />
                </svg>
                <p>HCM UNIVERSITY OF INDUSTRY AND TRADE</p>
            </div>
            <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                        clip-rule="evenodd" />
                </svg>
                <p>(+84) 932 576 952</p>
            </div>
            <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path
                        d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                    <path
                        d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                </svg>
                <p>dattruong19122003@gmail.com</p>
            </div>
        </div>
        <div>
            <p class="mb-3 font-semibold">LIÊN KẾT NHANH</p>
            <div class="grid grid-cols-[auto,1fr] grid-rows-3 gap-x-5 gap-y-3">
                <a href="#">Home page</a>
                <a href="#">Term & Conditions</a>
                <a href="#">Exercise</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Library</a>
                <a href="#">Contact</a>
            </div>
        </div>
        <div>
            <p class="mb-3 font-semibold">COURSE</p>
            <div class="grid grid-cols-[auto,1fr] grid-rows-3 gap-x-5 gap-y-3 ">
                <a href="#">Exercise A </a>
                <a href="#">Exercise D </a>
                <a href="#">Exercise B </a>
                <a href="#">Exercise E </a>
                <a href="#">Exercise C </a>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var user_Id = '';
document.addEventListener('DOMContentLoaded', function() {
    const queryString = window.location.search; // Lấy phần query string của URL
    const urlParams = new URLSearchParams(queryString);
    user_Id = urlParams.get('id'); // Lấy giá trị của tham số 'id'
});

document.addEventListener('DOMContentLoaded', function() {
    // Thêm sự kiện cho tất cả các nút delete
    const deleteButtons = document.querySelectorAll('.delete-exercise');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const exerciseId = this.getAttribute('data-id');
            showModal('Delete', 'Are you sure you want to delete this exercise?', 'error', true,
                exerciseId);
        });
    });
});

function showModal(title, content, type, withChoices, exerciseId) {
    // Set the modal title and content
    const modalIcon = document.getElementById('modal-icon');
    modalIcon.innerHTML = '';
    document.getElementById('modal-title').innerText = title;
    document.getElementById('modal-content').innerText = content;

    if (type === 'success') {
        iconHTML =
            `<svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>`;
        colorClass = 'bg-green-100';
    } else if (type === 'error') {
        iconHTML =
            `<svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>`;
        colorClass = 'bg-red-100';
    }

    // Configure modal for displaying choices
    const buttonsContainer = document.getElementById('modal-buttons');
    if (withChoices) {
        buttonsContainer.innerHTML = `
            <button onclick="modalChoice('yes', '${exerciseId}')"
                class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300">
                Yes
            </button>
            <button onclick="modalChoice('no')"
                class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300">
                No
            </button>
        `;
    } else {
        buttonsContainer.innerHTML = `<button id="closeBtn" onclick="closeModal()"
            class="px-4 py-2 bg-blue-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
            Close
        </button>`;
    }
    modalIcon.className =
        `mx-auto flex items-center justify-center h-12 w-12 rounded-full mb-3 ${colorClass}`;
    modalIcon.innerHTML = iconHTML;
    // Show the modal
    document.getElementById('myModal').classList.remove('hidden');
}


function modalChoice(choice, exerciseId) {
    if (choice === 'yes') {
        $.ajax({
            url: '../exercise/delete',
            type: 'POST',
            data: {
                id: exerciseId
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 1) {
                    document.querySelector(`[data-id="${exerciseId}"]`).parentNode.parentNode
                        .remove(); // Xóa dòng
                    showModal('Success', 'Exercise deleted successfully', 'success', false);
                } else {
                    showModal('Error', 'Failed to delete exercise', 'error', false);
                }
            }
        });
    } else if (choice === 'no') {
        closeModal();
    }
}

function closeModal() {
    document.getElementById('myModal').classList.add('hidden');
}

$(document).ready(function() {
    document.querySelector('#updateDetail').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        //post data update detail to function updateDetail
        $.ajax({
            url: '../user/updateDetail',
            type: 'POST',
            data: {
                id: user_Id,
                displayName: document.querySelector('input[name="displayName"]').value,
                dateOfBirth: document.querySelector('input[name="dateOfBirth"]').value,
                emailAddress: document.querySelector('input[name="emailAddress"]').value,
                phoneNumber: document.querySelector('input[name="phoneNumber"]').value,
                gender: document.querySelector('select[name="gender"]').value,
                role: document.querySelector('select[name="role"]').value
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 1) {
                    //update all info user into input
                    document.querySelector('#info-display_name').innerText = document
                        .querySelector('input[name="displayName"]').value;
                    document.querySelector('#info-birthday').innerText = document
                        .querySelector('input[name="dateOfBirth"]').value;
                    document.querySelector('#info-email').innerText = document
                        .querySelector('input[name="emailAddress"]').value;
                    document.querySelector('#info-phone').innerText = document
                        .querySelector('input[name="phoneNumber"]').value;
                    document.querySelector('#info-gender').innerText = document
                        .querySelector('select[name="gender"]').value;
                    document.querySelector('#info-role').innerText = document.querySelector(
                        'select[name="role"]').value;
                    alert('Update success');
                } else {
                    alert('Update fail');
                }
            }
        });
    });

    document.getElementById('edit').addEventListener('click', function() {
        document.getElementById('Infomation').classList.add('hidden');
        document.getElementById('Edit-Detail').classList.remove('hidden');
    });

    document.getElementById('Back').addEventListener('click', function() {
        document.getElementById('Infomation').classList.remove('hidden');
        document.getElementById('Edit-Detail').classList.add('hidden');
    });


    const tabs = document.querySelectorAll('#tab');
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(t => t.classList.remove(
                'active')); // Xóa class 'active' khỏi tất cả các tab
            tab.classList.add('active'); // Thêm class 'active' vào tab được nhấn
        });
    });
});

window.addEventListener('resize', function() {
    myChart.resize();
});


document.addEventListener('DOMContentLoaded', function() {
    fetch(
            './showChart?id=' + user_Id
        ) // Đảm bảo thay thế 'path_to_your_php_script.php' bằng đường dẫn đến tập lệnh PHP của bạn
        .then(response => response.json())
        .then(data => {
            const dates = data.map(item => item.date_completed);
            const taskCounts = data.map(item => item.task_count);
            const averageScores = data.map(item => item.average_score);

            const ctx = document.getElementById("myChart").getContext("2d");
            const myChart = new Chart(ctx, {
                type: "bar", // Định dạng biểu đồ
                data: {
                    labels: dates, // Nhãn là các ngày
                    datasets: [{
                        label: 'Số lượng bài tập',
                        data: taskCounts, // Dữ liệu số lượng bài tập
                        type: 'line',
                        borderColor: '#FF6384',
                        borderWidth: 2,
                        fill: false
                    }, {
                        label: 'Điểm trung bình',
                        data: averageScores, // Dữ liệu điểm trung bình
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
});
</script>


</body>

</html>