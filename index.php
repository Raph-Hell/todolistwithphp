<?php
$server = 'localhost';
$username = 'root';
$password = '';
$db = 'todo';

$connect = mysqli_connect($server, $username, $password, $db);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.css">
</head>

<body>
<header>
    <div class="container">
        <div class="logo">
            <div class="logo-box">
                <img src="image/poster1_29_9658-scale-1.png">
            </div>
            <h2>
                Jace <span>Tech</span>
            </h2>
        </div>
        <h2 class="brand-name">
            TODO APP
        </h2>
    </div>
</header>

<section class="body">
    <div class="container column">
        <?php
        include 'components/alert.php';
        if (isset($_GET['update'])){
            $id = $_GET['update'];

            $sql = "SELECT `todo_items` FROM `todo` WHERE `id` = '$id'";
            $result = mysqli_query($connect, $sql);
            $row = mysqli_fetch_array($result);
            $todo = $row[0];
            ?>
            <form action="todo_handler.php" method="post">
                <h2 class="header">Update List</h2>
                <div class="form-group">
                    <label>Todo</label>
                    <input type="text" class="form-control" value="<?php echo $todo; ?>" name="todo" required>
                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                </div>

                <div class="form-group border">
                    <input type="submit" class="btn" name="update" required>
                </div>
            </form>
            <?php
        }
        else{
            ?>
            <div class="view">
                <a href="index.php?view"> View Lists</a>
            </div>
            <form action="todo_handler.php" method="post">
                <h2 class="header">Add List</h2>
                <div class="form-group">
                    <label>Todo</label>
                    <input type="text" class="form-control" name="todo" required>
                </div>

                <div class="form-group border">
                    <input type="submit" class="btn" name="submit" required>
                </div>
            </form>
            <?php
        }
        if (isset($_GET['view'])){
            ?>
            <div class="table-holder">
                <h2 class="header">Todo Items</h2>

                <?php
                $query = "SELECT * FROM `todo`";
                $result2 = mysqli_query($connect, $query);
                if (mysqli_num_rows($result2) > 0){
                $x = 1;
                ?>
                <table>
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Todo Item</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    while ($row2 = mysqli_fetch_assoc($result2)){
                        $todo_item = $row2['todo_items'];
                        $todo_id = $row2['id'];
                        ?>
                        <tr>
                            <th><?php echo $x; ?></th>
                            <td class="center">
                                <?php echo $todo_item; ?>
                            </td>
                            <td>
                                <a title="edit" href="index.php?update=<?php echo $todo_id; ?>" style="border-radius: 50%; color: #f5f5f5; font-weight:bolder; padding: 8px 10px; margin: 0px 5px; background-color: rgb(15,123,253)">
                                    &cularr;
                                </a>

                                <a title="delete" href="todo_handler.php?delete=<?php echo $todo_id; ?>" style="border-radius: 50%; color: #f5f5f5; font-weight:bolder; padding: 8px 14px; margin: 0px 5px; background-color: rgb(245,49,49)">
                                    &times;
                                </a>
                            </td>
                        </tr>
                        <?php
                        $x++;
                    }
                    }else{
                        echo "<h3 style='text-align:center; font-weight: lighter; padding: 10px 0px'> Empty! </h3>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
        }
        ?>
    </div>
</section>
<script src="js/main.js"></script>
</body>
</html>
