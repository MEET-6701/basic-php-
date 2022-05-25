<html>
    <head>
        <title> Login in form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



    </head>

    <body>
        <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="uname" id="recipient-rname" required="">
                </div>
                <div class="form-group">
                    <label for="recipient-email" class="col-form-label">Email</label>
                    <input type="text" class="form-control" placeholder="User Name" name="umail" id="recipient-email" required="">
                </div>
                <div class="form-group">
                    <label for="password1" class="col-form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="upass" id="password1" required="">
                </div>
                
                <div class="form-group">
                    <label for="gender" class="col-form-label">Gender</label>
                    <input type="radio" name="ugen" value="Male">:Male
                    <input type="radio" name="ugen" value="Female">:Female
                </div>
                <div class="form-group">
                    <label for="gender" class="col-form-label">Laungauges</label>
                    <input type="checkbox" name="ulag[]" value="Hindi">:Hindi
                    <input type="checkbox" name="ulag[]" value="English">:English
                    <input type="checkbox" name="ulag[]" value="Gujarati">:Gujarati
                </div>
                <div class="form-group">
                    <label for="password1" class="col-form-label">Select Country</label>
                    <select class="form-control" name="ucon" required="">
                        <option value="">------  Select Country ------</option>
                       <option value="india"> india </option>
                       <option value="USA">USA</option>
                       <option value="UK"> UK </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password1" class="col-form-label">Upload Pic</label>
                    <input type="file" class="form-control" name="img" required="">
                </div>
                <div class="right-w3l">
                    <input type="submit" name="submit" class="form-control" value="submit">
                </div>
            </form>
        </div>
    </div>
       
    </body>
</html>

<?php

include_once 'config.php';
if(isset($_REQUEST['submit']))
{
    $uname=$_REQUEST['uname'];
    $umail=$_REQUEST['umail'];
    $upass=$_REQUEST['upass'];
    $enc_pass=md5($upass); // password convert into encriypted
    $ugen=$_REQUEST['ugen'];
    $lag_arr=$_REQUEST['ulag'];
    $lag=implode(",",$lag_arr);
    $ucon=$_REQUEST['ucon'];
    
    $img=$_FILES['img']['name'];
    $path='img/'.$img;
    $dup_img=$_FILES['img']['tmp_name'];
    move_uploaded_file($dup_img,$path);
    
   $ins="insert into user (uname,umail,upass,ugen,ulag,ucon,img) values('$uname','$umail','$enc_pass','$ugen','$lag','$ucon','$img')";
   $result=$conn->query($ins);
   if ($result==true){
       echo "Success";
   }
   else{
       echo "fail";
   }
}
?>