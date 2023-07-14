<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Cập Nhật Tài Khoản</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="../images/logo/hinh_nen_florentino_giam_sat_tinh_he_download.jpg" type="image/gif" sizes="16x16">
</head>

<body>
    <h1 class="text-center text-[36px] font-bold mb-6 mt-4">Cập nhật sản phẩm</h1>
    <div class="flex items-center justify-center">
        <form action="" class="w-[600px] rounded-[10px] border border-[#000] p-4 shadow shadow-[#000]" method="POST" enctype="multipart/form-data">
            <!-- dua vao id -->

            <div class="hidden">
                <div class="font-bold mb-3 text-[18px]">Tên sản phẩm</div>
                <input type="hidden" name="id" value="<?= $roles->id ?>" class="border pl-2 border-[#000] h-[40px] w-[75%] rounded-[10px]">
            </div>

            <div class="">
                <div class="font-bold mb-3 text-[18px]">Tên chức vụ</div>
                <input type="text" name="name_role" value="<?= $roles->name_role ?>" class="border pl-2 border-[#000] h-[40px] w-[75%] rounded-[10px]">
                <!-- <input type="text" name="" id=""> -->
            </div>


            <div class="pt-5 flex justify-center">
                <button type="submit" class="bg-[#000] text-white w-[200px] text-[20px] h-[40px] hover:bg-red-500">Cập nhật</button>
            </div>
        </form>
    </div>
</body>

</html>