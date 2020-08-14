<?php

include '../resources/config/config.php';
include '../resources/config/functions.php';

$url = "http://livescore-api.com/api-client/scores/live.json?key=".KEY."&secret=".SECRET."&lang=ar";
$json = file_get_contents($url);
$data = json_decode($json, true);

/*var_dump($data['data']['match']);*/

if (isset($_POST["change_timezone"])) {
    $timezone = $_POST['change_timezone'];
}else{
    $timezone = "Africa/Algiers";
}

$Not_started = "NOT STARTED";
$In_play = "IN PLAY";
$Half_timebreak = "HALF TIME BREAK";
$Finished = "FINISHED";
$AddedTime = "ADDED TIME";

$yesterday = date('Y-m-d',strtotime("-1 days"));
$urlYesterday = "http://livescore-api.com/api-client/scores/history.json?key=dPfffBC9NHq1VlMv&secret=KGBuHyTf2XIpW3laSAp8b1hZJH0E2M9N&from=".$yesterday."&to=".$yesterday."&lang=ar";
$jsonYesterday = file_get_contents($urlYesterday);
$dataYesterday = json_decode($jsonYesterday, true);

$tommorow = date('Y-m-d',strtotime("+1 days"));
$urlTommorow = "http://livescore-api.com/api-client/scores/history.json?key=dPfffBC9NHq1VlMv&secret=KGBuHyTf2XIpW3laSAp8b1hZJH0E2M9N&from=".$tommorow."&to=".$tommorow."&lang=ar";
$jsonTommorow = file_get_contents($urlTommorow);
$dataTommorow = json_decode($jsonTommorow, true);

?>

