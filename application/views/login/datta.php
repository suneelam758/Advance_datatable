<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/searchpanes/2.0.2/js/dataTables.searchPanes.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
    <title>Result</title>
     <style>
        body{
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(27,32,32,1) 60%);
         
            /* background-color:rgb(183, 225, 200); */
            font-family: Verdana, Geneva, Tahoma, sans-serif, 'Times New Roman', Times, serif;
            font-weight: bolder;
            padding: 20px;
        }
 
        table{
        
             box-shadow: 1px 1px 0px #999,
                2px 2px 0px #999,
                3px 3px 0px #999,
                4px 4px 0px #999,
                5px 5px 0px #999,
                6px 6px 0px #999;
           transition: 2s ease-in-out;
           color: white;
        }
        .z{
            background: transparent;
            transition: 0.5s;
            border: 2px solid white;
        }
            .z:hover{
                background: whitesmoke;
                border: 2px solid black;
            }
        label{
          color: white;
        }
		select{
      color: #000;
    }
    .dataTables_info{
      color: #fff;
    }
    input{
      color: #000;
    }
   .paginate_button{
    cursor: pointer;
   }
    </style>
</head>
<body id="body">
  <!-- --------------------------------------Bulk Update Modal----------------------------------------- -->
 <div class="modal" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update</h4>
       
        </div>
        
       
        <div class="modal-body">
          <form>
        <select name="tss1" id="tss1" class="form-control">

        </select><br><br>
             


        <select name="tss2" id="tss2" class="form-control">

</select><br><br>
      


<select name="tss3" id="tss3" class="form-control">

</select>
        </div>
        
   
        <div class="modal-footer">
          <button type="button" class="btn btn-success"  data-dismiss="modal" onclick="bupd()">Update</button>
          <button type="button" class="btn btn-danger uncheck" data-dismiss="modal" onclick="uc()">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div> 
  

  <!-- --------------------------------------Bulk Update Modal End----------------------------------------- -->

<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-modal filter @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel"><i class="fa fa-filter"  style="color: #000;"> Filter</i></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" >&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- -----------------------------Designation---------------------------------- -->
        <select name="ss1" id="ss1" class="form-control">

        </select><br><br>
                <!-- -----------------------------Division---------------------------------- -->


        <select name="ss2" id="ss2" class="form-control">

</select><br><br>
        <!-- -----------------------------Location---------------------------------- -->


<select name="ss3" id="ss3" class="form-control">

</select>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="filter()">Filter</button>
      </div>
    </div>
  </div>
</div>
<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-modal filter end @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
<center><tt><h1 style="color: white;">DATATABLE SERVER SIDE PROCESSING TRY</h1></tt></center><hr>
<div class="container">

  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" id="but1" data-target="#myModal1" disabled>
    Update
  </button>

    <table class="table" id="table">
    <!-- Button trigger modal -->
<center><button type="button" class="btn z " data-toggle="modal" data-target="#exampleModal" style="color: white;"> <i class="fa fa-filter" ></i>&nbsp;Filter</button> <input type="date" name="date"  id="date" onchange="set()"><br><br>
<span id="sp" style="color: white;"></span> <br> <br> <span id="spn" style="color:white;"></span></center>
<button type="button" id="2" onclick="cc()">clear</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<thead>
    <tr>
      <th></th>
        <th>Id</th>
    <th>Empname</th>
    <th>Division</th>
    <th>Desgination</th>
    <th>Location</th>
    <th>DOJ</th>
    <th>Action</th>
    <!-- <th>action</th> -->

    </tr>
</thead>  
     
</table>


<!-- ------------------------------------------------update modal------------------------------------ -->
<div class="modal fade" id="eModal" tabindex="-1" role="dialog" aria-labelledby="eModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eModalLabel">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form >
        <input type="hidden" value="" name="ii" id="ii" class="form-control" >
      <select name="s1" id="s1" class="form-control" onchange="tt()">
        <option value="0">Select</option>
        <option value="Division">division</option>
        <option value="Designation">designation</option>
        <option value="Location">location</option>
      </select>
      <br>
<h2><input type="text" name="spa" id="spa" value="" style="border: transparent;" readonly></h2><br><br>
<!-- location --> <!-- division -->  <!-- designation -->
<div id="k1" style="display: none;">
      <select name="s2" id="s2" class="form-control">
        
      </select>
</div>
      <div class="modal-footer">
        
        <center>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="upd()">Update</button></center>
      </div>
	  </form>
    </div>
  </div>
