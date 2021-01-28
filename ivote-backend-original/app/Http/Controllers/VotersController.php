<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Voter;
class VotersController extends Controller
{
    public function getAllVoters(Request $request) {
        // logic to get all Voters goes here
        $voter = Voter::get()->toJson(JSON_PRETTY_PRINT);
        return response($voter, 200);
      }
      public function createVoter(Request $request) {
       // logic to create a Voter record goes here
       $voter = new Voter;
       $voter->row_count = $request->name;
       $voter->index_number = $request->index_number;
       $voter->full_name = $request->full_name;
       $voter->gender = $request->gender;
       $voter->programme = $request->programme;
       $voter->grade = $request->grade;
       $voter->raw_score = $request->raw_score;
       $voter->school_attended = $request->school_attended;
       $voter->rstatus = $request->rstatus;
       $voter->track_number = $request->track_number;
       $voter->save();
       return response()->json([
           "message" => "Voter record created"
       ], 201);
      }
  
      public function getVoters($id) {
        // Check if voter's id exist, called by verification page,
        if (Voter::where('index_number', $id)->exists()) {
            $voter = Voter::where('index_number', $id)->first()->orderBy('id','DESC');
            if($voter->vote_status == "yes"){
              return response()->json([
                "message" => "Voter has already voted"
              ], 201);
            }
            else{
              return response($voter, 200);
            }
          } else {
            return response()->json([
              "message" => "voter not found"
            ], 404);
          }
      }
      //Mark the voter as voted, called after all votes have been sent to specififed contestants
      public function updateVoter(Request $request, $id) {
        // if (Voter::where('index_number', $id)->exists()) {
            $voter = Voter::where('index_number', '=', $id)->first();
            if($voter){
            $voter->vote_status = is_null($request->vote_status) ? $voter->vote_status : $request->vote_status;
            $voter->save();
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "voter not found"
            ], 404);
        }
      }
  
      public function deleteVoter ($id) {
        // logic to delete a Voter record goes here
      }
      public function Voted ($id) {
        // logic to delete a Voter record goes here
        // if (Voter::where('index_number', $id)->exists()) {
          $voter = Voter::where("index_number", '=',  $id)->update(['vote_status'=> 'yes']);
          if($voter){
            return response()->json([
              "message" => "sucesss"
            ], 200);
          }
          else{
            return response()->json([
              "message" => "Failed to update yes"
            ], 404);
          }
            
          
        // } else {
        
        // }
      }
}
