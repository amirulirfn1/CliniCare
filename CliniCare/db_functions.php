<?php
function run_prepared_query($con, $sql, $params = [], $types = '') {
    $stmt = mysqli_prepare($con, $sql);
    if (!$stmt) {
        return false;
    }
    if ($params) {
        if ($types === '') {
            $types = str_repeat('s', count($params));
        }
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }
    if (!mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        return false;
    }
    return $stmt;
}
?>
