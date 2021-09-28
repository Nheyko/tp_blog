<?php
require TEMPLATES . DIRECTORY_SEPARATOR . 'header.html.php';
?>


<form action="" method="post">

    <label for="title">Title :<br></label>
    <input type="text" name="title" id="title">

    <br>

    <label for="content">Your message :<br></label>
    <textarea name="content" id="content" cols="30" rows="10"></textarea>

    <br>

    <input type="submit" value="Envoyer">

</form>

<?php
require TEMPLATES . DIRECTORY_SEPARATOR . 'footer.html.php';
?>