<?php
include 'inc/header.php';

?>
<h1 class="head">Home Page</h1>
<div class="container">
    <?php if (isset($_SESSION['message'])) {  ?>
        <div class="error_message">
            <strong> <?= $_SESSION['message']; ?> </strong>
        </div>
    <?php unset($_SESSION['message']);
    } ?>
</div>


<?php
include 'inc/footer.php';
?>