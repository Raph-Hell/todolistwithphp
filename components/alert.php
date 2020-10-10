<?php
if (!isset($_GET['hide'])) {
    if (isset($_GET['alert'])) {
        switch ($_GET['alert']) {

            case 'add_success':
                echo "
                    <div class='alert alert-success'>
                        <p><span class='badge badge-success'>Success</span>  Todo Added Successfully</p>
                        <a href='index.php?hide' id='btn'>&times;</a>
                    </div>
                ";
                break;

            case 'update_success':
                echo "
                    <div class='alert alert-success'>
                        <p><span class='badge badge-success'>Success</span>  Todo Updated Successfully</p>
                        <a href='index.php?hide' id='btn'>&times;</a>
                    </div>
                ";
                break;

            case 'delete_success':
                echo "
                    <div class='alert alert-success'>
                        <p><span class='badge badge-success'>Success</span>  Todo Deleted Successfully</p>
                        <a href='index.php?hide' id='btn'>&times;</a>
                    </div>
                ";
                break;

            case 'failed':
                echo "
                    <div class='alert alert-failed'>
                        <p><span class='badge badge-failed'>Failed</span>  Something Went Wrong</p>
                        <button id='btn'>&times;</button>
                    </div>
                ";
                break;
        }
    }
}
?>

