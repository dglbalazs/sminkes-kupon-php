<?php
    include 'header.php';
    include 'config_files/token_keys.php';
    include 'config_files/database_connect.php';
?>

<body id='body-search'>
<div class="search-results">
<?php
    if (isset($_POST['submit-search']))
    {
        if ($connection)
        {
            $search = mysqli_real_escape_string($connection,$_POST['search']);
        
            if (array_key_exists($search,$keys))
            {
                $newKey = $keys[$search];
            } else {
                $newKey = '';
            }

            $sql = "SELECT * FROM wp_woocommerce_order_items WHERE order_item_name='$newKey'";
            
            $resp = mysqli_query($connection,$sql);
            $queryResult = mysqli_num_rows($resp);

            echo "<div class='search-results-counter'>Összesen <b>".$queryResult."</b> találat.</div>";

            if ($queryResult > 0) {

                echo "<table>
                        <tr>
                            <th>Megrendelés sorszáma</th>
                            <th>Felhasznált kuponkód</th>
                            <th>Rendelési azonosító</th>
                        </tr>";

                while ($row = mysqli_fetch_assoc($resp)) {
                    echo "<tr>
                    <td>".$row['order_item_id']."</td>
                    <td>".$row['order_item_name']."</td>
                    <td>".$row['order_id']."</td>
                    </tr>";
                };
                echo "</table>";
            } else {
                echo "<div style='font-size:1.5rem;'><b>Sajnos, nincs találat.</b><br/><br/>Kérjük, ellenőrizze, hogy helyesen adta-e meg a titkosított azonosítót, amit kapott.
                <br/>Amennyiben <font color='green'>IGEN</font>, és a keresés mégsem hozott eredményt, úgy előfordulhat, hogy kuponkódjával még nem regisztráltak.</font>";
            }

            mysqli_free_result($resp);
            
            mysqli_close($connection);

        } else {
            echo "<div style='font-size:1.5rem;'><b>Nem sikerült csatlakozni az adatbázishoz.<br/><br/>Kérem, keresse fel az adminisztrátort.</b></div>";
        }
    }
?>

</div>