<?php
$title = "HOME";
$style = '
';
?>
<?php include "Views/frontend/partitions/header.php"; ?>
<section class="relative bg-[#F4F7F6]">
    <div class="mx-auto max-w-[80rem] items-center  flex justify-between">
        <div class="max-w-[576px] grid gap-5">
            <h1 class="text-6xl font-bold">Enhance Your English Skills - One Exercise at a Time</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book.</p>
            <div>
                <a href="../../index.php/exercise/search"
                    class="button w-fit font-semibold rounded-[76px] text-white bg-tertiary px-[32px] py-[20px] text-nowrap mr-4 hover:!text-white">GET
                    STARTED</a>
                <a href="../../index.php/user/login"
                    class="button inline-block w-full max-w-[162px] font-semibold rounded-[76px] text-black hover:!text-black border-2 border-black  px-[32px] py-[20px] text-nowrap">LOGIN</a>
            </div>
        </div>
        <div class=" w-[789px] h-[789px]">
            <img class="absolute right-1/2 top-20" src=<?= IMAGE_URL . "paper_airplane.png" ?> alt="">
            <img class="absolute z-10 right-0 2xl:right-40" src=<?= IMAGE_URL . "goodgoat.png" ?> alt="">
            <img class="absolute bottom-0 right-0" src=<?= IMAGE_URL . "Subtract.png" ?> alt="">
            <img class="absolute right-0 bottom-0" src=<?= IMAGE_URL . "Ellipse.png" ?> alt="">
        </div>
    </div>
</section>
<section class="mx-auto max-w-[80rem] items-center py-32">
    <h1 class="mb-4 text-center text-2xl font-bold text-secondary">
        Đáp ứng mọi nhu cầu từ khắp nơi trên thế giới
    </h1>
    <div class="grid grid-cols-3 gap-4">
        <div class="flex flex-col text-center">
            <img class="w-full object-contain"
                src="https://d23cwzsbkjbm45.cloudfront.net/static/images/wp/7f3afeb8d03858f5e1af.svg" alt="" />
            <p class="font-bold text-secondary">Thuận tiện</p>
            <p class="">
                Làm bài trắc nghiệm trực tuyến bất cứ nơi đâu, bất kỳ lúc nào
            </p>
        </div>
        <div class="flex flex-col text-center">
            <img class="w-full object-contain"
                src="https://d23cwzsbkjbm45.cloudfront.net/static/images/wp/e7259a1effee7e8b96a0.svg" alt="" />
            <p class="font-bold text-secondary">Nhanh chóng</p>
            <p class="">
                Nhận kết quả ngay lập tức sau khi làm xong và ngay lập tức chia
                sẽ kết quả với bất cứ ai
            </p>
        </div>
        <div class="flex flex-col text-center">
            <img class="w-full object-contain"
                src="https://d23cwzsbkjbm45.cloudfront.net/static/images/wp/e2b4d673643684d90a33.svg" alt="" />
            <p class="font-bold text-secondary">Không tốn chi phí</p>
            <p class="">
                Hoàn toàn miễn phí để thử sức và không cần trả phí cho bất kỳ ai
            </p>
        </div>
    </div>
</section>
<section class="grid grid-cols-2 mx-auto max-w-[80rem] items-center py-16">
    <div>
        <div class="relative mr-10">
            <img src=<?= IMAGE_URL . "image_1.png" ?> alt="">
            <div class="absolute rounded-full -z-10 top-0" style="width: 220px;height: 220px;background-color:#FFEAC2;">
            </div>
            <div class="absolute bottom-0 -z-10"
                style="width: 504px;height: 257px;border-radius: 100px 0px 100px 0px;transform: rotateY(-180deg);background-color:#AAD59F">
            </div>
        </div>
    </div>
    <div class="relative">
        <h1 class="font-bold text-3xl relative mb-10 w-fit">How it work
            <div class="absolute top-1/2 -translate-y-1/2 -z-10 right-0 translate-x-[80%]"
                style="width: 152px;height: 91px;background: #D7E9F0;"></div>
        </h1>
        <div class="">
            <div class="flex items-center gap-3 w-full">
                <div class="bg-amber-400 w-fit rounded-full text-white  p-5 text-lg font-bold leading-[0.5rem]">
                    1
                </div>
                <div class="relative w-full">
                    <p class="text-amber-400 font-semibold">Choose Your Exercise</p>
                    <p class="absolute">Lorem ipsum dolor sit amet, consecteturroi adipiscing elit, sed do eiusmod
                        tempor ladie incididunt ut
                        labore et dolore magna aliqua. </p>
                </div>

            </div>
            <img class="relative left-6 my-2" src=<?= IMAGE_URL . "Line.svg" ?>>
            <div class="flex items-center gap-3">
                <div class="w-fit rounded-full bg-gray-100 p-5 text-lg font-bold leading-[0.5rem]">
                    2
                </div>
                <p class="font-semibold">Start Practicing</p>
            </div>
            <img class="relative left-6 my-2" src=<?= IMAGE_URL . "Line.svg" ?>>
            <div class="flex items-center gap-3">
                <div class="w-fit rounded-full bg-gray-100 p-5 text-lg font-bold leading-[0.5rem]">
                    3
                </div>
                <p class="font-semibold">Track Your Progress</p>
            </div>
        </div>
    </div>
    </div>