</div>      
<!-- ------------------------------------------------update modal end------------------------------------ -->



<script>
	//-------------------------EmployeeMaster Data--------------------------------------//
empd();
var table;
 function empd() {
  
  table =  $('#table').DataTable({
   
     orderable:true,
     searchable:true,
    processing: true,
    serverSide: true,
    stateSave: true,
    paging: true,

    // "sAjaxSource":"http://localhost/HRMSGLOBAL/login/damta",
    // "sServerMethod": "POST"
   
      ajax:{      
        url:"http://localhost/HRMSGLOBAL/login/dammta",                
      },
      dom: 'Bflrtip',
    buttons: [
        'csv','colvis','copy'
    ],
    columnDefs: [ {
      "targets": [ 0, 7 ],
      "orderable": false
    } ]
  
    
     
      });  
  
  //     $('#but_showhide').click(function(){
  //    var checked_arr = [];
  //    var unchecked_arr = [];

  //    // Read all checked checkboxes
  //    $.each($('input[type="checkbox"]:checked'), function (key, value) {
  //       checked_arr.push(this.value);
  //    });

  //    // Read all unchecked checkboxes
  //    $.each($('input[type="checkbox"]:not(:checked)'), function (key, value) {
  //       unchecked_arr.push(this.value);
  //    });

  //    // show the checked columns
  //    table.columns(checked_arr).visible(true);

  //    // hide the unchecked columns
  //    table.columns(unchecked_arr).visible(false);
  // });
 
  
  }
  // function assd(){
  //   table.destroy();
  //   table.draw();
  // }

  function filter(){
    var x = document.getElementById('ss1').value;
    var y = document.getElementById('ss2').value;
    var z = document.getElementById('ss3').value;
    if(x!=0){
      document.getElementById("spn").innerText=" Filter By Designation";
    }
    if(y!=0){
      if(x==0){
      document.getElementById("spn").innerText=" Filter By Division";
    }
    else{
      document.getElementById("spn").innerText += ", Division";
    }
    
    }
    if(z!=0){
      if(x==0 && y==0){
      document.getElementById("spn").innerText=" Filter By Location";
    }
    else{
      document.getElementById("spn").innerText += ", Location";
    }
  }
// document.getElementById("spn").innerHTML="hi"
// table.sSearch_2.draw();
document.getElementsByName("cbox").checked=false ;
        table.columns(3).search(document.getElementById('ss2').value)
        .columns(4).search(document.getElementById('ss1').value)
        .columns(5).search(document.getElementById('ss3').value).draw();
       
        // $('#exampleModal').modal('hide')
  }
  function uc(){
    document.getElementsByClassName("check_box").checked=false;
      }

  
// function showcolumn(){
//   for ( var i=1 ; i<=4 ; i++ ) {
//     table.column( i ).visible( false, false );
// }
// table.columns.adjust().draw( false );
// }
// function showcolumn1(){
//   for ( var i=0 ; i<=4 ; i++ ) {
//    if ( i == 1){
//     continue;
//    }
//     table.column( i ).visible( false, false );
// }
// table.columns.adjust().draw( false );
// }
// function showcolumn2(){
//   for ( var i=0 ; i<=4 ; i++ ) {
//    if ( i == 2){
//     continue;
//    }
//     table.column( i ).visible( false, false );
// }
// table.columns.adjust().draw( false );
// }
// function showcolumn3(){
//   for ( var i=0 ; i<=4 ; i++ ) {
//    if ( i == 3){
//     continue;
//    }
//     table.column( i ).visible( false, false );
// }
// table.columns.adjust().draw( false );
// }
// function showcolumn4(){
//   for ( var i=0 ; i<5 ; i++ ) {
//    if ( i == 4){
//     continue;
//    }
//     table.column( i ).visible( false, false );
// }
// table.columns.adjust().draw( false );
// }
 
   //-------------------------EmployeeMaster Data End--------------------------------------//
   ss1();
function ss1(){
  $.ajax({
           
           type: "POST",
           url: "http://localhost/HRMSGLOBAL/login/ss1",
           dataType: "json",
           async: false,
           success: function (data) {
                         var html = "";
                         html+="<option value=''>Select Designation</option>"
             for (i = 0; i < data.length; i++) {
                             html+="<option value=" + data[i].Id + "> "+ data[i].Name +"</option>"
               
                     }
                     $("#ss1").html(html);
                     $("#tss1").html(html);
                   
                   
 
             },
         });
}

