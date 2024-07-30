<?= "User index view " ?>

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
                <?php if ($data['totalPages'] > 1) {
                    echo "<ul class='pagination flex items-center justify-center gap-3 [&_li:is(.active)]:scale-125'> ";

                    if ($data['currentPage'] > 1) {
                        echo "<li><a href='?page=" . ($data['currentPage'] - 1) . "'>&laquo;</a></li>";
                    }
                    for (
                        $i = 1;
                        $i
                        <= $data['totalPages'];
                        $i++
                    ) {
                        if ($i == $data['currentPage']) {
                            echo "<li class='active'><a href='?page=" . $i . "'>" . $i . "</a></li>";
                        } else {
                            echo "<li><a href='?page=" . $i . "'>" . $i . "</a></li>";
                        }
                    }
                    if (
                        $data['currentPage'] <
                        $data['totalPages']
                    ) {
                        echo "<li><a href='?page=" . ($data['currentPage'] + 1)
                            . "'>&raquo;</a></li>";
                    }
                    echo "</ul>";
                } ?>
            </div>
        </div>
        <form class="grid gap-2 rounded-lg bg-white items-center p-4 w-full border border-gray-300 mb-3" action="create"
            method="post" enctype="multipart/form-data">
            <h1 class="text-xl text-center text-blue-500 font-bold">CREATE USER</h1>
            <input name="user_id" class="w-full bg-inherit  border" type="text" placeholder="Enter user id" required />
            <input name="user_name" class="w-full bg-inherit  border" type="text" placeholder="Enter user name"
                required />
            <input name="user_birthday" class="w-full bg-inherit border " type="date" placeholder="Enter user birthday"
                required />
            <input name="user_email" class="w-full bg-inherit border " type="email" placeholder="Enter user email"
                required />
            <select name="user_city" class="w-full bg-inherit border " required>
                <?php
                print_r($data['city_list']);
                foreach ($data['city_list'] as $city): ?>
                    <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <input class="p-4 bg-blue-300 text-white" type="submit" value="Add User">
        </form>
        <form class="grid gap-2 rounded-lg bg-white items-center p-4 w-full border border-gray-300 mb-3" action="delete"
            method="post" enctype="multipart/form-data">
            <h1 class="text-xl text-center text-blue-500 font-bold">DELETE USER</h1>
            <input name="user_id" class="w-full bg-inherit  border" type="text" placeholder="Enter user id" required />
            <input type="submit" value="Delete User">
        </form>
    </body>

</html><img src="" alt="">