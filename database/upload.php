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
    public function uploadFile($file)
    {
        $this->name = $file['name'];
        $this->type = $file['type'];
        $this->tmp_name = $file['tmp_name'];
        $this->error = $file['error'];
        $this->size = $file['size'];
        $this->checkFile();
    }

    // single file upload functon
    private function checkFile()
    {
        $target_file = $this->target_dir . basename($this->name);
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
            $target_file = $this->target_dir . $this->name;
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

    // get multi file info
    public function multiFileUpload ()
    {

    }

    // Multi File uplaod functon
    private function multiFileCheck()
    {

    }

    // delete file function
    public function deleteFile($fileName)
    {
        $target_file = $this->target_dir . $fileName;
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

// output result function
    public function getFileResult()
    {
        $val = $this->result;
        $this->result = [];
        return $val;
    }
}
