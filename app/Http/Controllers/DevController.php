<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dev;
use Image;
use Storage;

class DevController extends Controller
{
    public function index()
    {
        $devs = Dev::orderBy('id', 'DESC')->get();

        return view('devs/index', [
            'devs' => $devs
        ]);
    }

    
    public function create()
    {
        return view('devs/create');
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'spec' => 'required|string|max:100',
            'img' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        // upload image 
        $img = $request->file('img');
        $ext = $img->getClientOriginalExtension();
        
        $name = uniqid() . ".$ext";
        $dest = public_path() . "/uploads/devs/" . $name;
        Image::make($img)->fit(1200, 1200)->save($dest);
        $data['img'] = $name;

        // save in db
        Dev::create($data);

        return redirect( route('devs.index') );
    }

    
    public function show($id)
    {
        $dev = Dev::findOrFail($id);

        return view('devs/show', [
            'dev' => $dev
        ]);
    }

    
    public function edit($id)
    {
        $dev = Dev::findOrFail($id);

        return view('devs/edit', [
            'dev' => $dev
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'spec' => 'required|string|max:100',
            'img' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $dev = Dev::findOrFail($id);
        $old_img = $dev->img;

        if($request->hasFile('img'))
        {
            Storage::disk('uploads')->delete("devs/$old_img"); 

            // upload the new one
            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            
            $name = uniqid() . ".$ext";
            $dest = public_path() . "/uploads/devs/" . $name;
            Image::make($img)->save($dest);
        } else {
            $name = $old_img;
        }

        $data['img'] = $name;

        $dev->update($data);

        return back();
    }

    
    public function destroy($id)
    {
        $dev = Dev::findOrFail($id);
        $img = $dev->img;

        Storage::disk('uploads')->delete("devs/$img");
        $dev->delete();

        return back();
    }
}
