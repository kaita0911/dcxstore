<?php
/* Smarty version 4.3.1, created on 2025-10-31 03:14:24
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\menu\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69041b80b531e0_49419482',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a5234837ca7abde4013bff7afa0c403e17905d8' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\menu\\list.tpl',
      1 => 1761876805,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_69041b80b531e0_49419482 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">

   <div class="main">
      <div class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>

      <div class="right_content">
         <div class="divright">
            <div class="acti2">
               <a class="add" href="index.php?do=menu&act=add">
                  <i class="fa fa-plus-circle"></i> Thêm mới
               </a>
            </div>
            <div class="acti2">
               <button class="add" type="button" id="btnDelete" data-comp="<?php echo (($tmp = $_REQUEST['comp'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
">
                  <i class="fa fa-trash"></i> Xóa
               </button>
            </div>
            <div class="acti2">
               <button class="add" type="button" id="saveOrderBtn" data-comp="<?php echo (($tmp = $_REQUEST['comp'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
">
                  <i class="fa fa-first-order"></i> Sắp xếp
               </button>
            </div>
         </div>
         <div class="main-content">
            <div class="tbtitle2">
               <form class="form-all" method="post" action="">
                  <table class="br1">
                     <thead>
                        <tr>
                           <th align="center" class="width-del">
                              <input type="checkbox" name="all" id="checkAll" />
                           </th>
                           <th align="center" class="width-order"><strong>Thứ tự</strong></th>
                           <th align="left" class="width-ttl"><strong>Tiêu đề</strong></th>
                           <th align="center" class="width-show"><strong>Show</strong></th>
                           <th align="center" class="width-action"><strong>Action</strong></th>
                        </tr>
                     </thead>

                     <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['view']->value, 'row', false, NULL, 'menuLoop', array (
));
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                        <tr data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">
                           <td class="brbottom" align="center">
                              <input class="c-item" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" name="cid[]">
                           </td>

                           <td align="center" class="brbottom">
                              <input type="text" class="numInput" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['num'];?>
">
                           </td>

                           <td align="left" class="brbottom">
                              <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['row']->value['name_lang'], ENT_QUOTES, 'UTF-8', true);?>

                           </td>

                           <td align="center" class="brbottom">
                              <button type="button"
                                 class="btn_checks btn_toggle"
                                 data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"
                                 data-active="<?php echo $_smarty_tpl->tpl_vars['row']->value['active'];?>
"
                                 data-column="active"
                                 data-table="menu">
                                 <img src="images/<?php echo $_smarty_tpl->tpl_vars['row']->value['active'];?>
.png" alt="Show/Hide">
                              </button>
                           </td>

                           <td align="center" class="brbottom">
                              <div class="flex-btn">
                                 <a class="act-btn btnEdit"
                                    href="index.php?do=menu&act=edit&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"
                                    title="Sửa">
                                    <i class="fa fa-edit"></i>
                                 </a>
                                 <button title="Xoá" type="button"
                                    class="act-btn btnDeleteRow"
                                    data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" data-comp="0">
                                    <i class="fa fa-trash"></i>
                                 </button>
                              </div>
                           </td>
                        </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                     </tbody>
                  </table>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php echo '<script'; ?>
>
   document.addEventListener("DOMContentLoaded", function() {
      const saveOrderBtn = document.getElementById("saveOrderBtn");

      if (saveOrderBtn) {
         saveOrderBtn.addEventListener("click", function() {
            const rows = document.querySelectorAll("tbody tr");
            const ids = [];
            const nums = [];

            rows.forEach(row => {
               const id = row.dataset.id;
               const numInput = row.querySelector(".numInput");
               if (id && numInput) {
                  ids.push(id);
                  nums.push(numInput.value.trim() || 0);
               }
            });

            if (ids.length === 0) {
               alert("Không có dữ liệu để sắp xếp!");
               return;
            }

            // Gửi AJAX bằng fetch
            fetch("index.php?do=menu&act=updateOrder", {
                  method: "POST",
                  headers: {
                     "Content-Type": "application/x-www-form-urlencoded"
                  },
                  body: `id[]=${ids.join("&id[]=")}&num[]=${nums.join("&num[]=")}`
               })
               .then(response => response.json())
               .then(data => {
                  if (data.success) {
                     alert("✅ Đã lưu thứ tự thành công!");
                     location.reload(); // refresh để cập nhật lại
                  } else {
                     alert("❌ " + (data.message || "Cập nhật thất bại!"));
                  }
               })
               .catch(() => {
                  alert("⚠️ Lỗi kết nối server! Vui lòng thử lại sau.");
               });
         });
      }
   });
<?php echo '</script'; ?>
>

<?php }
}
