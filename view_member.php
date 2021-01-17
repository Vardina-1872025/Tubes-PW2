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
            echo '<tr>';
            echo '<td>' . $row->getId_member() . '</td>';
            echo '<td>' . $row->getPlat_motor() . '</td>';
            echo '<td>' . $row->getPlat_mobil() . '</td>';
            if($_SESSION['isLoggedIn'] == TRUE) {
            echo '<td><button class="btn btn--radius-2 btn--blue" onclick="updateMember(\''.$row->getId_member().'\')">Update</button>
            <button class="btn btn--radius-2 btn--blue" onclick="deleteMember(\''.$row->getId_member().'\')">Delete</button></td>';
            }
            echo '</tr>';
        }
        $link = null;
        ?>
    </tbody>
</table>