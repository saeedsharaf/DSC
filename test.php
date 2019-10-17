
<?php
//error_reporting(0);

       $connect = mysqli_connect('localhost','root','','dsc');
       set_time_limit(0);
       //error_reporting(0);



/*
 $dashboard = "select * from dashboard ";
$dashboard_query=$cont->query($dashboard);
if($dashboard_query->num_rows > 0){
  while($drow = $dashboard_query->fetch_assoc()){
    $dash_date = $drow['date'] ;
    echo $dash_date; 
    $support_pre = "select * from score where day = '$dash_date' and name ='' and queue = 'pre' ";
    $support_post = "select * from score where day = '$dash_date' and name ='' and queue = 'post' ";
    $support_activation = "select * from score where day = '$dash_date' and name ='' and queue = 'activation' ";
    
    $support_query_pre=$cont->query($support_pre);
    $support_query_post=$cont->query($support_post);
    $support_query_activation=$cont->query($support_activation);
    $support_pre = $support_query_pre->num_rows;
    //$support_post = $support_query_post->num_rows;
    //$support_activation = $support_query_post->num_rows;

    $update_pre = "update datshboard set support_calls = '$support_pre' where date = '$dash_date' and queue = 'pre' ";
    $update_post = "update datshboard set support_calls = '$support_pre' where date = '$dash_date' and queue = 'post' ";
    $update_activation = "update datshboard set support_calls = '$support_pre' where date = '$dash_date' and queue = 'activation'";
    echo $support_pre;
    $cont->query($update_pre);
    $cont->query($update_post);
    $cont->query($update_activation);



  }

}
       

*/



/////////////////////////// below code to update no of support calls and nu of supported agent ///////////////////////////////////////
/*
$queue = 'post';

$sql ="select * from dashboard where queue = '$queue' and month = '10'";
    $result = $connect->query($sql);
    if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){
                $date = $row['date'];
                $sql1 = "select * from score where queue = '$queue' and name = '' and day = '$date'";
                $sql1_result =$connect->query($sql1);
                $calls = 0;
                $tht = 0;
                $acd_time = 0;
               
                echo $date . ' >>> '.$sql1_result->num_rows . '<br>';
                $support_agent = "update dashboard set support_agent = '$sql1_result->num_rows' where date = '$date' and queue = '$queue'";
                $connect->query($support_agent);
                while( $rows = $sql1_result->fetch_assoc()){
                    $calls += $rows['acd_calls'];
                    $acd_time+= $rows['acd_time'];


                }
                $tht = $acd_time/$calls;
                echo $acd_time . '<br>';
                echo $calls . '<br>';
                echo $tht . '<br>';
                $support_calls = "update dashboard set support_calls = '$calls',tht = '$tht' where date = '$date' and queue = '$queue'";
                $connect->query($support_calls);

        }
    }

*/

