<?php
class Upload
{
    private $name;
    private $type;
    private $tmp_name;
    private $error;
    private $size;
    private $uploadOk = true;
    private $target_dir = "E:/Xampp/htdocs/dokan/upload/";
    private $result = [];

    // get single file info
    public function uploadFile($file, $folderName)
    {
        $this->name = $file['name'];
        $this->type = $file['type'];
        $this->tmp_name = $file['tmp_name'];
        $this->error = $file['error'];
        $this->size = $file['size'];
        $this->checkFile($folderName);
    }

    // single file upload functon
    private function checkFile($folderName)
    {
        $uploadDir =  $this->target_dir . $folderName . "/";

        // Ensure the upload directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        $target_file = $this->target_dir . $folderName . "/" . basename($this->name);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is an actual image
        $check = getimagesize($this->tmp_name);
        if ($check === false) {
            $this->result[] = "File is not an image.";
            $this->uploadOk = false;
        }

        // Check if file already exists and rename it
        if (file_exists($target_file)) {
            date_default_timezone_set("Asia/Dhaka");
            $this->name = pathinfo($this->name, PATHINFO_FILENAME) . '_' . date("d-m-Y h_i_s_A") . '.' . $imageFileType;
            $target_file = $this->target_dir . $folderName . "/" . $this->name;
        }

        // Check file size
        if ($this->size > 50000000) {
            $this->result[] = "Sorry, your file is too large.";
            $this->uploadOk = false;
        }

        // Allow certain file formats
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            $this->result[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $this->uploadOk = false;
        }

        // Check if $uploadOk is set to false by an error
        if ($this->uploadOk === false) {
            $this->result[] = "Sorry, your file was not uploaded.";
        } else {
            // If everything is ok, try to upload file
            if (move_uploaded_file($this->tmp_name, $target_file)) {
                $this->result['fileName'] =  $this->name;
                $this->result[] = "The file " . htmlspecialchars(basename($this->name)) . " has been uploaded.";
            } else {
                $this->result[] = "Sorry, there was an error uploading your file.";
            }
        }
    }
    // delete file function
    public function deleteFile($fileName, $folderName)
    {
        $target_file = $this->target_dir . $folderName . "/" . $fileName;
        if (empty($fileName)) {
            return true;
        }
        if (file_exists($target_file)) {
            if (unlink($target_file)) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    // Multi File Uplode
    public function multiFileUpload($fileInfo, $folderName)
    {
        $uploadDir =  $this->target_dir . $folderName . "/";

        // Ensure the upload directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        // Initialize the fileNames array
        $this->result['fileNames'] = [];

        foreach ($fileInfo['name'] as $key => $name) {
            // Check if there was an upload error
            if ($fileInfo['error'][$key] == UPLOAD_ERR_OK) {
                $tmpName = $fileInfo['tmp_name'][$key];
                $fileSize = $fileInfo['size'][$key];
                $fileType = $fileInfo['type'][$key];

                // Generate a unique file name if the file already exists
                $destination = $uploadDir . basename($name);
                if (file_exists($destination)) {
                    $pathInfo = pathinfo($destination);
                    date_default_timezone_set("Asia/Dhaka");
                    $uniqueName = $pathInfo['filename'] . '_' . date("d-m-Y_h_i_s_A") . '.' . $pathInfo['extension'];
                    $destination = $uploadDir . $uniqueName;
                }

                // Move the file to the destination
                if (move_uploaded_file($tmpName, $destination)) {
                    // Store the base name of the uploaded file in the fileNames array
                    $this->result['fileNames'][] = basename($destination);
                } else {
                    // If file move failed, return false
                    return false;
                }
            } else {
                return false;
            }
        }
        return true;
    }

    // Multi File delete
    public function multifileDelete($filesName, $folderName)
    {
        if(!empty($filesName)){
            $strToArr = explode(",", $filesName);
            $fileDir = $this->target_dir . $folderName . "/";
            $allDeleted = true; // Initialize flag to track overall deletion success
        
            foreach ($strToArr as $fileName) {
                $filePath = $fileDir . trim($fileName); // Trim to remove any extra spaces
                if (file_exists($filePath)) {
                    if (!unlink($filePath)) {
                        $allDeleted = false; // If any file fails to delete, set flag to false
                    }
                }
            }
            return $allDeleted;
        }else {
            return true;
        }
    }


    // output result function
    public function getFileResult()
    {
        $val = $this->result;
        $this->result = [];
        return $val;
    }
}
