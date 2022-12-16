<?php
namespace App\Http\Controllers\API;
use App\Models\Experience;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function get_all_experience(Request $request){
        $experiences = Experience::orderBy('id', 'DESC')->get();
        return response()->json([
            'experiences' => $experiences
        ], 200);

    }

    public function create_experience(Request $request){
        $this->validate($request, [
            'company' => 'required',
            'period' => 'required',
            'position' => 'required',
        ]);
        
        $experience = new Experience();
        $experience->company = $request->company;
        $experience->period = $request->period;
        $experience->position = $request->position;
        $experience->save();
    }
    
    
    public function update_experience(Request $request, $id){
        $experience = Experience::find($id);
        $this->validate($request, [
            'company' => 'required',
            'period' => 'required',
            'position' => 'required',
        ]);
        $experience->company = $request->company;
        $experience->period = $request->period;
        $experience->position = $request->position;
        $experience->save();
    }
    
    public function delete_experience(Request $request, $id){
        $experience = Experience::findOrFail($id);
        $experience->delete();
    }
}