</section>
<section class="relative mx-auto block max-w-[80rem] items-center py-16">
    <h1 class="text-2xl font-bold text-center mb-3">Why you should choose us</h1>
    <p class="mx-auto w-full max-w-2xl text-center mb-5">Lorem ipsum dolor sit amet, consecteturroi adipiscing elit, sed
        do
        eiusmod
        tempor
        ladie incididunt ut labore et
        dolore magna aliqua. </p>
    <div class="relative w-fit h-[200px] mx-auto">
        <img class="top-1/2 mx-auto translate-y-1/2 " src=<?= IMAGE_URL . "Line_choose_us.svg" ?> alt="">
        <div class="absolute top-16 -left-20 z-10 text-center flex flex-col items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="size-20 p-5 bg-[#F4D1B3] rounded-full "
                style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;">
                <path
                    d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                <path
                    d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                <path
                    d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
            </svg>
            <p class="text-3xl w-fit font-semibold ">300+</p>
            <p class="max-w-48 w-full uppercase">Students have completed the course</p>
        </div>
        <div class=" absolute left-64 -bottom-10 flex flex-col items-center gap-3 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="size-20 p-5 bg-[#ADD19B] rounded-full"
                style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;">
                <path
                    d="M21.721 12.752a9.711 9.711 0 0 0-.945-5.003 12.754 12.754 0 0 1-4.339 2.708 18.991 18.991 0 0 1-.214 4.772 17.165 17.165 0 0 0 5.498-2.477ZM14.634 15.55a17.324 17.324 0 0 0 .332-4.647c-.952.227-1.945.347-2.966.347-1.021 0-2.014-.12-2.966-.347a17.515 17.515 0 0 0 .332 4.647 17.385 17.385 0 0 0 5.268 0ZM9.772 17.119a18.963 18.963 0 0 0 4.456 0A17.182 17.182 0 0 1 12 21.724a17.18 17.18 0 0 1-2.228-4.605ZM7.777 15.23a18.87 18.87 0 0 1-.214-4.774 12.753 12.753 0 0 1-4.34-2.708 9.711 9.711 0 0 0-.944 5.004 17.165 17.165 0 0 0 5.498 2.477ZM21.356 14.752a9.765 9.765 0 0 1-7.478 6.817 18.64 18.64 0 0 0 1.988-4.718 18.627 18.627 0 0 0 5.49-2.098ZM2.644 14.752c1.682.971 3.53 1.688 5.49 2.099a18.64 18.64 0 0 0 1.988 4.718 9.765 9.765 0 0 1-7.478-6.816ZM13.878 2.43a9.755 9.755 0 0 1 6.116 3.986 11.267 11.267 0 0 1-3.746 2.504 18.63 18.63 0 0 0-2.37-6.49ZM12 2.276a17.152 17.152 0 0 1 2.805 7.121c-.897.23-1.837.353-2.805.353-.968 0-1.908-.122-2.805-.353A17.151 17.151 0 0 1 12 2.276ZM10.122 2.43a18.629 18.629 0 0 0-2.37 6.49 11.266 11.266 0 0 1-3.746-2.504 9.754 9.754 0 0 1 6.116-3.985Z" />
            </svg>
            <p class="text-3xl w-fit font-semibold ">100%</p>
            <p class="max-w-48 uppercase w-full">international standard curriculum</p>
        </div>
        <div class="absolute top-12 right-56 text-center flex flex-col items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="size-20 p-5 bg-[#D7E9F0] rounded-full  "
                style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;">
                <path fill-rule="evenodd"
                    d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                    clip-rule="evenodd" />
            </svg>
            <p class="text-3xl w-fit font-semibold ">50+</p>
            <p class="max-w-48 uppercase w-full">high quality teaching staff</p>
        </div>
        <div class="absolute top-20 -right-20 flex flex-col items-center text-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="size-20 p-5 bg-[#FFEAC2] rounded-full"
                style="box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;">
                <path
                    d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
            </svg>
            <p class="text-3xl w-fit font-semibold ">500+</p>
            <p class="max-w-48 uppercase w-full">Diverse courses for each level</p>
        </div>


    </div>

</section>
<section class="relative mx-auto flex max-w-[80rem] items-center justify-between py-16">
    <div>
        <h1 class="text-2xl font-bold text-secondary">
            Kết quả chính xác trong giây lát
        </h1>
        <div class="mb-8 grid grid-cols-[auto,1fr] grid-rows-2 gap-x-4">
            <img class="row-span-2 h-full w-10 object-contain"
                src="https://d23cwzsbkjbm45.cloudfront.net/static/images/wp/102dfeffeafe6a17ca3d.svg" alt="" />
            <div class="flex items-center gap-4">
                <h4 class="font-bold text-secondary">Thủ tục nhanh gọn</h4>
                <div
                    class="inline-block items-center rounded-lg bg-[#f0faff] px-3 text-[12px] font-bold leading-5 text-[#3c5d87]">
                    5 PHÚT
                </div>
            </div>
            <p class="text-wrap">
                Có thể làm bài trắc nghiệm ngay lập tức mà không cần thông qua các thủ tục
            </p>
        </div>
        <div class="mb-8 grid grid-cols-[auto,1fr] grid-rows-2 gap-x-4">
            <img class="row-span-2 h-full w-10 object-contain"
                src="https://d23cwzsbkjbm45.cloudfront.net/static/images/wp/6a5452121aee94ada310.svg" alt="" />
            <div class="flex items-center gap-4">
                <h4 class="font-bold text-secondary">Bài tập đa dạng</h4>
                <div
                    class="inline-block items-center rounded-lg bg-[#f0faff] px-3 text-[12px] font-bold leading-5 text-[#3c5d87]">
                    10 PHÚT
                </div>
            </div>
            <p class="text-wrap">
                Chuỗi các câu hỏi khác nhau để đánh giá kỹ năng tiếng Anh của bạn
            </p>
        </div>
        <div class="mb-8 grid grid-cols-[auto,1fr] grid-rows-2 gap-x-4">
            <img class="row-span-2 h-full w-10 object-contain"
                src="https://d23cwzsbkjbm45.cloudfront.net/static/images/wp/6a5452121aee94ada310.svg" alt="" />
            <div class="flex items-center gap-4">
                <h4 class="font-bold text-secondary">
                    Writing sample và speaking sample
                </h4>
                <div
                    class="inline-block items-center rounded-lg bg-[#f0faff] px-3 text-[12px] font-bold leading-5 text-[#3c5d87]">
                    10 PHÚT
                </div>
            </div>
            <p>
                Những câu hỏi mở được chia sẻ với các tổ chức kèm theo điểm số của
                bạn
            </p>
        </div>
    </div>
    <img src="https://d23cwzsbkjbm45.cloudfront.net/static/images/wp/060e8f82f5cbe6aebee8.svg" alt="" />
</section>
<section
    class="relative mx-auto mb-24 max-w-[80rem] items-center justify-between rounded-2xl bg-[#083156] bg-[url('https://d23cwzsbkjbm45.cloudfront.net/static/images/wp/3d7f9a2252552a8a0237.svg')] py-16">
    <h1 class="mb-4 text-center text-3xl font-bold text-white">Bắt đầu</h1>
    <p class="mx-auto mb-4 max-w-[40rem] text-center leading-8 tracking-wider text-white">
        Đăng ký và chứng nhận trình độ Anh ngữ của bạn ngay hôm nay. Thi trực
        tuyến bất kỳ lúc nào, tại bất kỳ đâu. Hoàn thành trong 1 tiếng và nhận
        kết quả trong 2 ngày. Thoải mái chia sẻ kết quả tới hơn 5000 tổ chức.
    </p>
    <div class="flex justify-center gap-3">
        <a href="#" class="rounded-lg bg-primary px-5 py-3 text-sm font-bold text-secondary hover:bg-opacity-80">
            THI THỬ MIỄN PHÍ</a>
        <a href="#" class="rounded-lg bg-primary px-5 py-3 text-sm font-bold text-secondary hover:bg-opacity-80">
            NỘP PHÍ THI</a>
    </div>
</section>
<?php include "Views/frontend/partitions/footer.php"; ?>