<html dir="rtl" lang="ar" style="transform: none;">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>يلا شوت - yalla shoot - كورة 4 لايف - KOOORA4LIVE</title>
        <link rel="stylesheet" href="../public/styles/style.css">
    </head>
    <body style="transform: none;">
        <?php include '../resources/layouts/header.php' ?>
        <div class="under-header">
        </div>
        <div id="content-wrapper" class="container" style="transform: none;">
            <?php include '../resources/layouts/sidebarright.php' ?>
            <div class="alba-md-71 col-xs-12" id="main-wrapper"
                style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="theiaStickySidebar"
                    style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                    <div class="alba-live-table box">
                        <div class="box-title">
                            <h2 class="title">يلا شوت</h2>
                            <div class="tabselect mrl40">
                                <form action="#" method="post">
                                    <select class="blue-select" id="change_timezone" name="change_timezone" onchange="this.form.submit()">
                                        <option value="Asia/Riyadh" rel="بتوقيت الرياض"> بتوقيت الرياض</option>
                                        <option value="Africa/Cairo" rel="بتوقيت القاهرة"> بتوقيت القاهرة</option>
                                        <option value="Africa/Algiers" rel="بتوقيت المغرب" >توقيت المغرب</option>
                                        <option value="Asia/Beirut" rel="بتوقيت بيروت"> بتوقيت بيروت</option>
                                        <option value="Africa/Algiers" rel="بتوقيت الجزائر">توقيت الجزائر</option>
                                        <option value="Asia/Kuwait" rel="بتوقيت الكويت"> بتوقيت الكويت</option>
                                        <option value="Africa/Tunis" rel="بتوقيت تونس"> بتوقيت تونس</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="tab filter-days">
                            <a id="" class="tablinks yesterday" href="#yesterday">الأمس</a>
                            <a id="" class="tablinks today active" href="#today">اليوم</a>
                            <a id="" class="tablinks tommorw" href="#tommorw">الغد</a>
                        </div>
                        <div class="contents widget-content" id="content">
                        <div id="today" class="tabcontent">
                            <?php 
                                foreach ($data['data']['match'] as $_match) {
                            ?>
                                <div class=" m_block alba_sports_events-event_item started <?php if($_match['status'] == $Finished) { echo 'gools'; }elseif ($_match['status'] == $Not_started) {echo 'comming'; }?>">
                                    <a href="../templates/statistic.php?match_id=<?=$_match['id']?>">
                                        <div class="alba_sports_events-event_mask">
                                        <?php 
                                            if($_match['status'] == $Finished) { 
                                        ?>
                                            <div class="event_mask_inner ">
                                                <div class="h3 alba_sports_events-event_mask_inner_text orange">التفاصيل اللقاء</div>    
                                            </div>
                                        <?php
                                            }elseif ($_match['status'] == $Not_started) {
                                        ?>
                                            <div class="event_mask_inner ">
                                                <div class="h3 alba_sports_events-event_mask_inner_text ">تنطلق بعد قليل</div>
                                            </div>
                                        <?php 
                                            }elseif ($_match['status'] == $In_play || $_match['status'] == $AddedTime || $_match['status'] == $Half_timebreak) {
                                        ?>
                                            <div class="event_mask_inner ">
                                                <div class="h3 alba_sports_events-event_mask_inner_text red">التفاصيل المباراة</div>
                                            </div>
                                        <?php 
                                            }
                                        ?>
                                        </div>
                                        <div class="event_inner">
                                            <div class="team-aria team-first">
                                                <div class="team">
                                                    <div class="alba-team_logo"></div>
                                                    <div class="alba_sports_events-team_title">
                                                        <?=$_match['home_name']?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="event_title_wrapper match-data">
                                                <div class="matchResult">
                                                    <span class="result"><?=$_match['score'][0]?></span>
                                                    <div class="match-data">
                                                        <h3 class="matchTime"><?=convert($_match['scheduled'], $timezone)?></h3>
                                                        <div class="matchStatus">
                                                        <?php
                                                            if ($_match['status'] == $In_play || $_match['status'] == $AddedTime || $_match['status'] == $Half_timebreak) {
                                                        ?>
                                                            <h5 class="status">
                                                                <p>جارية الان</p>
                                                            </h5>
                                                        <?php
                                                            }elseif ($_match['status'] == $Finished){
                                                        ?>
                                                            <h5 class="status">
                                                                <p>انتهت</p>
                                                            </h5>
                                                        <?php
                                                            }elseif ($_match['status'] == $Not_started){
                                                        ?>
                                                            <h5 class="status">
                                                                <p>بعد قليل</p>
                                                            </h5>
                                                        <?php
                                                            }
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <span class="result"><?=$_match['score'][4]?></span>
                                                </div>
                                            </div>
                                            <div class="team-aria team-second">
                                                <div class="team">
                                                    <div class="alba-team_logo"></div>
                                                    <div class="h2 alba_sports_events-team_title">
                                                        <?=$_match['away_name']?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="chanels-fix">
                                            <div class="events-info">
                                                <!--<span class="mic">
                                                    <i aria-hidden="true" class="fa fa-microphone">
                                                        <?//=$_match['location']?>
                                                    </i>
                                                </span>
                                                <span class="tv hidden-xs hidden-sm">
                                                    <i aria-hidden="true" class="fa fa-television">
                                                    </i>
                                                    بي ان سبورت 1+2
                                                </span>
                                                <span class="cup">
                                                    <i aria-hidden="true" class="fa fa-trophy">
                                                        <?//=$_match['competition_name']?>
                                                    </i>
                                                </span>-->
                                            </div>
                                        </div>
                                                        
                                    </a>
                                </div>
                            <?php
                                }
                            ?>
                            </div>

                            <div id="yesterday" class="tabcontent">
                            <?php 
                                foreach ($dataYesterday['data']['match'] as $_match) {
                            ?>
                                <div class=" m_block alba_sports_events-event_item started <?php if($_match['status'] == $Finished) { echo 'gools'; }elseif ($_match['status'] == $Not_started) {echo 'comming'; }?>">
                                    <a href="../templates/statistic.php?match_id=<?=$_match['id']?>">
                                        <div class="alba_sports_events-event_mask">
                                        <?php 
                                            if($_match['status'] == $Finished) { 
                                        ?>
                                            <div class="event_mask_inner ">
                                                <div class="h3 alba_sports_events-event_mask_inner_text orange">التفاصيل اللقاء</div>    
                                            </div>
                                        <?php
                                            }elseif ($_match['status'] == $Not_started) {
                                        ?>
                                            <div class="event_mask_inner ">
                                                <div class="h3 alba_sports_events-event_mask_inner_text ">تنطلق بعد قليل</div>
                                            </div>
                                        <?php 
                                            }elseif ($_match['status'] == $In_play || $_match['status'] == $AddedTime || $_match['status'] == $Half_timebreak) {
                                        ?>
                                            <div class="event_mask_inner ">
                                                <div class="h3 alba_sports_events-event_mask_inner_text red">التفاصيل المباراة</div>
                                            </div>
                                        <?php 
                                            }
                                        ?>
                                        </div>
                                        <div class="event_inner">
                                            <div class="team-aria team-first">
                                                <div class="team">
                                                    <div class="alba-team_logo"></div>
                                                    <div class="alba_sports_events-team_title">
                                                        <?=$_match['home_name']?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="event_title_wrapper match-data">
                                                <div class="matchResult">
                                                    <span class="result"><?=$_match['score'][0]?></span>
                                                    <div class="match-data">
                                                        <h3 class="matchTime"><?=convert($_match['scheduled'], $timezone)?></h3>
                                                        <div class="matchStatus">
                                                        <?php
                                                            if ($_match['status'] == $In_play || $_match['status'] == $AddedTime || $_match['status'] == $Half_timebreak) {
                                                        ?>
                                                            <h5 class="status">
                                                                <p>جارية الان</p>
                                                            </h5>
                                                        <?php
                                                            }elseif ($_match['status'] == $Finished){
                                                        ?>
                                                            <h5 class="status">
                                                                <p>انتهت</p>
                                                            </h5>
                                                        <?php
                                                            }elseif ($_match['status'] == $Not_started){
                                                        ?>
                                                            <h5 class="status">
                                                                <p>بعد قليل</p>
                                                            </h5>
                                                        <?php
                                                            }
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <span class="result"><?=$_match['score'][4]?></span>
                                                </div>
                                            </div>
                                            <div class="team-aria team-second">
                                                <div class="team">
                                                    <div class="alba-team_logo"></div>
                                                    <div class="h2 alba_sports_events-team_title">
                                                        <?=$_match['away_name']?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="chanels-fix">
                                            <div class="events-info">
                                                <!--<span class="mic">
                                                    <i aria-hidden="true" class="fa fa-microphone">
                                                        <?//=$_match['location']?>
                                                    </i>
                                                </span>
                                                <span class="tv hidden-xs hidden-sm">
                                                    <i aria-hidden="true" class="fa fa-television">
                                                    </i>
                                                    بي ان سبورت 1+2
                                                </span>
                                                <span class="cup">
                                                    <i aria-hidden="true" class="fa fa-trophy">
                                                        <?//=$_match['competition_name']?>
                                                    </i>
                                                </span>-->
                                            </div>
                                        </div>
                                                        
                                    </a>
                                </div>
                            <?php
                                }
                            ?>
                            </div>          
                            <div id="tommorw" class="tabcontent">
                            <?php 
                                foreach ($dataTommorow['data']['match'] as $_match) {
                            ?>
                                <div class=" m_block alba_sports_events-event_item started <?php if($_match['status'] == $Finished) { echo 'gools'; }elseif ($_match['status'] == $Not_started) {echo 'comming'; }?>">
                                    <a href="../templates/statistic.php?match_id=<?=$_match['id']?>">
                                        <div class="alba_sports_events-event_mask">
                                        <?php 
                                            if($_match['status'] == $Finished) { 
                                        ?>
                                            <div class="event_mask_inner ">
                                                <div class="h3 alba_sports_events-event_mask_inner_text orange">التفاصيل اللقاء</div>    
                                            </div>
                                        <?php
                                            }elseif ($_match['status'] == $Not_started) {
                                        ?>
                                            <div class="event_mask_inner ">
                                                <div class="h3 alba_sports_events-event_mask_inner_text ">تنطلق بعد قليل</div>
                                            </div>
                                        <?php 
                                            }elseif ($_match['status'] == $In_play || $_match['status'] == $AddedTime || $_match['status'] == $Half_timebreak) {
                                        ?>
                                            <div class="event_mask_inner ">
                                                <div class="h3 alba_sports_events-event_mask_inner_text red">التفاصيل المباراة</div>
                                            </div>
                                        <?php 
                                            }
                                        ?>
                                        </div>
                                        <div class="event_inner">
                                            <div class="team-aria team-first">
                                                <div class="team">
                                                    <div class="alba-team_logo"></div>
                                                    <div class="alba_sports_events-team_title">
                                                        <?=$_match['home_name']?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="event_title_wrapper match-data">
                                                <div class="matchResult">
                                                    <span class="result"><?=$_match['score'][0]?></span>
                                                    <div class="match-data">
                                                        <h3 class="matchTime"><?=convert($_match['scheduled'], $timezone)?></h3>
                                                        <div class="matchStatus">
                                                        <?php
                                                            if ($_match['status'] == $In_play || $_match['status'] == $AddedTime || $_match['status'] == $Half_timebreak) {
                                                        ?>
                                                            <h5 class="status">
                                                                <p>جارية الان</p>
                                                            </h5>
                                                        <?php
                                                            }elseif ($_match['status'] == $Finished){
                                                        ?>
                                                            <h5 class="status">
                                                                <p>انتهت</p>
                                                            </h5>
                                                        <?php
                                                            }elseif ($_match['status'] == $Not_started){
                                                        ?>
                                                            <h5 class="status">
                                                                <p>بعد قليل</p>
                                                            </h5>
                                                        <?php
                                                            }
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <span class="result"><?=$_match['score'][4]?></span>
                                                </div>
                                            </div>
                                            <div class="team-aria team-second">
                                                <div class="team">
                                                    <div class="alba-team_logo"></div>
                                                    <div class="h2 alba_sports_events-team_title">
                                                        <?=$_match['away_name']?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="chanels-fix">
                                            <div class="events-info">
                                                <!--<span class="mic">
                                                    <i aria-hidden="true" class="fa fa-microphone">
                                                        <?//=$_match['location']?>
                                                    </i>
                                                </span>
                                                <span class="tv hidden-xs hidden-sm">
                                                    <i aria-hidden="true" class="fa fa-television">
                                                    </i>
                                                    بي ان سبورت 1+2
                                                </span>
                                                <span class="cup">
                                                    <i aria-hidden="true" class="fa fa-trophy">
                                                        <?//=$_match['competition_name']?>
                                                    </i>
                                                </span>-->
                                            </div>
                                        </div>
                                                        
                                    </a>
                                </div>
                            <?php
                                }
                            ?>
                            </div>                                                        
                        </div>
                    </div>
                    <!--<div class="box">
                        <div class="box-title" style="height: 40px;">
                            <h5 class="title">
                                شارك جدول أهم مباريات اليوم
                            </h5>
                        </div>
                        <ul class="shareindex">
                            <li>
                                <a class="facebook" href="#" target="_blank">
                                    فيسبوك
                                </a>
                            </li>
                            <li>
                                <a class="twitter" href="#" target="_blank">
                                    تويتر
                                </a>
                            </li>
                            <li>
                                <a class="google" href="#" target="_blank">
                                    جوجل+
                                </a>
                            </li>
                            <li>
                                <a class="whatsapp" href="#" target="_blank">
                                    واتساب
                                </a>
                            </li>
                            <li>
                                <a class="telegram" href="#" target="_blank">
                                    تليجرام
                                </a>
                            </li>
                        </ul>
                    </div>-->
                </div>
            </div>
            <?php include '../resources/layouts/sidebarleft.php'?>
        </div>
        <? include '../resources/layouts/footer.php'?>

        <script type="text/javascript" src="../public/js/jquery.min.js"></script>
        <script type="text/javascript" src="../public/js/script.js"></script>
    </body>
</html>