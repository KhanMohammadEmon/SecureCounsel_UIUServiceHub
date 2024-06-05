<?php
//session_start();
include '../sqlCommands/connectDb.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> 

    

    <script>
        $(document).on("click", ".clickLink", function () {
    var fileName = $(this).data('id');

    path = "../general_user/uploads/"+fileName+"#toolbar=0";  // To Hide Toolbar
    var src = $('#myframe').attr('src'); ;

    $(".modal-body #filename").text(fileName);   //sets filename in modal 
    $('.modal-body #myframe').attr('src', path);   //sets src value in  in modal iframe

    });
    </script>

    
    
    <!-- ======= Styles ====== -->

    <style>
    body {
        font-family: "Dosis";
    }

    .card .p-1 {
        margin-bottom: 100px !important;
    }
    table {
        table-layout:fixed;
    }
    td {
        word-wrap: break-word;
    }
    </style>

</head>

<body>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Full Name</th>
                        <th>Student Id</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Amount</th>
                        <th>Documents</th>
                        <th>Action</th>
                        <th>Time</th>
                        
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php

                                 //$email = $_SESSION['email'];

                                 $r = "SELECT * FROM `loan_application` where status = 'pending' or status = 'approved'";
                                 $result = mysqli_query($sql, $r);
                                 if (mysqli_num_rows($result) > 0) {
                                     while ($post_row = mysqli_fetch_assoc($result)) {

                                 ?>
                    <tr>
                        <td><?php echo $post_row['id']; ?></td>
                        <td><?php echo $post_row['full_name']; ?></td>
                        <td><?php echo $post_row['student_id']?></td>
                        <td><?php echo $post_row['email']?></td>
                        <td><?php echo $post_row['phone_number']?></td>
                        <td><?php echo $post_row['amount']?></td>
                        <td><?php echo $post_row['documents']?></td>
                       <td>
    <a data-toggle="modal"  class="clickLink btn btn-danger" data-id="<?php echo $post_row['documents']?>" href="#myModal">view </a>
</td>


                        <td><?php echo $post_row['application_date']?></td>
                        <!-- <td><?php echo $post_row['time']?></td> -->


                        <td>
                            <?php  if($_SESSION['type']=='admin'){?>
                            <form action="update_status2.php" method="post">
                                <select class="form-control" name="new" required>
                                    <option value="" selected hidden disabled><?php echo $post_row['status']; ?>
                                    </option>
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                                  
                                <button type="submit"class = "btn btn-success" name="submit" style = "margin : 5px">Update Status</button>
                                <input type="hidden" name="id" value="<?php echo $post_row['id']; ?>">
                                
                            </form>
                            <?php } 
                            else
                            {
                                echo $post_row['status'];
                            }
                            ?>
                            

                        </td>
                    </tr>
                    <?php

                                     }
                                 }

                                 ?>
                </tbody>
            </table>
        </div>
    </div>

<!-- The Modal -->
<div class="modal" id="myModal">
   <div class="modal-dialog"  style="max-width: 80% !important;" role="document">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Document</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            File Name: <a name="filename" id="filename"></a>
            <iframe src="" width="100%" height="500px" id="myframe"></iframe>  
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>

</body>

</html>