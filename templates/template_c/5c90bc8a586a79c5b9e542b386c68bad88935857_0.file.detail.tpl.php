<?php
/* Smarty version 4.3.1, created on 2025-10-31 07:42:27
  from 'D:\htdocs\dcxstore\templates\tpl\video\detail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69045a531c3044_86010968',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c90bc8a586a79c5b9e542b386c68bad88935857' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\video\\detail.tpl',
      1 => 1761892944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../breadcumb.tpl' => 1,
  ),
),false)) {
function content_69045a531c3044_86010968 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div class="main">
   <div class="container">
      <div class="breadcumb"><?php $_smarty_tpl->_subTemplateRender('file:../breadcumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></div>
      <div class="row">
         <!-- Main content -->
         <div class="artseed-ftn-body col-md-9 col-sm-8 col-xs-12">
            <div class="title-page">
               <h1 itemprop="headline"><?php echo $_smarty_tpl->tpl_vars['detail']->value['name'];?>
</h1>
            </div>
            <input type="hidden" id="youtube-link" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['link_out'];?>
">
            <div id="video-preview" style="margin-top:10px;"></div>
            <div class="pagewhite" itemprop="articleBody">
               <div class="artseed-detail-content">
                  <?php echo $_smarty_tpl->tpl_vars['detail']->value['content'];?>

               </div>

            </div>
         </div>
         <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['articles_related']->value) > 0) {?>
         <div class="related-articles">
            <h3>Tin liên quan</h3>
            <ul>
               <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles_related']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
               <li>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['lang_prefix']->value;
echo $_smarty_tpl->tpl_vars['item']->value['unique_key'];?>
.html" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name_detail'];?>
">
                     <img src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['img_thumb_vn'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name_detail'];?>
" class="img-responsive">
                     <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['name_detail'];?>
</h3>
                     <div class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['dated'],"%d/%m/%Y");?>
</div>
                  </a>
               </li>
               <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
         </div>
         <?php }?>
         <!-- /.artseed-ftn-body -->
      </div>
   </div>
</div>
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
   $(document).ready(function() {
      $("#youtube-link").on("input", function() {
         const url = $(this).val().trim();
         renderVideo(url);
      });

      const initialUrl = $("#youtube-link").val().trim();
      if (initialUrl) renderVideo(initialUrl);

      function renderVideo(url) {
         const videoId = getYouTubeID(url);
         if (videoId) {
            const embedUrl = `https://www.youtube.com/embed/${videoId}`;
            $("#video-preview").html(`
               <iframe width="100%" height="450" 
                  src="${embedUrl}" 
                  frameborder="0" 
                  allowfullscreen>
               </iframe>
            `);
         } else {
            $("#video-preview").empty();
         }
      }

      function getYouTubeID(url) {
         const regex = /(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/))([A-Za-z0-9_-]{11})/;
         const match = url.match(regex);
         return match ? match[1] : null;
      }
   });
<?php echo '</script'; ?>
>
<?php }
}
