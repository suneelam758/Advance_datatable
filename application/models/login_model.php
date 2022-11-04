<?php

/**
 * LoginModel
 *
 * Handles the user's login / logout / registration stuff
 */


class LoginModel
{
    /**
     * Constructor, expects a Database connection
     * @param Database $db The Database object
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }
    /**
     * Login process (for DEFAULT user accounts).
     * Users who login with Facebook etc. are handled with loginWithFacebook()
     * @return bool success state
     */

    public function read()
    { 
      $select = "SELECT Id, CONCAT(FirstName,LastName) AS Empname,(SELECT Name from division WHERE Id =employeemaster.Division) as Division ,(SELECT Name from Designation WHERE Id =employeemaster.Designation) as Designation, (SELECT Name from Location WHERE Id =employeemaster.Location) as Location FROM employeemaster";
      $query=$this->db->prepare($select);
      $query->execute();
      $result= $query->fetchAll();
    


      if ($result)
       {
       return $result;
  
       
      }
	  }

public function readd(){
  $select = "SELECT Id, CONCAT(FirstName,LastName) AS Empname,(SELECT Name from division WHERE Id =employeemaster.Division) as Division ,(SELECT Name from Designation WHERE Id =employeemaster.Designation) as Designation, (SELECT Name from Location WHERE Id =employeemaster.Location) as Location FROM employeemaster";
$query=$this->db->prepare($select);
$query->execute();
// $result= $query->fetchAll();
$arz=[];
$arr2=[]; 
while ($row=$query->fetch()){
$arr1=[];
$arr1[]=$row->Id;
$arr1[]=$row->Empname;
$arr1[]=$row->Division;
$arr1[]=$row->Designation;
$arr1[]=$row->Location;
$arr1[] = "<button type='button' class='btn btn-success settle-button' data-toggle='modal' data-target='#eModal' ><i class='fa fa-edit'></i></button>";
$arr2[]= $arr1;
}
$arz['aaData']=$arr2;
return $arz;
}
// -----------------------------------------with filter non filter----------------------------------
public function readdd(){

  $csel = "SELECT * from employeemaster";
  $query=$this->db->prepare($csel);
 $query->execute();
 $result= $query->fetchAll();
 $xx = count($result);
  $draw = $_REQUEST['draw'];
  $start= $_REQUEST['start'];
  $len = $_REQUEST['length'];
  $order = $_REQUEST['order'][0]['column'];
  $as = $_REQUEST['order'][0]['dir'];
  $search=$_REQUEST['search']['value'];
  $get = $_REQUEST['columns'][6]['search']['value'];
  

  
$filt="";




if($get!=""){
  $filt=" WHERE DOJ = '$get' ";  
}
// if($get=='null'){
//   $filt=" WHERE 1";
// }


if((($_REQUEST['columns'][6]['search']['value']) || ($_REQUEST['columns'][3]['search']['value']) || ($_REQUEST['columns'][4]['search']['value']) || ($_REQUEST['columns'][5]['search']['value']))){
  $div=$_REQUEST['columns'][3]['search']['value'];
  $des=$_REQUEST['columns'][4]['search']['value'];
  $loc=$_REQUEST['columns'][5]['search']['value'];

if($search!=""){
  $filt = " WHERE FirstName LIKE '%$search%'  OR Id Like '%$search%' OR Division Like '%$search%' OR Designation Like '%$search%' OR Location Like '%$search%' ";
}
if($order!=0){
  $filt = " ORDER BY $order $as";
}
// if($order==0 && $get=='null'){
//   $filt=" WHERE 1";
// }
if($des=="" && $div=="" && $loc=="" && $get=='null' && $order==0){
  $filt=" WHERE 1";
}
  if(($des!="")){
    if($get=='null'){
        
    $filt=" WHERE (Designation = $des)";  
  }
  else{
    $filt=" WHERE (Designation = $des) AND  DOJ = '$get'"; 
  }
 }
 if(($div!="")){
  if((($des=="") && ($get=='null'))){

    $filt=" WHERE (Division = $div)";
  }
  else{
    $filt.=" AND (Division = $div)";
  }
}
 if(($loc!="")){
  if(($des=="") &&($div=="")){

    $filt=" WHERE (location = $loc)";
  }
  else{
    $filt.=" AND (location = $loc)";
  }



}

}
 $select = "SELECT Id, CONCAT(FirstName,LastName) AS Empname,(SELECT Name from division WHERE Id =employeemaster.Division) as Division ,(SELECT Name from Designation WHERE Id =employeemaster.Designation) as Designation, (SELECT Name from Location WHERE Id =employeemaster.Location) as Location,DOJ FROM employeemaster $filt LIMIT $len OFFSET $start ";
//  echo $select; exit;
$query=$this->db->prepare($select);
$query->execute();

$data=[];
$var=[];
while($result=$query->fetch()) 
{
  $id=$result->Id;
  $var1=array();
  $idd = $result->Id;
  $var1[]="<input type='checkbox' class='check_box' name='cbox' id='" . $idd . "' value='" . $idd . "' onclick='myFunction()'>";
  $var1[]=$result->Id;
  $var1[]=$result->Empname;
  $var1[]=$result->Division;
  $var1[]=$result->Designation;
  $var1[]=$result->Location;
  $var1[]=$result->DOJ;
  $var1[] = "<button type='button' class='btn ab btn-success settle-button' data-toggle='modal' data-target='#myModal1' style='color: #fff; background:transparent' onclick='mod2(". $id .")' ><i class='fa fa-edit'></i></button>";
  $var[]=$var1;
}
$filtrec = count($var);
$data['draw']=$draw;
$data['recordsTotal']=$xx;
$data['recordsFiltered']= $filtrec+1;
$data['aaData']=$var;
return $data;
}
 // -----------------------------------------with filter non filter End----------------------------------



