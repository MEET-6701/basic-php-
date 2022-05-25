<?php
    include "config.php";
    $fet="select * from user ";
    $result = $conn->query($fet);

    
?>
<br />
    <table class="table table-striped table-dark" >
        <thead>
            <th>uid</th>
            <th>uname</th>
          
            <th>mail</th>
            <th>genders</th>
            <th>language</th>
            <th>counthy</th>
            <th>image</th>
            <th>edit</th>
            <th>update</th>
        </thead>
        <tbody>
            <?php
            while ($fatch = $result->fetch_object()){
            ?>
            <tr>
                <td><?php echo $fatch->uid; ?></td>
                <td><?php echo $fatch->uname; ?></td>
               
                <td><?php echo $fatch->umail; ?></td>
                <td><?php echo $fatch->ugen;?></td>
                <td><?php echo $fatch->ulag;?></td>
                <td><?php echo $fatch->ucon;?></td>
                <td><img src="img/<?php echo$fatch->img;?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="150px" height="150px"></td>
                <td><a href="update.php?uid=<?php echo $fatch->uid;?>" class="btn btn-primary">Edit</a></td>
                <td><a href="delete.php?uid=<?php echo $fatch->uid;?>" class="btn btn-danger">delete</a></td>
                
                <?php
            }   
                ?>
               
            </tr>
        </tbody>

    </table>
    <a href="form.php" style="position:absolute;left:50%;bottom:10%;" class="btn btn-primary">insert </a>
