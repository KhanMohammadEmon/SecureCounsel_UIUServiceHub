<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Model with PDF Example - coding-zon</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> 
        
        
    <script>
        $(document).on("click", ".clickLink", function () {
	var fileName = $(this).data('id');

	path = "..//general_user/uploads//"+fileName+"#toolbar=0";  // To Hide Toolbar
	var src = $('#myframe').attr('src'); ;

	$(".modal-body #filename").text(fileName);   //sets filename in modal 
	$('.modal-body #myframe').attr('src', path);   //sets src value in  in modal iframe

	});
    </script>
 
 </head>
    <body>
        
       <h4>Open PDF in Bootstrap Modal- Using Links</h4>

<!-- Link to Open the Modal -->


<a data-toggle="modal" class="clickLink" data-id="test.pdf" href="#myModal">
View PDF1
</a>| 
<a data-toggle="modal" class="clickLink" data-id="test-Doc2.pdf" href="#myModal">
View PDF2
</a>| 
<a data-toggle="modal" class="clickLink" data-id="test-Doc3.pdf" href="#myModal">
View PDF3
</a>
	
<br /><br /><br />
		
<h4>Open PDF in Bootstrap Modal- Button View</h4>
		
<a data-toggle="modal"  class="clickLink btn btn-danger" data-id="ML-MID-SUMMER-2022.pdf" href="#myModal">Open PDF1 </a>

<br /><br />

<a data-toggle="modal" class="clickLink btn btn-primary" data-id="test-Doc2.pdf" href="#myModal">Open PDF1 </a>

<br /><br />

<a data-toggle="modal" class="clickLink btn btn-success" data-id="test-Doc3.pdf" href="#myModal">Open PDF3 </a>
		




<!-- The Modal -->
<div class="modal" id="myModal">
   <div class="modal-dialog"  style="max-width: 80% !important;" role="document">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
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