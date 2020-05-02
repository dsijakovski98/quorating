<table>
    <tr>
        <form id="ratings-form" action="<?php echo $website; ?>control/rating-control.php" method="POST">
            <input type='hidden' name='user_id' value="<?php echo $_SESSION['user_id'];?>">
            <input type='hidden' name='categorie_id' value="<?php echo $categorie_id; ?>">
            <input type='hidden' name='prod_id' value="<?php echo $product_id; ?>">
            <input type='hidden' name='r_date' value="<?php echo date('Y-m-d H:i:s');?>">
            <input type='hidden' id="rating-score" name='rating' value="0">
        </form>
        <div align="center" class="bg-dark rounded" style="padding:10px; color:black; width:150px; margin-left:20px; user-select:none;">
            <i class="bulb far fa-lightbulb" style="transform:scale(1.3); margin:4px; cursor:pointer;" data-index="0"></i>
            <i class="bulb far fa-lightbulb" style="transform:scale(1.3); margin:4px; cursor:pointer;" data-index="1"></i>
            <i class="bulb far fa-lightbulb" style="transform:scale(1.3); margin:4px; cursor:pointer;" data-index="2"></i>
            <i class="bulb far fa-lightbulb" style="transform:scale(1.3); margin:4px; cursor:pointer;" data-index="3"></i>
            <i class="bulb far fa-lightbulb" style="transform:scale(1.3); margin:4px; cursor:pointer;" data-index="4"></i>
        </div>
    </tr>
    <br>
</table>

<script src="<?php echo $website; ?>js/bulbs.js?<?php echo mt_rand();?>"></script>