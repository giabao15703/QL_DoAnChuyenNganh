<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>VD2</title>
      <link rel="stylesheet" href="../output.css">
   </head>

   <body class="container mx-auto max-w-[50rem] p-12">
      <h1 class="text-center mb-5 text-3xl font-bold text-red-600">VÍ DỤ 2</h1>
      <form class="grid gap-3 grid-cols-[auto,auto] text-center items-center mb-4" action="vd2.php">
         <div>
            <label for="">Number</label>
            <input class="border" type="number" name="number" id="">
         </div>
         <div class="flex items-center gap-3">
            <label for="">Color</label>
            <input type="color" name="color">
         </div>
         <input type="submit"
            class="border rounded-lg w-fit px-5 py-2 hover:opacity-80 transition-all bg-blue-600 text-white mx-auto col-span-2 mt-3"
            value="Bảng cửu chương">
      </form>


      <?php
      if ($_SERVER["REQUEST_METHOD"] == "GET") {
         $v1 = isset($_GET['number']) ? $_GET['number'] : '0';
         $v2 = isset($_GET['color']) ? $_GET['color'] : '0';
         include('function.php');
         bbc($v1, $v2);
      }
      ?>
      <a href="../../Views/frontend/baitaps/buoi4.php" class="underline">
         <--- Back</a>
   </body>

</html>