/////////////////////////////////////// below code to insert daily spv score /////////////////////////////////////////////////////////
  /*

        $select_day = "select * from dashboard where queue = 'pre' and date ='10/16/2019'";   //////// just to get date saved in db
       
        $day_result = $connect->query($select_day);
     

        while($day_row = $day_result->fetch_assoc()){
            $day = $day_row['date'];


            $sql = "select * from sv where month = '10'";

            $result = $connect->query($sql);
            $queue = 0;
            $sv_id = 0;
        while($row = $result->fetch_assoc()){
            $sv_id = $row['sv_id'];
            $sv_name = $row['name'];
            $queue = $row['queue'];

            $daily = "select * from score where sv_id = '$sv_id' and day = '$day'";
       
            $result_daily = $connect->query($daily);

            $acd_calls = 0;
            
            $acd_calls = 0;
            $acd_time = 0;
            $hold_time = 0;
            $acw_time = 0;
            $held_calls = 0;
            $aux_out_oftime = 0;
            $acw_out_oftime = 0;
            $aux_out_calls = 0;
            $acw_out_calls = 0;
            $absent = 0;
            $sick = 0;
            $emerge = 0;
            $aht = 0;
            $aht_wl = 0;
            $acw = 0;
            $avg_acw = 0;
            $hold = 0;
            $avg_hold = 0;
            //$adherence = ['adher'];
            //$fcr = 0;
            $year = 0;
            $month = 0;
            $y = 0;
            $m = 0;

           


            while($row_daily = $result_daily->fetch_assoc()){

                $y = date_create($row_daily['day']);
                $year = date_format($y,"Y") ;
                
                $month = number_format(date_format($y,'m'));

                
                $acd_calls += $row_daily['acd_calls'];
                $acd_time += $row_daily['acd_time'];
                $hold_time += $row_daily['hold_time'];
                $acw_time += $row_daily['acw_time'];
                $held_calls += $row_daily['held_calls'];
                $aux_out_oftime += $row_daily['aux_out_time'];
                $acw_out_oftime += $row_daily['acw_out_time'];
                $aux_out_calls += $row_daily['aux_out_calls'];
                $acw_out_calls += $row_daily['acw_out_calls'];
                $absent += $row_daily['absent'];
                $sick += $row_daily['sick'];
                $emerge += $row_daily['emerg'];
                //$adherence += $row_daily['adher'];
                //$fcr += $row_daily['fcr'];

            }
                $aht = round(($acd_time + $hold_time + $acw_time) / $acd_calls,0) ;
                $aht_wl =  round(($acd_time + $hold_time + $acw_time + $aux_out_oftime + $acw_out_oftime) / $acd_calls,0) ;
                $acw = round(($acw_time / ($acd_time + $hold_time + $acw_time)) *100 , 1 );
                $avg_acw = round(($acw_time / $acd_calls),1 );
                $hold = round(($hold_time / ($acd_time + $hold_time + $acw_time)) *100 , 1 );
                $avg_hold = round(($hold_time / $acd_calls),1 );
                $held_percentage = round(($held_calls / $acd_calls)*100,1);
               
                

              

           
                $nps = "select * from nps where sv_id = '$sv_id' and date = '$day'";
                $nps_result = $connect->query($nps);
                $total = 0;
                $promoter = 0;
                $detractor = 0;
                $nps_pre = 0;
                $fcr = 0;
                $agent_ttb = 0;
                $over_all_sats = 0;

                while($nps_row = $nps_result->fetch_assoc()){
                      if($nps_row['nps_rating'] > 7){
                            $promoter++;
                        } elseif ($nps_row['nps_rating'] < 6) {
                            $detractor++;
                        }else{
                            $passive ++ ;
                        }


                        if ($nps_row['fcr'] == 1) {
                            $fcr++;
                        }

                        if($nps_row['agent_sats'] > 3){
                            $agent_ttb++;
                        }elseif ($nps_row['agent_sats'] < 3) {
                            $agent_btb++;
                        }
                        if($nps_row['over_all_sats'] > 3){
                            $over_all_sats++;
                        }


                    $total ++;
                
            }

                $nps_pre = (($promoter - $detractor)/$total)*100;
                $fcr_pre = round(($fcr/$total)*100,0);
                $agent_ttb = round(($agent_ttb / $total)*100,0);
                $over_all_sats = round(($over_all_sats / $total)*100,0);
                echo $nps_pre . '<br>';


              $insert = "INSERT INTO `sv_daily`(`sv_id`, `day`,`month`,`year`,`queue`, `name`,`no_calls`, `aht`, `aht_wl`, `hold`, `avg_hold`, `acw`, `avg_acw`,`nps`, `nps_calls`, `promoter`, `detractor`,`fcr`,`agent_ttb`,`over_all_sats`,`held_percentage`) VALUES ('$sv_id','$day','$month','$year','$queue','$sv_name','$acd_calls','$aht','$aht_wl','$hold','$avg_hold','$acw','$avg_acw','$nps_pre','$total','$promoter','$detractor','$fcr_pre','$agent_ttb','$over_all_sats','$held_percentage')  ";
                $connect->query($insert);
                echo $connect->error;

                

        }
    }
*/
////////////////////////////////////////////////////////below code to update agent daily /////////////////////////////////////////////
/*
$select_day = "select * from dashboard where queue = 'pre' and month = '10' and date ='10/16/2019' ";   //////// just to get date saved in db
        $day_result = $connect->query($select_day);

        while($day_row = $day_result->fetch_assoc()){
            $day = $day_row['date'];
            $daily = "select * from score where day = '$day' and name !='' ";
            $result_daily = $connect->query($daily);
            while($row_daily = $result_daily->fetch_assoc()){


                $y = date_create($row_daily['day']);
                $year = date_format($y,"Y") ;
                $month = number_format(date_format($y,'m'));
                $login_id = $row_daily['login_id'];
                $queue = $row_daily['queue'];
                $name = $row_daily['name'];
                $spv = $row_daily['spv_name'];
                $spv_id = $row_daily['sv_id'];
                $manger_id = $row_daily['manger_id'];
                $manger = $row_daily['manger_name'];
                $acd_calls = $row_daily['acd_calls'];
                $acd_time = $row_daily['acd_time'];
                $hold_time = $row_daily['hold_time'];
                $acw_time = $row_daily['acw_time'];
                $held_calls = $row_daily['held_calls'];
                $aux_out_oftime = $row_daily['aux_out_time'];
                $acw_out_oftime = $row_daily['acw_out_time'];
                $aux_out_calls = $row_daily['aux_out_calls'];
                $acw_out_calls = $row_daily['acw_out_calls'];
                $manger_id = $row_daily['manger_id'];
                
                
                //$fcr += $row_daily['fcr'];


                $aht = round(($acd_time + $hold_time + $acw_time) / $acd_calls,0) ;
                $aht_wl =  round(($acd_time + $hold_time + $acw_time + $aux_out_oftime + $acw_out_oftime) / $acd_calls,0) ;
                $acw = round(($acw_time / ($acd_time + $hold_time + $acw_time)) *100 , 1 );
                $avg_acw = round(($acw_time / $acd_calls),1 );
                $hold = round(($hold_time / ($acd_time + $hold_time + $acw_time)) *100 , 1 );
                $avg_hold = round(($hold_time / $acd_calls),1 );
                $held_percentage = round(($held_calls / $acd_calls)*100,1);
               

                $nps = "select * from nps where date = '$day' and agent_id ='$login_id' and month = '10'";
                $nps_result = $connect->query($nps);
                $total = 0;
                $promoter = 0;
                $detractor = 0;
                $nps_pre = 0;
                $fcr = 0;
                $agent_ttb = 0;
                $ober_all_sats = 0;
                while($nps_row = $nps_result->fetch_assoc()){
                      if($nps_row['nps_rating'] > 7){
                            $promoter++;
                        } elseif ($nps_row['nps_rating'] < 6) {
                            $detractor++;
                        }else{
                            $passive ++ ;
                        }


                        if ($nps_row['fcr'] == 1) {
                            $fcr++;
                        }

                        if($nps_row['agent_sats'] > 3){
                            $agent_ttb++;
                        }elseif ($nps_row['agent_sats'] < 3) {
                            $agent_btb++;
                        }
                        if($nps_row['over_all_sats'] > 3){
                            $over_all_sats++;
                        }

                        $total ++;
                    }

                $nps_pre = (($promoter - $detractor)/$total)*100;
                $fcr_pre = round(($fcr/$total)*100,0);
                $agent_ttb = round(($agent_ttb / $total)*100,0);

                
            
            



                $insert = "INSERT INTO `agent_daily`(`login_id`,`day`, `month`, `year`, `name`, `sv`,`queue`, `no_calls`, `aht`, `aht_wl`,`acw`, `avg_acw`, `hold`, `avg_hold`,`nps`, `nps_calls`,`fcr`,`agent_ttb`,`sv_id`,`manger`,`manger_id`,`held_percentage`) VALUES ( '$login_id','$day','$month','$year','$name','$spv','$queue','$acd_calls','$aht','$aht_wl','$acw','$avg_acw','$hold','$avg_hold','$nps_pre','$total','$fcr_pre','$agent_ttb','$spv_id','$manger','$manger_id','$held_percentage')";
                $connect->query($insert);
                echo $connect->error;
                //echo $insert . '<br>';

            }


               


        }
*/
//////////////////////////////////////////////////////code to update agent mtd //////////////////////////////////////////////////////

    ///// note don't forget to set month in updata sql 

