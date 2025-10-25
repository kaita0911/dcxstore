<?php
$cat = $cat1;
$sql_tinhnang = "select * from $GLOBALS[db_sp].component where id=2";
$rs_tinhnang = $GLOBALS["sp"]->getRow($sql_tinhnang);
$smarty->assign("tinhnang", $rs_tinhnang);
$sqlgiohang = "select * from $GLOBALS[db_sp].infos where id=12";
$giohang = $GLOBALS["sp"]->getRow($sqlgiohang);
switch ($act) {
    case "detail":
        $unique_key = $_GET['unique_key'];
        $sql = "select * from $GLOBALS[db_sp].articlelist where unique_key='$unique_key' ";
        $rs = $GLOBALS["sp"]->getRow($sql);
        $item_id = $rs['id'];
        $smarty->assign("image_sp", $rs);
        ////////////////////////////get hinh danh muc///////////////////////
        $sql_dm_image = "select * from $GLOBALS[db_sp].articlelist_categories where articlelist_id = $item_id";
        $rs_dm_image = $GLOBALS["sp"]->getAll($sql_dm_image);
        foreach ($rs_dm_image as $item_image) {
            $sql_dm_cate_image = "select * from $GLOBALS[db_sp].categories where id = ".$item_image['categories_id']." and parentid = 0";
            $rs_dm_cate_image = $GLOBALS["sp"]->getRow($sql_dm_cate_image);

            if($rs_dm_cate_image['img_vn'] !='')
            {
                $image_cate.='<a href="' . $path_url . '/'.$rs_dm_cate_image['img_vn'].'" class="fancysize" data-fancybox-group="gallery"><i class="fa-solid fa-scissors"></i> Bảng size</a> ';

            }
            else
            {
                $image_cate.='';
            }

        }
        $smarty->assign("image_cate", $image_cate);
        /////////////////////////get danh muc//////////////////////////////
        $sql_dm = "select max(id) as id from $GLOBALS[db_sp].categories where id in (select categories_id from $GLOBALS[db_sp].articlelist_categories where articlelist_id = '$item_id') and parentid > 0";
        $rs_ma = $GLOBALS["sp"]->getRow($sql_dm);
        if(count($rs_ma)> 0)
        {
            $sql_c = "select * from $GLOBALS[db_sp].categories_detail where languageid= " . $numlang . " and categories_id = ".$rs_ma['id']." ";
            $rs_c = $GLOBALS["sp"]->getRow($sql_c);
            $smarty->assign("dmcap3", $rs_c);
        }
        else
        {
            $sql_c_1 = "select * from $GLOBALS[db_sp].categories where id in (select * from $GLOBALS[db_sp].articlelist_categories where articlelist_id = '$item_id')";
            $sql_c_1 = $GLOBALS["sp"]->getRow($sql_c_1);
            $smarty->assign("dmcap3", $sql_c_1);
        }
        $smarty->assign("detail_masp", $rs_ma);

        ///////////////////////get thuộc tính properties/////////////////////////////
        $sql_ma = "select * from $GLOBALS[db_sp].articlelist_properties where languageid= " . $numlang . " and articlelist_id = '$item_id' order by id desc";
        $rs_ma = $GLOBALS["sp"]->getAll($sql_ma);
        foreach ($rs_ma as $item_prop) {
            $sql_tt = "select * from $GLOBALS[db_sp].properties_component where properties_id = ".$item_prop['properties_id']." order by id desc";
            $rs_tt = $GLOBALS["sp"]->getRow($sql_tt);

            $listprop.='<p class="coded"><label>'.$rs_tt['name'].': </label> <span>'.$item_prop['value'].'</span></p>';
        }
        $smarty->assign("listprop", $listprop);
        //////////////////////////get kich thước//////////////////////////
        $sqlkt = "select * from $GLOBALS[db_sp].kichthuoc where articlelist_id = '$item_id' order by id desc ";
        $rskt = $GLOBALS["sp"]->getAll($sqlkt);
        $smarty->assign("listkt", $rskt);
        if(ceil(count($rskt)) > 0){  
            $i=0;
            foreach($rskt as $itemsize){
                if($i ==1)
                {
                    $check = 'checked';
                }
                $sql_name_kt = "select * from $GLOBALS[db_sp].articlelist_detail where languageid= " . $numlang . " and articlelist_id = ".$itemsize['size_id']." ";
                $rs_name_kt = $GLOBALS["sp"]->getRow($sql_name_kt);
                $listsize .= '<div class="itemsize"><input class="sizepr" type="radio" value="'.$rs_name_kt['name'].'" name="optionsize" id="size'.$itemsize['size_id'].'" '.$check.' "><label>'.$rs_name_kt['name'].'</label><span class="checkmark"></span></div>
                ';
                $i++;
            }
        }
        $smarty->assign("checklistsize",ceil(count($rskt)));
        $smarty->assign("listsize",$listsize);


        ///////////get noi dung 2 ngon ngu///////////////////
        $sql1 = "select * from $GLOBALS[db_sp].articlelist_detail where languageid= " . $numlang . " and articlelist_id = '$item_id' ";
        $rs1 = $GLOBALS["sp"]->getRow($sql1);
        $smarty->assign("detail", $rs1);
        $smarty->assign("seo", $rs1);
        ///////////get date////////////
        $smarty->assign("date", $rs);
        if (!$rs['id']) { //bi rong la kg ton tai link quay ve trang chu
            PageHome("");
        }
        ////////////Lay gia san pham////////////////
        $sql = "select * from $GLOBALS[db_sp].price where articlelist_id=$item_id ";
        $rs = $GLOBALS["sp"]->getRow($sql);
        $price = $rs['price'];
        $smarty->assign("price", $price);
        ////////////////Lay hinh anh san pham///////////////////////////
        $sqlha = "select * from $GLOBALS[db_sp].gallery_sp where articlelist_id  =$item_id ";
        $rsha = $GLOBALS["sp"]->getAll($sqlha);
        $smarty->assign("viewgallery", $rsha);
        $smarty->assign("countgallery", ceil(count($rsha)));
        //////////////////////////////
        //cap nhap so lan xem
        /*$arr['view'] = ceil($rs1['view'] + 1);
        
        
        
        vaUpdate('articlelist', $arr, ' id=' . $rs1['id']);*/
        ///////Sản phẩm lien quan//////////////////
        $sqldmcha = "select * from $GLOBALS[db_sp].articlelist_categories where articlelist_id = $item_id";
        $rsdmcha = ceil(count($GLOBALS["sp"]->getAll($sqldmcha)));
        if ($rsdmcha == 0) {
            $sql_cl = "SELECT * from $GLOBALS[db_sp].articlelist where active = 1 and comp= 2 and id != $item_id  order by id desc limit 30";
        } else if ($rsdmcha == 1) {
            $sql = "select * from $GLOBALS[db_sp].articlelist_categories where articlelist_id = $item_id";
            $rs = $GLOBALS["sp"]->getRow($sql);
            $sql_cl = "SELECT * from $GLOBALS[db_sp].articlelist where active = 1 and id != " . $item_id . " and id IN (select articlelist_id from $GLOBALS[db_sp].articlelist_categories where categories_id=" . $rs['categories_id'] . ") order by id desc limit 30";
        } else {
            $sql1 = "SELECT * from $GLOBALS[db_sp].categories where id IN (select categories_id from $GLOBALS[db_sp].articlelist_categories where articlelist_id = $item_id)";
            $rs1 = $GLOBALS["sp"]->getAll($sql1);
            foreach ($rs1 as $item1) {
                if ($item1['parentid'] > 0) {
                    $sql_cl = "SELECT * from $GLOBALS[db_sp].articlelist where active = 1 and id != " . $item_id . " and id IN (select articlelist_id from $GLOBALS[db_sp].articlelist_categories where categories_id=" . $item1['id'] . ") order by id desc limit 30 ";
                }
            }
        }
        $rs_cl = $GLOBALS["sp"]->getAll($sql_cl);
        $smarty->assign("view", $rs_cl);
        $template = "brand/detail.tpl";
        break;
    default:
        $sql1 = "select * from $GLOBALS[db_sp].categories_detail where languageid= " . $numlang . " and categories_id = " . $cat1['id'] . "";
        $rs1 = $GLOBALS["sp"]->getRow($sql1);
        $sql = "SELECT * from $GLOBALS[db_sp].articlelist where active = 1 and  id IN (select articlelist_id from $GLOBALS[db_sp].articlelist_brands where brands_id= " . $rs1['categories_id'] . " ) order by id desc ";
        $sql_sum = "SELECT count(id) from $GLOBALS[db_sp].articlelist where id IN (select articlelist_id from $GLOBALS[db_sp].articlelist_brands where brands_id= " . $rs1['categories_id'] . " ) order by id desc ";
        $total = $total_page = $count = ceil($GLOBALS['sp']->getOne($sql_sum)); ///total item///
        $num_rows_page = 60; ///so item tren 1 trang
        $num_page = ceil($count / $num_rows_page); /////Tong so trang///
        $linkpg = "";
        // Giới hạn current_page trong khoảng 1 đến total_page
        if (!isset($_GET['cat2'])) {
            $page = 1;
        } else {
            $page = $_GET['cat2'];
        }
        // Tìm Start
        $begin = ($page - 1) * $num_rows_page;
        if ($num_page > 1) {
            $linkpg = pagi($page, $num_page, $cat1['unique_key']);
            $smarty->assign("Checkpg", "1");
        }
        $sql = $sql . "limit $begin,$num_rows_page";
        $smarty->assign("linkpg", $linkpg);
        /////////////////////
        $rs = $GLOBALS["sp"]->getAll($sql);
        $smarty->assign("view", $rs);
        $smarty->assign("seo", $rs1);
        $smarty->assign("CheckNull", $count);
        $template = "brand/view.tpl";
        break;
    }
    $smarty->display("./header.tpl");
    $smarty->display($template);
    $smarty->display("./footer.tpl");
?>



