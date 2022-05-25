<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Storage\StorageClient;

class ImageController extends Controller
{

    public function store($image)
    {
        //get the credentials in the json file
        $googleConfigFile = file_get_contents(config_path('vasitos.json'));

        //create a StorageClient object
        $storage = new StorageClient([
            'keyFile' => json_decode($googleConfigFile, true)
        ]);

        //get the bucket name from the env file
        $storageBucketName = config('googlecloud.storage_bucket');

        //pass in the bucket name
        $bucket = $storage->bucket($storageBucketName);

        $image_path = $image->getRealPath();

        //rename the file
        $imageName = time() . '.' . $image->extension();

        //open the file using fopen
        $fileSource = fopen($image_path, 'r');

        //specify the path to the folder and sub-folder where needed
        $googleCloudStoragePath = 'img/' . $imageName;

        //upload the new file to google cloud storage 
        $bucket->upload($fileSource, [
            'predefinedAcl' => 'publicRead',
            'name' => $googleCloudStoragePath
        ]);

        return 'https://storage.googleapis.com/vasitos2/'.$googleCloudStoragePath;
    }
}
