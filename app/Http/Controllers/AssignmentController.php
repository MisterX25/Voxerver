<?php

namespace App\Http\Controllers;

use App\PersonalAssignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function assignmentsFor($token)
    {
        // Check if user has some assignment not done yet
        $notDone = \DB::table('users')
            ->join('personalAssignments', 'users.id', '=', 'personalAssignments.user_id')
            ->join('classAssignments', 'classAssignments.id', '=', 'personalAssignments.classAssignment_id')
            ->select('personalAssignments.id as assignment_id')
            ->where('token', '=', $token)->where('personalAssignments.result', '=', null)
            ->first();
        if (!$notDone)
        {
            $v = rand(0,10);
            error_log("Mmmmm....$v");
            if ($v < 5)
            {
                if ($v < 3)
                    abort(403, 'Je suis en pause....');
                else
                    abort(500, "Ca peut arriver...");
                return;
                error_log("Zbang....");
            }
        }
        else
        {
            error_log("Bosse....");
        }

        return json_encode(\DB::table('users')
            ->join('personalAssignments', 'users.id', '=', 'personalAssignments.user_id')
            ->join('classAssignments', 'classAssignments.id', '=', 'personalAssignments.classAssignment_id')
            ->join('vocabularies', 'vocabularies.id', '=', 'classAssignments.voc_id')
            ->select('personalAssignments.id as assignment_id','vocabularies.id as vocabulary_id', 'vocabularies.title', 'personalAssignments.result')
            ->where('token', '=', $token)
            ->get());
    }

    public function assignmentResult(Request $request)
    {
        $id = $request->id;
        $result = $request->result;
        $token = $request->token;
        // verify ownership
        $exists = \DB::table('users')
            ->join('personalAssignments', 'users.id', '=', 'personalAssignments.user_id')
            ->join('classAssignments', 'classAssignments.id', '=', 'personalAssignments.classAssignment_id')
            ->join('vocabularies', 'vocabularies.id', '=', 'classAssignments.voc_id')
            ->select('personalAssignments.id as assignment_id','vocabularies.id as vocabulary_id', 'vocabularies.title')
            ->where('token', '=', $token)->where('personalAssignments.id', '=', $id)
            ->first();

        if(!$exists) abort(403, 'This assignment doesn\'t belong to you');

        error_log(print_r($request,1));
        $assignment = PersonalAssignment::find($id);
        $assignment->result = $result;
        $assignment->save();
        return 'ok';

    }
}
