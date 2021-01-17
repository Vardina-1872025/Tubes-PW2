<table id="tableId" class="display">
    <thead>
    <tr>
        <th>Id Member</th>
        <th>Plat Motor</th>
        <th>Plat Mobil</th>
        <?php if($_SESSION['isLoggedIn'] == TRUE) {
        ?>
        <th>Action</th>
        <?php 
        } 
    ?>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach($result as $row) {
            if($_SESSION['session_id'] == $row->getId_member()){
            echo '<tr>';
            echo '<td>' . $row->getId_member() . '</td>';
            echo '<td>' . $row->getPlat_motor() . '</td>';
            echo '<td>' . $row->getPlat_mobil() . '</td>';
            if($_SESSION['isLoggedIn'] == TRUE) {
            echo '<td><button class="btn btn--radius-2 btn--blue" onclick="updateKendaraan(\''.$row->getId_member().'\')">Update</button></td>';
            }
            echo '</tr>';
        }
    }
        ?>
    </tbody>
</table>