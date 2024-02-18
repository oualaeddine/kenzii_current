<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\ImageManagerStatic as ImageInter;


trait UploadImageTrait
{


    public function storeAndOptimizeImageArray(Request $request,$varName,$folderName) {

            Storage::makeDirectory('public/'.$folderName);

            $image_new = $varName;

            $filenametostore =time().$image_new->getClientOriginalName();

            $file = $varName;
            $imageFile = ImageInter::make($file)->encode('jpg', 75);

            $imageFile->save('storage/'.$folderName.'/'.$filenametostore);

            return $filenametostore;

    }

    public function storeAndOptimizeImage(Request $request,$varName,$folderName) {

        Storage::makeDirectory('public/'.$folderName);

        $image_new = $request->file($varName);

        $filenametostore =time().$image_new->getClientOriginalName();


        $file = $request->file($varName);
        $imageFile = ImageInter::make($file)->encode('jpg', 75);

        $imageFile->save('storage/'.$folderName.'/'.$filenametostore);

        return $filenametostore;

    }



}
