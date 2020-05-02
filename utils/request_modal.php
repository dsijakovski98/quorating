<?php
// if(isset($_SESSION['admin'])):
require_once 'media_requests.php';
if(!@include_once('control/requests_controller.php')) {
    include_once('../control/requests_controller.php');
}
$requests = getRequests();
?>
<li class="nav-item dropdown">
<a class="nav-link" href="#" data-toggle="dropdown" style="margin-right:20px; margin-top:20px;" id="notification-dropdown" aria-haspopup="true" aria-expanded="false">
Requests

<?php if(count($requests) > 0): ?> 
<span class="badge badge-light"><?php echo count($requests);?></span>
<?php endif; ?>

</a>
<div class="dropdown-menu" aria-labelledby="notification-dropdown">

<?php if(count($requests) <= 0): ?>

<a href="#" class="dropdown-item">
    No new requests at this time!
</a>
</div>
</li>

<?php else:
    $i = 0; 
    foreach($requests as $request):

    $media_type = getMediaType($request['cat_id']);

    $request_data = getRequestData($request, $media_type);

    $request_date = date_create($request_data['date_added']);
    $request_date = date_format($request_date, DATE_COOKIE);
    $request_date = substr($request_date, 0, -5);

    $media_type = substr($media_type, 0, -1);

    $i++;
?>
    <button  type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal<?php echo $i; ?>">
    <!-- <a href="" class="dropdown-item"> -->
        <small><i><?php echo $request_date; ?></i></small>
        <br>
        New <b><?php echo $media_type;?></b> entry request!
        <br>
        <?php echo ucfirst($media_type) . ": " . $request_data['name'];?>
    <!-- </a> -->
    </button>

    <div class="dropdown-divider"></div>
<?php endforeach; ?>
</div>
</li>
<?php endif; ?>

<?php
    $i = 0;
    foreach($requests as $request):

    $media_type = getMediaType($request['cat_id']);
    $request_data = getRequestData($request, $media_type);

    $request_picture_name = getRequestPicture($request_data['id'], $request['cat_id']);
    $creator = getCreator($request['cat_id']);

    $i++;
?>

<!-- MODAL POP UP -->
<div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo substr(ucfirst($media_type), 0, -1) . " Request"; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <?php //var_dump($request_data); ?>
        <h4 class="text-dark text-center" style="display:inline-block;"><?php echo $request_data['name'];?></h4>
        <br>
        <div class="row" style="margin:10px;">
            <img class="rounded-circle" width="85px" height="85px" style="display:inline-block; margin-right:20px;" src="<?php echo "/quorating/images/media/$media_type/$request_picture_name";?>">
            <div class="col-sm-4">
            <h5 style="margin-top:20px;"><?php echo $creator . ": <br>" . $request_data['creator'];?></h5>
            </div>
            <div class="col-sm-4">
            <h5 style="margin-top:20px;"><?php echo "Genre: <br>" . $request_data['genre']; ?></h5>
            </div>
        </div>
        <hr>
        <h5 style="padding:10px; padding-bottom:0px;"> Description:</h5>
        <p style="padding:10px; padding-bottom:0px;">
            <?php echo $request_data['description']; ?>
        </h6>
        </div>
        <div class="modal-footer">
        <form id="<?php echo "request_form" . "$i";?>" name="req-form" action="" method="POST">
            <input type="hidden" name="prod_id" value="<?php echo $request['prod_id']; ?>">
            <input type="hidden" name="cat_id" value="<?php echo $request['cat_id'];?>">
            <input type="hidden" name="table_name" value="<?php echo $media_type; ?>">
            <input type="hidden" name="post_val" value="0">
        </form>
            <button id="<?php echo "accept" . "$i";?>" name="accept-request" class="btn btn-primary" data-dismiss="modal">Accept</button>
            <button id="<?php echo "deny" . "$i";?>" name="deny-request" class="btn btn-secondary" data-dismiss="modal">Deny</button>
        </div>
    </div>
    </div>
</div>
<?php endforeach; ?>

<script src="<?php echo $website; ?>js/requests.js?<?php echo mt_rand(); ?>"></script>
<!-- MODAL POP UP -->