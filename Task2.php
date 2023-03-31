<?php declare(strict_types=1);

const ROWS_COUNT = 5;
const COLS_COUNT = 7;
const MAX_NUMBER = 1001;

$total_numbers_array = [];
do {
    $total_numbers_array[] = rand(0, MAX_NUMBER);
    $total_numbers_array = array_unique($total_numbers_array);
} while (count($total_numbers_array) < (ROWS_COUNT * COLS_COUNT));

$numbers_array = [];
for ($row = 0; $row < ROWS_COUNT; $row++) {
    $numbers_array[$row] = array_splice($total_numbers_array, 0, COLS_COUNT);
}

$row_sums = [];
$col_sums = [];
foreach ($numbers_array as $row_key => $numbers_row) {
    $row_sum = array_sum($numbers_row);
    $row_sums[] = $row_sum;
    foreach ($numbers_row as $col_key => $col_value) {
        $value = $col_sums[$col_key] ?? 0;
        $col_sums[$col_key] = $value + $col_value;
    }
}

/**
 * Суммы можно высчитывать и при отрисовке, дабы не проходиться лишний раз по массиву, но во-первых,
 * задание можно трактовать по-разному и можно с помощью var_dump и print_r вывести массив, суммы строк и суммы столбцов,
 * во-вторых, так будет сложнее понять, что происходит и больше сайд-эффектов в одном цикле
 */

$render = '<table>';
foreach ($numbers_array as $row_key => $numbers_row) {
    $render .= '<tr>';
    foreach ($numbers_row as $column) {
        $render .= '<td>' . $column . '</td>';
    }
    $row_sum = $row_sums[$row_key] ?? null;
    if ($row_sum) {
        $render .= '<th>' . $row_sum . '</th>';
    }
    $render .= '</tr>';
}
if (!empty($col_sums)) {
    $render .= '<tr>';
    foreach ($col_sums as $col_sum) {
        $render .= '<th>' . $col_sum . '</th>';
    }
    $render .= '</tr>';
}

echo $render;
