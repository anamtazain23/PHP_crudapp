<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Products</title>
  </head>
  <body> 
    
      <div class="container">
        <div class="row">
           <h1 class="text-center mt-5 text-secondary">View Product</h1>

            
           

            <div class="col-10 mx-auto">
      
               <input type="text" placeholder="Search Product Name" class="form-control mt-3 " id="search">  

              <a href="add.php" class="btn btn-outline-primary mt-3" >Add Product</a>

              <a href="export.php" class="btn btn-success mt-3 ms-5">Export to Excel</a>

              <a href="import.php" class="btn btn-primary mt-3">Import from Excel</a>


              <!-- View table Start -->
              <table class=" table table-hover table-striped mt-4">
               <thead>
                 <tr class="text-center">
                  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Product Quantity</th>
                  <th colspan="2" class="text-center">Action</th>
                </tr>
               </thead>
                

                <tbody id="table-data">

                  <?php
                // Include connection of db
                include("connection.php");

                // Read Query
                $query=mysqli_query($con,"SELECT * FROM products");
                foreach($query as $data){
                  ?>
                  <tr class="text-center">
                    <td> <?php echo $data['id']; ?> </td>
                    <td> <?php echo $data['Name']; ?> </td>
                    <td> <?php echo $data['Price']; ?> </td>
                    <td> <?php echo $data['Quantity']; ?> </td>



                    <!--Data Update Modal -->

                    <td><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#update<?php echo $data['id']; ?>">
                       Edit
                    </button></td>

                    <div class="modal fade" id="update<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <form action="code.php" method="post">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                          <div class="modal-body">
                            <input type="hidden" class="form-control mt-3" value="<?php echo $data['id']; ?>" name="id" >
                            <input type="text" class="form-control mt-3" value="<?php echo $data['Name']; ?>" name="p_name" >
                            <input type="number" class="form-control mt-3" value="<?php echo $data['Price']; ?>" name="p_price" >
                            <input type="number" class="form-control mt-3" value="<?php echo $data['Quantity']; ?>" name="p_qty" >
                            

                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!--Update Modal End -->

                     <!--Data Delete Modal -->

                    <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $data['id']; ?>">
                       Delete
                    </button></td>

                    <div class="modal fade" id="delete<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <form action="code.php" method="post">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" class="form-control mt-3" value="<?php echo $data['id']; ?>" name="id" >
                            Do you want to delete this data?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Delete Modal End -->


                  </tr>

                  <?php
                }
                ?>
                </tbody>
                

              </table>
                <!-- View table End -->

            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
          $(document).ready(function(){
            $("#search").keyup(function(){
              var input = $(this).val();
              $.ajax({
                url: "search.php",
                method: "POST",
                data: { query: input },
                success: function(data){
                  $("#table-data").html(data);
                }
              });
            });
          });
        </script>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
  </body>
</html>