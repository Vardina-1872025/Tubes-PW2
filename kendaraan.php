<h2>Form Kendaraan</h2>
<?php if($_SESSION['isLoggedIn'] == TRUE) {
?>
<form method="POST" action="">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Plat Motor</label>
                <input class="input--style-4" type="text" name="txtPlatMotor" placeholder="Masukkan Nomor Plat Motor" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Plat Mobil</label>
                <input class="input--style-4" type="text" name="txtPlatMobil" placeholder="Masukkan Nomor Plat Mobil" required="">
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