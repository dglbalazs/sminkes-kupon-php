<?php
    include 'header.php';
?>

<body id='body-index'>

<h1>Kupon felhasználtsági adatok</h1>
<div id='logo'></div>
<p class='welcome-text'>Az alábbi oldalon követhető vissza az egyes kuponok által történt jegyvásárlások száma.<br/>
Kérem, írja be a keresőmezőbe az adminisztrátor által szolgáltatott <b style='text-transform:uppercase;'>titkos azonosítót</b>, mely a kuponkódjához tartozik.</p>


<form action='search.php' method='POST' target='resultbox' class='form-container'>
    <input type="text" name="search" placeholder="Egyéni kód">
    <button type="submit" name='submit-search' id='submit-search'>Keresés</button>
</form>

<iframe name='resultbox' class='result-container hidden'>

</iframe>
    

</body>
</html>