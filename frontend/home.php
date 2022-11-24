<?php
    include_once 'header.php';
?>

<section class="index-intro">
    <h1><?php
        //show username 
        if ($_SESSION['username'] != "") {
            echo "Welcome, " . $_SESSION['username'] . "!";
    } ?> </h1>

    <p>You can check all the available books in our system!</p>
    
    <ul>
        <?php
            require_once '../backend/dbh.php';
            require_once '../backend/functions.php';

            $sqllist = "select * from book";
            $relust = mysqli_query($connection, $sqllist);
            $list = mysqli_fetch_array($relust);
            
            //use a while statement to show all the books in the database
            //uid in table records is compared with username to get the information on books status
            while ($list = mysqli_fetch_array($relust)) {
                $sql = "select * from records";
                $sqlrelust = mysqli_query($connection, $sql);
                $rows = mysqli_fetch_array($sqlrelust);
                $state = $rows['state'];
                
                echo "<li>
                    <img src=" . $list['img'] . ">
                    <h3>" . $list['bookname'] . "</h3>
                    <h4><span>Author: " . $list['author'] . "</span><span> Category: " . $list['category'] . "</span></h4>
                    <p>" . $list['description'] . "</p>
                    <p>  
                ";?>
                  
                <!-- <a <?php if($state=='reading'){ echo "style='pointer-events: none; background-color: #999;'";} ?> href="action.php?original=<?php  echo $state; ?>&action=reading&bid=<?php echo $list['bid']; ?>">Reading</a>
                
                <a <?php if($state=='toread'){ echo "style='pointer-events: none;background-color: #999;'";} ?> href="action.php?original=<?php echo $state; ?>&action=toread&bid=<?php echo $list['bid']; ?> ">To read</a>

                <a <?php if($state=='read'){ echo "style='pointer-events: none;background-color: #999;'";} ?> href="action.php?original=<?php echo $state;?>&action=read&bid=<?php echo $list['bid']; ?> ">Read</a>

                <a <?php if($state=='nofinish'){ echo "style='pointer-events: none;background-color: #999;'";} ?> href="action.php?original=<?php echo $state;?>&action=nofinish&bid=<?php echo $list['bid']; ?> ">Did Not Finish</a>

                <a <?php if($state=='favorite'){ echo "style='pointer-events: none;background-color: #999;'";} ?> href="action.php?original=<?php echo $state;?>&action=favorite&bid=<?php echo $list['bid']; ?> ">Favorite</a> -->
      
                </p>
                </li>

          <?php      }
             
        ?>
     
      </ul>


</section>
    

<?php
    include_once 'footer.php';
?>