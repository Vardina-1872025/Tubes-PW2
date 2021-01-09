<h2>Form Kendaraan</h2>
<?php if($_SESSION['isLoggedIn'] == TRUE) {
?>
<form method="POST" action="">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Plat Kendaraan</label>
                <input class="input--style-4" type="text" name="txtPlat" placeholder="Masukkan Nomor Plat" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Tipe Kendaraan</label>
                <input class="input--style-4" type="text" name="txtTipe" placeholder="Masukkan Tipe Kendaraan" required="">
            </div>
        </div>
    </div>
    <div class="p-t-15">
        <input class="btn btn--radius-2 btn--blue" type="submit" Value="Submit" name="btnSubmit" />
    </div>
</form>
<?php 
        } 
    ?>
<br/>
<table id="tableId" class="display">
    <thead>
    <tr>
        <th>Id Member</th>
        <th>Plat Kendaraan</th>
        <th>Tipe Kendaraan</th>
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
            echo '<td>' . $row->getPlat_kendaraan() . '</td>';
            echo '<td>' . $row->getTipe_kendaraan() . '</td>';
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