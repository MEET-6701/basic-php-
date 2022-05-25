<?php
include "config.php";
echo $uid=$_REQUEST['uid'];
$fet="select * from user where uid=$uid";
$result = $conn->query($fet);
$fatch = $result->fetch_object();
  

$enctype=$fatch->upass;
$enc_pass=md5($enctype);
?>
<div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Name" value="<?php echo $fatch->uname; ?>" name="uname" id="recipient-rname" required="">
                </div>
                <div class="form-group">
                    <label for="recipient-email" class="col-form-label">Email</label>
                    <input type="text" class="form-control" placeholder="User Name" name="umail" value="<?php echo $fatch->umail?>"id="recipient-email" required="">
                </div>
              
                
                <div class="form-group">
                    <label for="gender" class="col-form-label">Gender</label>
                    <?php 
						$gen=$fatch->ugen;
						if($gen=="Male")
						{
						?>
                    <input type="radio" name="ugen" value="Male" checked>:Male
                    <input type="radio" name="ugen" value="Female">:Female
                    <?php
                        }
                        else{

                        ?>
                         <input type="radio" name="ugen" value="Male" >:Male
                    <input type="radio" name="ugen" value="Female" checked>:Female
                    <?php
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-form-label">Laungauges</label>
                   
                    <?php
						$lag_str=$fatch->ulag;
						$lag_arr=explode(",",$lag_str);
                        ?>
					  Hindi:<input <?php if(in_array("Hindi",$lag_arr)){echo"checked";}?> type="checkbox"  name="ulag[]" value="Hindi">
                      English:<input <?php if(in_array("English",$lag_arr)){echo"checked";}?> type="checkbox"  name="ulag[]" value="English">
                      Gujarati:<input <?php if(in_array("Gujarati",$lag_arr)){echo"checked";}?> type="checkbox"  name="ulag[]" value="Gujarati  ">
                </div>
                <div class="form-group">
                    <label for="password1" class="col-form-label">Select Country</label>
                    <select class="form-control" name="ucon" required="">
                        

                        <option value="">------  Select Country ------</option>
                        <option <?php if($fatch->ucon=="india"){echo "selected";}?>>India</option>
                        <option <?php if($fatch->ucon=="USA"){echo "selected";}?>>USA</option>
                        <option <?php if($fatch->ucon=="UK"){echo "selected";}?>>UK</option>
                     
                    </select>
                </div>
                <div class="form-group">
                    <label for="password1" class="col-form-label">Upload Pic</label>
                    <input type="file" class="form-control" name="img" >
                </div>
                <div class="right-w3l">
                    <input type="submit" name="submit"  value="submit">
                </div>
                    <img src="img/<?php echo $fatch->img?>" alt="" width="250px" height="250px">
            </form>
        </div>
    </div>

    <?php
    if(isset($_REQUEST['submit']))
    {
        $uname=$_REQUEST['uname'];
        $umail=$_REQUEST['umail'];
      // password convert into encriypted
        $ugen=$_REQUEST['ugen'];
        $lag_arr=$_REQUEST['ulag'];
        $lag=implode(",",$lag_arr);
        $ucon=$_REQUEST['ucon'];
        
       
       $up="UPDATE user SET uname='".$uname."',umail='".$umail."',upass='".$enc_pass."',ugen='".$ugen."',ulag='".$lag."',ucon='".$ucon."' where uid=$uid";
       $result=$conn->query($up);
       if ($result==true){
        echo "<script>
        alert('Save Success');
        window.location='fetch.php';
        </script>";
       }
       else{
           echo "fail";
       }
    }
    ?>