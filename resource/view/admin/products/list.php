<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="../images/logo/hinh_nen_florentino_giam_sat_tinh_he_download.jpg" type="image/gif" sizes="16x16">

    <style>
        td {
            text-align: center;
            border: 1px solid #000;
            padding: 8px;
        }
    </style>
</head>

<body>
    <div class="bg-[#999999]">
        <div class="container mx-auto">
            <div class="flex justify-between items-center h-[50px]">
                <div class="">
                    <span class="text-white mr-1">
                        Chào bạn
                    </span>
                    <span class="text-red-600 font-bold uppercase">Admin</span>
                </div>

                <div>
                    <ul class="flex flex-col-2 gap-7">
                        <li><a class="text-blue-600 font-bold hover:text-red-600 hover:underline" href="/">Trang chủ</a></li>
                        <li><a class="font-bold hover:text-red-600 hover:underline" href="/Dang-xuat">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->

    <div class="container mx-auto flex gap-5 mt-4">
        <div class="flex-none w-[300px]">
            <div class="">
                <div class="">
                    <div class="bg-[#525151] text-white p-[10px] text-[18px] leading-[20px] rounded-t-lg">Admin Menu</div>
                    <div class="pb-[15px] border border-[#ccc] border-solid rounded-b-lg">
                        <ul class="m-0 p-0">
                            <li class="leading-[30px] pl-[15px] border border-[#ccc] border-dashed"><a class="hover:text-red-600" href="./Danh-sach-san-pham">Quản lý sản phẩm</a></li>
                            <li class="leading-[30px] pl-[15px] border border-[#ccc] border-dashed"><a class="hover:text-red-600" href="./Danh-sach-danh-muc">Quản lý danh mục</a></li>
                            <li class="leading-[30px] pl-[15px] border border-[#ccc] border-dashed"><a class="hover:text-red-600" href="./Danh-sach-tai-khoan">Quản lý tài khoản</a></li>
                            <li class="leading-[30px] pl-[15px] border border-[#ccc] border-dashed"><a class="hover:text-red-600" href="./Danh-sach-chuc-vu">Quản lý chức vụ</a></li>
                            <li class="leading-[30px] pl-[15px] border border-[#ccc] border-dashed"><a class="hover:text-red-600" href="./Danh-sach-hoa-don">Quản lý hóa đơn</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="grow">
            <div class="w-full mx-auto">
                <div class="">
                    <div class="bg-[#525151] text-white p-[10px] text-[18px] leading-[20px] rounded-t-lg">Danh sách sản phẩm</div>
                    <div class="pb-[15px] border border-[#ccc] border-solid rounded-b-lg">
                        <div class="flex justify-center h-[50px] items-center mt-3">
                            <a class="border border-[#000] p-2 bg-[#000] text-white" href="./Them-san-pham">Thêm sản phẩm</a>
                        </div>

                        <div class="flex items-center justify-center mt-6">
                            <table>
                                <tr class="font-bold">
                                    <td>ID</td>
                                    <td>Tên</td>
                                    <td>Ảnh</td>
                                    <td>Mô tả</td>
                                    <td>Giá</td>
                                    <td>Mã danh mục</td>
                                    <td>Thời gian tạo</td>
                                    <td>Thời gian cập nhật</td>
                                    <td>Update</td>
                                    <td>Remove</td>
                                </tr>
                                <?php foreach ($products as $product) : ?>
                                    <tr>
                                        <td>
                                            <?= $product->id ?>
                                        </td>

                                        <td>
                                            <?= $product->name ?>
                                        </td>

                                        <td>
                                            <img src="http://localhost:3000/images/products/<?= $product->image ?>" class="w-[300px]" srcset="">
                                        </td>

                                        <td>
                                            <?= $product->description ?>
                                        </td>

                                        <td>
                                            <?= $product->price ?>
                                        </td>

                                        <td>
                                            <?= $product->id_cate ?>
                                        </td>
                                        

                                        <td>
                                            <?= $product->create_at ?>
                                        </td>

                                        <td>
                                            <?= $product->update_at ?>

                                        </td>

                                        <td>
                                            <a class="border border-[#000] p-2 bg-[#008844] text-white" href="./Sua-san-pham?id=<?= $product->id ?>">Sửa</a>
                                        </td>
                                        <td>
                                            <a class="border border-[#000] p-2 bg-[#d62d20] text-white" href="./Xoa-san-pham?id=<?= $product->id ?>" onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>