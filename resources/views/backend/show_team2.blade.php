
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script><script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
	<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
   <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
   <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
   <title>Document</title>
</head>
<body class="m-5 text-center col-md-6">
   <h1 class="m-5">Team Members</h1>
	<table class="table table-bordered" id="myTable">
      <thead>
         <th scope="col">Id</th>
         <th scope="col">image</th>
         <th scope="col">Name</th>
         <th scope="col">Role</th>
         <!-- <th scope="col">Preference</th> -->
         <th scope="col">Action</th>
      </thead>
      <tbody class="row_position">
         @foreach($team as $key=>$teams)
         <tr id="<?php echo $teams->id; ?>" >
            <td>{{ ++$key }}</td>
            <!-- <td>{{ $teams->id }}</td> -->
            <td><img src="{{ url('assets/upload_team/'.$teams->image)}}" alt="Team Members Image" height="100" width="150"></td>
            <td>{{ $teams->name }}</td>
            <td>{{ $teams->role }}</td>
            <!-- <td>{{ $teams->position_id }}</td> -->
            <td>
               <a href="{{ url('admin/edt_teamv', [$teams->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
               <a href="{{ url('admin/del_team', [$teams->id]) }}" onclick="return myFunction();"><i class="fa fa-trash"></i></a>
            </td>
         </tr>
         @endforeach
      </tbody>
	</table>
<script type="text/javascript" src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">
	</script>
	<link rel="stylesheet"
		href=
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" />
	<script type="text/javascript"
		src=
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js">
	</script>
   
   
	<script type="text/javascript">
      $(document).ready(function(){
         $("#myTable").DataTable();
      });
      $(".row_position").sortable({
         delay: 150,
         stop: function () {
            var selectedData = new Array();
            $(".row_position>tr").each(function(){
               selectedData.push($(this).attr("id"))
            });
            updateOrder(selectedData);
         }
      });
      function updateOrder(aData){
         var token = "<?php echo csrf_token(); ?>";
         $.ajax({
            url: "{{url('updateTeamOrder')}}",
            type: "POST",
            data: {allData:aData,_token:token},
            success: function(data){
               // if(data == 1){
                  // alert(data);
                  console.log(data);
                  location.reload();
               // }
            }
         });
      }
	</script>
   