<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="images/logo/hinh_nen_florentino_giam_sat_tinh_he_download.jpg" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="">
        <div class="container mx-auto flex justify-between items-center mt-4">
            <div class="flex">
                <div class="w-[25%] p-0 m-0">
                    <img src="images/logo/logo.jpg" class="w-[100%] p-0 m-0" alt="">
                </div>

                <div class="flex items-center justify-end ml-14">
                    <ul class="flex justify-between mx-auto font-bold">
                        <li class="mx-6"><a href="/">Trang Chủ</a></li>
                        <li class="mx-6"><a href="/Gioi-thieu">Giới thiệu</a></li>
                        <?php if (isset($_SESSION["auth"])) : ?>
                            <li class="mx-6"><a href="/Nap-the">Nạp thẻ</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <div class="flex gap-8 items-center">
                <div class="">
                    <?php if (isset($_SESSION["auth"])) : ?>
                        <ul class="flex gap-5">
                            <div class="w-[250px]">
                                <p class="mt-[10px] text-[#FF0000]"><?php echo $_SESSION["auth"]->fullname ?></p>
                                <p class="mt-[4px] text-[#FF0000]">Số tiền: <?php echo $this->currency_format($_SESSION["auth"]->money) ?></p>
                                <?php if ($_SESSION["auth"]->id_role == "1") : ?>
                                    <div>
                                        <a href="/Admin/" class="hover:underline">Trang quản trị</a>
                                    </div>
                                <?php endif ?>
                                <a href="/Dang-xuat" class="hover:underline">
                                    <button>Đăng xuất</button> </a>
                            </div>
                        </ul>
                    <?php else : ?>
                        <ul class="flex gap-5">
                            <li class="w-[130px] border border-[#32C5D2] rounded-[10px] px-5 font-bold text-center py-4">
                                <a href="./Dang-nhap" class="">Đăng nhập</a>
                            </li>
                            <li class="w-[130px] bg-[#32C5D2] rounded-[10px] px-5 font-bold text-center text-white py-4">
                                <a href="./Dang-ky">Đăng kí</a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner -->
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-[100%]">
                <img src="images/banner/banner.jpg" class="" alt="">
            </div>
        </div>
    </div>


    <!-- Body -->
    <div class="container mx-auto mt-10">


    </div>




    <!-- Footer -->
    <div id="footer" class="mt-6">
        <div class="footer__container flx">
            <div class="footer__container_list flx font_title">
                <div class="footer__container_items flx border-2px-white">
                    <ul class="un_list_style">
                        <li><a class="un_decoration white-clr" href="./policy.html">Privacy Policy</a></li>
                        <li><a class="un_decoration white-clr" href="./terms.html">Terms of Service</a></li>
                    </ul>
                </div>

                <div class="footer__container_items">
                    <div class="footer__container_items-tilte bold">
                        <span class="font-size-24px">VỀ CHÚNG TÔI</span>
                    </div>

                    <div class="footer__container_items-depcriton">
                        <span>Chúng tôi luôn lấy uy tín đặt trên hàng đầu đối với khách hàng,
                            hy vọng chúng tôi sẽ được phục vụ các bạn. Cám ơn!
                        </span>
                    </div>

                    <div class="footer__container_items-timesupport">
                        <span>Thời gian hỗ trợ:
                            Sáng: 7h00 -> 11h00 | Chiều: 13h00 -> 22h00
                        </span>
                    </div>
                </div>

                <div class="footer__container_items">
                    <div class="footer__container_items-shop bold">
                        <span class="font-size-24px">ShopAccTri.Vn</span>
                    </div>

                    <div class="footer__container_items-depcriton font-size-16px">
                        <span>HỆ THỐNG BÁN ACC TỰ ĐỘNG
                            ĐẢM BẢO UY TÍN VÀ CHẤT LƯỢNG.
                        </span>
                    </div>

                    <div class="footer__container_items-img">
                        <a href="https://www.facebook.com/messages/t/158424724854266"><img src="images/footer/messenger-01.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>