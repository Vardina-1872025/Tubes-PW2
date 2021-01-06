<!-- NAMA : Dinda Ayu Febriani -->
<!-- NRP : 1872043 -->
<h2>Artists Form</h2>
<?php if($_SESSION['isLoggedIn'] == TRUE) {
?>
<form method="POST" action="">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Artists Name</label>
                <input class="input--style-4" type="text" name="txtName" placeholder="New Artists Name" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Debut</label>
                <input class="input--style-4" type="text" name="txtDebut" placeholder="YYYY-MM-DD" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Company</label>
                <input class="input--style-4" type="text" name="txtCompany" placeholder="New Company" required="">
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
        <th>Artists ID</th>
        <th>Artists Name</th>
        <th>Debut</th>
        <th>Company</th>
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
        /* @var artists Artists */
        foreach($result as $row) {
            echo '<tr>';
            echo '<td>' . $row->getIdartists() . '</td>';
            echo '<td>' . $row->getName() . '</td>';
            echo '<td>' . $row->getDebut() . '</td>';
            echo '<td>' . $row->getCompany() . '</td>';
            if($_SESSION['isLoggedIn'] == TRUE) {
            echo '<td><button class="btn btn--radius-2 btn--blue" onclick="updateArtists(\''.$row->getIdartists().'\')">Update</button>
            <button class="btn btn--radius-2 btn--blue" onclick="deleteArtists(\''.$row->getIdartists().'\')">Delete</button></td>';
            }
            echo '</tr>';
        }
        $link = null;
        ?>
    </tbody>
</table>