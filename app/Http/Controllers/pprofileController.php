<?php

namespace Healthfy\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use DB;
use Response;
use Healthfy\Models\Staff;
use Healthfy\Models\Tests;
use Healthfy\Models\OrderMaster;
use Healthfy\Models\OrderDetail;
use Healthfy\Models\Appointment;
use Healthfy\Models\Patient;
use Healthfy\Http\Controllers\medicationController;
use Healthfy\Http\Controllers\authController;
class pprofileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
public function loadptest(Request $request){
  if (authController::authType()==1) {
    $data  = OrderMaster::join("test_order_detail","test_order_detail.test_order_id","=","test_order_master.id")
  ->join("staff","staff.id","=","test_order_master.doctor_id")
  ->join("varaible_lists","varaible_lists.status_id","=","test_order_detail.status_id")
  ->join("patients","patients.id","=","test_order_master.patient_id")
  ->join("tests","tests.id","=","test_order_detail.test_id")
  ->select("patients.patient_name","staff.name as doctor_name","test_order_detail.amount","test_order_detail.test_order_id","test_order_detail.amount","test_order_master.total_amount","tests.name as testname","tests.description","test_order_detail.id","test_order_master.date","varaible_lists.status_name")
  ->where("test_order_detail.status_id",">",0)
  ->where("test_order_master.status_id",">",0)
  ->where("test_order_master.doctor_id",authController::AuthDoctor()->id)
  ->where("test_order_master.patient_id",$request->patient_id)
  
  ->get();
  }else{
	$data  = OrderMaster::join("test_order_detail","test_order_detail.test_order_id","=","test_order_master.id")
	->join("staff","staff.id","=","test_order_master.doctor_id")
	->join("varaible_lists","varaible_lists.status_id","=","test_order_detail.status_id")
	->join("patients","patients.id","=","test_order_master.patient_id")
	->join("tests","tests.id","=","test_order_detail.test_id")
	->select("patients.patient_name","staff.name as doctor_name","test_order_detail.amount","test_order_detail.test_order_id","test_order_detail.amount","test_order_master.total_amount","tests.name as testname","tests.description","test_order_detail.id","test_order_master.date","varaible_lists.status_name")
	->where("test_order_detail.status_id",">",0)
	->where("test_order_master.status_id",">",0)
	//->where("test_order_master.company_id",Auth::user()->company_id)
	->where("test_order_master.patient_id",authController::AuthPatient()->id)
	->get();
}
	return datatables()->of($data)->toJson();
}
public function mainappoint(Request $request){
  if (authController::authType()==1) {
    $json = Appointment::join('staff','staff.id','=','appointment.doctor_id')
    ->join('patients','patients.id','=','appointment.patient_id')
    ->join('varaible_lists','varaible_lists.status_id','=','appointment.status_id')
    ->select('appointment.start_date','appointment.start_time','appointment.end_date','appointment.end_time','appointment.id','staff.name','patients.patient_name','appointment.date','appointment.note','appointment.amount','varaible_lists.status_name','appointment.disease',"appointment.status_id","appointment.doctor_id","appointment.patient_id")
    ->where("appointment.doctor_id",authController::AuthDoctor()->id)
    ->where("appointment.status_id",'>',0)
    ->where("appointment.patient_id",'=',$request->patient_id)
    ->get();
  }else{
    $json = Appointment::join('staff','staff.id','=','appointment.doctor_id')
    ->join('patients','patients.id','=','appointment.patient_id')
    ->join('varaible_lists','varaible_lists.status_id','=','appointment.status_id')
    ->select('appointment.start_date','appointment.start_time','appointment.end_date','appointment.end_time','appointment.id','staff.name','patients.patient_name','appointment.date','appointment.note','appointment.amount','varaible_lists.status_name','appointment.disease',"appointment.status_id","appointment.doctor_id","appointment.patient_id")
    ->where("appointment.patient_id",authController::AuthPatient()->id)
    ->where("appointment.status_id",'>',0)
    //->where("appointment.company_id",'=',Auth::user()->company_id)
    ->get();
  }


    return 	datatables()->of($json)->toJson();
 }
  public function getpatient($id){
  	if (is_numeric($id)) {
  	  $patient = Patient::find($id);
      return view('patients.singlepatient')->with('patient',$patient)->with("patientPrescriptions",medicationController::removeduplicate(medicationController::loadprescription_profile($id),'detail_id'));
  }
  }
}