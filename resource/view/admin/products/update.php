<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Cập nhật Sản Phẩm</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="../images/logo/hinh_nen_florentino_giam_sat_tinh_he_download.jpg" type="image/gif" sizes="16x16">
</head>

<body>
    <h1 class="text-center text-[36px] font-bold mb-6 mt-4">Thêm sản phẩm</h1>
    <div class="flex items-center justify-center">
        <form action="" class="w-[600px] rounded-[10px] border border-[#000] p-4 shadow shadow-[#000]" method="POST" enctype="multipart/form-data">
            <div class="hidden">
                <div class="font-bold mb-3 text-[18px]">Tên sản phẩm</div>
                <input type="hidden" name="id" value="<?= $products->id ?>" class="border pl-2 border-[#000] h-[40px] w-[75%] rounded-[10px]">
            </div>
            <div class="">
                <div class="font-bold mb-3 text-[18px]">Tên sản phẩm</div>
                <input type="text" name="name" value="<?= $products->name ?>" class="border pl-2 border-[#000] h-[40px] w-[75%] rounded-[10px]">
            </div>

            <div class="pt-5">
                <div class="font-bold mb-3 text-[18px]">Ảnh sản phẩm</div>
                <input type="file" name="image" value="<?= $products->image ?>">
            </div>

            <div class="pt-5">
                <div class="font-bold mb-3 text-[18px]">Giá sản phẩm</div>
                <input type="number " name="price" value="<?= $products->price ?>" class="border pl-2 border-[#000] h-[40px] w-[25%] rounded-[10px]">
            </div>

            <div class="pt-5 ">
                <div class="font-bold mb-3 text-[18px]">Mô tả sản phẩm</div>
                <!-- <input type="text" name="detail" class="border pl-2 border-[#000] h-[40px] w-[90%]"> -->
                <textarea name="description" value="<?= $products->description?>" id="" class="border pl-2 border-[#000] h-[100px] w-[90%]"></textarea>
            </div>

            <div class="pt-5">
                <div class="font-bold mb-3 text-[18px]">Tài khoản</div>
                <input type="text" name="account_product" value="<?= $products->account_product ?>" class="border pl-2 border-[#000] h-[40px] w-[75%] rounded-[10px]">
            </div>

            <div class="pt-5">
                <div class="font-bold mb-3 text-[18px]">Mật khẩu</div>
                <input type="text" name="password_product" value="<?= $products->password_product ?>" class="border pl-2 border-[#000] h-[40px] w-[75%] rounded-[10px]">
            </div>

            <div class="pt-5">
                <div class="font-bold mb-3 text-[18px]">Loại trò chơi</div>
                <select name="id_cate" id="">
                    <?php foreach ($categories as $cate) : ?>
                        <option value="<?= $cate->id ?>">
                            <?= $cate->name ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="pt-5 flex justify-center">
                <button type="submit" class="bg-[#000] text-white w-[200px] text-[20px] h-[40px] hover:bg-red-500">Cập nhật</button>
            </div>
        </form>
    </div>
</body>

</html>