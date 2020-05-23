<?php include 'functions.php'; ?>

<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="styles.css">
<!-- Latest compiled and minified CSS -->
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</head>
<body>





<div class="container">
  <h2>CRUD - Laborator 3</h2><br>
            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>POWER</th>
        <th>BEATS</th>
        <th>DELETE</th>
        <th>UPDATE</th>
      </tr>
    </thead>
    <tbody>   
        <?php
        $request_array=read();
                if($request_array!=0){
                foreach ($request_array as $key){  ?>
            
                
                    <tr id="<?php echo $key[0];?>">
                    <td><?php echo $key[0];?></td>
                    <td data-target="name" ><?php echo $key[1];?></td>
                    <td data-target="power" ><?php echo $key[2];?></td>
                    <td data-target="beats" ><?php echo $key[3];?></td>
                    <td><button type="button" onclick="myAjax(<?php echo $key[0];?>)"class="btn btn-warning btn btn-primary ">Delete</button></td>
                    <td><a href="#" data-role="update" data-id="<?php echo $key[0];?>"class="btn btn-danger btn btn-primary ">Update</a></td>
                </tr>
                
              <?php      
                }
            }
            else echo "No requests.";
        ?>

    </tbody>
  </table>
</div>

<script>
$(document).ready(function(){
    $(document).on('click','a[data-role=update]',function(){
      
     var id = $(this).data('id');
     var name  = $('#'+ id).children('td[data-target=name]').text();
     var power = $('#'+ id).children('td[data-target=power]').text();
     var beats = $('#'+ id).children('td[data-target=beats]').text();

     $('#name').val(name);
     $('#power').val(power);
     $('#beats').val(beats);
     $('#myid').val(id);
     $("#myModal").modal("toggle");
    });

            $('#save').click(function(){
          var id =$('#myid').val();
          var name =$('#name').val();
          var power =$('#power').val();
          var beats =$('#beats').val();


                $.ajax({
                  url : 'ajax3.php',
                  method : 'post',
                  data : {name : name , power : power , beats : beats , id: id},
                  success: function(response){
                    $('#'+ id).children('td[data-target=name]').text(name);
                    $('#'+ id).children('td[data-target=power]').text(power);
                    $('#'+ id).children('td[data-target=beats]').text(beats);
                    $("#myModal").modal("toggle");
                  }

                });

          });



});


</script>
<script>
 function myAjax2(){
          
          var Nume =$('#Nume').val();
          var Power =$('#Power').val();
          var Beats =$('#Beats').val();


                $.ajax({
                  url : 'ajax2.php',
                  method : 'post',
                  data : {Nume : Nume , Power : Power , Beats : Beats },
                  success: function(response){
                    window.location.reload();
                  }

                });

          }
</script>
<script>
function myAjax(t) {
    var t=t;
    
    
      $.ajax({
           type: "POST",
           url: 'ajax.php',
           data:"param1=" + t,
           success:function(data) {
            
            window.location.reload();
           }

      });
 }
</script>



    <div style="padding:10px 20px; margin-left: 100px;">
        <h3>ADD INFO</h3>
        <label for='Nume' class='ui-hidden-accessible'>Nume:</label>
        <input name='Nume' id='Nume'  placeholder='Nume' data-theme='a' type='text'>

        <label for='Power' class='ui-hidden-accessible'>Power:</label>
        <input name='Power' id='Power'  placeholder='Power' data-theme='a' type='text'>

        <label for='Beats' class='ui-hidden-accessible'>Beats:</label>
        <input name='Beats' id='Beats'  placeholder='Beats' data-theme='a' type='text'>

        <button type="button" onclick="myAjax2()" class="btn btn-primary ">ADD NEW</button>
    </div>






    



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Update data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      
      <div class="modal-body">


        <div class="form-group">
          <label>name</label>
          <input type="text" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label>power</label>
          <input type="text" id="power" class="form-control">
        </div>
        <div class="form-group">
          <label>beats</label>
          <input type="text" id="beats" class="form-control">
        </div>        
        <input type="hidden" id="myid" class="form-control"> 

      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-default  " data-dismiss="modal">Close</button>
        <a href="#" id="save" class="btn btn-primary ">Update</a>
      </div>
    </div>

  </div>
</div>


</body>
</html>