/*


        $select_day = "select * from structure ";   //////// just to get date saved in db
        $day_result = $connect->query($select_day);

        while($day_row = $day_result->fetch_assoc()){
            $login_id = $day_row['login_id'];
            $sv_id = $day_row['spv_id'];
            $sv = $day_row['spv'];
            $manger = $day_row['manger'];
            $manger_id = $day_row['manger_id'];
            $name = $day_row['name'];
            $queue = $day_row['queue'];



            $sql = "select * from score where login_id = '$login_id' and name !='' and queue = '$queue'";

            $result = $connect->query($sql);

            
            $acd_calls = 0;
            
            $acd_calls = 0;
            $acd_time = 0;
            $hold_time = 0;
            $acw_time = 0;
            $held_calls = 0;
            $aux_out_oftime = 0;
            $acw_out_oftime = 0;
            $aux_out_calls = 0;
            $acw_out_calls = 0;
            $absent = 0;
            $sick = 0;
            $emerge = 0;
            $nps_calls = 0;
            $promoter = 0;
            $detractor = 0;
            $aht = 0;
            $aht_wl = 0;
            $acw = 0;
            $avg_acw = 0;
            $hold = 0;
            $avg_hold = 0;
            $nps = 0;
            $fcr = 0;
            //$adherence = ['adher'];
            //$fcr = 0;
            $year = 0;
            $month = 0;
            $y = 0;
            $m = 0;
            $agent_target = 0;
            $held_percentage = 0;

            while($row_daily = $result->fetch_assoc()){
                $y = date_create($row_daily['day']);
                $year = date_format($y,"Y") ;
                $month = number_format(date_format($y,'m'));
                
                $acd_calls += $row_daily['acd_calls'];
                $acd_time += $row_daily['acd_time'];
                $hold_time += $row_daily['hold_time'];
                $acw_time += $row_daily['acw_time'];
                $held_calls += $row_daily['held_calls'];
                $aux_out_oftime += $row_daily['aux_out_time'];
                $acw_out_oftime += $row_daily['acw_out_time'];
                $aux_out_calls += $row_daily['aux_out_calls'];
                $acw_out_calls += $row_daily['acw_out_calls'];
                $nps_calls += $row_daily['nps_calls'];
                $promoter += $row_daily['promoter'];
                $detractor += $row_daily['detractor'];
                $agent_target += $row_daily['agent_target'];
                
                
                //$adherence += $row_daily['adher'];
                //$fcr += $row_daily['fcr'];

            }

           

            $nps_sql = "select * from nps where agent_id ='$login_id' and transfer = 'No' and month = '10' and agent_name !=''";
                $nps_result = $connect->query($nps_sql);
                $total = 0;
                $promoter = 0;
                $detractor = 0;
                $nps_pre = 0;
                $fcr = 0;
                $agent_ttb = 0;
                $ober_all_sats = 0;
                while($nps_row = $nps_result->fetch_assoc()){
                      if($nps_row['nps_rating'] > 7){
                            $promoter++;
                        } elseif ($nps_row['nps_rating'] < 6) {
                            $detractor++;
                        }else{
                            $passive ++ ;
                        }


                        if ($nps_row['fcr'] == 1) {
                            $fcr++;
                        }

                        if($nps_row['agent_sats'] > 3){
                            $agent_ttb++;
                        }elseif ($nps_row['agent_sats'] < 3) {
                            $agent_btb++;
                        }
                        if($nps_row['over_all_sats'] > 3){
                            $over_all_sats++;
                        }

                        $total ++;
                    }

                $nps_pre = (($promoter - $detractor)/$total)*100;
                $fcr_pre = round(($fcr/$total)*100,0);
                $agent_ttb = round(($agent_ttb / $total)*100,0);





                $aht = round(($acd_time + $hold_time + $acw_time) / $acd_calls,0) ;
                if(is_nan($aht)){
                    $aht = 0;
                }else{
                    
                }

                $aht_wl =  round(($acd_time + $hold_time + $acw_time + $aux_out_oftime + $acw_out_oftime) / $acd_calls,0) ;
                $acw = round(($acw_time / ($acd_time + $hold_time + $acw_time)) *100 , 1 );
                if(is_nan($acw)){
                    $acw = 0;
                }else{
                    
                }
                $avg_acw = round(($acw_time / $acd_calls),1 );
                $hold = round(($hold_time / ($acd_time + $hold_time + $acw_time)) *100 , 1 );
                if(is_nan($hold)){
                    $hold = 0;
                }else{
                    
                }
                $avg_hold = round(($hold_time / $acd_calls),1 );
                $held_percentage = round(($held_calls/$acd_calls)*100,1);

                

                if(is_nan($nps_pre)){
                    $nps_pre = 0;
                }else{
                    
                }

                
                if(is_nan($fcr_pre)){
                    $fcr_pre = 0;
                }else{
                    
                }
                
                if(is_nan($agent_ttb)){
                    $agent_ttb = 0;
                }else{
                    
                }

                //$insert = "INSERT INTO `agent`(`login_id`, `month`, `year`, `name`, `sv`, `manger`, `queue`, `no_calls`, `aht`, `aht_wl`, `acw`, `avg_acw`, `hold`, `avg_hold`, `nps`, `fcr`, `agent_ttb`, `nps_calls`, `manger_id`, `sv_id`) VALUES ('$login_id','$month','$year','$name','$sv','$manger','$queue','$acd_calls','$aht','$aht_wl','$acw','$avg_acw','$hold','$avg_hold','$nps_pre','$fcr_pre','$agent_ttb','$nps_calls','$manger_id','$sv_id')";

                $insert = "update agent set no_calls = '$acd_calls', aht = '$aht', aht_wl = '$aht_wl', acw = '$acw', avg_acw = '$avg_acw', hold = '$hold', avg_hold = '$avg_hold',held_percentage = '$held_percentage', nps = '$nps_pre', fcr = '$fcr_pre', agent_ttb = '$agent_ttb' , nps_calls = '$total' where login_id = '$login_id' and month = '10'";

                $connect->query($insert);
                echo $connect->error;
                //echo $insert . '<br>';
           


        }
    

*/
///////////////////////////////////////////////////// below code to update score ber agent ////////////////////////////////////////////
  

