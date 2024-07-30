<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Table</title>
        <link rel="stylesheet" href="../../../../Project_1/src/output.css">
    </head>

    <body class="bg-gray-100 p-4">

        <div class="container mx-auto mb-3">
            <form
                class="flex max-w-72 gap-2 rounded-lg bg-gray-100 items-center p-4 w-full h-6 border border-gray-300 mb-3"
                action="search" method="post" enctype="multipart/form-data">

                <input name="user_name" class="w-full bg-inherit outline-none" type="text"
                    placeholder="Search anything.." />
                <input type="submit" value="Search">
                <!-- <a type="submit"><img src="../../img/search_icon.svg" alt="" /></a> -->
            </form>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto bg-white rounded-lg shadow-lg">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">Birthday</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-left">City</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light border border-collapse">
                        <?php
                        foreach ($data['users'] as $user): ?>
                            <tr>
                                <td class="py-3 px-6 text-left"><?= $user['id'] ?></td>
                                <td class="py-3 px-6 text-left"><?= $user['name'] ?></td>
                                <td class="py-3 px-6 text-left"><?= $user['birthday'] ?></td>
                                <td class="py-3 px-6 text-left"><?= $user['email'] ?></td>
                                <td class="py-3 px-6 text-left"><?= $user['city_name'] ?></td>
                            </tr>
                        <?php endforeach; ?>

                        <!-- Add more rows for other users here -->
                    </tbody>
                </table>
            </div>
        </div>
    </body>

</html>