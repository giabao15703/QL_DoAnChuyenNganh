<section id="Content_Infomation">
    <div id="Infomation" class="rounded-lg border border-gray-300 p-4">
        <div class="flex">
            <h1 class="pb-4 text-lg font-semibold sm:text-xl">
                Personal Info
            </h1>
            <svg id="edit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 ml-auto cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
        </div>
        <hr />
        <div class="mt-3 grid grid-cols-[auto,auto]">
            <div class="grid grid-cols-[auto,1fr] gap-4 gap-x-4">
                <span class="text-gray-500">Display Name</span>
                <span id="info-display_name" class="font-semibold"><?= $user[0]['display_name'] ?></span>
                <span class="text-gray-500">Date of Birth</span>
                <span id="info-birthday" class="font-semibold"><?= $user[0]['birthday'] ?? '__/__/__' ?></span>
                <span class="text-gray-500">Email Address</span>
                <span id="info-email" class="font-semibold"><?= $user[0]['email'] ?></span>
            </div>
            <div class="grid grid-cols-[auto,1fr] gap-3">
                <span class="text-gray-500">Gender</span>
                <span id="info-gender" class="font-semibold"><?= $user[0]['sex'] ?? '_' ?></span>
                <span class="text-gray-500">Phone Number</span>
                <span id="info-phone" class="font-semibold"><?= $user[0]['phone'] ?></span>
                <span class="text-gray-500">Role</span>
                <span id="info-role" class="font-semibold"><?= $user[0]['role'] ?></span>
            </div>
        </div>
    </div>
    <div id="Edit-Detail" class="rounded-lg border border-gray-300 p-4 mt-4 hidden">
        <h1 class="pb-4 text-lg font-semibold sm:text-xl">Edit Personal Info <span id="Back"
                class="float-end text-sm font-semibold cursor-pointer">
                <-- BACK</span>
        </h1>
        <hr />
        <form id="updateDetail" class="mt-3 grid grid-cols-2 gap-6">
            <div class="grid grid-cols-2 gap-3 items-center">
                <label for="displayName" class="text-gray-500">Display Name</label>
                <input type="text" id="displayName" name="displayName" value="<?= $user[0]['display_name'] ?>"
                    class="p-2 border border-gray-300 rounded-md">
                <label for="dateOfBirth" class="text-gray-500">Date of Birth</label>
                <input type="date" id="dateOfBirth" name="dateOfBirth" value="<?= $user[0]['birthday'] ?>"
                    class="p-2 border border-gray-300 rounded-md">
                <label for="emailAddress" class="text-gray-500">Email Address</label>
                <input type="email" id="emailAddress" name="emailAddress" value="<?= $user[0]['email'] ?>"
                    class="p-2 border border-gray-300 rounded-md" disabled>
            </div>
            <div class="grid grid-cols-2 gap-3 items-center">
                <label for="gender" class="text-gray-500">Gender</label>
                <select id="gender" name="gender" class="p-2 border border-gray-300 rounded-md">
                    <option value="">---</option>
                    <option value="male" <?= $user[0]['sex'] == 'male' ? 'selected' : '' ?>>Male
                    </option>
                    <option value="female" <?= $user[0]['sex'] == 'female' ? 'selected' : '' ?>>
                        Female
                    </option>
                    <option value="other" <?= $user[0]['sex'] == 'other' ? 'selected' : '' ?>>Other
                    </option>
                </select>
                <label for="phoneNumber" class="text-gray-500">Phone Number</label>
                <input type="text" id="phoneNumber" name="phoneNumber" value="<?= $user[0]['phone'] ?>"
                    class="p-2 border border-gray-300 rounded-md">
                <label for="role" class="text-gray-500">Role</label>
                <select id="role" name="role" class="p-2 border border-gray-300 rounded-md" disabled>
                    <option value="student" <?= $user[0]['role'] == 'student' ? 'selected' : '' ?>>
                        Student
                    </option>
                    <option value="teacher" <?= $user[0]['role'] == 'teacher' ? 'selected' : '' ?>>
                        Teacher
                    </option>
                </select>
            </div>
            <div class="col-span-2 flex justify-end mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update
                    Info</button>
            </div>
        </form>
    </div>
</section>