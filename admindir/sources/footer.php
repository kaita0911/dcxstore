<?php

$act = isset($_REQUEST['act']) ? $_REQUEST['act'] : "";

$sql_lg = "select * from $GLOBALS[db_sp].language where active=1";

$rs_lg = $GLOBALS["sp"]->getAll($sql_lg);

$smarty->assign("languages", $rs_lg);

switch ($act)

{

    case "edit":

        $id = $_GET["id"];



        $sql = "select * from $GLOBALS[db_sp].footer_detail where footer_id=$id";

        $rs_ed = $GLOBALS["sp"]->getAll($sql);

        $smarty->assign("checklang", ceil(count($rs_ed)));

        $smarty->assign("edit_name", $rs_ed);





        

        $sql = "select * from $GLOBALS[db_sp].footer where id=$id";

        $rs = $GLOBALS["sp"]->getRow($sql);

        $smarty->assign("edit", $rs);

        $template = "footer/edit.tpl";

    break;

    case "add":



        $template = "footer/create.tpl";

    break;

    case "dellist":



        $id = $_POST["iddel"];

        for ($i = 0;$i < count($id);$i++)

        {

            $sqlstmt = "select * from $GLOBALS[db_sp].`footer` where id=" . $id[$i];

            $r = $GLOBALS["sp"]->getAll($sqlstmt);

            {

                foreach($r as $item)

                {

                    $sql = "delete from $GLOBALS[db_sp].footer_detail  where footer_id=" . $id[$i];

                    $GLOBALS["sp"]->execute($sql);

                    

                }

            }

            $sql = "delete from $GLOBALS[db_sp].footer  where id=" . $id[$i];

            $GLOBALS["sp"]->execute($sql);

        }

        $url = "index.php?do=footer";

        page_transfer2($url);



    break;

  

    

    case "addsm":

    case "editsm":

        Editsm();

        $url = "index.php?do=footer";

        page_transfer2($url);

    break;

    default:



        $sql1 = "select * from $GLOBALS[db_sp].footer";

        $rs = $GLOBALS["sp"]->getAll($sql1);



        $smarty->assign("view", $rs);

        $template = "footer/list.tpl";

        ///////////////////////////

        

    break;

}

$smarty->assign("tabmenu", 0);

$smarty->display("header.tpl");

$smarty->display($template);

$smarty->display("footer.tpl");

function Editsm()

{

    global $path_url, $path_dir;

    $act = isset($_REQUEST['act']) ? $_REQUEST['act'] : "";

    $arr['hotline'] = $_POST["hotline"];

    $arr['email'] = trim($_POST["email"]);
    
    $arr['vanphong'] = trim($_POST["vanphong"]);


    $arr['fax'] = trim($_POST["fax"]);

    $arr['tax'] = trim($_POST["tax"]);

    $arr['map'] = $_POST["map"];

  

    if ($act == "addsm")

    {



        $arr['name_vn'] = $_POST["name_1"];    



        $id_comp = $id = vaInsert('footer', $arr);





        $sql_language = "select * from $GLOBALS[db_sp].language where active=1";

        $rs_language = $GLOBALS["sp"]->getAll($sql_language);

        foreach($rs_language as $languages)

        {



            $arrcp['footer_id'] = $id_comp;

            $arrcp['languageid'] = $languages['id'];

            $arrcp['name'] = trim($_POST["name_".$languages['id']]);

            $arrcp['address'] = $_POST["address_".$languages['id']];

            //$arrcp['vanphong'] = $_POST["vanphong_".$languages['id']];

            $arrcp['content'] = $_POST["content_".$languages['id']];

            vaInsert('footer_detail', $arrcp);

        }

        

    }

    else

    {

            $id_comp = $id = $_POST['id'];

            $arr['name_vn'] = $_POST["name_1"];

      

            $sql = "select * from $GLOBALS[db_sp].footer_detail where footer_id =".$id;

            $rscmp = $GLOBALS["sp"]->getAll($sql);

            $rscount = ceil(count($GLOBALS["sp"]->getAll($sql)));

            if($rscount > 0)

            {

                for ($i = 0; $i <count($rscmp); $i++)

                {

                    $arrcp['id'] = $rscmp[$i]['id'];

                    $arrcp['footer_id'] = $id_comp;

                    $arrcp['name'] = trim($_POST["name_".$rscmp[$i]['languageid']]);

                    $arrcp['address'] = $_POST["address_".$rscmp[$i]['languageid']];

                    //$arrcp['vanphong'] = $_POST["vanphong_".$rscmp[$i]['languageid']];

                    $arrcp['content'] = $_POST["content_".$rscmp[$i]['languageid']];

                    vaUpdate('footer_detail', $arrcp, ' id=' .$rscmp[$i]['id']);

                }

            

            }

          

        

        vaUpdate('footer', $arr, ' id=' . $id);

        ///////////////////////////////////



    }

}



?>

