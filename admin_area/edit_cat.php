<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_cat'])){
        
        $edit_cat_id = $_GET['edit_cat'];
        
        $edit_cat_query = "select * from categories where cat_id='$edit_cat_id'";
        
        $run_edit = mysqli_query($con,$edit_cat_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $cat_id = $row_edit['cat_id'];
        
        $cat_title = $row_edit['cat_title'];

        $cat_top = $row_edit['cat_top'];

        $cat_image = $row_edit['cat_image'];
     
        
    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Category
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-pencil fa-fw"></i> Edit Category
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
            <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group 1 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        Category Name 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="cat_name" type="text" class="form-control"  value="<?php echo $cat_title; ?> ">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 1 finish -->
                    <div class="form-group"><!-- form-group 2 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Choose As Top Category
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="cat_top" type="radio" value="yes"
                            
                            <?php
                                
                                if($cat_top=='no'){}
                                else{echo "checked='checked'";}

                            ?>
                            
                            >
                            <label>Yes</label>

                            <input name="cat_top" type="radio" value="no"
                            
                            <?php
                                
                                if($cat_top=='no'){echo "checked='checked'";}
                               

                            ?>
                            
                            >
                            <label>No</label>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 2 finish -->
                    <div class="form-group"><!-- form-group 3 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        Category Image
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="file" name="cat_image" class="form-control">
                            
                            <br/>
                            
                            <img width="70" height="70"  src="other_images/<?php echo $cat_image; ?>" alt="<?php echo $m_image; ?>" class="img-responsive">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 3 finish -->
                    <div class="form-group"><!-- form-group 4 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --></label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="submit" name="update" value="Update Category" class="btn btn-primary form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 4 finish -->
            </form><!-- form-horizontal finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  
 if(isset($_POST['update'])){
        
    $cat_title = $_POST['cat_name'];
    
    $cat_top = $_POST['cat_top'];
    
 if(is_uploaded_file($_FILES['cat_image']['tmp_name'])){
    
    $cat_image = $_FILES['cat_image']['name'];
    
    $temp_name = $_FILES['cat_image']['tmp_name'];
    
    move_uploaded_file($temp_name,"other_images/$cat_image");
    
    $update_cat = "update categories set cat_title='$cat_title',cat_top='$cat_top',cat_image='$cat_image' where cat_id='$cat_id'";

}
else{
    $update_cat = "update categories set cat_title='$cat_title',cat_top='$cat_top' where cat_id='$cat_id'";    
}

  
    $run_update_cat = mysqli_query($con,$update_cat);
    
    if($run_update_cat){
        
        echo "<script>alert('Your Category has been updated Successfully')</script>"; 
    
        echo "<script>window.open('index.php?view_cats','_self')</script>";
        
    }
  
}

?>



<?php } ?> 