    public function locate($uid)
    { 
        $select = "SELECT * FROM $uid";
    
        $query=$this->db->prepare($select);
        $query->execute();
        $result= $query->fetchAll();
        if ($result)
         {
          return $result;
        }
     
	  }



    public function ss1m()
    { 
        $selec = "SELECT DISTINCT employeemaster.Designation,designation.Id,designation.Name FROM employeemaster INNER JOIN designation ON employeemaster.Designation=designation.Id  ORDER BY Name ";
    
        $query=$this->db->prepare($selec);
        $query->execute();
        $result= $query->fetchAll();
        if ($result)
         {
          return $result;
        }
     
	  }
    public function ss2m()
    { 
        $selec = "SELECT DISTINCT employeemaster.Division,division.Id,division.Name FROM employeemaster INNER JOIN division ON employeemaster.Division=division.Id  ORDER BY Name";
    
        $query=$this->db->prepare($selec);
        $query->execute();
        $result= $query->fetchAll();
        if ($result)
         {
          return $result;
        }
     
	  }
    public function ss3m()
    { 
        $selec = "SELECT DISTINCT employeemaster.Location,location.Id,location.Name FROM employeemaster INNER JOIN location ON employeemaster.location=location.Id  ORDER BY Name";
    
        $query=$this->db->prepare($selec);
        $query->execute();
        $result= $query->fetchAll();
        if ($result)
         {
          return $result;
        }
     
	  }


    public function upstatus($id,$s1,$s2)
    { 
      $sql = "UPDATE `employeemaster` SET $s1 = $s2 WHERE `Id`= $id";
      $stmt= $this->db->prepare($sql);
      $stmt->execute(array());
     
	  }
    public function upstatus1()
    { 

      $s1 = $_POST['s1'];
      $s2 = $_POST['s2'];
      $s3 = $_POST['s3'];
      $s4=$_POST['s4'];
      
      if($s1!=""){
        $upp = "Designation = $s1";
      }
      if($s2!=""){
        if($s1==""){
          $upp= " Division = $s2";
        }
        else{
          $upp.= ", Division = $s2";
        }
      }
      if($s3!=""){
        if($s1=="" && $s2==""){
          $upp= " Location = $s3";
        }
        else{
          $upp.= ", Location = $s3";
        }
      }
      for($i = 0; $i<count($s4);$i++){
        $sql = "UPDATE `employeemaster` SET $upp Where Id = $s4[$i]";
        $stmt= $this->db->prepare($sql);
        $stmt->execute(array());
        
      }
      

	  }

}


