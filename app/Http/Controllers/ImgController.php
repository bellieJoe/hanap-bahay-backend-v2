<?php

namespace App\Http\Controllers;

use App\Models\Img;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImgController extends Controller
{
   
    public function setProfilePicture(Request $req){
        $imageURL = 'images/';
        $existingImage = Img::where([
            'Owner_ID' => $req->id,
            'IMG_Type' => $req->type
        ]);

        if(in_array($req->type, ["user-profile" , "bh-profile"])){

            if(!empty($existingImage->first())){
                $existingImage->update([
                    'Date_Upload' => $req->date
                ]);
                $path = $imageURL."{$req->url_extension}/{$req->filename}.png";
                Storage::put($path, base64_decode($req->base64string));
            } else {
                Img::create([
                    'IMG_Filename' => $req->filename,
                    'Owner_ID' => $req->id,
                    'Date_Upload' => $req->date,
                    'IMG_Type' => $req->type
                ]);

                $path = $imageURL."{$req->url_extension}/{$req->filename}.png";
                Storage::put($path, base64_decode($req->base64string));

            }

        } else if($req->type == 'bh-image') {
            if(!empty($existingImage->first())) :
                $imageOrder = $existingImage->count() + 1;
            else :
                $imageOrder = 1;
            endif;
            
            $newFilename = $req->filename.'_'.$imageOrder;
            Img::create([
                'IMG_Filename' => $newFilename,
                'Owner_ID' => $req->id,
                'Date_Upload' => $req->date,
                'IMG_Type' => $req->type,
                'Description' => $req->description,
                'Type' => $req->part,
                'Title' => $req->title
            ]);
            
            $path = $imageURL."{$req->url_extension}/{$newFilename}.png";
            Storage::put($path, base64_decode($req->base64string));
        }
        
    }

    public function fetchImagesByRRP($rrpId){
        $images = Img::where([
            'Owner_ID' => $rrpId,
            'IMG_Type' => 'bh-image'
        ])->get();

        return json_encode($images);
    }
    
    public function fetchImage(Request $req){
        $images = Img::where([
            'Owner_ID' => $req->id,
            'IMG_Type' => $req->type
        ])->first();

        return json_encode($images);
    }

    public function delete(Request $req){
        Img::where([
            'IMG_ID' => $req->imgid,
        ])->delete();

        Storage::delete(['rh_extra_image/'.$req->filename.'.png']);
    }

    public function updateImageDetails(Request $req){
        Img::where([
            'IMG_ID' => $req->IMG_ID
        ])
        ->update([
            'Description' => $req->description,
            'Title' => $req->title
        ]);
    }

}
