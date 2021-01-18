<table id="tableId" class="display">
    <thead>
    <tr>
        <th>Id Member</th>
        <th>Plat Motor</th>
        <th>Plat Mobil</th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach($result as $row) {
            echo '<tr>';
            echo '<td>' . $row->getId_member() . '</td>';
            echo '<td>' . $row->getPlat_motor() . '</td>';
            echo '<td>' . $row->getPlat_mobil() . '</td>';
            echo '</tr>';
        }
        $link = null;
        ?>
    </tbody>
</table>