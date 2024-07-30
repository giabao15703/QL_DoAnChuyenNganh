<?php
$title = "Result";
$style = '';
include "Views/frontend/partitions/header.php";
?>


<section class="relative bg-gradient-exercise min-h-[calc(100vh-133px)]">
    <div class="relative mx-auto max-w-[80rem] font-primary_quicksand font-normal p-16">
        <h1 class="text-3xl font-bold mb-5 pb-4 border-b-8 border-b-black">NEWS</h1>
        <div id="news-container" class="bg-white rounded-xl p-8">
            <!-- News items will be displayed here -->
        </div>
        <div id="pagination" class="text-center mt-10 gap-3"></div>
    </div>
</section>
<script>
// Function to fetch news items for a specific page
const container = document.getElementById('news-container');

function fetchNews(page) {
    fetch(`./index?page=${page}`)
        .then(response => response.json())
        .then(data => {
            displayNews(data.newsItems);
            window.scrollTo({
                top: container.offsetTop,
                behavior: 'smooth'
            });
            setupPagination(data.currentPage, data.totalPages);
        })
        .catch(error => console.error('Error loading the news:', error));
}

// Function to display news items
function displayNews(newsItems) {
    container.innerHTML = ''; // Clear previous content
    newsItems.forEach(item => {
        container.innerHTML += `
            <div class="grid grid-cols-[auto,1fr] gap-6">
                <div
                    class="size-20 border-2 border-gray-700 font-bold rounded-full text-center justify-center flex items-center">
                    ${fomateDate(item.created_at)}</div>
                <div>
                    <h2 class="text-2xl font-bold mb-5 underline">${item.title}</h2>
                    <p class="mb-4">${truncateText(item.content, 50)}</p>
                    <a href="./detail?id=${item.id}"><button class="text-white bg-black p-2 text-sm inline-block">Read more</button></a>
                </div>
            </div>
        `;
        if (newsItems.indexOf(item) !== newsItems.length - 1)
            container.innerHTML += '<hr class="my-5">';
    });
}

// Function to setup pagination
function setupPagination(currentPage, totalPages) {
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = ''; // Clear previous pagination buttons

    // Adding responsive margin and padding
    if (totalPages > 1) {
        for (let i = 1; i <= totalPages; i++) {
            pagination.innerHTML +=
                `<button class="px-4 py-2 mx-1 rounded-md text-sm ${i === currentPage ? 'bg-blue-500 text-white' : 'bg-white text-blue-500 hover:bg-blue-100'}" onclick="fetchNews(${i})">${i}</button>`;
        }
    }
}

function truncateText(text, maxLength) {
    // Check if the text length is greater than the maximum length
    if (text.length > maxLength) {
        // Return the substring from the beginning to maxLength and append an ellipsis
        return text.substring(0, maxLength) + "...";
    } else {
        // Return the original text if it's shorter than maxLength
        return text;
    }
}

function fomateDate(dateString) {
    //const dateString = "2024-05-05 20:05:11";

    // Create a new Date object using the date string
    const date = new Date(dateString);

    // Get the day and the month
    const day = date.getDate(); // Gets the day as a number
    const month = date.toLocaleString('en-US', {
        month: 'short'
    }); // Gets the abbreviated month name in English

    // Format the date as "05 May"
    const formattedDate = ` ${month} <br> ${day.toString()}`;
    return formattedDate;
}

// Initial fetch for the first page
document.addEventListener('DOMContentLoaded', () => {
    fetchNews(1);
});
</script>


<?php include "Views/frontend/partitions/footer.php"; ?>