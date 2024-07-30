<!doctype html>
<html lang="en">

   <head>
      <title>Title</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="stylesheet" href="../output.css">
   </head>

   <body class="container mx-auto max-w-[50rem] p-12">
      <h1 class="text-center mb-5 text-3xl font-bold text-red-600">VÍ DỤ 1</h1>
      <form class="grid gap-3 grid-cols-[auto,auto] text-center items-center mb-4" action="vd1.php" method="get">
         <h1 class="col-span-2 text-xl font-bold">FORM 1 <span class="font-normal text-lg">(method: Get)</span></h1>
         <div>
            <label for="">Number</label>
            <input class="border" type="number" name="Number" id="">
         </div>
         <div class="flex items-center gap-3">
            <label for="">Color</label>
            <input type="color" name="c">
         </div>
         <input type="submit"
            class="border rounded-lg w-fit px-5 py-2 hover:opacity-80 transition-all bg-blue-600 text-white mx-auto col-span-2 mt-3"
            value="Submit">
      </form>
      <form class="grid gap-3 grid-cols-[auto,auto] text-center items-center mb-4" action="vd1.php" method="post">
         <h1 class="col-span-2 text-xl font-bold">FORM 2<span class="font-normal text-lg">(method: Post)</span></h1>
         <div>
            <label for="">Number</label>
            <input class="border" type="number" name="Number" id="">
         </div>
         <div class="flex items-center gap-3">
            <label for="">Color</label>
            <input type="color" name="c">
         </div>
         <div class="col-span-2">
            <label for="">Image:</label>
            <input type="file" name="img" id="">
         </div>
         <input
            class="border rounded-lg w-fit px-5 py-2 hover:opacity-80 transition-all bg-blue-600 text-white mx-auto col-span-2 mt-3"
            type="submit" value="Submit">
      </form>
      <form class="grid gap-3 grid-cols-[auto,auto] text-center items-center mb-4" action="vd1.php" method="post"
         enctype="multipart/form-data">
         <h1 class="col-span-2 text-xl font-bold">FORM 3<span class="font-normal text-lg">(method: Post,
               enctype="multipart/form-data")</span></h1>
         <div>
            <label for="">Number</label>
            <input class="border" type="number" name="Number" id="">
         </div>
         <div class="flex items-center gap-3">
            <label for="">Color</label>
            <input type="color" name="c">
         </div>
         <div class="col-span-2">
            <label for="">Image:</label>
            <input type="file" name="img" id="">
         </div>
         <input
            class="border rounded-lg w-fit px-5 py-2 hover:opacity-80 transition-all bg-blue-600 text-white mx-auto col-span-2 mt-3"
            type="submit" value="Submit">
      </form>

      <pre class="p-4 border">
         <?php
         echo "<br/>";
         echo "<b>GET</b> <br/>";
         print_r($_GET);
         echo "<b>POST</b> <br/>";
         print_r($_POST);
         echo "<b>REQUEST</b> <br/>";
         print_r($_REQUEST);
         echo "<b>FILES</b> <br/>";
         print_r($_FILES); ?>
   </pre>
      <a href="../../Views/frontend/baitaps/buoi4.php" class="underline">
         <--- Back</a>
   </body>

</html>