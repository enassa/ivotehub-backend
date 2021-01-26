<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contestant;
class ContestantsController extends Controller
{
   private $all_pay_loads;
   private $payload_data;
   private $contestant_id;
   private $some_data ;
   private $arrayIndex = 0;

    public function getAllContestants(Request $request) {
        // logic to get all contestant s goes here
        $contestant = Contestant::get()->toJson(JSON_PRETTY_PRINT);
        return response($contestant, 200);
      }
      public function createContestant(Request $request) {
        // logic to create a contestant record goes here
        $contestant = new Contestant;
        $contestant->name= $request->name;
        $contestant->house= $request->house;
        $contestant->current_class= $request->current_class;
        $contestant->programme= $request->programme;
        $contestant->image_url= $request->image_url;
        $contestant->group= $request->group;
        $contestant->group_name= $request->group_name;
        $contestant->votes= $request->votes;
        $contestant->save();
        return response()->json([
            "message" => "Contestant record created"
        ], 201);
      }
  
      public function getContestant($id) {
        // logic to get a contestant record goes here
        // if (Contestant::where('id', $id)->exists()) {
          $contestant = contestant::where('group', $id)->get()->toJson(JSON_PRETTY_PRINT);
          if($contestant){
            return response($contestant, 200);
          } else {
            return response()->json([
              "message" => "contestant not found"
            ], 404);
          }
      }
      
      public function updateContestant(Request $request, $id) {
        // $all_pay_loads = $id;
        // $payload_data = explode(",",$id,);
        // $payload_length = count($payload_data);
        // $contestant_id = 0;
        // $some_data = 0;
        // $arrayIndex = 1;
           
        // function UploadData(){
          // global $payload_data;
          // global $payload_length;
          // global $arrayIndex;
          // global $some_data;
          // $myIndex = $arrayIndex;
          // $some_data = $payload_data[$arrayIndex];
          // $contestant_id = $some_data + 0;
          // echo $arrayIndex;
          // return $this
          $contestant = Contestant::find($id)->increment('votes');
          if($contestant){
            return response()->json([
              "message" => "Vote Casted"
            ], 200);
          }
        
          // }
        // }
        // return UploadData();
        // return UploadDate();
        // foreach ($payload_data  as $key => $dataload) {
        //   # code...
        //   $contestant = Contestant::find($dataload)->increament('voters');
        //   return  $dataload;
        // }
      }
  
      public function deleteContestant ($id) {
        // logic to delete a contestant record goes here
      }
}
