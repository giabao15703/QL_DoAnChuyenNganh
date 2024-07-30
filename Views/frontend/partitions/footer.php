<?php $script = $script ?? '';
?>
<footer class="bg-black">
    <div
        class="mx-auto max-w-[80rem] items-center py-16 grid lg:grid-cols-3 grid-rows-[auto,auto] grid-cols-1 gap-5 text-white">
        <h1 class="text-3xl font-bold col-span-2">GOODGOAT</h1>
        <div class="flex gap-3 items-center">
            <p class="w-fit font-semibold mr-2">FOLLOW</p>
            <img src="../../img/telegram-icon.png" alt="">
            <img src="../../img/twitter-icon.png" alt="">
            <img src="../../img/youtube-icon.png" alt="">
            <img src="../../img/facebook-icon.png" alt="">
        </div>
        <div class="grid gap-3">
            <p class="font-semibold">THÔNG TIN DOANH NGHIỆP</p>
            <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd"
                        d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                        clip-rule="evenodd" />
                </svg>
                <p>HCM UNIVERSITY OF INDUSTRY AND TRADE</p>
            </div>
            <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                        clip-rule="evenodd" />
                </svg>
                <p>(+84) 932 576 952</p>
            </div>
            <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path
                        d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                    <path
                        d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                </svg>
                <p>dattruong19122003@gmail.com</p>
            </div>
        </div>
        <div>
            <p class="mb-3 font-semibold">LIÊN KẾT NHANH</p>
            <div class="grid grid-cols-[auto,1fr] grid-rows-3 gap-x-5 gap-y-3">
                <a href="#">Home page</a>
                <a href="#">Term & Conditions</a>
                <a href="#">Exercise</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Library</a>
                <a href="#">Contact</a>
            </div>
        </div>
        <div>
            <p class="mb-3 font-semibold">COURSE</p>
            <div class="grid grid-cols-[auto,1fr] grid-rows-3 gap-x-5 gap-y-3 ">
                <a href="#">Exercise A </a>
                <a href="#">Exercise D </a>
                <a href="#">Exercise B </a>
                <a href="#">Exercise E </a>
                <a href="#">Exercise C </a>
            </div>
        </div>
    </div>
</footer>

<script>
function showModal(title, content, type) {
    const modalIcon = document.getElementById('modal-icon');
    modalIcon.innerHTML = ''; // Clear previous icon
    let iconHTML = '';
    let colorClass = '';

    if (type === 'success') {
        iconHTML =
            `<svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>`;
        colorClass = 'bg-green-100';
    } else if (type === 'error') {
        iconHTML =
            `<svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>`;
        colorClass = 'bg-red-100';
    }

    modalIcon.className =
        `mx-auto flex items-center justify-center h-12 w-12 rounded-full mb-3 ${colorClass}`;
    modalIcon.innerHTML = iconHTML;
    document.getElementById('modal-title').innerText = title;
    document.getElementById('modal-content').innerText = content;
    document.getElementById('myModal').classList.remove('hidden');
}

function closeModal() {
    if (event.target.id === 'myModal') {
        document.getElementById('myModal').classList.add('hidden');
    }
}
</script>

</body>

</html>