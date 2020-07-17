<?php
    $modules = 'categories';
    $title_global = 'Cập nhật danh mục ';
    require_once __DIR__ .'/../../autoload.php';

    $id = (int)Input::get('id');

    $cate = DB::fetchOne('tbl_danhmuc',' id_danhmuc = '.$id);

    // de quy lay du lieu
    $category = DB::query('tbl_danhmuc');
    recursive($category,0,1,$categorySort);

    // kiem tra neu ko ton tai danh muc thi chuyen ve trang danh sach danh muc
    if( ! $cate )
    {
        $_SESSION['error'] = "  Không tồn tại dữ liệu ";
        header("Location: ".base_url().'/admin/modules/categories');exit();
    }

    // Xử lý cập nhật
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        /**
         *  lay giá trị từ input
         */
        $name     = Input::get("cpr_name");
        $parent   = Input::get("parent_id");
        $sort     = Input::get("cpr_sort");
        $icon     = Input::get("icon");
        $color     = Input::get("color");

        $hinhanh  = '';
        if ( isset ($_FILES['hinhanh']) && $_FILES['hinhanh']['name'] != NULL )
        {

            $upload_image = upload_image('hinhanh');
            if (!isset($upload_image['code']))
            {
                $errors['hinhanh'] = "  Lỗi file ảnh hoạc định dạng ảnh không đúng ";
            }else
            {
                $hinhanh = $_SESSION['hinhanh'] = $upload_image['name'];
            }
        }


        // kiểm tra lỗi
        if($name == '')
        {
            // nếu giá trị trống thì gán vào 1 mảng lỗi
            $errors['cpr_name'] = ' Mời bạn điền đầy đủ thông tin';
        }

        // nếu mảng errors trống => Ko có lỗi  tiến hành insert
        if(empty($errors))
        {
            // gán vào 1 mảng giá trị để insertt
            $data = [
                'tendanhmuc'     => $name ,
                'danhmuc_id'     => $parent ,
                'vitri'          => $sort ,
                'kieudanhmuc'    => 1 ,
                'icon'       => $icon,
                'color'       => $color,
            ];

            if ( isset($_SESSION['hinhanh']))
            {
                $data['anhdanhmuc']  = $_SESSION['hinhanh'];
            }

            //tiến hành Update
            $id_update = DB::update('tbl_danhmuc',$data , ' id_danhmuc = '.$id);


            if($id_update > 0)
            {
                // update thanh cong
                // gán session thông báo thành công
                //chuyển về trang index trong thư mục category_products
                $_SESSION['success'] = "Cập nhật thành công ";
                unset($_SESSION['hinhanh']);

            }else {
                $_SESSION['success'] = " Dữ liệu không thay đổi ";
            }

            
            header("Location: ".base_url().'/admin/modules/categories');exit();

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
    <!-- <link rel="stylesheet" href="/public/admin/css/bootstrap-tagsinput.css"> -->
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
                <li><a href="#">Danh Mục Sản phẩm </a></li>
                <li class="active">Thêm mới</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <div class="col-md-10 col-sm-offset-1">
                        <!-- Horizontal Form -->
                        <div class="box box-primary">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="ZPEdLE4Il64joczf4kmj8Q9eQBvPxcz1qVZwfLOB">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Danh mục cha </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="parent_id">
                                                <option value="0"> - ROOT - </option>
                                                <?php foreach($categorySort as $cs) :?>
                                                    <option value="<?= $cs['id_danhmuc'] ?>" <?= $cate['danhmuc_id'] == $cs['id_danhmuc'] ? "selected='selected'" : "" ?>><?php $str = '' ;for($i = 0; $i < $cs['level'] ; $i++) {echo $str ; $str.=" -- ";} ?> <?= $cs['tendanhmuc'] ?> </option>
                                                <?php endforeach ;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Tên danh mục  </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="cpr_name" id="inputEmail3" placeholder="Hoa tươi đà lạt" autocomplete="off" value="<?= $cate['tendanhmuc'] ?>">
                                            <?php if(isset($errors['cpr_name'])) :?>
                                                <span class="color-red"><i class="fa fa-bug"></i><?= $errors['cpr_name'] ?></span>
                                            <?php endif ;?>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label"> Sort </label>
                                        <div class="col-sm-10">
                                            <input type="number" name="cpr_sort" class="form-control" value="<?= $cate['vitri'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Icon danh mục  </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="icon" id="inputEmail3" placeholder="fa fa-dashboard" autocomplete="off" value="<?= $cate['icon'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Màu  </label>
                                        <div class="col-sm-10">
                                            <input type="color" class="form-control" name="color" id="inputEmail3" placeholder="fa fa-dashboard" autocomplete="off" value="<?= $cate['color'] ?>" style="width: 10%;">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label"> Hình ảnh   </label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="hinhanh" id="imgInp">
                                        </div>
                                        <div class="col-sm-10" style="margin-top: 10px;margin-left: 17%">
                                            <img src="<?= base_url('/public/uploads/') ?><?= isset($_SESSION['hinhanh']) ? $_SESSION['hinhanh'] : $cate['anhdanhmuc'] ?>" alt="" class="img img-responsive" id="blah" title=" Logo " style="width: 260px;height: 258px;border: 1px solid #dedede">
                                            <?php if(isset($errors['hinhanh'])) :?>
                                                <span class="color-red"><i class="fa fa-bug"></i><?= $errors['hinhanh'] ?></span>
                                            <?php endif ;?>
                                        </div>

                                    </div>


                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary btn-xs"> Cập nhật </button>
                                    <a href="index.php" class="btn btn-danger btn-xs"> Huỷ bỏ </a>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                        </div>
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
