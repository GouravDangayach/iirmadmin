<?php

namespace App\Http\Controllers\API;
use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    public function get_all_testimonial(){
        $testimonials = Testimonial::orderBy('id', 'DESC')->get();
        return response()->json([
            'testimonial' => $testimonials
        ],200);
    }

    public function create_testimonial(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'function' => 'required',
            'testinomy' => 'required',
            'rating' => 'required',
            'photo' => 'required'
        ]);
        
        $testimonials = new Testimonial();
        $testimonials->name = $request->name;
        $testimonials->function = $request->function;
        $testimonials->testinomy = $request->testinomy;
        $testimonials->rating = $request->rating;

        if($request->photo){
            $strpos = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . "." . $ex;
            $img = Image::make($request->photo)->resize(700, 500);
            $upload_path = public_path(). "/img/upload/";
            $image = $upload_path.$testimonials->photo;
            $img->save($upload_path.$name);
            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = $testimonials->photo;
        }
        $testimonials->photo = $name;
        $testimonials->save();
    }

     
    public function get_edit_testimonial($id)
    {
        $testimonial = Testimonial::find($id);
        return response()->json([
            'testimonial' => $testimonial
        ], 200);
    }

    public function update_testimonial(Request $request, $id){
        $testimonials = Testimonial::find($id);
        $testimonials->name = $request->name;
        $testimonials->function = $request->function;
        $testimonials->testinomy = $request->testinomy;
        $testimonials->rating = $request->rating;       

        if($testimonials->photo != $request->photo){
            $strpos = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . "." . $ex;
            $img = Image::make($request->photo)->resize(700, 500);
            $upload_path = public_path(). "/img/upload/";
            $image = $upload_path.$testimonials->photo;
            $img->save($upload_path.$name);
            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = $testimonials->photo;
        }
        $testimonials->photo = $name;
        $testimonials->save();
    }
    
    public function delete_testimonial(Request $request, $id){
        $testimonials = Testimonial::findOrFail($id);
        $image_path = public_path()."/img/upload/";
        $image = $image_path.$testimonials->photo;
        if(file_exists($image)){
            @unlink($image);
        }
        $testimonials->delete();
    }

}
