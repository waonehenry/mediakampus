<?php
    foreach ($schedule->result_array() as $keys => $value) {
        $content[$value['shift_id']][$value['room_id']] = $value['course'];
    }

    foreach ($shift->result_array() as $rows => $row) {
        foreach ($room->result_array() as $room_rows => $room_row) {
            if (isset($content[$row['id']][$room_row['id']])) {
                $matrix[$row['id']][$room_row['id']] = $content[$row['id']][$room_row['id']];
            } else {
                $matrix[$row['id']][$room_row['id']] = '<b style="color: green">(empty)</b>';
            }
        }
    }
?>

<table class="table table-striped table-bordered">
    <tr><td width="20px">SESI\RUANGAN</td>
    <?php foreach ($room->result_array() as $room_rows => $room_row): ?>
        <td><?= $room_row['name'] ?></td>
    <?php endforeach; ?>
    </tr>
<?php foreach ($shift->result_array() as $rows => $row): ?>
    <tr><td><?= $row['start_time'] ?>-<?= $row['end_time'] ?></td>
    <?php foreach ($room->result_array() as $room_rows => $room_row): ?>
          <td><?= $matrix[$row['id']][$room_row['id']] ?></td>
    <?php endforeach; ?>
    </tr>
<?php endforeach; ?>
</table>
