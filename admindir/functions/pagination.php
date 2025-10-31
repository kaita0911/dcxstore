<?php

/**
 * Hàm phân trang dùng ADODB và giữ nguyên query string
 * 
 * @param object $db ADODB connection object
 * @param string $table Tên bảng chính, ví dụ: "{$GLOBALS['db_sp']}.articlelist AS a"
 * @param string $join SQL JOIN (có thể để rỗng)
 * @param string $where Điều kiện WHERE (có thể để rỗng)
 * @param string $order ORDER BY, ví dụ: "ORDER BY a.id DESC"
 * @param int $page Trang hiện tại
 * @param int $per_page Số bản ghi mỗi trang
 * @param int $max_links Số trang hiển thị xung quanh trang hiện tại (mặc định 5)
 * @return array ['data'=>mảng bản ghi, 'pagination'=>HTML phân trang, 'total_pages'=>số trang]
 */
function paginate($db, $table, $join = '', $where = '', $order = '', $page = 1, $per_page = 5, $max_links = 5)
{
    $page = max(1, intval($page));
    $start = ($page - 1) * $per_page;

    // =========================
    // Tổng số bản ghi
    // =========================
    $total_sql = "SELECT COUNT(*) as total FROM {$table} {$join} {$where}";
    $total_row = $db->GetRow($total_sql);
    $total_records = $total_row['total'] ?? 0;
    $total_pages = ceil($total_records / $per_page);

    // =========================
    // Lấy dữ liệu theo trang
    // =========================
    $data_sql = "
        SELECT *
        FROM {$table}
        {$join}
        {$where}
        {$order}
        LIMIT {$start}, {$per_page}
    ";
    $data = $db->GetAll($data_sql);

    // =========================
    // Tạo HTML phân trang
    // =========================
    $pagination = '';
    if ($total_pages > 1) {
        $pagination .= '<div class="pagination">';

        // Lấy tất cả query string hiện tại
        $query_params = $_GET;

        // Trang trước
        if ($page > 1) {
            $query_params['page'] = $page - 1;
            $pagination .= '<a href="?' . http_build_query($query_params) . '">&laquo; Trang trước</a>';
        }

        // Tính khoảng trang hiển thị
        $start_link = max(1, $page - floor($max_links / 2));
        $end_link = min($total_pages, $start_link + $max_links - 1);

        // Nếu cuối trang < max_links, đẩy start_link lùi lại
        if ($end_link - $start_link + 1 < $max_links) {
            $start_link = max(1, $end_link - $max_links + 1);
        }

        // Các số trang
        for ($i = $start_link; $i <= $end_link; $i++) {
            $query_params['page'] = $i;
            if ($i == $page) {
                $pagination .= '<span class="current">' . $i . '</span>';
            } else {
                $pagination .= '<a href="?' . http_build_query($query_params) . '">' . $i . '</a>';
            }
        }

        // Trang sau
        if ($page < $total_pages) {
            $query_params['page'] = $page + 1;
            $pagination .= '<a href="?' . http_build_query($query_params) . '">Trang sau &raquo;</a>';
        }

        $pagination .= '</div>';
    }

    return [
        'data' => $data,
        'pagination' => $pagination,
        'total_pages' => $total_pages,
        'total_records' => $total_records
    ];
}
