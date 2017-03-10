<?php
/*
 * Created: Setiaji Kurniawan
 * Email: setiaji.kurniawan@gmail.com
  */
$years = array_combine(
        range(1818,2121), 
        range(1818,2121)
        );

$days = array(
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday',
    'Sunday'
);

echo "<form action='' method='post'>";
echo "<input type='hidden' name='action' value='submit' />";

/* --- year selection ---*/
echo "<select name='Years'>";
echo "<option value='' type='submit'>Year</option>";
    
foreach($years as $key => $value) 
    {
        $category = htmlspecialchars($value); 
        echo '<option value="'. $value .'">'. $category .'</option>';        
    }

echo "</select>";

/*--- day selection ---*/
echo "<select name='Days'>";
echo "<option value='' type='submit'>Day</option>";
    
foreach($days as $key => $value) 
    {
        $hari = htmlspecialchars($value); 
        echo '<option value="'. $value .'">'. $hari .'</option>';        
    }

echo "</select>";
echo "<input id='year-submit' type='submit' name='submit' value='Process'>";
echo "</form>";

if (isset($_POST['action'])) {
    
    $selected_year = $_POST['Years'];
    $selected_day = $_POST['Days'];
    echo '<table class="calendar">';
    echo '<th colspan="4" class="year">'.$selected_year.'</th>';

    // Table of months
    for ($row=1; $row<=4; $row++) {
	echo '<tr>';
	for ($column=1; $column<=3; $column++) {
		echo '<td class="month">';
		$month++;

		// Month Cell
                $first_day_in_month=date('w',mktime(0,0,0,$month,1,$selected_year));
		$month_days=date('t',mktime(0,0,0,$month,1,$selected_year));
		
		if ($first_day_in_month==0){
		    $first_day_in_month=7;                 
		}
                
                echo '<table>';
                $dateObj   = DateTime::createFromFormat('!m', $month);
                $monthName = $dateObj->format('F');
                echo $monthName;
		echo '<th colspan="7">'.$months[$month-1].'</th>';
		echo '<tr class="days"><td>Monday</td><td>Tuesday</td><td>Wednesday</td><td>Thursday</td><td>Friday</td>';
		echo '<td class="sat" bgcolor="blue">Saturday</td><td class="sun" bgcolor="red">Sunday</td></tr>';
		echo '<tr>';
                
                for($i=1; $i<$first_day_in_month; $i++) {
			echo '<td> </td>';
		}
                
                for($day=1; $day<=$month_days; $day++) {
			$pos=($day+$first_day_in_month-1)%7;
			$class = (($day==$current_day) && ($month==$current_month)) ? 'today' : 'day';
			$class .= ($pos==6) ? ' sat' : '';
			$class .= ($pos==0) ? ' sun' : '';
                                                
                        if ($pos==0) echo '</tr><tr>';  
                        
                        if ($day == $month_days and $class == 'day sat'){                                                        
                            echo '<td bgcolor="green" class="'.$class.'">'.$day.'</td>';                            
                        }else{
                            echo '<td class="'.$class.'">'.$day.'</td>';                            
                        }                        
		}                
                echo '</tr>';
		echo '</table>';                
		echo '</td>';
	}
	echo '</tr>';
    }
    echo '</table>';
}

?>
