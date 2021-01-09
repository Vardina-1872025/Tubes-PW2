<h2>Form Transaksi</h2>
<?php if($_SESSION['isLoggedIn'] == TRUE) {
?>
<form method="POST" action="">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Nama Pegawai</label>
                <input class="input--style-4" type="text" name="txtNamaPegawai" placeholder="Masukkan Nama Pegawai" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Tanggal Pembelian</label>
                <input class="input--style-4" type="text" name="txtTanggalPembelian" placeholder="Masukkan Tanggal Pembelian" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Jenis Bahan Bakar</label>
                <input class="input--style-4" type="text" name="txtJenisBahanBakar" placeholder="Pilih Jenis Bahan Bakar" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">ID Member (Non Member - )</label>
                <input class="input--style-4" type="text" name="txtIDMember" placeholder="Masukkan ID Member" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Poin</label>
                <input class="input--style-4" type="text" name="txtPoin" placeholder=" "required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">ID Cabang</label>
                <input class="input--style-4" type="text" name="txtIDCabang" placeholder="Masukkan ID Cabang" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Total Pembelian</label>
                <input class="input--style-4" type="text" name="txtTotalPembelian" placeholder="Masukkan Total Pembelian (Rp)" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Total Yang Dibayarkan</label>
                <input class="input--style-4" type="text" name="txtTotalBayarkan" placeholder="Masukkan Total yang Dibayarkan (Rp)" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Total Yang Dikembalikan</label>
                <input class="input--style-4" type="text" name="txtTotalKembalian" placeholder="" required="">
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
        <th>ID Pegawai</th>
        <th>Tanggal Pembelian</th>
        <th>Jenis Bahan Bakar</th>
        <th>ID Member</th>
        <th>Poin</th>
        
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
            echo '<td>' . $row->getId_pegawai() . '</td>';
            echo '<td>' . $row->getTanggal() . '</td>';
            echo '<td>' . $row->getId_bahanbakar() . '</td>';
            echo '<td>' . $row->getId_member() . '</td>';
            echo '<td>' . $row->getTot_poin() . '</td>';
            if($_SESSION['isLoggedIn'] == TRUE) {
            echo '<td><button class="btn btn--radius-2 btn--blue" onclick="updateMember(\''.$row->getId_pegawai().'\')">Update</button>
            <button class="btn btn--radius-2 btn--blue" onclick="deleteMember(\''.$row->getId_pegawai().'\')">Delete</button></td>';
            }
            echo '</tr>';
        }
        $link = null;
        ?>
    </tbody>
</table>