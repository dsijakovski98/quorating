<?php
if(isset($_POST['update']))
{
    require_once '../model/get_user.php';
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
                move_uploaded_file($fileTmpName, $fileDestination);
                $_SESSION['ext'] = $fileActualExt;

                // UPDATE IMAGES TABLE
                $sql = "UPDATE images SET hasPicture = 1 WHERE id = ?";
                $params = array($user_info['id']);
                $result = $q->query($sql, $params);

                echo "
                    <script>alert('You have successfully uploaded a profile picture!')</script>
                    <script>window.open('../index.php','_self')</script>
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

