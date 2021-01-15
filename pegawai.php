<!-- NAMA : Dinda Ayu Febriani -->
<!-- NRP : 1872043 -->
<h2>Form Pegawai</h2>
<?php if($_SESSION['isLoggedIn'] == TRUE) {
?>
<form method="POST" action="">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Nama Pegawai</label>
                <input class="input--style-4" type="text" name="txtNama" placeholder="Masukkan Nama Pegawai" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">NIP</label>
                <input class="input--style-4" type="text" name="txtNip" placeholder="Masukkan NIP" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Cabang</label>
                <input class="input--style-4" type="text" name="txtCabang" placeholder="Masukkan Cabang" required="">
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
        <th>Id Pegawai</th>
        <th>Nama Pegawai</th>
        <th>NIP</th>
        <th>Cabang</th>
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
        /* @var $row pegawai */
        foreach($result as $row) {
            echo '<tr>';
            echo '<td>' . $row->getId_pegawai() . '</td>';
            echo '<td>' . $row->getNama_pegawai() . '</td>';
            echo '<td>' . $row->getNip() . '</td>';
            echo '<td>' . $row->getId_cabang() . '</td>';
            if($_SESSION['isLoggedIn'] == TRUE) {
            echo '<td><button class="btn btn--radius-2 btn--blue" onclick="updateOwner(\''.$row->getId_pegawai().'\')">Update</button>
            <button class="btn btn--radius-2 btn--blue" onclick="deleteOwner(\''.$row->getId_pegawai().'\')">Delete</button></td>';
            }
            echo '</tr>';
        }
        $link = null;
        ?>
    </tbody>
</table>