ss2();
function ss2(){
  $.ajax({
           
           type: "POST",
           url: "http://localhost/HRMSGLOBAL/login/ss2",
           dataType: "json",
           async: false,
           success: function (data) {
                         var html = "";
                         html+="<option value=''>Select Division</option>"
             for (i = 0; i < data.length; i++) {
                             html+="<option value=" + data[i].Id + "> "+ data[i].Name +"</option>"
               
                     }
                     $("#ss2").html(html);
                     $("#tss2").html(html);
                     // window.location.reload();
                   
 
             },
         });
}

ss3();
function ss3(){
  $.ajax({
           
           type: "POST",
           url: "http://localhost/HRMSGLOBAL/login/ss3",
           dataType: "json",
           async: false,
           success: function (data) {
                         var html = "";
                         html+="<option value=''>Select Location</option>"
             for (i = 0; i < data.length; i++) {
                             html+="<option value=" + data[i].Id + "> "+ data[i].Name +"</option>"
               
                     }
                     $("#ss3").html(html);
                     $("#tss3").html(html);

             },
         });
}


// -------------------------------------for update------------------------------------

function tt(){
       var id = document.getElementById("s1").value;
       document.getElementById("spa").value= id;
       document.getElementById("k1").style.display="block";
       
        $.ajax({
           
					type: "POST",
					url: "http://localhost/HRMSGLOBAL/login/sele",
					data: {id:id},
					dataType: "json",
					success: function (data) {
                        var html = "";
                        html+="<option value=''>Select" + "&nbsp;" + id + "</option>"
						for (i = 0; i < data.length; i++) {
              html+="<option value=" + data[i].Id + "> "+ data[i].Name +"</option>"							
                    }
                    $("#s2").html(html);
                    // window.location.reload();
                  

            },
        });
if(id == 0){
    document.getElementById("spa").value= "";
       document.getElementById("k1").style.display="none";
}

    }
    function mod1(Id){
		var id=Id;  
 
			document.getElementById("ii").value=id;

            var container = document.getElementById("eModal");
    var content = container.innerHTML;
    container.innerHTML= content; 
    document.getElementById("k1").style.display="none";
    }
    function upd(){
    var id = document.getElementById("ii").value;
    var s1 = document.getElementById("s1").value;
    var s2= document.getElementById("s2").value;
    $.ajax({
				type: "POST",
				url: "http://localhost/HRMSGLOBAL/login/upd",
				data: { id:id, s1:s1,s2:s2 },
				dataType: "json",
				success: function (data) {
                    table.columns(3)
        .columns(4).columns(5).draw();
				}  ,
				error: function () {
					alert("You must select an option");
				},
			});

}
// -------------------------------------for update------------------------------------
// ---------------------------------bulk update---------------------------------
function bupd(){
    var s1 = document.getElementById("tss1").value;
    var s2 = document.getElementById("tss2").value;
    var s3= document.getElementById("tss3").value;
    check=[];
    $("input:checkbox[name=cbox]:checked").each(function (){
      check.push(this.value);
    });
    $.ajax({
				type: "POST",
				url: "http://localhost/HRMSGLOBAL/login/bupd",
				data: { s1:s1,s2:s2,s3:s3,s4:check},
				// dataType: "json",
				success: function (data) {
          table.columns(3)
        .columns(4).columns(5).draw();
				}  ,
				// error: function () {
				// 	alert("You must select an option");
				// },
			});

}
function myFunction() {
  
  document.getElementById("but1").disabled = false;
}
// ---------------------------------bulk update End---------------------------------

//--------------------------------------DAte------------------------------------------
function set(){
  var date = document.getElementById("date").value;
   localStorage.setItem("fd", date);
   table.columns(6).search(localStorage.getItem("fd")).draw();
   document.getElementById("sp").innerHTML=localStorage.getItem("fd");
}
get();
function get(){
  table.columns(6).search(localStorage.getItem("fd")).draw();
  document.getElementById("sp").innerHTML=localStorage.getItem("fd");
}
function cc(){
  localStorage.clear();
  document.getElementById("date").value = "";
  document.getElementById("sp").innerHTML="";
  table.columns(6).search(localStorage.getItem("fd")).draw();
//  window.location.reload();
 
}
function mod2(Id){
  document.getElementById(Id).checked=true;
  // alert(document.getElementById(Id).value);
  // var container = document.getElementById("#myModal1");
  //   var content = container.innerHTML;
  //   container.innerHTML= content; 


}
//--------------------------------------DAte End------------------------------------------

</script>

        </body>
</html>
