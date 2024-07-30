<section id="Content_Completed_Exercise">
    <div id="Completed_Exercise" class="rounded-lg border border-gray-300 p-4">
        <div class="flex">
            <h1 class="pb-4 text-lg font-semibold sm:text-xl">
                Completed Exercises
            </h1>
        </div>
        <hr />
        <div class="container mx-auto px-4 py-5">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Exercise ID</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Topic</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Level</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Score</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date Completed</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php
                                        /* echo '<pre>';
                                                                                                       print_r($userHistoryExercises); */
                                        foreach ($userHistoryExercises as $exercise): ?>
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                            <?= htmlspecialchars($exercise['ExercisesID']) ?>
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
                            <?= htmlspecialchars($exercise['score']) ?>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                            <?= htmlspecialchars($exercise['date_completed']) ?>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                <a href="../UserHistoryExercise/result?id=<?= $exercise['UserExerciseHistoryID'] ?>&topic=<?= $exercise['TopicName'] ?>&level=<?= $exercise['LevelName'] ?>&title=<?= $exercise['ExerciseTitle'] ?>"
                                    class="text-blue-500 hover:underline">Detail</a>
                            </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="mx-auto p-5 w-full">
            <h1 class="text-xl font-semibold mb-4">Performance Overview</h1>
            <div class="grid grid-cols-1 gap-4">
                <div class="chart-container p-4 bg-white rounded shadow">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>