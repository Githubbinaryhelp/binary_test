<?
echo "<table class='table table-bordered table-hover'>";
echo " <tbody>";
$query="SELECT * FROM Messages";
    //echo $query;
    include "Student6.ConnectString.php";
    $connect = mysqli_connect($host_name, $user_name, $password, $database);
    $result=mysqli_query($connect,$query) or die(mysqli_error()); ;
    $row_count = mysqli_num_rows($result);
    mysqli_close($connect);
    //printf("Result set has %d rows.\n", $row_cnt);
    //echo "num=$row_cnt<br>";
    while($ResultsArray = mysqli_fetch_array($result)) 
    {
      
          echo '<tr>';
              for ($i = 0; $i <= $col_count; $i++)
              { //2nd for loop
                  echo "<td><img src='images/UserIcon.png' width='128px'></td>";
                  echo '<td>';
                  echo $ResultsArray["Message"];
                  echo'</td>';
              }
          echo '</tr>';

    } // while($ResultsArray = mysqli_fetch_array($result)) 
echo " </tbody>";
echo " </table>";
    ?>