<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VD3</title>
        <link rel="stylesheet" href="../output.css">
    </head>


    <body class="container mx-auto max-w-[50rem] p-12">
        <h1 class="text-center mb-5 text-3xl font-bold text-red-600">VÍ DỤ 3</h1>
        <form class="grid gap-3 grid-cols-[auto,auto] text-center items-center mb-4" action="vd3.php" method="POST"
            enctype="multipart/form-data">
            <div>
                <label for="">Tên</label>
                <input class="border" type="text" name="ten" id="">
            </div>
            <div class="flex items-center gap-3">
                <label for="">Giới tính</label>
                <select name="gt" id="gt">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div class="col-span-2">
                <label for="">Image:</label>
                <input type="file" name="img" />
            </div>
            <input type="submit"
                class="border rounded-lg w-fit px-5 py-2 hover:opacity-80 transition-all bg-blue-600 text-white mx-auto col-span-2 mt-3"
                value="Submit">
        </form>

        <section class="border border-gray-300 rounded-lg p-4">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $ten = isset($_POST['ten']) ? $_POST['ten'] : 'Null';
                $gt = $_POST['gt'] ?? 'Nữ';
                $file_temp = $_FILES['img']['tmp_name']; // Đường dẫn tạm thời của tệp đã tải lên
                $img = $_FILES['img']['name'];

                $destination = "./img/" . $img;
                //echo $img;
                $result = move_uploaded_file($file_temp, $destination);
                //echo $destination;
                if ($gt == 'Nữ') {
                    echo '<h1 class = " text-center text-xl mb-4"> Chào chị ' . $ten . "</h1>";
                } else {
                    echo '<h1 class = " text-center text-xl mb-4"> Chào anh ' . $ten . "</h1>";
                }
            }
            ?>
            <div class="w-52 h-52 mx-auto"><img class="object-contain w-full h-full" src="./img/<?php echo $img ?>"
                    alt="">
            </div>
        </section>
        <a href="../../Views/frontend/baitaps/buoi4.php" class="underline">
            <--- Back</a>
    </body>

</html>