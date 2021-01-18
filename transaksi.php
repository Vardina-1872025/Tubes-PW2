<h2>Form Transaksi</h2>
<?php if($_SESSION['isLoggedIn'] == TRUE) {
?>
<form method="POST" action="">
<div class="row row-space">
    <div class="col-2">
        <div class="input-group">
            <label class="label">Tanggal Pembelian</label>
                <div class="input-group-icon">
                    <input class="input--style-4 js-datepicker" type="text" name="txtTanggalPembelian" placeholder="Pilih Tanggal Pembelian" required=""/>
                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                </div>
         </div>
    </div>
</div>
    <div class="input-group">
        <label class="label">Member</label>
        <div class="rs-select2 js-select-simple select--no-search">
            <select name="txtMember" required="">
                <option disabled="disabled" selected="selected">Choose Member</option>
					<?php 
						/* @var $row3 Member*/
						foreach($allMember as $row3) {
					?>
					<option value="<?php echo $row3->getId_member(); ?>"><?php echo $row3->getNama_member(); ?></option>
					<?php
						}
					?>
            </select>
            <div class="select-dropdown"></div>
        </div>
    </div>
    <div class="input-group">
        <label class="label">Pegawai</label>
        <div class="rs-select2 js-select-simple select--no-search">
            <select name="txtPegawai" required="">
                <option disabled="disabled" selected="selected">Choose Pegawai</option>
					<?php 
						/* @var $row3 Owner*/
						foreach($allPegawai as $row3) {
					?>
					<option value="<?php echo $row3->getId_pegawai(); ?>"><?php echo $row3->getNama_pegawai(); ?></option>
					<?php
						}
					?>
            </select>
            <div class="select-dropdown"></div>
        </div>
    </div>
    <div class="input-group">
        <label class="label">Bahan Bakar</label>
        <div class="rs-select2 js-select-simple select--no-search">
            <select name="txtBahanBakar" required="">
                <option disabled="disabled" selected="selected">Choose Bahan Bakar</option>
					<?php 
						/* @var $row3 Owner*/
						foreach($allBahanBakar as $row3) {
					?>
					<option value="<?php echo $row3->getId_bahanbakar(); ?>"><?php echo $row3->getNama_bahanbakar(); ?></option>
					<?php
						}
					?>
            </select>
            <div class="select-dropdown"></div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Liter</label>
                <input class="input--style-4" type="text" name="txtLiter" placeholder="Masukkan Liter "required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Total Poin</label>
                <input class="input--style-4" type="text" name="txtTotalPoin" placeholder="Masukkan Total Poin (1 - 5)" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Rating</label>
                <input class="input--style-4" type="text" name="txtRating" placeholder="Masukkan Rating" required="">
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
        foreach($result as $row3) {
            echo '<tr>';
            echo '<td>' . $row3->getId_pegawai() . '</td>';
            $penampung = DATE_FORMAT(date_create($row3->getTanggal()),'d M Y'); 
            echo '<td>' . $penampung . '</td>';
            echo '<td>' . $row3->getId_bahanbakar() . '</td>';
            echo '<td>' . $row3->getId_member() . '</td>';
            echo '<td>' . $row3->getTot_poin() . '</td>';
            if($_SESSION['isLoggedIn'] == TRUE) {
            echo '<td><button class="btn btn--radius-2 btn--blue" onclick="deleteTransaksi(\''.$row3->getId_transaksi().'\')">Delete</button></td>';
            }
            echo '</tr>';
        }
        $link = null;
        ?>
    </tbody>
</table>