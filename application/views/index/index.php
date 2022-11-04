<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <title>Resultt</title>
     <style>
        body{
          
            background-color:rgb(183, 225, 228);
            font-family: Georgia, 'Times New Roman', Times, serif;
            color:rgba(32, 33, 36, 1) ;
            padding: 20px;
        }
 
        table{
        
             box-shadow: 1px 1px 0px #999,
                2px 2px 0px #999,
                3px 3px 0px #999,
                4px 4px 0px #999,
                5px 5px 0px #999,
                6px 6px 0px #999;
        
        }
		.az{
      background-color: rgba(93, 188, 194, 1);
      border: 2px solid black;
      transition: ease 0.5s;
    }
    .az:hover{
      background: black;
      color: white;
    }
    .z{
      transition: 0.5s;
    
    }
    .z:hover{
      transform: scale(2,2);
    }
  
    </style>
    <script>
         function mod1(Id){
		var id=Id;   
			document.getElementById("ii").value=id;

            var container = document.getElementById("eModal");
    var content = container.innerHTML;
    container.innerHTML= content; 
    document.getElementById("k1").style.display="none";
    }
	


    
    </script>
    
</head>
<body>
  <!-- --------------------------------------moda filterl----------------------------------------- -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel"><i class="fa fa-filter"> Filter</i></h2>
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
        <button type="button" class="btn btn-primary">Filter</button>
      </div>
    </div>
  </div>
</div>
<!-- -----------------------------------------modal filter end ------------------------------------- -->
<center><tt><h1>Employee Data</h1></tt></center><hr>


<table class="table" id="table">
<!-- Button trigger modal -->
<center><button type="button" class="btn z btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-filter"></i>&nbsp;Filter</button></center>
    <thead>
    <tr>
        <th>Id</th>
    <th>EmpName</th>
    <th>Division</th>
    <th>Desgination</th>
    <th>Location</th>
    <th>Action</th>
    </tr>
</thead>  
   <tbody id="tbody">

   </tbody>
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
        <button type="button" class="btn btn-primary" onclick="upd()">Update</button></center>
      </div>
	  </form>
    </div>
  </div>
</div>      
 <script>
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


   
 </script>     


<script>
   
	//-------------------------Approver Data--------------------------------------//
    	abc();
			function abc() {
				
			
				$.ajax({
					type: "POST",
					url: "http://localhost/HRMSGLOBAL/login/emplist",
					// data: {id:idd},
					dataType: "json",
          async: false,
					success: function (data) {

						var html = "";
						for (i = 0; i < data.length; i++) {
							html +=
                            "<tr>" +
								"<td>" +
								data[i].Id+
								"</td>" +
								
								"<td>" +
								data[i].Empname+
								"</td>" +
								"<td>" +
								data[i].Division+
								"</td>" +
                                "<td>" +
								data[i].Designation+
								"</td>" +
								"<td>" +
								data[i].Location +
								"</td>" +
                                "<td><button type='button' class='btn az settle-button' data-toggle='modal' data-target='#eModal' onclick=mod1(" +
								data[i].Id +")><i class='fa fa-edit'></i></button>"
								;
								

								
						}

						$("#tbody").html(html);
						
					},
				});
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
                    $('#eModal').modal('hide')
                    abc();
				}  ,
				error: function () {
					alert("You must select an option");
				},
			});

}

// ------------------------------------------for filter modal box --------------------------------------------------------
ss1();
function ss1(){
  $.ajax({
           
           type: "POST",
           url: "http://localhost/HRMSGLOBAL/login/ss1",
           dataType: "json",
           async: false,
           success: function (data) {
                         var html = "";
                         html+="<option>Select Designation</option>"
             for (i = 0; i < data.length; i++) {
                             html+="<option value=" + data[i].Id + "> "+ data[i].Name +"</option>"
               
                     }
                     $("#ss1").html(html);
                     // window.location.reload();
                   
 
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
                         html+="<option>Select Division</option>"
             for (i = 0; i < data.length; i++) {
                             html+="<option value=" + data[i].Id + "> "+ data[i].Name +"</option>"
               
                     }
                     $("#ss2").html(html);
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
                         html+="<option>Select Location</option>"
             for (i = 0; i < data.length; i++) {
                             html+="<option value=" + data[i].Id + "> "+ data[i].Name +"</option>"
               
                     }
                     $("#ss3").html(html);
                     // window.location.reload();
                   
 
             },
         });
}





</script>

<script>
$(function() {
  $('#table').dataTable( {
    "columnDefs": [ {
      "targets": [ 1,2  ],
      "orderable": false, targets: 0
    } ]
} );
});

</script>

        </body>
</html>