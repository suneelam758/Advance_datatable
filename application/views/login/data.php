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
    <title>Result</title>
     <style>
        body{
            background: linear-gradient(90deg, rgba(20,32,39,1) 20%, rgba(2,0,36,1) 100%);
          color: white;
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
        }
		
    </style>
</head>
<body>
<center><tt><h1>Employee Data</h1></tt></center><hr>
<table class="table" id="table">
    <thead>
    <tr>
        <th>Id</th>
    <th>Empname</th>
    <th>Division</th>
    <th>Desgination</th>
    <th>Location</th>
    <th>Action</th>
    </tr>
</thead>  
     
</table>

<script>
// var xxx=[];
	//-------------------------EmployeeMaster Data--------------------------------------//
// var xx=[[1,"A1","Div1","Desg5","Location5"],[2,"B2","Div2","Desg2","Location4"],[3,"C3","Div1","Desg6","Location5"],[4,"D4","Div4","Desg1","Location1"],[5,"E5","Div6","Desg3","Location7"],[6,"F6","Div2","Desg3","Location1"],[7,"G7","Div2","Desg4","Location2"],[8,"H8","Div3","Desg5","Location4"],[9,"I9","Div3","Desg1","Location4"],[10,"J10","Div3","Desg1","Location5"],[11,"Z1","Div1","Desg2","Location3"]];
  $(document).ready(function() {
      $('#table').dataTable({
      
        // processing: true,
      serverSide:true,
      ajax:{ 
        url:"http://localhost/HRMSGLOBAL/login/damta",         
      },
     
     
      });  
  });

   //-------------------------EmployeeMaster Data End--------------------------------------//
    	
</script>

        </body>
</html>





<!-- success: function (data) {
            console.log(data);
            xxx['i']=data;
            console.log(xxx['i']);
        },    -->