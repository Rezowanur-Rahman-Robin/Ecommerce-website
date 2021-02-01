<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php
  
  if(isset($_GET['edit_term'])){
       
    $edit_term_id=$_GET['edit_term'];
    $edit_term_query="select * from terms where term_id='$edit_term_id'";

    $run_edit_term =mysqli_query($con,$edit_term_query);

    $row_edit_term=mysqli_fetch_array($run_edit_term);

    $term_id=$row_edit_term['term_id'];

    $term_title=$row_edit_term['term_title'];
    
    $term_desc=$row_edit_term['term_desc'];
    

  }


?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Term
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Edit Term
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group 1 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                           Term Title
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="term_title" value="<?php echo $term_title ?>" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 1 finish -->
                    <div class="form-group"><!-- form-group 2 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Box Description
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <textarea name="term_desc" type="text" class="form-control" rows="6" cols="18"><?php echo $term_desc ?></textarea>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 2 finish -->
                    <div class="form-group"><!-- form-group 4 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --></label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="submit" name="update" value="Update Term" class="btn btn-primary form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 4 finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->    
</div><!-- row 2 finish -->

<?php  

    if(isset($_POST['update'])){
        
        $term_title = $_POST['term_title'];
        
        $term_desc = $_POST['term_desc'];
        
        $update_term ="update terms set term_title='$term_title',term_desc='$term_desc' where term_id='$term_id'";
        
        $run_update_term = mysqli_query($con,$update_term);

        
        echo"<script>alert('Your Term Has Been Updated')  </script>";
        
        echo"<script>window.open('index.php?view_terms','_self')  </script>";
        
    }

?>

<?php } ?>   