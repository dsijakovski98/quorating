<?php

    require_once '../utils/include.php';
    require_once '../model/queries.php';

    if(!isset($_POST['add'])) {
        $path = $website . "index.php";
        header("Location: " . $path);
        exit();
    }

    $name = $_POST['name'];
    $creator = $_POST['creator'];
    $category = $_POST['category'];
    $media_type = $_POST['media_type'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $date_added = $_POST['date_added'];
    $thumbnail = $_FILES['picture'];

    $q = new Queries();

    // Insert media into correct table
    $sql = "INSERT INTO {$media_type} (name, creator, genre, description, date_added) 
    VALUES(?, ?, ?, ?, ?)";
    $params = array($name, $creator, $genre, $description, $date_added);
    
    $result = $q->query($sql, $params);


    if($result){

        // Get id of movie
        $sql = "SELECT id FROM {$media_type} WHERE name = ? and date_added = ? LIMIT 1";
        $params = array($name, $date_added);

        $result = $q->query($sql, $params);
        $data = $q->getData($result);

        $media_id = $data['id'];

        $picture_name = "";
        $extension = "";
        $hasPicture = 0;
        
        // Set starting path to be /quorating/images/media/media_type
        $full_path = "../images/media/$media_type/";

        if(empty($thumbnail['name'])) {

            $picture_name = "default";
            $extension = "jpg";
        }
        else {
            $name_arr = explode(' ', $name);
            foreach($name_arr as $name_part){
                $picture_name .= ucfirst(strtolower($name_part));
            }
            $picture_name .= $media_id;
    
            $extension_arr = explode('/' , $thumbnail['type']);
            $extension = $extension_arr[1];
    
            // Full path is now /quorating/images/media/media_type/picture_name.extension
            // example: /quorating/images/media/movies/godfather35.jpg
            $full_path .= "$picture_name.$extension";
    
            // Upload picture here
            $pictureSize = $thumbnail['size'];
            if($pictureSize < 1000000) {
                // Upload the picture


                // check if media already has a picture
                $sql = "SELECT * FROM media_images WHERE pic_name = ? LIMIT 1";
                $params = array($picture_name);
                $result = $q->query($sql, $params);

                if($result) {
                    $data = $q->getData($result);
                    if($data){
                        if($data['hasPicture']){
                            // Delete picture from images folder
                            unlink($full_path);
                        }
                    }
                }
                $fileTmpName = $thumbnail['tmp_name'];

                // Upload picture file
                if(move_uploaded_file($fileTmpName, $full_path)){
                    $hasPicture = 1;
                }


            }
        }

        // Insert into media_images table
        $sql = "INSERT INTO media_images (prod_id, category, pic_name, ext, hasPicture) VALUES (?, ?, ?, ?, ?)";
        $params = array($media_id, $category, $picture_name, $extension, $hasPicture);

        $result = $q->query($sql, $params);

        if($result){
            echo '<script>alert("You have successfully added a new ' . substr($media_type, 0, -1) . '!");</script>';
            echo '<script>window.open("/quorating/index.php", "_self");</script>';
        }
    }
    