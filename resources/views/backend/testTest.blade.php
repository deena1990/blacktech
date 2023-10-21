@include('backend.include.header')
@include('backend.include.sidebar')
<link href='https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<link href='https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>




<br/><br/><br/>
<div class="row">
   <div class="col-sm-4"></div>
   <div class="col-sm-8">
      <table class="table table-bordered table-hover table-responsive text-center" id="example1" style="width:100%;">
      <thead>
         <tr>
            <th >Sr.No </th>
            <th scope="col">Order No.</th>
          
            
         </tr>
      </thead>
      <tbody>
          @foreach($careermap as $careermaps)
          <tr>
            <td>{{$careermaps->id}}</td>
            <td>{{$careermaps->title}}</td>
         </tr>
         @endforeach
          
      </tbody>
      </table>
   </div>
</div>
<div class="row">
   <div class="row col-md-3">
   </div>   
   <div class="row col-md-3">  
      <label for="selectOne">Select Item</label>
      <select name="selectOption" id="selectOne">
         <option style="display:none;" selected>Select</option>
         <option class="hide1" value="a">a</option>
         <option class="hide" value="b">b</option>
         <option class="hide" value="c">c</option>
         <option class="hide" value="d">d</option>
      </select>
   </div> 
</div>               
                
       
              


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js" ></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js" ></script>

<script>
   $('#selectOne').change(function(){
      if ($('#selectOne').val()=="a"){
         $('.hide').css('display','none');
      }
      if ($('#selectOne').val()!="a"){
         $('.hide1').css('display','none');
      }
   });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example1').DataTable( {

     
        dom: 'Bfrtip',
        buttons: [
             {   extend: 'excel',
                 text: 'Export',
             }, 
           
        ],
         language: {
        searchPlaceholder: "Search by Email"

     }
    } );
} );
</script>

