<?php declare(strict_types=1);

const MAX_STEPS_COUNT = 100;

/**
 * Вариант 1
 */

$stairs_count = 0;
$steps_number = 0;
do {
    $stairs_count++;
    for ($i = 0; $i < $stairs_count; $i++) {
        $steps_number++;
        // Убрать, чтобы лесенка получилась ровной в конце :)
        if ($steps_number > MAX_STEPS_COUNT) {
            break;
        }
        echo $steps_number . ' ';
    }
    echo PHP_EOL;
} while ($steps_number < MAX_STEPS_COUNT);


/**
 * Вариант 2
 */

$steps = [];
for ($i = 1; $i <= MAX_STEPS_COUNT; $i++) {
    $steps[] = $i;
}
$offset = 0;
$steps_multiplier = 1;
do {
    $current_steps = array_slice($steps, $offset, $steps_multiplier);
    echo implode(' ', $current_steps) . PHP_EOL;
    $steps_multiplier = count($current_steps) + 1;
    $offset = array_pop($current_steps);
} while ($offset < MAX_STEPS_COUNT);
