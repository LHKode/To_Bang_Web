<?php
    $modules = 'products';
    $title_global = 'Thêm mới sản phẩm';
    require_once __DIR__ .'/../../autoload.php';

        $id = (int)Input::get('id');
        $product = DB::fetchOne('tbl_sanpham',' id_sanpham = '.$id);


    //load danh muc san pham

    $category = DB::query('tbl_danhmuc');
    recursive($category,0,1,$categorySort);

    // kiem tra neu submit
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        /**
         *  lay giá trị từ input
         */
        $name            = Input::get("prd_name");
        $cate            = Input::get("prd_category_product_id");
        if ($cate && $cate != null ) $_SESSION['cate'] = $cate;

        $description     = Input::get("prd_description");
        $hot             = Input::get('prd_hot');
        $active          = Input::get('prd_active');
        $number          = Input::get('prd_number');
        $sale            = Input::get('prd_sale');
        $content         = Input::get('prd_content');
        $price           = Input::get('prd_price');
        $masp            = Input::get('prd_code');
        $khuyenmai       = Input::get('khuyenmai');

        // bat loi
        $errors['name']                                                        = $name == '' ? 'Mời bạn điền đầy đủ thông tin' : null;
        $errors['cate']                                                        = $cate == '' ? 'Mời bạn điền đầy đủ thông tin' : null;
        $errors['description']                                                 = $description == '' ? 'Mời bạn điền đầy đủ thông tin' : null;
        $errors['number']                                                      = $number == '' ? 'Mời bạn điền đầy đủ thông tin' : null;
        $errors['content']                                                     = $content == '' ? 'Mời bạn điền đầy đủ thông tin' : null;
        $errors['price']                                                       = $price == '' ? 'Mời bạn điền đầy đủ thông tin' : null;
        $errors['pdr_code']                                                    = $masp == '' ? 'Mời bạn điền đầy đủ thông tin' : null;

        $hinhanh  = '';
        if ( isset ($_FILES['prd_thunbar']) && $_FILES['prd_thunbar']['name'] != NULL )
        {

            $upload_image = upload_image('prd_thunbar');
            if (!isset($upload_image['code']))
            {
                $errors['hinhanh'] = "  Lỗi file ảnh hoạc định dạng ảnh không đúng ";
            }

            $hinhanh = $_SESSION['hinhanh'] = $upload_image['name'];
        }

        //  chuyen doi mang chi muc - loai bo key trung nhau
        if( isset ($errors ))
        {
            $errors = (array_unique(array_values($errors)));
        }

        // neu bien errors  thi ko co loi tien hanh insert
        if ( count($errors)  == 1)
        {
            // gán vào 1 mảng giá trị để insertt
            $data =
            [
                'tensanpham'                    => $name ,
                'danhmuc_id'                    => $cate,
                'masanpham'                     => $masp,
                'mota'                          => $description,
                'giasanpham'                    => $price,
                'soluong'                       => $number,
                'giamgia'                       => $sale,
                'noidung'                       => $content,
                'khuyenmai'                     => $khuyenmai
            ];
            if ($hinhanh) $data['anhsanpham'] = $hinhanh;

            $id_update = DB::update('tbl_sanpham',$data , ' id_sanpham = '.$id);

            if($id_update > 0)
            {
                $_SESSION['success'] = "Cập nhật thành công ";
                unset($_SESSION['cate']);
                unset($_SESSION['hinhanh']);

            }else {
                $_SESSION['success'] = " Dữ liệu không thay đổi ";
            }

            header("Location: ".base_url().'/admin/modules/products');exit();

        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?= isset($title_global) ? $title_global : 'Trang admin ' ?>  </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php require_once __DIR__ .'/../../layouts/inc_css.php'; ?>
    <script type="text/javascript" src="/public/admin/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="/public/admin/js/bootstrap3-wysihtml5.min.css">
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <?php require_once __DIR__ .'/../../layouts/inc_header.php'; ?>
    <!-- ======================HEADER========================= -->
    <?php require_once __DIR__ .'/../../layouts/inc_sidebar.php'; ?>
    <!-- =======================SIDEBAR======================== -->
    <!-- ======================= CONTENT======================== -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <?= isset($title_global) ? $title_global : '' ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Sản phẩm </a></li>
                <li class="active">Thêm mới</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <div class="box box-primary">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Thunbar   </label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="prd_thunbar" id="imgInp">
                                        </div>
                                        <div class="col-sm-10" style="margin-top: 10px;margin-left: 17%">
                                            <img src="<?= base_url('/public/uploads/') ?><?= isset($_SESSION['hinhanh']) ? $_SESSION['hinhanh'] : $product['anhsanpham'] ?>" alt="" class="img img-responsive" id="blah" title=" Logo " style="width: 100%;height: 258px;border: 1px solid #dedede">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> Danh mục </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="prd_category_product_id">
                                                <option value=""> - Chọn danh mục  - </option>
                                                <?php if(count($categorySort) > 0) :?>
                                                    <?php foreach($categorySort as $catep) :?>
                                                        <option value="<?= $catep['id_danhmuc'] ?>" <?= isset($product) && $product['danhmuc_id'] == $catep['id_danhmuc'] || (isset($_SESSION['cate']) && $_SESSION['cate'] == $catep['id_danhmuc'] ) ? 'selected="selected"' : '' ?> ><?php $str = '' ;for($i = 0; $i < $catep['level'] ; $i++) {echo $str ; $str.=" -- ";} ?> <?php echo $catep['tendanhmuc'] ?></option>
                                                    <?php endforeach ;?>
                                                <?php endif; ?>
                                            </select>
                                            <?php if( isset( $errors['cate']) ): ?>
                                                <span class="color-red"><?= $errors['cate'] ?></span>
                                            <?php endif ; ?>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Tiêu đề </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="prd_name" value="<?= isset($product) ? $product['tensanpham'] : $name ?>"  placeholder=" Tên sản phẩm không quá 200 từ" autocomplete="off">
                                            <?php if( isset( $errors['name']) ): ?>
                                                <span class="color-red"><?= $errors['name'] ?></span>
                                            <?php endif ; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label" style="text-align: left;padding-left: 45px;"> Mã SP  </label>
                                        <div class="col-sm-4">
                                            <input type="text"  placeholder="Mã sản phẩm" readonly name="prd_code" id="code_sale" class="form-control" value="<?= isset($product) ? $product['masanpham']  : $masp ?>">
                                            <?php if( isset( $errors['pdr_code']) ): ?>
                                                <span class="color-red"><?= $errors['prd_code'] ?></span>
                                            <?php endif ; ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <a class="btn btn-primary" id="render_code">Tạo mã sản phẩm</a>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label for="" class="col-sm-2 control-label"> Giá SP  </label>
                                        <div class="col-sm-4">
                                            <input type="number" min="0" placeholder=" Giá Sp" name="prd_price" class="form-control" value="<?= isset($product) ? $product['giasanpham'] : $price ?>">
                                            <?php if( isset( $errors['price']) ): ?>
                                                <span class="color-red"><?= $errors['price'] ?></span>
                                            <?php endif ; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label" style="text-align: left;padding-left: 45px;"> Số Lượng  </label>
                                        <div class="col-sm-4">
                                            <input type="number" min="0" max="1000" placeholder="số lượng sp " name="prd_number" class="form-control" value="<?= isset($product) ? $product['soluong'] : $number ?>">
                                            <?php if( isset( $errors['number']) ): ?>
                                                <span class="color-red"><?= $errors['number'] ?></span>
                                            <?php endif ; ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-2 control-label"> Sale ( % )  </label>
                                            <div class="col-sm-3">
                                                <input type="number" min="0" max="10" placeholder=" 1 - 10 (%)" name="prd_sale" class="form-control" value="<?= isset($product) ?  $product['giamgia'] : $sale ?>">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="form-group" style="margin: 5px 0">
                                <label for="inputEmail3" class="col-sm-12 control-label" style="text-align: left;margin-bottom: 10px;padding-right: 30px;padding-left: 30px;"> Khuyến mãi</label>
                                <div class="col-sm-12" style="padding-left: 30px ;padding-right: 30px">
                                    <textarea name="khuyenmai"  cols="10" id="prd_description" rows="3" class="form-control wysihtml5" placeholder="Nội dung khuyến mãi"><?= isset($product) ? $product['khuyenmai']  : $khuyenmai ?></textarea>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group" style="margin: 5px 0">
                                <label for="inputEmail3" class="col-sm-12 control-label" style="text-align: left;margin-bottom: 10px;padding-right: 30px;padding-left: 30px;"> Mô tả ngắn </label>
                                <div class="col-sm-12" style="padding-left: 30px ;padding-right: 30px">
                                    <textarea name="prd_description"  cols="10" id="prd_description" rows="3" class="form-control wysihtml5" placeholder=" Mô tả ngắn về nội dung bài viết , không quá 250 ký tự"><?= isset($product) ? $product['mota'] : $description ?></textarea>
                                    <?php if( isset( $errors['description']) ): ?>
                                        <span class="color-red"><?= $errors['description'] ?></span>
                                    <?php endif ; ?>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="form-group" style="margin:5px 0">
                                <label for="inputEmail3" class="col-sm-12 control-label" style="text-align: left;margin-bottom: 10px;padding-right: 30px;padding-left: 30px;"> Nội dung </label>
                                <div class="col-sm-12" style="padding-left: 30px ;padding-right: 30px">
                                    <textarea name="prd_content" id="my-editor" cols="10" rows="10" class="form-control" placeholder=" Mời bạn nhập nội dung bài viết "><?= isset($product) ? $product['noidung'] : $content ?></textarea>
                                    <?php if( isset( $errors['content']) ): ?>
                                        <span class="color-red"><?= $errors['content'] ?></span>
                                    <?php endif ; ?>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <!-- /.box-body -->
                            <div class="" style="position: fixed;right: 15px;top: 50%;transform: translateY(-50%);">
                                <button type="submit" class="btn btn-primary btn-xs" style="width: 75px"> Cập nhật </button><br>
                                <a href="index.php" class="btn btn-danger btn-xs" style="width: 75px"> Huỷ bỏ </a>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </section>
    </div>
    <!-- =======================END CONTENT======================== -->
    <?php require_once __DIR__ .'/../../layouts/inc_footer.php'; ?>
</div>
<?php require_once __DIR__ .'/../../layouts/inc_js.php'; ?>
<script type="text/javascript" src="/public/admin/js/bootstrap3-wysihtml5.all.min.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'my-editor', {
        height:'400px'
    });
    $('textarea.wysihtml5').wysihtml5();
    $("#render_code").click(function(event){
        event.preventDefault();
        let string = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
        $("#code_sale").val(string);
    })
</script>