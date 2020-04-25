<?php
if(isset($_POST['update']))
{
    require_once '../model/get_user.php';
    require_once '../model/queries.php';
    $username = $user_info['user_name'];
    
    $file = $_FILES['profilePic'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed=array('jpg','jpeg','png');

    if(in_array($fileActualExt,$allowed)) {
        if($fileError === 0) {
            if($fileSize < 1000000) {
                $fileNameNew = $username . "." . $fileActualExt;
                $fileDestination = '../images/profilePics/' . $fileNameNew;
                $q = new Queries();

                // check if user already has a picture
                $sql = "SELECT * FROM images WHERE id = (SELECT id FROM users WHERE user_name = ?)";
                $params = array($username);
                $result = $q->query($sql, $params);

                $data = $q->getData($result);

                if($data['hasPicture'] == 1){
                    // Delete picture from images folder
                    unlink($fileDestination);
                }

                move_uploaded_file($fileTmpName, $fileDestination);
                $_SESSION['ext'] = $fileActualExt;
                // UPDATE IMAGES TABLE
                $sql = "UPDATE images SET hasPicture = 1 WHERE id = ?";
                $params = array($user_info['user_id']);
                $result = $q->query($sql, $params);

                echo "
                    <script>alert('You have successfully uploaded a profile picture!')</script>
                    <script>window.open('/quorating/index.php','_self')</script>
                ";
            }
            else {
                echo "Your file is too big!";
            }
        }
        else {
            echo "There was an error uploading your size!";
        }
    }
    else {
        echo "You cannot upload files of this type!";
    }
}

