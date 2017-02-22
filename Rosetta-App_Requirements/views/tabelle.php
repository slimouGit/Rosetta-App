<table class="table table-hover table-responsive" id="tabelle">
            <thead>

            <tr>
                <!-- ?orderBy= -->
                <th class="col-sm-1"><a href="index.php?orderBy=verbindlichkeit">Verbindlichkeit</a></th>
                <th class="col-sm-1"><a href="index.php?orderBy=id">ID</a></th>
                <th class="col-sm-1"><a href="index.php?orderBy=datum">Datum/Uhrzeit</a></th>
                <th class="col-sm-1"><a href="index.php?orderBy=author">Author</a></th>
                <th class="col-sm-2"><a href="index.php?orderBy=titel">Titel</a></th>
                <th class="col-sm-6"><a href="index.php?orderBy=beschreibung">Beschreibung</a></th>
            </tr>
            </thead>

            <tbody>
            <!--include data-->
                <?php
                    include 'includes/db_output.php';
                ?>
</tbody>
</table>
