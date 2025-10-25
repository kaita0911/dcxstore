<?php
include_once ("../#include/config.php");
include_once ("../functions/function.php");
$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : 1;
$cat = isset($_REQUEST["cat"]) ? $_REQUEST["cat"] : 1;
$type = $_REQUEST["type"];
$url = isset($_REQUEST["url"]) ? $_REQUEST["url"] : $path_url;
$idd = isset($_REQUEST["idd"]) ? $_REQUEST["idd"] : 0;
$num = isset($_REQUEST["num"]) ? $_REQUEST["num"] : 1;
$num_rows_page = isset($_REQUEST["num_rows_page"]) ? $_REQUEST["num_rows_page"] : 1;
$strPrice = isset($_REQUEST["strPrice"]) ? $_REQUEST["strPrice"] : '';
$sqlshowrprice = "select * from $GLOBALS[db_sp].infos where id=31";
$rsshowprice = $GLOBALS["sp"]->getRow($sqlshowrprice);
switch ($type) {
    case 'articles':
    	$sql = "SELECT * from $GLOBALS[db_sp].articlelist where id IN (select articlelist_id from $GLOBALS[db_sp].articlelist_categories where categories_id=" . $cat. " and active=1) order by id desc ";
        $sql_sum = "SELECT count(id) from $GLOBALS[db_sp].articlelist where id IN (select articlelist_id from $GLOBALS[db_sp].articlelist_categories where categories_id=" . $cat . " and active=1)";
        $total = $count = ceil($GLOBALS['sp']->getOne($sql_sum));
        $num_rows_page = $num_rows_page;
        $num_page = ceil($total / $num_rows_page);
        $begin = ($page - 1) * $num_rows_page;
        $urll = "ShowPaging"; //set url for paginator
        $iSEGSIZE = 4;
        $linkpg = "";
        if ($num_page > 1) $linkpg = paginatornum($urll, $page, $num_page, $iSEGSIZE, $cat, 'articles', $path_url, $url, $idd, $num_rows_page);
        $sql = $sql . " limit $begin,$num_rows_page";
        $rs = $GLOBALS["sp"]->getAll($sql);
        if ($total > 0) {
            foreach ($rs as $item) {
                $link = GetLinkDetail($item, $lang);
                $view.= '

					<div class="item">

					   <p class="img">

					      <a href="' . $path_url . '/' . $item["unique_key"] . '.html" title="' . $item["name_" . $lang] . '">

							<img src= "' . $path_url . '/' . $item["img_thumb_vn"] . '" alt="' . $item["name_" . $lang] . '" class="img-responsive"/>

					   </p>

					   <div class="meta">

					      <h3>

					        <a href="' . $path_url . '/' . $item["unique_key"] . '.html" title="' . $item["name_" . $lang] . '">

								' . $item["name_" . $lang] . '

							</a>

					      </h3>

					      <span class="calendar">

					         <i class="fa-regular fa-calendar-days"></i>

					         ' . date("d/m/Y", strtotime($item['dated'])) . '

					      </span>

					      <div class="short-des">

					         ' . $item["short_" . $lang] . '

					      </div>

					   </div>

					</div>

					

					';
            }
        }
        die(json_encode(array('view' => $view, 'Pagelink' => $linkpg)));
        break;
    case 'service':
        $sql = " select * from $GLOBALS[db_sp].service where active=1 and cid = " . $cid . " order by num asc, id desc ";
        $sql_sum = "select count(id) from $GLOBALS[db_sp].service where active=1 and cid = " . $cid . "";
        $total = $count = ceil($GLOBALS['sp']->getOne($sql_sum));
        $num_rows_page = $num_rows_page;
        $num_page = ceil($total / $num_rows_page);
        $begin = ($page - 1) * $num_rows_page;
        $urll = "ShowPaging"; //set url for paginator
        $iSEGSIZE = 4;
        $linkpg = "";
        if ($num_page > 1) $linkpg = paginatornum($urll, $page, $num_page, $iSEGSIZE, $cid, 'service', $path_url, $url, $idd, $num_rows_page);
        $sql = $sql . " limit $begin,$num_rows_page";
        $rs = $GLOBALS["sp"]->getAll($sql);
        if ($total > 0) {
            foreach ($rs as $item) {
                $link = GetLinkDetail($item, $lang);
                $view.= '

					<div class="col-md-4 col-sm-6 col-xs-12">

						<article class="artseed-new-item">

							<figure class="artseed-new-item-img">

								  <div class="calendar"><span>' . date("d", strtotime($item['dated'])) . '</span>' . date("m/Y", strtotime($item['dated'])) . '</div>

									<a href="' . $path_url . '/' . $item["unique_key"] . '.html" title="' . $item["name_" . $lang] . '">

									<img src= "' . $path_url . '/' . $item["img_thumb_vn"] . '" alt="' . $item["name_" . $lang] . '" class="img-responsive"/>

								</a>

							</figure>

								 <figcaption class="artseed-new-item-content">

									<h3>

										<a href="' . $path_url . '/' . $item["unique_key"] . '.html" title="' . $item["name_" . $lang] . '">

											' . $item["name_" . $lang] . '

										</a>

									</h3>

									

									<div class="artseed-new-item-sum">' . $item["short_" . $lang] . '</div>

                                    <a class="viewdt hide" href="' . $path_url . '/' . $item["unique_key"] . '.html" title="Chi tiết">Chi tiết</a>

								</figcaption>

							

						</article>

						</div>

					';
            }
        }
        die(json_encode(array('view' => $view, 'Pagelink' => $linkpg)));
        break;
    case 'products':
        if ($idd > 0) {
            $sql = "select * from $GLOBALS[db_sp].products where active=1 and id<>$idd and cid = " . $cid . " order by num asc, id desc ";
            $sql_sum = "select count(id) from $GLOBALS[db_sp].products where active=1 and id<>$idd and cid = " . $cid;
        } else {
            $sql = "select * from $GLOBALS[db_sp].products where active=1 and cid = " . $cid . " order by num asc, id desc";
            $sql_sum = "select count(id) from $GLOBALS[db_sp].products where active=1 and cid = " . $cid;
        }
        $total = $count = ceil($GLOBALS['sp']->getOne($sql_sum));
        $num_rows_page = $num_rows_page;
        $num_page = ceil($total / $num_rows_page);
        $begin = ($page - 1) * $num_rows_page;
        $urll = "ShowPaging"; //set url for paginator
        $iSEGSIZE = 40;
        $linkpg = "";
        if ($num_page > 1) $linkpg = paginatornum($urll, $page, $num_page, $iSEGSIZE, $cid, 'products', $path_url, $url, $idd, $num_rows_page, $strPrice);
        $sql = $sql . " limit $begin,$num_rows_page";
        $rs = $GLOBALS["sp"]->getAll($sql);
        if ($rsshowprice['open'] == 1) {
            if ($total > 0) {
                foreach ($rs as $item) {
                    $link = GetLinkDetail($item, $lang);
                    $priceold = $phantram = $pricephantram = '';
                    if ($item["priceold"] > 0) {
                        $pricephantram = ($item["priceold"] / $item["price"]) * 10;
                        $phantram = '<span class="salespr">' . number_format($pricephantram, 0, ",", ".") . ' %</span>';
                        $priceold = '<span class="old-price">' . number_format($item["priceold"], 0, ",", ".") . ' đ</span>';
                    }
                    if ($item["price"] > 0) {
                        $price = '<span class="new-price">' . number_format($item["price"], 0, ",", ".") . ' đ</span>';
                    } else {
                        $price = '<span class="new-price">Liên hệ</span>';
                    }
                    if ($item["timebh"] != '') {
                        $timebhed = '<p>' . $item['timebh'] . '</p>';
                    } else {
                        $timebhed = '';
                    }
                    $view.= '

							<div class="itemsp subed col-md-3 col-sm-6 col-xs-6">

								<div class="f-prnb product_nb">

									<div class="f-bl-thumb-pr">

										<a href="' . $path_url . '/' . $item["unique_key"] . '.html" title="' . $item["name_" . $lang] . '">

											' . $phantram . '

		                                    <img src= "' . $path_url . '/' . $item["img_thumb_vn"] . '" alt="' . $item["name_" . $lang] . '" class="img-responsive"/>

										</a>



									</div>

									<div class="meta">

									<h3>

										<a href="' . $path_url . '/' . $item["unique_key"] . '.html" title="' . $item["name_" . $lang] . '">' . $item["name_" . $lang] . '</a>

									</h3>

	                               <div class="ht-price">

	                                    ' . $price . '

	                                    ' . $priceold . '

	                                </div>

	                                

									</div>

								</div>

							</div>

						';
                }
            }
        } else {
            if ($total > 0) {
                foreach ($rs as $item) {
                    $link = GetLinkDetail($item, $lang);
                    if ($item["timebh"] != '') {
                        $timebhed = '<p>' . $item['timebh'] . '</p>';
                    } else {
                        $timebhed = '';
                    }
                    $view.= '

							<div class="itemsp subed col-md-3 col-sm-6 col-xs-6">

								<div class="f-prnb product_nb">

									<div class="f-bl-thumb-pr">

										<a href="' . $path_url . '/' . $item["unique_key"] . '.html" title="' . $item["name_" . $lang] . '">

											' . $phantram . '

		                                    <img src= "' . $path_url . '/' . $item["img_thumb_vn"] . '" alt="' . $item["name_" . $lang] . '" class="img-responsive"/>

										</a>



									</div>

									<div class="meta">

									<h3>

										<a href="' . $path_url . '/' . $item["unique_key"] . '.html" title="' . $item["name_" . $lang] . '">' . $item["name_" . $lang] . '</a>

									</h3>

	                               <div class="ht-price">

	                                   <span class="new-price">Liên hệ</span>

	                                </div>

	                                

									</div>

								</div>

							</div>

						';
                }
            }
        }
        die(json_encode(array('view' => $view, 'Pagelink' => $linkpg)));
        break;
    case 'submenupr':
        $sqlchecksp = "select * from $GLOBALS[db_sp].categories where id = " . $cid;
        $rschecksp = $GLOBALS["sp"]->getRow($sqlchecksp);
        if ($rschecksp['id'] == 316) { // san pham
            $sql = "select * from $GLOBALS[db_sp].products where active=1 order by num asc, id desc ";
            $sql_sum = "select count(id) from $GLOBALS[db_sp].products where active=1 ";
        } else {
            $sql = "select * from $GLOBALS[db_sp].products where active=1 AND cid in (select id from $GLOBALS[db_sp].categories where pid=" . $cid . " and active=1) order by num asc, id desc ";
            $sql_sum = "select count(id) from $GLOBALS[db_sp].products where active=1 AND cid in (select id from $GLOBALS[db_sp].categories where pid=" . $cid . " and active=1) ";
        }
        $total = count($GLOBALS["sp"]->getAll($sql));
        $num_rows_page = $num_rows_page;
        $num_page = ceil($total / $num_rows_page);
        $begin = ($page - 1) * $num_rows_page;
        $urll = "ShowPaging"; //set url for paginator
        $iSEGSIZE = 40;
        $linkpg = "";
        if ($num_page > 1) $linkpg = paginatornum($urll, $page, $num_page, $iSEGSIZE, $cid, 'submenupr', $path_url, $url, $idd, $num_rows_page, $strPrice);
        $sql = $sql . " limit $begin,$num_rows_page";
        $rs = $GLOBALS["sp"]->getAll($sql);
        if ($rsshowprice['open'] == 1) {
            if ($total > 0) {
                foreach ($rs as $item) {
                    $link = GetLinkDetail($item, $lang);
                    $priceold = $phantram = $pricephantram = '';
                    if ($item["priceold"] > 0) {
                        $pricephantram = ($item["priceold"] / $item["price"]) * 10;
                        $phantram = '<span class="salespr">' . number_format($pricephantram, 0, ",", ".") . ' %</span>';
                        $priceold = '<span class="old-price">' . number_format($item["priceold"], 0, ",", ".") . ' đ</span>';
                    }
                    if ($item["price"] > 0) {
                        $price = '<span class="new-price">' . number_format($item["price"], 0, ",", ".") . ' đ</span>';
                    } else {
                        $price = '<span class="new-price">Liên hệ</span>';
                    }
                    if ($item["timebh"] != '') {
                        $timebhed = '<p>' . $item['timebh'] . '</p>';
                    } else {
                        $timebhed = '';
                    }
                    $view.= '

							<div class="itemsp subed col-md-3 col-sm-6 col-xs-6">

								<div class="f-prnb product_nb">

									<div class="f-bl-thumb-pr">

										<a href="' . $path_url . '/' . $item["unique_key"] . '.html" title="' . $item["name_" . $lang] . '">

											' . $phantram . '

		                                    <img src= "' . $path_url . '/' . $item["img_thumb_vn"] . '" alt="' . $item["name_" . $lang] . '" class="img-responsive"/>

										</a>



									</div>

									<div class="meta">

									<h3>

										<a href="' . $path_url . '/' . $item["unique_key"] . '.html" title="' . $item["name_" . $lang] . '">' . $item["name_" . $lang] . '</a>

									</h3>

	                               <div class="ht-price">

	                                    ' . $price . '

	                                    ' . $priceold . '

	                                </div>

	                                

									</div>

								</div>

							</div>

						';
                }
            }
        } else {
            if ($total > 0) {
                foreach ($rs as $item) {
                    $link = GetLinkDetail($item, $lang);
                    if ($item["timebh"] != '') {
                        $timebhed = '<p>' . $item['timebh'] . '</p>';
                    } else {
                        $timebhed = '';
                    }
                    $view.= '

							<div class="itemsp subed col-md-3 col-sm-6 col-xs-6">

								<div class="f-prnb product_nb">

									<div class="f-bl-thumb-pr">

										<a href="' . $path_url . '/' . $item["unique_key"] . '.html" title="' . $item["name_" . $lang] . '">

											' . $phantram . '

		                                    <img src= "' . $path_url . '/' . $item["img_thumb_vn"] . '" alt="' . $item["name_" . $lang] . '" class="img-responsive"/>

										</a>



									</div>

									<div class="meta">

									<h3>

										<a href="' . $path_url . '/' . $item["unique_key"] . '.html" title="' . $item["name_" . $lang] . '">' . $item["name_" . $lang] . '</a>

									</h3>

	                               <div class="ht-price">

	                                   <span class="new-price">Liên hệ</span>

	                                </div>

	                                

									</div>

								</div>

							</div>

						';
                }
            }
        }
        die(json_encode(array('view' => $view, 'Pagelink' => $linkpg)));
        break;
    case 'submenu':
        $sql = "SELECT * from $GLOBALS[db_sp].articlelist where comp = " . $cid . " order by id desc ";
        $sql_sum = "SELECT count(id) from $GLOBALS[db_sp].articlelist where comp=" . $cid . " and active=1";
        $total = $count = ceil($GLOBALS['sp']->getOne($sql_sum));
        $num_rows_page = $num_rows_page;
        $num_page = ceil($total / $num_rows_page);
        $begin = ($page - 1) * $num_rows_page;
        $urll = "ShowPaging"; //set url for paginator
        $iSEGSIZE = 4;
        $linkpg = "";
        if ($num_page > 1) $linkpg = paginatornum($urll, $page, $num_page, $iSEGSIZE, $cid, 'submenu', $path_url, $url, $idd, $num_rows_page, $strPrice);
        $sql = $sql . " limit $begin,$num_rows_page";
        $rs = $GLOBALS["sp"]->getAll($sql);
        if ($total > 0) {
            foreach ($rs as $item) {
                $link = GetLinkDetail($item, $lang);
                $imgview = "<img src='" . $path_url . "/" . $item['img_thumb_vn'] . "' alt='" . $item['alt_img'] . "' title='" . $item['title_img'] . "'  class='img-responsive'/>";
                if ($item["price"] != '') $price = number_format($item["price"], 0, ",", ".") . ' vnđ';
                else $price = 'liên hệ';
                if ($item["timebh"] != '') {
                    $timebhed = '<p>' . $item['timebh'] . '</p>';
                } else {
                    $timebhed = '';
                }
                $view.= '

						<div class="itemsp se col-md-4 col-sm-6 col-xs-6">

							<div class="sp-item-duan">

								<div class="thumb-sp">

									<a href="' . $path_url . '/' . $item["unique_key"] . '.html" title="' . $item["name_" . $lang] . '">

										' . $phantram . '

	                                    <img src= "' . $path_url . '/' . $item["img_thumb_vn"] . '" alt="' . $item["name_" . $lang] . '" class="img-responsive"/>

									</a>

								 ' . $timebhed . '

								</div>

								<h3>

									<a href="' . $path_url . '/' . $item["unique_key"] . '.html" title="' . $item["name_" . $lang] . '">' . $item["name_" . $lang] . '</a>

								</h3>

                               <div class="ht-price sss">

                                    ' . $price . '

                                    ' . $priceold . '

                                </div>

                                

								

							</div>

						</div>

					';
            }
        }
        die(json_encode(array('view' => $view, 'Pagelink' => $linkpg)));
        break;
    case 'search':
        $wh = "";
        if (!empty($_SESSION['names'])) {
            $wh.= " and ( name_vn like '%" . $_SESSION['names'] . "%' ) ";
        }
        $sql = "select * from $GLOBALS[db_sp].products 

					where active=1 

					$wh

					order by num asc, id desc 

			";
        $sql_sum = "select count(id) from $GLOBALS[db_sp].products 

					where active=1 

					$wh

			";
        $total = $count = ceil($GLOBALS['sp']->getOne($sql_sum));
        $num_rows_page = $num_rows_page;
        $num_page = ceil($total / $num_rows_page);
        $begin = ($page - 1) * $num_rows_page;
        $urll = "ShowPaging"; //set url for paginator
        $iSEGSIZE = 40;
        $linkpg = "";
        if ($num_page > 1) $linkpg = paginatornum($urll, $page, $num_page, $iSEGSIZE, $cid, 'search', $path_url, $url, $idd, $num_rows_page, $strPrice);
        $sql = $sql . " limit $begin,$num_rows_page";
        $rs = $GLOBALS["sp"]->getAll($sql);
        if ($total > 0) {
            foreach ($rs as $item) {
                $link = GetLinkDetail($item, $lang);
                $priceold = $phantram = $pricephantram = '';
                if ($item["priceold"] > 0) {
                    $pricephantram = ($item["priceold"] / $item["price"]) * 10;
                    $phantram = '<span class="salespr">' . number_format($pricephantram, 0, ",", ".") . ' %</span>';
                    $priceold = '<span class="old-price">' . number_format($item["priceold"], 0, ",", ".") . ' đ</span>';
                }
                if ($item["price"] > 0) {
                    $price = '<span class="new-price">' . number_format($item["price"], 0, ",", ".") . ' đ</span>';
                } else {
                    $price = '<span class="new-price">Liên hệ</span>';
                }
                $view.= '

						<div class="itemsp col-md-4 col-sm-6 col-xs-6">

							<div class="sp-item-duan">

								<div class="thumb-sp">

								<a href="' . $path_url . '/' . $item["unique_key"] . '.html" title="' . $item["name_" . $lang] . '">

									' . $phantram . '

                                    <img src= "' . $path_url . '/' . $item["img_thumb_vn"] . '" alt="' . $item["name_" . $lang] . '" class="img-responsive"/>

								</a>

								</div>

								<h3>

									<a href="' . $path_url . '/' . $item["unique_key"] . '.html" title="' . $item["name_" . $lang] . '">' . $item["name_" . $lang] . '</a>

								</h3>

                                <div class="ht-price">

                                    ' . $price . '

                                    ' . $priceold . '

                                </div>

                                

								

							</div>

						</div>

					';
            }
        }
        die(json_encode(array('view' => $view, 'Pagelink' => $linkpg)));
        break;
    case 'searchSp':
        $sql = "select * from $GLOBALS[db_sp].categories where id=12";
        $rs = $GLOBALS["sp"]->getRow($sql);
        $names = isset($_POST['names']) ? $_POST['names'] : "";
        $prices = isset($_POST['prices']) ? $_POST['prices'] : "";
        $dientichs = isset($_POST['dientichs']) ? $_POST['dientichs'] : "";
        $districts = isset($_POST['districts']) ? $_POST['districts'] : "";
        $wards = isset($_POST['wards']) ? $_POST['wards'] : "";
        $_SESSION['names'] = $names;
        $_SESSION['prices'] = $prices;
        $_SESSION['dientichs'] = $dientichs;
        $_SESSION['districts'] = $districts;
        $_SESSION['wards'] = $wards;
        die(json_encode(array('distination' => $path_url . "/" . $rs['unique_key'] . "/")));
        break;
    case 'linkpr':
        $id = ceil($_POST['id']);
        $sql = "select * from $GLOBALS[db_sp].products where id=$id";
        $rs = $GLOBALS["sp"]->getRow($sql);
        $like = ceil($rs['like'] + 1);
        $arr['like'] = $like;
        vaUpdate('products', $arr, ' id=' . $id);
        die(json_encode(array('view' => $like)));
        break;
    }
?>