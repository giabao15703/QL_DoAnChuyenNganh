<?php
$title = "Result";
$style = '';
include "Views/frontend/partitions/header.php";
?>


<section class="relative bg-gradient-exercise min-h-[calc(100vh-133px)]">
    <div class="relative mx-auto max-w-[80rem] font-primary_quicksand font-normal p-16">
        <h1 class="text-3xl font-bold mb-5 pb-4 border-b-8 border-b-black">NEWS</h1>
        <div id="Content" class="bg-white rounded-xl p-16">
            <h1 id="title" class="text-3xl font-bold border-b-4 border-black pb-4">
                <?= isset($new['title']) ? $new['title'] : ''; ?>
            </h1>
            <div id="date-created" class="my-4"><?= isset($new['created_at']) ? $new['created_at'] : ''; ?></div>
            <div id="image-gallery" class="flex flex-wrap justify-center gap-4 p-4">
                <?php
                $BASE_URL = BASE_URL;
                //print_r($new['image']);
                echo isset($new['image']) && $new['image'] != '' ? "<img class='w-full md:w-1/2 lg:w-1/3 object-cover rounded shadow' src='$BASE_URL/img/news/{$new['image']}'>"
                    : ''; ?>
                <!-- Các ảnh sẽ được thêm vào đây thông qua JavaScript hoặc PHP -->
            </div>
            <div id="main-content">
                <?= isset($new['content']) ? $new['content'] : ''; ?>
            </div>
        </div>
    </div>
</section>
<script>

</script>

<?php include "Views/frontend/partitions/footer.php"; ?>