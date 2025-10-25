<?php
function buildCategoryTree($comp, $level = 0, $excludeId = 0)
{
	// Lấy tất cả danh mục của component này
	$allCategories = $GLOBALS['sp']->getAll("
    SELECT * FROM {$GLOBALS['db_sp']}.categories 
    WHERE comp = {$comp} 
    " . ($excludeId ? "AND id <> {$excludeId}" : "") . " 
    ORDER BY num ASC");

	// Map danh mục theo id để dễ tra
	$catMap = [];
	foreach ($allCategories as $cat) {
		$catMap[$cat['id']] = $cat;
	}

	// Lấy toàn bộ quan hệ cha–con từ bảng categories_related
	$relations = $GLOBALS['sp']->getAll("
        SELECT category_id, related_id 
        FROM {$GLOBALS['db_sp']}.categories_related
    ");

	// Gắn danh mục con vào danh mục cha
	$childrenMap = [];
	foreach ($relations as $rel) {
		$childrenMap[$rel['related_id']][] = $rel['category_id'];
	}

	// Hàm đệ quy dựng cây
	$build = function ($parentIds, $level, $parent_id = 0) use (&$build, &$catMap, &$childrenMap, &$excludeId) {
		$tree = [];
		foreach ($parentIds as $pid) {
			// ❌ Bỏ qua chính danh mục đang edit
			if ($pid == $excludeId) continue;

			if (!isset($catMap[$pid])) continue;
			$cat = $catMap[$pid];

			// Thêm thông tin ngôn ngữ
			$details = $GLOBALS['sp']->getAll("
                SELECT * FROM {$GLOBALS['db_sp']}.categories_detail 
                WHERE categories_id = {$cat['id']}
            ");
			$cat['details'] = [];
			foreach ($details as $d) {
				$cat['details'][$d['languageid']] = $d;
			}
			$cat['name_vn'] = $cat['details'][1]['name'] ?? $cat['name'];

			// Thêm thông tin cấp và cha
			$cat['level'] = $level;
			$cat['parent_id'] = $parent_id; // ✅ thêm parent_id ở đây


			// Nếu có con, đệ quy
			if (isset($childrenMap[$pid])) {
				$cat['children'] = $build($childrenMap[$pid], $level + 1, $pid);
			} else {
				$cat['children'] = [];
			}

			$tree[] = $cat;
		}
		return $tree;
	};

	// Xác định danh mục gốc (những cái không phải là category_id trong bảng quan hệ)
	$allIds = array_column($allCategories, 'id');
	$childIds = array_column($relations, 'category_id');
	$rootIds = array_diff($allIds, $childIds);

	// Dựng cây từ danh mục gốc
	return $build($rootIds, 0, 0);
}
