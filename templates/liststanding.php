<?php

include '../resources/config/config.php';

$league_id = $_GET['league_id'];

$url = "http://livescore-api.com/api-client/leagues/table.json?key=".KEY."&secret=".SECRET."&lang=ar&competition_id=".$league_id;
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
                            <h2 class="title">ترتيب البطولات</h2>
                        </div>                      
                        <div class="contents widget-content" id="content">
                        <div id="today" class="tabcontent">
                            <div class="containCompetitions">

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