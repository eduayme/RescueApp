<?php

namespace App\Http\Traits;

use App\Incident;
use App\IncidentImage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait ImageUploadTrait 
{
  public function serialIncidentUpload($file, $path, Incident $incident) 
  {
      $random_id = rand(100,13600);
      foreach ($file as $image) {
          $filename = 'inc_'.$random_id.'.'.$image->getClientOriginalExtension();
          File::exists($path) or File::makeDirectory($path, 0777, true, true);
          Image::make($image)->save($path.$filename);

          IncidentImage::create([
              'photo'       => $filename,
              'incident_id' => $incident->id,
          ]);
      }
  }
}
?>