/*


$month = 10;
$year = 2019;





$sql = "select * from agent where month = '$month' and year = '$year'";
$result = $connect->query($sql);
while($row = $result->fetch_assoc()){
    $login_id = $row['login_id'];



        $aht_score = 0;
        $hold_score = 0;
        $nps_score = 0;
        $fcr_score = 0;
        $agent_ttb_score = 0;
        $complaint_score = 0;
        $qualtiy_score = 0;
        $adher_score = 0;



    if($row['queue'] == 'pre'){////// to updated pre score

       


        if($row['aht_wl'] > 290 ){
            $aht_score = 0;
        }else{
            $aht_score = 10;
        }

        if($row['hold'] > 2 ){
            $hold_score = 0;
        }else{
            $hold_score = 5;
        }

        if($row['held_percentage'] > 16){
            $held_score = 0;
        }else{
            $held_score = 5;
        }


        if($row['nps'] > 51){
            $nps_score = 20;

        }else if($row['nps'] >= 50 or $row['nps_calls'] == 0 ){
            $nps_score = 15;
        }else if ($row['nps'] >= 49 and $row['nps'] < 50 ){
            $nps_score = 12;
        }else if ($row['nps'] >= 48 and $row['nps'] < 49 ){
            $nps_score = 9;
        }else if ($row['nps'] >= 47 and $row['nps'] < 48){
            $nps_score = 7.5;
        }else{
            $nps_score = 0;
        }

        if($row['fcr'] >= 60 or $row['nps_calls'] == 0){
            $fcr_score = 10;
        }else{
            $fcr_score = 0;
        }

        if($row['agent_ttb'] >= 90 or $row['nps_calls'] == 0){
            $agent_ttb_score = 10;

        }else{
            $agent_ttb_score = 0;
        }

        
         if($row['ctc'] < 1){
            $ctc_score = 10;
        }else if ($row['ctc'] == 1){
            $ctc_score = 5;
        }else{
            $ctc_score = 0;
        }


        if($row['ctb'] < 1){
            $ctb_score = 5;
        }else if ($row['ctb'] == 1){
            $ctb_score = 2.5;
        }else{
            $ctb_score = 0;
        }


        if($row['nc'] < 2){
            $nc_score = 5;
        }else if ($row['nc'] > 1 or $row['nc'] < 4){
            $nc_score = 2.5;
        }else{
            $nc_score = 0;
        }


        if($row['compliance'] > 0){
            $compl_score = 0;
        }else {
            $compl_score = 5;
        }


        $qualtiy_score = $ctc_score + $ctb_score + $nc_score + $compl_score ;


        if($row['adherance'] >= 0.95){
            $adher_score = 5;
        }


        $absent_score = $row['absent'] * 5 ;
        $emerg_score = $row['emerg'] * 1 ;
        $sick_score = $row['sick'] * 1 ;

        $absentezem_score = ($absent_score + $emerg_score + $sick_score) * -1 ;

        if($row['acw'] > 2 ){
            $acw_score = -2;
        }else{
            $acw_score = 0 ;
        }

        $complaint_score = 15;


        $final_score = $aht_score + $hold_score + $nps_score + $fcr_score + $agent_ttb_score + $complaint_score + $qualtiy_score + $adher_score +$absentezem_score + $acw_score +$held_score;

        $update = "update agent set aht_score = '$aht_score' , hold_score = '$hold_score', held_score = '$held_score',nps_score = '$nps_score', fcr_score = '$fcr_score', agent_ttb_score = '$agent_ttb_score', adher_score = '$adher_score', quality_score = '$qualtiy_score', complaint_score = '$complaint_score', absent_score = '$absentezem_score', acw_score = '$acw_score', final_score = '$final_score' where login_id = '$login_id' and month = '$month' and year = '$year' ";

        $connect->query($update);
        echo $connect->error . '<br';


    }elseif ($row['queue'] == 'post') {////////////// to updated postpaid score

        if($row['aht_wl'] <= 430 ){
            $aht_score = 15;
        }else if ($row['aht_wl'] > 430 and $row['aht_wl'] <= 450 ){
            $aht_score = 11.25;
        }else{
            $aht_score = 0;
        }



        if($row['avg_hold'] <= 20 ){
            $hold_score = 5;
        }else if($row['avg_hold'] > 20 and $row['avg_hold'] <= 30 ){
            $hold_score = 3.75;
        }else{
            $hold_score = 0;
        }


        if($row['acw'] <= 5){
            $acw_score = 7.5;
        }else{
            $acw_score = 0;
        }


        if($row['nps'] >= 25 or $row['nps_calls'] == 0){
            $nps_score = 20;

        }else if ($row['nps'] > 20 and $row['nps'] < 25 ){
            $nps_score = 15;
        }else if ($row['nps'] > 18 and $row['nps'] < 20 ){
            $nps_score = 10;

        }else{
            $nps_score = 0;
        }

       

        if($row['agent_ttb'] >= 85 or $row['nps_calls'] == 0){
            $agent_ttb_score = 10;

        }else if ($row['agent_ttb'] >= 83 and $row['agent_ttb'] < 85){    
            $agent_ttb_score = 7.5;
        }else{
            $agent_ttb_score = 0;
        }

       
        
        if($row['ctc'] < 1){
            $ctc_score = 10;
        }else if ($row['ctc'] == 1){
            $ctc_score = 5;
        }else{
            $ctc_score = 0;
        }


        if($row['ctb'] < 1){
            $ctb_score = 5;
        }else if ($row['ctb'] == 1){
            $ctb_score = 2.5;
        }else{
            $ctb_score = 0;
        }


        if($row['nc'] < 2){
            $nc_score = 5;
        }else if ($row['nc'] > 1 or $row['nc'] < 4){
            $nc_score = 2.5;
        }else{
            $nc_score = 0;
        }


        if($row['compliance'] > 0){
            $compl_score = 0;
        }else {
            $compl_score = 2.5;
        }




        if($row['adherance'] >= 0.95){
            $adher_score = 5;
        }else if ($row['adherance'] >= 0.93 and $row['adherance'] < 0.95){
            $adher_score = 2.5;
        }else{
            $adher_score = 0;
        }


        $absent_score = $row['absent'] * 5 ;
        $emerg_score = $row['emerg'] * 1 ;
        $sick_score = $row['sick'] * 1 ;

        $absentezem_score = ($absent_score + $emerg_score + $sick_score) * -1 ;


         $complaint_score = 15;
         $qualtiy_score = $ctc_score + $ctb_score + $nc_score + $compl_score ;

        $final_score = $aht_score + $hold_score + $nps_score + $agent_ttb_score + $complaint_score + $qualtiy_score + $adher_score + $absentezem_score ;

        $update = "update agent set aht_score = '$aht_score' , hold_score = '$hold_score', nps_score = '$nps_score', fcr_score = '$fcr_score', agent_ttb_score = '$agent_ttb_score', adher_score = '$adher_score', quality_score = '$qualtiy_score', complaint_score = '$complaint_score', absent_score = '$absentezem_score' , final_score = '$final_score' where login_id = '$login_id' and month = '$month' and year = '$year'";

        $connect->query($update);
        echo $connect->error . '<br>';
    }
}
*/

