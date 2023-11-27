<?php

defined('BASEPATH') OR exit('No direct script access allowed');

echo '<table>';
foreach ($csv_data as $row)
{
    echo '<tr>';
    foreach ($row as $cell)
    {
        echo '<td>' . htmlspecialchars($cell) . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
