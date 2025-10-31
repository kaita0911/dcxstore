<?php
/* Smarty version 4.3.1, created on 2025-10-31 05:15:19
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\main\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_690437d75dec13_90866681',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e344bde6220916c2d6244ab9ab591e970957bb7c' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\main\\main.tpl',
      1 => 1761749330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_690437d75dec13_90866681 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
	<div class="main">
		<div class="left_sidebar padding10">
			<?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		</div>
		<div class="right_content ">
			<div class="wrap-tk">
				<div class="wrap-analytic">
					<div class="box-browers">
						<h2 class="box-ttl2">📈 Thống kê trình duyệt truy cập</h2>
						<!-- <canvas id="browserChart" width="400" height="400"></canvas> -->
						<!-- <?php echo '<script'; ?>
>
							fetch('browser_stats.php')
								.then(res => res.json())
								.then(data => {
									const ctx = document.getElementById('browserChart').getContext('2d');
									new Chart(ctx, {
										type: 'pie',
										data: {
											labels: Object.keys(data),
											datasets: [{
												label: 'Truy cập',
												data: Object.values(data),
												backgroundColor: [
													'#FF6384',
													'#36A2EB',
													'#FFCE56',
													'#4BC0C0',
													'#9966FF',
													'#C9CBCF'
												]
											}]
										},
										options: {
											responsive: true
										}
									});
								});
						<?php echo '</script'; ?>
> -->

						<div class="stats">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['browser_counts']->value, 'count', false, 'browser');
$_smarty_tpl->tpl_vars['count']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['browser']->value => $_smarty_tpl->tpl_vars['count']->value) {
$_smarty_tpl->tpl_vars['count']->do_else = false;
?>
							<div class="card"><strong><?php echo $_smarty_tpl->tpl_vars['browser']->value;?>
</strong>
								<span id="online"><?php echo $_smarty_tpl->tpl_vars['count']->value;?>
<span>
							</div>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</div>

					</div>

					<div class="box-browers">
						<h2>📈 Thống kê truy cập</h2>
						<div class="stats">
							<div class="card"><strong>Đang online</strong>
								<span id="online"><?php echo $_smarty_tpl->tpl_vars['online_visits']->value;?>
<span>
							</div>
							<div class="card"><strong>Trong tuần</strong>
								<span id="week"><?php echo $_smarty_tpl->tpl_vars['week_visits']->value;?>
<span>
							</div>
							<div class="card"><strong>Trong tháng</strong>
								<span id="month"><?php echo $_smarty_tpl->tpl_vars['month_visits']->value;?>
<span>
							</div>
							<div class="card"><strong>Tổng truy cập</strong>
								<span id="total"><?php echo $_smarty_tpl->tpl_vars['total_visits']->value;?>
<span>
							</div>
						</div>
					</div>
					<div class="box-browers">
						<h2>Thống kê truy cập theo</h2>

						<div class="tk-item --head">
							<div class="tk-item__ttl">THÀNH PHỐ</div>
							<div class="tk-item__total">Lượng truy cập</div>
						</div>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['region_stats']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
						<div class="tk-item">
							<div class="tk-item__ttl"><?php echo $_smarty_tpl->tpl_vars['row']->value['region'];?>
</div>
							<div class="tk-item__total"><?php echo $_smarty_tpl->tpl_vars['row']->value['total'];?>
 lượt</div>
						</div>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

					</div>
				</div>
				<div class="box-browers width-100">
					<h2>🔗 Top links truy cập (từ cao → thấp)</h2>

					<table class="br1">
						<thead>
							<tr>
								<th align="center" class="width-image">Thứ tự</th>
								<th align="left" class="width-ttl">Link</th>
								<th align="center" class="width-action">Lượt truy cập</th>
							</tr>
						</thead>
						<tbody>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['top_links']->value, 'row', false, 'i');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
							<tr>
								<td align="center"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</td>
								<td align="left"><span class="url-cell" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
</span></td>
								<td align="center"><span class="badge"><?php echo $_smarty_tpl->tpl_vars['row']->value['total'];?>
</span></td>
							</tr>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							<?php if (!$_smarty_tpl->tpl_vars['top_links']->value) {?>
							<tr>
								<td colspan="3">Không có dữ liệu.</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div><?php }
}
