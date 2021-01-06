<!-- NAMA : Dinda Ayu Febriani -->
<!-- NRP : 1872043 -->
<h2>Albums Form</h2>
<form method="POST" action="" enctype="multipart/form-data">
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Title</label>
                <input class="input--style-4" type="text" name="txtTitle" placeholder="New Title Albums" required="" value="<?php echo $albums->getTitle(); ?>">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Release Date</label>
                <input class="input--style-4" type="text" name="txtReleaseDate" placeholder="YYYY-MM-DD" required="" value="<?php echo $albums->getReleasedate(); ?>">
            </div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="label">Producers</label>
                <input class="input--style-4" type="text" name="txtProducers" placeholder="New Produsers" required="" value="<?php echo $albums->getProducers(); ?>">
            </div>
        </div>
    </div>
    <div class="input-group">
        <label class="label">Artists</label>
        <?php
        $link2 = new PDO("mysql:host=localhost; dbname=progweb2", "root", "");
        $link2->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
        $link2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query2 = "SELECT * from artists";
        if ($result2 = $link2->query($query2)) {
        }
        ?>
        <div class="rs-select2 js-select-simple select--no-search">
            <select name="txtArtists">
                <option disabled="disabled" selected="selected">Choose option</option>
                <?php
                foreach ($result2 as $row2) {
                    if ($row2['idartists'] == $result['artists_idartists']) {
                        echo "<option selected='' value='" . $row2['idartists'] . "'>" . $row2['name'] . "</option>";
                    } else {
                        echo "<option value='" . $row2['idartists'] . "'>" . $row2['name'] . "</option>";
                    }
                }
                ?>
            </select>
            <div class="select-dropdown"></div>
        </div>
    </div>
    <div class="row row-space">
        <div class="col-2">
            <div class="input-group">
                <label class="control-label col-sm-2">Cover File</label>
                <input type="file" name="albumCover" class="input--style-4" accept="image/png, image/jpeg">
            </div>
        </div>
    </div>
    <div class="p-t-15">
        <input class="btn btn--radius-2 btn--blue" type="submit" name="btnSubmit" />
    </div>
</form>