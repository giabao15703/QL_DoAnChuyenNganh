<?php
$title = "Detail User";
$style = '';
include "Views/frontend/partitions/header.php";
?>
<style>
.tabs .slider {
    --slide: 2;
}
</style>
<?php include "Views/frontend/users/detail-partitions/_style-detail.php"; ?>
<!-- Main Content -->
<div id="Main-Content"
    class="flex-1 transition-all duration-300 mx-auto max-w-[80rem] items-center py-16 min-h-[calc(100vh-133px)]">
    <span class="flex items-center gap-2 p-6 text-2xl font-bold">
        Detail User
    </span>
    <div class="flex gap-6 px-6">
        <div class="h-fit w-64 flex-shrink-0 rounded-lg bg-white p-6">
            <div class="flex justify-center">
                <img class="h-24 w-24 rounded-full object-cover"
                    src="<?php echo IMAGE_URL . 'User_image/' . $user[0]['avata'] ?>" alt="" />
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
                <input type="radio" id="tab3" name="tab-control">
                <ul>
                    <li title="Infomation"><label for="tab1" role="button"><br><span>Infomation</span></label></li>
                    <li title="Completed Exercises"><label for="tab3" role="button"><br><span>Completed
                                Exercises</span></label></li>
                    <!-- <li title="Returns"><label for="tab4" role="button"><br><span>Returns</span></label></li> -->
                </ul>
                <div class="slider">
                    <div class="indicator"></div>
                </div>
                <div id="Content" class="content">
                    <?php include "Views/frontend/users/detail-partitions/_info.php"; ?>

                    <?php include "Views/frontend/users/detail-partitions/_history-completed.php"; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var user_Id = '';
document.addEventListener('DOMContentLoaded', function() {
    const queryString = window.location.search; // Lấy phần query string của URL
    const urlParams = new URLSearchParams(queryString);
    user_Id = urlParams.get('id'); // Lấy giá trị của tham số 'id'
});

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

<?php include "Views/frontend/partitions/footer.php"; ?>