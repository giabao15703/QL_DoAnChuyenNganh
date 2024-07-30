<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create News</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class="bg-gray-100">
        <div class="max-w-2xl mx-auto p-5">
            <h1 class="text-xl font-semibold mb-4">Create News</h1>
            <form action="create" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
                enctype="multipart/form-data">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Title
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="title" name="title" type="text" placeholder="News Title">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                        Content
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="content" name="content" rows="5" placeholder="Enter content here..."></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image[]">
                        Image URL
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="image" name="image" type="file" placeholder="http://example.com/image.jpg">
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Submit
                    </button>
                    <button
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="reset">
                        Reset
                    </button>
                </div>
            </form>
        </div>

        <script>
            document.querySelector('form').addEventListener('submit', async function (e) {
                e.preventDefault();
                let formData = new FormData(this); // Tạo đối tượng FormData để gửi dữ liệu form
                let response = await fetch('create', {
                    method: 'POST',
                    body: formData // Sử dụng formData thay vì JSON.stringify
                });
                let result = await response.json();
                if (result.status === 1) {
                    alert('Create news successfully');
                    //window.location.href = 'index';
                } else {
                    alert('Create news failed');
                }
            });
        </script>


    </body>

</html>