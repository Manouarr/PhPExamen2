<?php
namespace App;

class File
{

    private $uploadDirectory;

    private $fileData;

    private $extension;

    private $tempFile;

    private $name;

    private $target;

    private $mimeType;

    private $formatsAcceptes = ["image/jpg","image/jpeg", "image/png", "image/gif"];


   




    public function __construct($index)
    {
        $this->uploadDirectory = dirname(__DIR__)."/../images/";

        $this->fileData = $_FILES[$index];

        $this->tempFile = $this->fileData['tmp_name'];

        $this->mimeType = $this->fileData['type'];


        $this->extension = pathinfo($this->fileData['name'], PATHINFO_EXTENSION);

        $this->name = uniqid().".".$this->extension;

        $this->target = $this->uploadDirectory . $this->name;

    }


    public function upload(){

        move_uploaded_file($this->tempFile, $this->target);
    }

    public function getName(){
        return $this->name;
    }

    public function isImage(){
       
         return in_array($this->mimeType, $this->formatsAcceptes);
       
        
    }
 


}


