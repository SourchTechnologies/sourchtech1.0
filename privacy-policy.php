<?php
    include "header-two.php";
?>

<div class="container" style="margin-top:80px;">
    <?php
        $qry = mysqli_query($con, "select content from privacy_policy");
        while($res = mysqli_fetch_array($qry))
        {
            echo $res['content'];
        }
    ?>
</div>

<?php
    include "footer.php";
?>