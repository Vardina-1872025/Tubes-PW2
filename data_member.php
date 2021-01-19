//Pembaharuan Projek
<h2>Input Data Member</h2>
<form method="POST" action="">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">ID Member</label>
                <input class="input--style-4" type="text" name="txtIDMember" placeholder="Masukan ID Member" required="">
            </div>
        </div>
        <div class="col-2">
            <div class="input-group">
                <label class="label">Nama Member</label>
                <input class="input--style-4" type="text" name="txtNamaMember" placeholder="Masukan Nama Member" required="">
            </div>
        </div>
        <div class="col-2">
            <div class="input-group">
                <label class="label">Email</label>
                <input class="input--style-4" type="text" name="txtEmailMember" placeholder="Masukan Email Member" required="">
            </div>
        </div>
        <div class="col-2">
            <div class="input-group">
                <label class="label">No Telepon</label>
                <input class="input--style-4" type="text" name="txtNoTelpMember" placeholder="Masukan Telepon Member" required="">
            </div>
        </div>
        <div class="col-2">
            <div class="input-group">
                <label class="label">Password</label>
                <input class="input--style-4" type="text" name="txtPasswordMember" placeholder="Masukan Password Member" required="">
            </div>
        </div>
    </div>
    <div class="p-t-15">
        <input class="btn btn--radius-2 btn--blue" type="submit" Value="Submit" name="btnSubmit" />
    </div>
</form>
<br>
<table id="tableId" class="display">
    <thead>
    <tr>
        <th>Id Member</th>
        <th>Nama Member</th>
        <th>No Telepon</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach($result as $row) {
            echo '<tr>';
            echo '<td>' . $row->getId_member() . '</td>';
            echo '<td>' . $row->getNama_member() . '</td>';
            echo '<td>' . $row->getNo_telp() . '</td>';
            echo '<td>' . $row->getEmail() . '</td>';
            echo '</tr>';
    }
        ?>
    </tbody>
</table>
