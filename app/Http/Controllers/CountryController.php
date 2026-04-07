<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {

        $countries = Country::all();
        return view('admin.country.index',compact('countries'));
    }

    public function create()
    {
        // $cars = Cars::all();
        return view('admin.country.create');
    }

    public function createCountry(Request $request)
    {
        $validatedData = $request->validate([
            'country' => 'required',
            'slug' => 'required',
        ]);
      

        $category = new Country;
        $category->country = $validatedData['country'];
        $category->slug = Str::slug($validatedData['slug']);
        $category ->save();

      
      return redirect('/countries/create')->with('message', 'Country Created Successfully');        
    }


    public function destroy(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect()->back()->with('message', 'Country Has Been Deleted Successfully');
    
    }


}
