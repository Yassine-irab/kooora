<?php

include '../resources/config/config.php';

$url = "https://livescore-api.com/api-client/competitions/list.json?key=".KEY."&secret=".SECRET."&lang=ar";
$json = file_get_contents($url);
$data = json_decode($json, true);

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
                            <h2 class="title">البطولات</h2>
                        </div>                      
                        <div class="contents widget-content" id="content">
                        <div id="today" class="tabcontent">
                            <div class="containCompetitions">
                                <?php
                                    foreach ($data['data']['competition'] as $_competition) {
                                ?>
                                    <?php if ($_competition['id'] == 36) { ?>
                                        <a href="liststanding.php?league_id=<?= $_competition['id']?>">
                                            <div class="logoCompetitions">
                                                <img src="../public/images/eygpt.png" alt="">
                                            </div>
                                            <div class="nameCompetitions">
                                                <p>الدوري المصري</p>
                                            </div>
                                        </a>
                                    <?php }?>
                                    <?php if ($_competition['id'] == 1) { ?>
                                        <a href="liststanding.php?league_id=<?= $_competition['id']?>">
                                            <div class="logoCompetitions">
                                                <img src="../public/images/bundesliga.png" alt="">
                                            </div>
                                            <div class="nameCompetitions">
                                                <p>الدوري الالماني</p>
                                            </div>
                                        </a>
                                    <?php }?> 
                                    <?php if ($_competition['id'] == 38) { ?>
                                        <a href="liststanding.php?league_id=<?= $_competition['id']?>">
                                            <div class="logoCompetitions">
                                                <img src="../public/images/marocleague.png" alt="">
                                            </div>
                                            <div class="nameCompetitions">
                                                <p>الدوري المغربي</p>
                                            </div>
                                        </a>
                                    <?php }?> 
                                    <?php if ($_competition['id'] == 3) { ?>
                                        <a href="liststanding.php?league_id=<?= $_competition['id']?>">
                                            <div class="logoCompetitions">
                                                <img src="../public/images/laliga.png" alt="">
                                            </div>
                                            <div class="nameCompetitions">
                                                <p>الدوري الاسباني</p>
                                            </div>
                                        </a>
                                    <?php }?>  
                                    <?php if ($_competition['id'] == 2) { ?>
                                        <a href="liststanding.php?league_id=<?= $_competition['id']?>">
                                            <div class="logoCompetitions">
                                                <img src="../public/images/premierleague.png" alt="">
                                            </div>
                                            <div class="nameCompetitions">
                                                <p>الدوري الانجليزي</p>
                                            </div>
                                        </a>
                                    <?php }?> 
                                    <?php if ($_competition['id'] == 245) { ?>
                                        <a href="liststanding.php?league_id=<?= $_competition['id']?>">
                                            <div class="logoCompetitions">
                                                <img src="../public/images/europaleague.png" alt="">
                                            </div>
                                            <div class="nameCompetitions">
                                                <p>الدوري الاروبي</p>
                                            </div>
                                        </a>
                                    <?php }?> 
                                    <?php if ($_competition['id'] == 244) { ?>
                                        <a href="liststanding.php?league_id=<?= $_competition['id']?>">
                                            <div class="logoCompetitions">
                                                <img src="../public/images/championsleague.png" alt="">
                                            </div>
                                            <div class="nameCompetitions">
                                                <p>دوري أبطال أوروبا</p>
                                            </div>
                                        </a>
                                    <?php }?>
                                    <?php if ($_competition['id'] == 4) { ?>
                                        <a href="liststanding.php?league_id=<?= $_competition['id']?>">
                                            <div class="logoCompetitions">
                                                <img src="../public/images/seriaA.png" alt="">
                                            </div>
                                            <div class="nameCompetitions">
                                                <p>الدوري الايطالي</p>
                                            </div>
                                        </a>
                                    <?php }?>
                                    <?php if ($_competition['id'] == 5) { ?>
                                        <a href="liststanding.php?league_id=<?= $_competition['id']?>">
                                            <div class="logoCompetitions">
                                                <img src="../public/images/ligue1.png" alt="">
                                            </div>
                                            <div class="nameCompetitions">
                                                <p>الدوري الفرنسي</p>
                                            </div>
                                        </a>
                                    <?php }?>  
                                    <?php if ($_competition['id'] == 226) { ?>
                                        <a href="liststanding.php?league_id=<?= $_competition['id']?>">
                                            <div class="logoCompetitions">
                                                <img src="../public/images/AfricanNationsChampionship.png" alt="">
                                            </div>
                                            <div class="nameCompetitions">
                                                <p>كأس أمم افريقيا</p>
                                            </div>
                                        </a>
                                    <?php }?>                                                                        
                                <?php } ?>
                            </div>                                
                        </div>                                                        
                        </div>
                    </div>
                </div>
            </div>
            <?php include '../resources/layouts/sidebarleft.php'?>
        </div>
        <? include '../resources/layouts/footer.php'?>

        <script type="text/javascript" src="../public/js/jquery.min.js"></script>
        <script type="text/javascript" src="../public/js/script.js"></script>
    </body>
</html>