/////////////////////////////////////// update sv mtd ////////////////////////////////////////////// 
/*
      $select_spv = "select * from member where access = 'super'";   //////// just to get spv id 
        $spv = $connect->query($select_spv);
        echo $connect->error;
        while($sv_row = $spv->fetch_assoc()){
            $spv_id = $sv_row['login_id'];

            //echo $spv_id;
            
            $sql_sv = "select * from score where sv_id = '$spv_id' and name !='' ";
            $result_sql = $connect->query($sql_sv);
            if ($result_sql->num_rows > 0) {
              
                $acd_calls = 0;
                $acd_time = 0;
                $hold_time = 0;
                $acw_time = 0;
                $held_calls = 0;
                $aux_out_oftime = 0;
                $acw_out_oftime = 0;
                $aux_out_calls = 0;
                $acw_out_calls = 0;
                $manger_id = 0;
               


                while($row = $result_sql->fetch_assoc()){
                


                $y = date_create($row['day']);
                $year = date_format($y,"Y") ;
                $month = number_format(date_format($y,'m'));
                $login_id = $row['login_id'];
                $queue = $row['queue'];
                $name = $row['name'];
                $spv_name = $row['spv_name'];
                
                
                $manger_id = $row['manger_id'];
                $manger = $row['manger_name'];
                $acd_calls += $row['acd_calls'];
                $acd_time += $row['acd_time'];
                $hold_time += $row['hold_time'];
                $acw_time += $row['acw_time'];
                $held_calls += $row['held_calls'];
                $aux_out_oftime += $row['aux_out_time'];
                $acw_out_oftime += $row['acw_out_time'];
                $aux_out_calls += $row['aux_out_calls'];
                $acw_out_calls += $row['acw_out_calls'];
               
                


              

            }



                $aht = round(($acd_time + $hold_time + $acw_time) / $acd_calls,0) ;
                $aht_wl =  round(($acd_time + $hold_time + $acw_time + $aux_out_oftime + $acw_out_oftime) / $acd_calls,0) ;
                $acw = round(($acw_time / ($acd_time + $hold_time + $acw_time)) *100 , 1 );
                $avg_acw = round(($acw_time / $acd_calls),1 );
                $hold = round(($hold_time / ($acd_time + $hold_time + $acw_time)) *100 , 1 );
                $avg_hold = round(($hold_time / $acd_calls),1 );
                $held_percentage = round(($held_calls/$acd_calls)*100,1);
                
                


               //$insert = "INSERT INTO `sv`(`sv_id`, `manger_id`, `month`, `year`, `queue`, `name`, `manger`, `no_calls`, `aht`, `aht_wl`, `hold`,`acw`,`nps`, `nps_calls`, `promoter`, `detractor`, `passive`, `fcr`, `agent_ttb`) VALUES ('$spv_id','$manger_id','$month','$year','$queue','$spv_name','$manger','$acd_calls','$aht','$aht_wl','$hold','$acw','$nps','$nps_calls','$promoter','$detractor','$passive','$fcr','$agent_ttb')";

               $insert = "update sv set no_calls = '$acd_calls', aht = '$aht', aht_wl = '$aht_wl', hold = '$hold',  avg_hold='$avg_hold', acw = '$acw', avg_acw = '$avg_acw',held_percentage = '$held_percentage' where sv_id = '$spv_id' and month = '10'";
                $connect->query($insert);
                //echo $connect->error;
                //echo 'spv '. $spv_name . ' '. $acd_calls . '>> ' . $spv_id . '<br>'; 
                echo $insert . '<br>';
               
            }else{
                echo 'not found';
            }
           
             $sql_quality = "select * from agent where sv_id = '$spv_id' and month = '10' " ;
             $result_quality = $connect->query($sql_quality);
             $ctc = 0;
             $ctb = 0;
             $nc = 0;
             $absent = 0;
             $sick = 0;
             $emerg = 0;
             while($quality_row = $result_quality->fetch_assoc()){
                $ctc += $quality_row['ctc'];
                $nc += $quality_row['nc'];
                $ctb += $quality_row['ctb'];
                $absent += $quality_row['absent'];
                $sick += $quality_row['sick'];
                $emerg += $quality_row['emerg'];

             }

             $update_quality = " update sv set ctc = '$ctc' , ctb = '$ctb', nc = '$nc', absent = '$absent', sick = '$sick', emerge = '$emerg' where sv_id = '$spv_id' and month = '10' " ;
             $connect->query($update_quality);
             echo $connect->error;

          

             $nps = "select * from nps where sv_id = '$spv_id' and transfer = 'no' and month = '10'";
             $nps_result = $connect->query($nps);
             $promoter = 0;
             $detractor = 0 ;
             $passive = 0 ;
             $agent_ttb = 0 ;
             $agent_btb = 0 ;
             $total = 0 ;
             $over_all_sats = 0 ;
             $nps = 0;
             $fcr = 0 ;

             while($nps_row = $nps_result->fetch_assoc()){

                if($nps_row['nps_rating'] > 7){
                    $promoter++;
                } elseif ($nps_row['nps_rating'] < 6) {
                    $detractor++;
                }else{
                    $passive ++ ;
                }


                if ($nps_row['fcr'] == 1) {
                    $fcr++;
                }

                if($nps_row['agent_sats'] > 3){
                    $agent_ttb++;
                }elseif ($nps_row['agent_sats'] < 3) {
                    $agent_btb++;
                }


                if($nps_row['over_all_sats'] > 3){
                    $over_all_sats++;
                }

                $total ++;

             }

             $nps = (($promoter - $detractor)/$total) * 100 ;
             $fcr = ($fcr / $total)*100;
             $agent_ttb = ($agent_ttb / $total)*100;
             $over_all_sats = ($over_all_sats / $total) * 100;

             $update_nps = " update sv set nps = '$nps', nps_calls = '$total' , promoter = '$promoter', detractor = '$detractor' , passive = '$passive', fcr = '$fcr', agent_ttb = '$agent_ttb' , over_all_sats = '$over_all_sats' where sv_id = '$spv_id' and month = '10' " ;
             $connect->query($update_nps);
             echo $connect->error;
             

        }

*/

        ////////////////////////////////////// below dat to update nps dashboard mtd //////////////////////////////////
  
        $select = "select * from dashboard where month = 10";
        $select_result = $connect->query($select);


        while($select_row = $select_result->fetch_assoc()){
            $date = $select_row['date'];
            


        $sql_pre = "select * from nps where queue ='pre' and date = '$date'";
        $result_pre = $connect->query($sql_pre);
        $promoter = 0;
        $detractor = 0;
        $passive = 0;
        $fcr = 0;
        $agent_ttb = 0;
        $agent_btb = 0;
        $over_all_sats = 0 ;
        $total_pre = 0;
        $nps_pre = 0;

        if($result_pre->num_rows > 0 ){
            while($row_pre = $result_pre->fetch_assoc()){
                if($row_pre['nps_rating'] > 7){
                    $promoter++;
                } elseif ($row_pre['nps_rating'] < 6) {
                    $detractor++;
                }else{
                    $passive ++ ;
                }


                if ($row_pre['fcr'] == 1) {
                    $fcr++;
                }

                if($row_pre['agent_sats'] > 3){
                    $agent_ttb++;
                }elseif ($row_pre['agent_sats'] < 3) {
                    $agent_btb++;
                }


                if($row_pre['over_all_sats'] > 3){
                    $over_all_sats++;
                }

                $total_pre ++;
                $nps_pre = ($promoter - $detractor)/$total_pre;
            }

          $update_pre = "update dashboard set promoter = '$promoter', detractor = '$detractor', passive = '$passive', fcr = '$fcr', agent_ttb = '$agent_ttb', agent_btb = '$agent_btb', over_all_sats = '$over_all_sats', total = '$total_pre' , nps = '$nps_pre' where date = '$date' and queue = 'pre'";
          $connect->query($update_pre);
          echo $connect->error;
        }



        $sql_post = "select * from nps where queue ='post' and date = '$date'";
        $result_post = $connect->query($sql_post);
        $promoter_post = 0;
        $detractor_post = 0;
        $passive_post = 0;
        $fcr_post = 0;
        $agent_ttb_post = 0;
        $agent_btb_post = 0;
        $over_all_sats_post = 0 ;
        $total_post = 0;
        $nps_post = 0;

        if($result_post->num_rows > 0 ){
            while($row_post = $result_post->fetch_assoc()){
                if($row_post['nps_rating'] > 7){
                    $promoter_post++;
                } elseif ($row_post['nps_rating'] < 6) {
                    $detractor_post++;
                }else{
                    $passive_post ++ ;
                }


                if ($row_post['fcr'] == 1) {
                    $fcr_post++;
                }

                if($row_post['agent_sats'] > 3){
                    $agent_ttb_post++;
                }elseif ($row_post['agent_sats'] < 3) {
                    $agent_btb_post++;
                }


                if($row_post['over_all_sats'] > 3){
                    $over_all_sats_post++;
                }

                $total_post ++;
                $nps_post = ($promoter_post - $detractor_post)/$total_post;


            }
           

            $update_post = "update dashboard set promoter = '$promoter_post', detractor = '$detractor_post', passive = '$passive_post', fcr = '$fcr_post', agent_ttb = '$agent_ttb_post', agent_btb = '$agent_btb_post', over_all_sats = '$over_all_sats_post',total = '$total_post', nps = '$nps_post' where date = '$date' and queue = 'post'";
          $connect->query($update_post);
          echo $connect->error;
        }

        }

  
        ///////////////////////////////////////////   /////////////////////////////////////
/*

        ?>


        <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary" onclick="prim(this)">prim</span>
              <span class="badge filter badge-info " data-color="blue" onclick="blue()">blue</span>
              <span class="badge filter badge-success" data-color="green" onclick="green()">gr</span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <div id="s">
            
        </div>
        
        
        
      
      </ul>

      <script type="text/javascript">
          function prim(){
            var sql = '<?php $sql = "update member set color = 1 ";
            $connect->query($sql);
            //echo $connect->error;
            echo $sql;
            ?>'
            document.getElementById("s").innerHTML = sql;

            
          }
           function blue(){
            document.getElementById('s').innerHTML = 'blue';
          }
           function green(){
            document.getElementById('s').innerHTML = 'grenn';
          }
      </script>

      */

