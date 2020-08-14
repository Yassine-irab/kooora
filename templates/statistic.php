<?php

include '../resources/config/config.php';

$match_id = $_GET['match_id'];

$url = "https://livescore-api.com/api-client/matches/stats.json?match_id=".$match_id."&key=".KEY."&secret=".SECRET."&lang=ar";
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
                            <h2 class="title">يلا شوت</h2>
                        </div>
                        <div class="tab filter-days">
                            <a id="" class="tablinks yesterday" href="#yesterday">تشكيلة</a>
                            <a id="" class="tablinks today active" href="#today">إحصائية</a>
                            <a id="" class="tablinks tommorw" href="#tommorw">أخبار</a>
                        </div>                        
                        <div class="contents widget-content" id="content">
                        <div id="today" class="tabcontent">
                        <?php if(sizeof($data['data']) === 0){ ?>
                            <div>
                                <p>لايوجد بيانات</p>
                            </div>                            
                        <?php }else{ ?>
                        <table>
                                <tr>
                                    <td><?=substr($data['data']['yellow_cards'], 0, 1)?></td>
                                    <td class="titleStatic">البطاقات الصفراء</td>
                                    <td><?=substr($data['data']['yellow_cards'], -1)?></td>
                                </tr>
                                <tr>
                                    <td><?=substr($data['data']['red_cards'], 0, 1)?></td>
                                    <td class="titleStatic">البطاقات الحمراء</td>
                                    <td><?=substr($data['data']['red_cards'], -1)?></td>
                                </tr>
                                <tr>
                                    <td><?=substr($data['data']['possesion'], 0, 2)?>%</td>
                                    <td class="titleStatic">استحواذ</td>
                                    <td><?=substr($data['data']['possesion'], -2)?>%</td>
                                </tr>
                                <tr>
                                    <td><?=substr($data['data']['free_kicks'], 0, 2)?></td>
                                    <td class="titleStatic">الركلات الحرة</td>
                                    <td><?=substr($data['data']['free_kicks'], -2)?></td>
                                </tr>
                                <tr>
                                    <td><?=substr($data['data']['goal_kicks'], 0, 2)?></td>
                                    <td class="titleStatic">ضربات المرمى</td>
                                    <td><?=substr($data['data']['goal_kicks'], -2)?></td>
                                </tr> 
                                <tr>
                                    <td><?=substr($data['data']['offsides'], 0, 1)?></td>
                                    <td class="titleStatic">تسلل</td>
                                    <td><?=substr($data['data']['offsides'], -1)?></td>
                                </tr>     
                                <tr>
                                    <td><?=substr($data['data']['corners'], 0, 1)?></td>
                                    <td class="titleStatic">ضربات جانبية</td>
                                    <td><?=substr($data['data']['corners'], -1)?></td>
                                </tr> 
                                <tr>
                                    <td><?=substr($data['data']['shots_on_target'], 0, 1)?></td>
                                    <td class="titleStatic">التسديدات على المرمى</td>
                                    <td><?=substr($data['data']['shots_on_target'], -1)?></td>
                                </tr> 
                                <tr>
                                    <td><?=substr($data['data']['shots_off_target'], 0, 1)?></td>
                                    <td class="titleStatic">التسديدات خارج المرمى</td>
                                    <td><?=substr($data['data']['shots_off_target'], -1)?></td>
                                </tr>
                                <tr>
                                    <td><?=substr($data['data']['saves'], 0, 1)?></td>
                                    <td class="titleStatic">تصديات حارس المرمى</td>
                                    <td><?=substr($data['data']['saves'], -1)?></td>
                                </tr>  
                                <tr>
                                    <td><?=substr($data['data']['treatments'], 0, 1)?></td>
                                    <td class="titleStatic">الإصابات</td>
                                    <td><?=substr($data['data']['treatments'], -1)?></td>
                                </tr> 
                                <tr>
                                    <td><?=substr($data['data']['fauls'], 0, 2)?></td>
                                    <td class="titleStatic">عدد الاخطاء</td>
                                    <td><?=substr($data['data']['fauls'], -2)?></td>
                                </tr> 
                                <tr>
                                    <td><?=substr($data['data']['penalties'], 0, 1)?></td>
                                    <td class="titleStatic">ضربات الجزاء</td>
                                    <td><?=substr($data['data']['penalties'], -1)?></td>
                                </tr> 
                                <tr>
                                    <td><?=substr($data['data']['attacks'], 0, 2)?></td>
                                    <td class="titleStatic">عمليات الهجوم</td>
                                    <td><?=substr($data['data']['attacks'], -2)?></td>
                                </tr>                                                                                                                                                                                                                                                                                                                            
                            </table>
                        <?php } ?>
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