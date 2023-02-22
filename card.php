

<form action="/card.php" method="post">
   <p> Номер карты: <input type="text" id="number" name="number"></p><br><br>
    <input type="submit" value="Submit">
</form>
<?php
require_once __DIR__ . '/funk.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $card = new Card();
   
    $card->validate($_POST['number']);
    
   
}
