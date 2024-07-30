<section id="Content_Created_Exercise">
    <div id="Create_Exercise" class="rounded-lg border border-gray-300 p-4">
        <div class="flex mb-2 ">
            <h1 class=" text-lg font-semibold sm:text-xl">
                Create Exercise
            </h1>
            <a href="../../index.php/exercise/create"
                class="ml-auto flex gap-2 bg-blue-500 items-center px-3 button py-1 text-white  rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 ml-auto cursor-pointer">
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
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Topic</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Level</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Time Limit (mins)</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Has Time Limit</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php foreach ($createdExercises as $exercise): ?>
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                <?= htmlspecialchars($exercise['ExerciseID']) ?>
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
                                <span id="delete-exercise" class="text-red-500 hover:underline"
                                    data-id="<?= $exercise['ExerciseID'] ?>">Delete</span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>