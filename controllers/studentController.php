<?php
require_once '/../models/StudentModel.php';
class studentController{
    function index(){
        $db =new StudentModel();
        $cursor = $db->getAllstudent();

        $arrStudent = [];
        foreach ($cursor as $key => $value) {

            $StudentData =[
                "id"=>$value["_id"],
                "name"=>$value["name"]
            ];
            array_push($arrStudent,$StudentData);
        }
        response(200, $arrStudent);
    }

    function findByName($name){
        $db =new StudentModel();
        $cursor = $db->findByName($name);
        response(200,$cursor);
    }

    function search($request){
        $name = $request->post('name');
        $age = $request->post('age');
        $db =new StudentModel();
        $cursor = $db->search($name,$age);
        $arrStudent = [];
        foreach ($cursor as $key => $value) {

            $StudentData =[
                "id"=>$value["_id"],
                "name"=>$value["name"],
                "age"=>$value["age"]
            ];
            array_push($arrStudent,$StudentData);
        }
        response(200, $arrStudent);
    }

    function insert($request){
        $name = $request->post('name');
        $age = $request->post('age');
        $education[0] = $request->post('education0');
        $education[1] = $request->post('education1');
        $education[2] = $request->post('education2');
        $address['hno'] = $request->post('hno');
        $address['subdistrict'] = $request->post('subdistrict');
        $address['district'] = $request->post('district');
        $address['province'] = $request->post('province');
        $db =new StudentModel();
        $result = $db->insert($name,$age,$education,$address);
        response(200,["result"=>$result]);
    }


}