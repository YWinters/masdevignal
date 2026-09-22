


<?php

include('database/connection.php');
/*$sql = "INSERT INTO reserveringen (start_datum, eind_datum)
VALUES ('".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."')";


if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/
$current_year = date(Y);

if (isset($_GET['start_month3'])){
  $start_month3 = date_create($_GET['start_month3']);
}

if (!isset($start_month3)){
  $month = date(m);
  if ($month > 8) {
    $current_year++;
  }
  $start_month3 = date_create($current_year."/07/01");
}



$date_string = date_format($start_month3,"m/d/Y");

$diff1Day = new DateInterval('P1M');
$diff2Day = new DateInterval('P2M');

$d1 = clone $start_month3;

$months = array($d1,$d2,$d3);

echo '<input type="hidden" id="start_month3" value="'.$date_string.'" >';
$bookeddays = 0;
for ($mIndex = 0; $mIndex<1; $mIndex++)
{
  $current_month = $months[$mIndex];
  
  echo " <article class='4u 12u(mobile) special'> <table class='cal'>   <caption>";

    echo "<span class='pointer prev' onclick='loadCalendar3(-1);'> &larr;</span>";

    echo "<span class='pointer next' onclick='loadCalendar3(1);'>&rarr; </span>";


 

  echo date_format($current_month,"F Y");

  
  $month_check =  date_format($current_month,'n');
  $dayofweek = date_format($current_month,"N");
  $current_month->sub(new DateInterval('P'.($dayofweek-1).'D'));
  echo "</caption><thead>
        <tr>
          <th>Ma</th>
          <th>Di</th>
          <th>Wo</th>
          <th>Do</th>
          <th>Vr</th>
          <th>Za</th>
          <th>Zo</th>
        </tr>
      </thead><tbody>";

  
  for ($i = 0; $i<6 ;$i++)
  {
         echo "<tr>";
         
          for ($j=0;$j<7;$j++)
          {
            if ($month_check != date_format($current_month,'n'))
            {
              echo "<td class='off'><a href=''>".date_format($current_month,'j')."</a></td>";
            }
            else
            {
              $dateMin1 = clone $current_month;
              $datePlus1 = clone $current_month;
              //$dateMin1->sub(new DateInterval("P1D"));
              $datePlus1->add(new DateInterval("P1D"));
              $query = "SELECT * FROM reserveringen where (house_type = 1 OR house_type = 3) AND start_datum < '".date_format($datePlus1,'Y-m-d H:i:s'). "' AND eind_datum > '".date_format($current_month,'Y-m-d H:i:s')."'";

              $result = $conn->query($query);
                if ($result = $conn->query($query)) {

                    /* determine number of rows result set */
                    $row_cnt = $result->num_rows;

                    if ($row_cnt> 0)
                    {
                      $bookeddays++;
                      if ($bookeddays==1){
                        echo "<td class='pointer triangle-start' title='Not available'>".date_format($current_month,'j')."</td>";
                      } else {
                         echo "<td class='active pointer' title='Not available'><a href=''>".date_format($current_month,'j')."</a></td>";
                      }
                     
                    }
                    else
                    {

                      $price = 1250;

                      //Juli-Augustus 2017: EUR 3000,-/week
                      //21 mei tot 2 juli 2017: EUR 1950,-/week
//26 maart tot 21 mei 2017: EUR 1500,-/week
//10 januari tot 26 maart 2017: EUR 1250,-/week
//4 september tot 1 november 2017: EUR 1950,-/week

                      $timestamp = $current_month->getTimestamp();
                      if ($timestamp > date_create('01-07-2017')->getTimestamp() && $timestamp < date_create('03-09-2017')->getTimestamp() ) {
                        $price = 3000;
                      }
                      if ($timestamp > date_create('20-05-2017')->getTimestamp() && $timestamp < date_create('02-07-2017')->getTimestamp() ) {
                        $price = 1950;
                      }
                      if ($timestamp > date_create('25-03-2017')->getTimestamp() && $timestamp < date_create('21-05-2017')->getTimestamp() ) {
                        $price = 1500;
                      }
                      if ($timestamp > date_create('04-09-2017')->getTimestamp() && $timestamp < date_create('05-11-2017')->getTimestamp() ) {
                        $price = 1950;
                      }

                      //
                      if ($bookeddays > 0) {
                         echo "<td class='pointer triangle-end'".date_format($current_month,'j')."</td>";
                          $bookeddays = 0;
                        } else {
                          if ($timestamp > date_create('30-06-2018')->getTimestamp() && $timestamp < date_create('02-09-2018')->getTimestamp() ) {
                              echo "<td class='active pointer' title='Not available'>".date_format($current_month,'j')."</td>";

                          } else {
                              echo "<td class='pointer'><a href=''>" . date_format($current_month, 'j') . "</a></td>";
                          }
                        }

                    

                     
                    }
                    $result->close();
                }
            }
            $current_month->add(new DateInterval('P1D'));
          }
        echo "</tr>";
  }
  


  echo "</tbody></table></article> ";
}



$conn->close();

?>

