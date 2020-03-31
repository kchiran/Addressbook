<?php
$maxcols = 8;  $i = 0;
echo "<table id='table1'><tr>";

foreach ($id as $k => $v) {
    echo "<td id='0'><div id='{$k}' class='drag t1'>{$v}</div></td>"; $i++;
    if ($i == $maxcols) { $i = 0; echo "</tr><tr>"; }
} $i++;


while ($i <= $maxcols) {
    $i++; echo "<td></td>";
}

echo "</tr></table>";
?>