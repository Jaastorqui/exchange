<?php

namespace App\Classes;

use Storage;

class StorageClass  {
    
    private $file;
    private $profile;
    private $disk;

    public function __construct($file, $profile, $disk) {
        $this->file = $file;
        $this->profile = $profile;
        $this->disk = $disk;
    }

    /**
    * $file = file that upload, $profile = user's profile
    */
    public function setphoto () 
    {
        $photo = null;

        if (isset($this->file))
        {
            // If user has photo uploaded, first delete this photo
            if ( $this->profile->photo ) {
                $this->delete();
            }

            $photo = time() . '_' . $this->file->getClientOriginalName();
            Storage::disk($this->disk)->put($photo, file_get_contents( $this->file->getRealPath() ) );
        }

        $this->profile->photo = $photo;
        
        return $this->profile;
    }

    public function delete () 
    {
        Storage::disk($this->disk)->delete( $this->profile->photo );   
    }
}