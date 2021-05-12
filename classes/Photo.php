<?php


class Photo extends Main{

    public $id;
    public $name;
    public $altText;
    public $type;
    public $size;
    public $userId;
    public $postId;

    public $table = 'photo';
    public $errors = [];
    public $success = [];
    public $uploadDir = 'uploads/';


    public function uploadImages(){

        $filesNumber =count($_FILES['fileToUpload']['name']);
        var_dump($_FILES['fileToUpload']['name']);
        echo $_FILES["fileToUpload"]["name"][1];

        for($i=0;$i<$filesNumber; $i++){
            $target_file = $this->uploadDir . basename($_FILES["fileToUpload"]["name"][$i]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
            if($check !== false) {
                $this->success[] = "File is an image - " . $check["mime"] . ".<br>";
                $uploadOk = 1;
            } else {
                $this->errors[]= "File is not an image.<br>";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                $this->errors[]= "Sorry, file already exists.<br>";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"][$i] > 50000000) {
                $this->errors[]= "Sorry, your file is too large.<br>";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                $this->errors[]= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $this->errors[]= "Sorry, your file was not uploaded.<br>";
                if(!empty($this->errors)){
                    self::displayValidationErrors($this->errors);
                }
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
                    global $session;
                    $session->message("<p class='bg-danger text-center'>The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"][$i])). " has been uploaded.<br></p>");
//                    return htmlspecialchars( basename( $_FILES["fileToUpload"]["name"][$i]));
                    $this->success[] = "<p class='bg-success text-center'>The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"][$i])). " has been uploaded.<br></p>";
                } else {
                    $this->errors[]= "Sorry, there was an error uploading your file.<br>";
                }
            }
            if(!empty($this->errors)){
                self::displayValidationErrors($this->errors);
            } else {
                self::displayValidationSuccess($this->success);
            }
        }




    }


} // end of class