<!-- NAMA : Dinda Ayu Febriani -->
<!-- NRP : 1872043 -->
<h2>Albums Form</h2>
<?php if($_SESSION['isLoggedIn'] == TRUE) {
?>
<form method="POST" action="" enctype="multipart/form-data">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Title</label>
                <input class="input--style-4" type="text" name="txtTitle" placeholder="New Title Albums" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Release Date</label>
                <input class="input--style-4" type="text" name="txtReleaseDate" placeholder="YYYY-MM-DD" required="">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Producers</label>
                <input class="input--style-4" type="text" name="txtProducers" placeholder="New Produsers" required="">
            </div>
        </div>
    </div>
    <div class="input-group">
        <label class="label">Artists</label>
        <?php
        $link2 = new PDO("mysql:host=localhost; dbname=progweb2", "root", "");
        $link2 -> setAttribute(PDO::ATTR_AUTOCOMMIT, false);
        $link2 -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query2 = "SELECT * FROM artists";
        if($result2 = $link2->query($query2)){
        ?>
        <div class="rs-select2 js-select-simple select--no-search">
            <select name="txtArtists">
                <option disabled="disabled" selected="selected">Choose option</option>
                <?php
                foreach($result2 as $row2){
                    echo "<option value='" .$row2['idartists']."'>".$row2['name']."</option>";
                }
                ?>
            </select>
            <div class="select-dropdown"></div>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="control-label col-sm-2">Cover File</label>
                <input type="file" name="albumsCover" class="input--style-4" accept="image/png, image/jpeg">
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
        <th>Albums ID</th>
        <th>Title</th>
        <th>Cover</th>
        <th>Release Date</th>
        <th>Producers</th>
        <th>Artists</th>
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
        /* @var $row Albums */
        foreach($result as $row) {
            echo '<tr>';
            echo '<td>' . $row->getIdalbums() . '</td>';
            echo '<td>' . $row->getTitle() . '</td>';
            echo '<td>'; 
            $cover = $row->getCover();
            if(isset($cover)) {
                echo '<img class = "img-tbl" src ="uploads/' . $cover . '">';
            }
            echo '</td>';
            echo '<td>' . $row->getReleasedate() . '</td>';
            echo '<td>' . $row->getProducers() . '</td>';
            echo '<td>' . $row->getArtists_idartists() . '</td>';
            if($_SESSION['isLoggedIn'] == TRUE) {
                echo '<td><button class="btn btn--radius-2 btn--blue" onclick="UpdateAlbums(\''.$row->getIdalbums().'\')">Update</button>';
                echo '<button class="btn btn--radius-2 btn--blue" onclick="DeleteAlbums(\''.$row->getIdalbums().'\')">Delete</button></td>';
        }
            echo '</tr>';
        }
        $link = null;
        ?>
    </tbody>
</table>