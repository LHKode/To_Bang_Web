<?php
    require_once __DIR__ .'/../../autoload.php';
    $id = (int)Input::get('id');
    $sql = " SELECT tbl_chitietdonhang.*  ,tbl_sanpham.tensanpham as name , tbl_sanpham.anhsanpham as anhsanpham ,tbl_sanpham.giasanpham as giasanpham FROM  tbl_chitietdonhang 
        LEFT JOIN tbl_sanpham ON tbl_sanpham.id_sanpham = tbl_chitietdonhang.sanpham_id
        WHERE 1 AND donhang_id = $id 
    ";


    $orders = DB::fetchsql($sql);

    if( ! $orders )
    {
       echo 0 ;die;
    }
?>

<?php foreach ($orders as $key => $item) :?>
    <tr class="delete_tr">
        <td> <?= $item['name'] ?></td>
        <td>
            <img src="<?= base_url() ?>/public/uploads/<?= $item['anhsanpham'] ?>" alt="" style="width: 50px;height: 50px;">
        </td>
        <td>
            <?= format_price($item['giasanpham']) ?>đ
        </td>
        <td><?= $item['soluong'] ?></td>
        <td> <?= format_price($item['giasanpham'] * $item['soluong']) ?> đ</td>
        <td><a href="delete_item.php?id=<?= $item['id_chitietdonhang'] ?>" class="delete_item_order btn btn-xs btn-danger" data-id_order=<?= $item['id_chitietdonhang'] ?>> Huỷ sản phẩm </a></td>
    </tr>
<?php endforeach; ?>