<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectImg;
use Storage;
use Image;
use App\Projects;
use App\Project;



class ProjectImgController extends Controller
{
    public function DeleteImage($id) {

         $project_img = ProjectImg::findOrFail($id);
        $img = $project_img->name;

        Storage::disk('uploads')->delete("projects/$img");
        $project_img->delete();

        return back();
    }

    public function addimages(Request $request, $id) {

               $data = $request->validate([

                'imgs' => 'nullable',
                'imgs.*' => 'image|mimes:jpg,jpeg,png',


        ]);
     // upload image 
                 foreach ($request->imgs as $img) {
                // $ext = $img->getClientOriginalExtension();
                // $img = $request->file('imgs');
                $ext = $img->getClientOriginalExtension();
                
                $name = uniqid() . ".$ext";
                $dest = public_path() . "/uploads/projects/" . $name;
                Image::make($img)->fit(1200,1200)->save($dest);
                // $data['name'] = $name;
         

                // save in db
                ProjectImg::create([
                    'name' => $name,
                    'project_id' => $id,
                ]);
            }

                return back();
    }
  
        public function DeleteAllImages(Request $request) {

        //    $data['project'] = Project::findOrFail($id);
        //    $data['imgs'] = ProjectImg::where('project_id', $id)->get();
        //    $data['img_img'] = [];
        //    dd('hello');
        foreach ($request->imgs_id as $img_id) {

            $img = ProjectImg::findOrFail($img_id);
            $img_file = $img->name;
            Storage::disk('uploads')->delete("projects/$img_file");
            $img->delete();

        }
               return back();
    }

}



        //  $project_img = ProjectImg::findOrFail($id);
        // $img = $project_img->name;

        // Storage::disk('uploads')->delete("projects/$img");
        // $project_img->delete();

 







            //   dd('hello');

        //      $request->validate([
            
        //     'img' => 'image|mimes:jpg,jpeg,png',
        //     'imgs.*' => 'image|mimes:jpg,jpeg,png',

        // ]);

        //       $project = Project::create([
        //     'name' => $request->name,
        //     'desc' => $request->desc,
        // ]);
            
        //     // $project_id =Project::select('id')->get();
         

        //     $insert_id = $project->id;
        //   foreach ($request->imgs as $img) {
        //     $ext = $img->getClientOriginalExtension();
            
        //     $name = uniqid() . ".$ext";
        //     $dest = public_path() . "/uploads/projects/" . $name;
        //     Image::make($img)->fit(1200, 1200)->save($dest);

        //     ProjectImg::create([
        //         'name' => $name,
        //         'project_id' => $insert_id,
        //         //  'project_id' => $project_id,
        //     ]); 

        //   }
        //     return back();
        // }

    //     // upload image 
    //     $img = $request->file('img');
    //     $ext = $img->getClientOriginalExtension();
        
    //     $name = uniqid() . ".$ext";
    //     $dest = public_path() . "/uploads/projectimage/" . $name;
    //      Image::make($img)->fit(1200,1200)->save($dest);
    //     $data['img'] = $name;

    //     // save in db
    //     Image::create($data);

    //     return redirect( route('projects.index') );

    // }


