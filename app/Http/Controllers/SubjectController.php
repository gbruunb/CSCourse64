<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckSubject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function addCheckSubject(Request $request){
        $data = array();
        $data["student_id"] = Auth::user() -> student_id;
        $data["subject_id"] = $request -> subject_id;
        $data["isComplete"] = 1;

        DB::table('check_subjects')->insert($data);

        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");
    }

    public function addSubjectToDB(Request $request){
        $data = array();
        $data["student_id"] = Auth::user()->student_id;
        $data["subject_id"] = $request -> subject_id;
        $data["subject_type"] = $request -> subject_type;
        $data["subject_th_name"] = $request -> subject_th_name;
        $data["subject_en_name"] = $request -> subject_en_name;
        $data["credit"] = $request -> credit;
        $data["des_credit"] = $request -> des_credit;

        DB::table('subjects')->insert($data);
        return redirect()->back()->with('success', "บันทึกข้อมูลเรียบร้อย");
    }
}
