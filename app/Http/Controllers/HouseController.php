<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\HouseImage;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class HouseController extends Controller
{
    public function index()
    {

        $houses = House::all();
        return view('admin.house.index',compact('houses'));
    }

    public function create()
    {
         $countries = Country::all();
        return view('admin.house.create',compact('countries'));
    }


    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'country_id' => 'required',
            'slug' => 'required',
            'state' => 'required',
            'address' => 'required',
            'description' => 'required',
            'square' => 'required',
            'bath' => 'required',
            'bed' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            'status' => 'required',
        ]);
     
      $house = new House;
      $house->country_id  = $validatedData['country_id'];
      $house->slug = $validatedData['slug'];
      $house->state = $validatedData['state'];
      $house->address = $validatedData['address'];
      $house->description = $validatedData['description'];
      $house->original_price = $validatedData['original_price'];
      $house->selling_price = $validatedData['selling_price'];
      $house->description = $validatedData['description'];
      $house->square = $validatedData['square'];
      $house->bath = $validatedData['bath'];
      $house->bed = $validatedData['bed'];
      $house->trending = true ? '1':'0';
      $house->status = $validatedData['status']?? null;
      $house ->save();


    if($request->hasFile('image')){
        $uploadPath = 'uploads/house/';

         $i=1;
        foreach($request->file('image') as $imageFile){
       
            $ext = $imageFile->getClientOriginalExtension();
            $filename = time().$i++.'.'.$ext;
            $imageFile->move($uploadPath,$filename);
            $finalImagePathName =  $uploadPath.$filename;

            $house->houseImages()->create([
                'house_id' => $house->id,
                'image' => $finalImagePathName,
             ]);
        }

      } 


      return redirect('/house/create')->with('message', 'House created Successfully');        
    }

    public function destroy(int $house_id)
    {
        $house = House::findOrFail($house_id);
        if($house->houseImage){
            foreach($house->houseImage as $image){
                if(File::exists($image->image)){
    
                    File::delete($image->image);
                }
            }
        }
    
      $house->delete();
    return redirect()->back()->with('message', 'House Has Been Deleted Successfully');
    
    }


    public function editHouse(int $house_id){
        $country = Country::all();
        $house = House::findOrFail($house_id);
        return view('admin.house.edit', compact('house','country'));
    }

    
    public function destroyImage(int $house_image_id)
    {
        $houseImage = HouseImage::findOrFail($house_image_id);
        if(File::exists($houseImage->image)){
    
            File::delete($houseImage->image);
        }
        $houseImage->delete();
        return redirect()->back()->with('message', 'House Image Deleted Successfully');
    
    }




    public function update(Request $request,int $country_id)
    {
        $validatedData = $request->validate([
            'country_id' => 'required',
            'slug' => 'required',
            'state' => 'required',
            'address' => 'required',
            'description' => 'required',
            'square' => 'required',
            'bath' => 'required',
            'bed' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            'rating' => 'required',
        ]);

      

        $house = House::findOrFail($country_id);
     

        if($house)
        {
             $house->update([
                'country_id' => $request['country_id'],
                'state' => $request['state'],
                'slug' => Str::slug($request['slug']),
                'address' => $request['address'],
                'description' => $validatedData['description'],
                'square' => $validatedData['square'],
                'bed' => $validatedData['bed'],
                'bath' => $validatedData['bath'],
                'original_price' => $request['original_price'],
                'selling_price' => $request['selling_price'],
                'rating' => $request['rating'],
                'status' => $request['status'],
                'trending' => $request->trending== true ? '1':'0',
              ]);

              if($request->hasFile('image')){
                $uploadPath = 'uploads/house/';
        
                 $i=1;
                foreach($request->file('image') as $imageFile){
               
                    $ext = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$ext;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName =  $uploadPath.$filename;
        
                    $house->houseImages()->create([
                        'house_id' => $house->id,
                        'image' => $finalImagePathName,
                     ]);
                }
        
              } 
        
              return redirect()->back()->with('message', 'House updated Successfully');  
        }
        else{
            return redirect('/houses')->with('message', 'No Such House Found');
        }
}
}