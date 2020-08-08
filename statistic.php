<?php

include 'config.php';

$match_id = $_GET['match_id'];

$url = "https://livescore-api.com/api-client/matches/stats.json?match_id=".$match_id."&key=".KEY."&secret=".SECRET."&lang=ar";
$json = file_get_contents($url);
$data = json_decode($json, true);

var_dump($data['data']);
?>

<html dir="rtl" lang="ar" style="transform: none;">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>يلا شوت - yalla shoot - كورة 4 لايف - KOOORA4LIVE</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body style="transform: none;">
        <header id="header-wrapper">
            <!--<div id="headercontent">
                <div class="container">
                    <div class="menu_icon_cont">
                        <img src="https://www.kooora4live.tv/wp-content/themes/alba-kora4live-v2/img/ic_menu_black_24px.svg" alt="menu">
                    </div>
                    <div id="kora-logo">
                        <a href="#" class="logo-img" title="">
                            <img src="images/logo.png" alt="">
                        </a>
                    </div>
                </div>
            </div>-->
            <div class="kora-top-nav">
                <div class="container">
                    <div class="main-menu">
                        <ul id="nav-ul" class="menu">
                            <li id="menu-item-28">
                                <a href="./">الرئيسية</a>
                            </li>
                            <li>
                                <a href="#">ترتيب الفرق والهدافين</a>
                            </li>
                            <li>
                                <a href="#">مباريات قادمة</a>
                            </li>                               
                        </ul>
                    </div>
                    <div class="menu_links_side">
                        <div class="header_links_item live_btn_cont">
                            <a href="#" class="live_btn" title="مباشر">
                                <span class="live_btn_text">مباشر</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="under-header">
        </div>
        <div id="content-wrapper" class="container" style="transform: none;">
            <aside class="sidebar-wrapper col-xs-12 right-sidebar">
                <div class="theiaStickySidebar">
                    <div id="nav_menu-8" class="sidebar-widget box widget_nav_menu">
                        <div class="box-title">
                            <div class="title">اهم الدوريات العربية</div>
                        </div>
                        <div>
                            <ul class="menu">
                                <li class="menu-item menu-item-type-taxonomy menu-item-object-championship menu-item-703">
                                    <a href="#">
                                        <span>
                                            <img src="https://www.kooora4live.tv/wp-content/uploads/2019/01/download-9.jpg"
                                            alt="كأس اسيا 2019" width="33" height="33">
                                            كأس اسيا 2019
                                        </span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-type-taxonomy menu-item-object-championship menu-item-2825">
                                    <a href="#">
                                        <span>
                                            <img src="https://www.kooora4live.tv/wp-content/uploads/2019/05/africa-cup-of-nations-2019.png" 
                                            alt="كأس أمم أفريقيا 2019" width="33" height="33">
                                        </span>كأس أمم أفريقيا 2019
                                    </a>
                                </li>
                                <li class="menu-item menu-item-type-taxonomy menu-item-object-championship menu-item-244">
                                    <a href="#">
                                        <span>
                                            <img src="https://www.kooora4live.tv/wp-content/uploads/2019/01/download-1.jpg"
                                            alt="الدوري القطري" width="33" height="33">
                                        </span>الدوري القطري
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
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
                                    <td>البطاقات الصفراء</td>
                                    <td><?=substr($data['data']['yellow_cards'], -1)?></td>
                                </tr>
                                <tr>
                                    <td><?=substr($data['data']['red_cards'], 0, 1)?></td>
                                    <td>البطاقات الحمراء</td>
                                    <td><?=substr($data['data']['red_cards'], -1)?></td>
                                </tr>
                                <tr>
                                    <td><?=substr($data['data']['possesion'], 0, 2)?></td>
                                    <td>استحواذ</td>
                                    <td><?=substr($data['data']['possesion'], -2)?></td>
                                </tr>
                                <tr>
                                    <td><?=substr($data['data']['free_kicks'], 0, 2)?></td>
                                    <td>الركلات الحرة</td>
                                    <td><?=substr($data['data']['free_kicks'], -2)?></td>
                                </tr>
                                <tr>
                                    <td><?=substr($data['data']['goal_kicks'], 0, 2)?></td>
                                    <td>ضربات المرمى</td>
                                    <td><?=substr($data['data']['goal_kicks'], -2)?></td>
                                </tr> 
                                <tr>
                                    <td><?=substr($data['data']['offsides'], 0, 1)?></td>
                                    <td>تسلل</td>
                                    <td><?=substr($data['data']['offsides'], -1)?></td>
                                </tr>     
                                <tr>
                                    <td><?=substr($data['data']['corners'], 0, 1)?></td>
                                    <td>ضربات جانبية</td>
                                    <td><?=substr($data['data']['corners'], -1)?></td>
                                </tr> 
                                <tr>
                                    <td><?=substr($data['data']['shots_on_target'], 0, 1)?></td>
                                    <td>التسديدات على المرمى</td>
                                    <td><?=substr($data['data']['shots_on_target'], -1)?></td>
                                </tr> 
                                <tr>
                                    <td><?=substr($data['data']['shots_off_target'], 0, 1)?></td>
                                    <td>التسديدات خارج المرمى</td>
                                    <td><?=substr($data['data']['shots_off_target'], -1)?></td>
                                </tr>
                                <tr>
                                    <td><?=substr($data['data']['saves'], 0, 1)?></td>
                                    <td>تصديات حارس المرمى</td>
                                    <td><?=substr($data['data']['saves'], -1)?></td>
                                </tr>  
                                <tr>
                                    <td><?=substr($data['data']['treatments'], 0, 1)?></td>
                                    <td>الإصابات</td>
                                    <td><?=substr($data['data']['treatments'], -1)?></td>
                                </tr> 
                                <tr>
                                    <td><?=substr($data['data']['fauls'], 0, 2)?></td>
                                    <td>عدد الاخطاء</td>
                                    <td><?=substr($data['data']['fauls'], -2)?></td>
                                </tr> 
                                <tr>
                                    <td><?=substr($data['data']['penalties'], 0, 1)?></td>
                                    <td>ضربات الجزاء</td>
                                    <td><?=substr($data['data']['penalties'], -1)?></td>
                                </tr> 
                                <tr>
                                    <td><?=substr($data['data']['attacks'], 0, 2)?></td>
                                    <td>عمليات الهجوم</td>
                                    <td><?=substr($data['data']['attacks'], -2)?></td>
                                </tr>                                                                                                                                                                                                                                                                                                                            
                            </table>
                        <?php } ?>
                        </div>                                                        
                        </div>
                    </div>
                </div>
            </div>
            <aside class="sidebar-wrapper  alba-md-29 col-xs-12 left-sidebar"
                style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="theiaStickySidebar"
                    style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 166.516px;">
                    <div id="nav_menu-2" class="sidebar-widget box widget_nav_menu">
                        <div class="box-title">
                            <div class="title">أهم الدوريات الأوروبية</div>
                        </div>
                        <div>
                            <ul class="menu">

                                <li id="menu-item-215"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-championship menu-item-215">
                                    <a href="#">
                                        <span>
                                            <img src="images/download.png" 
                                            alt="دوري ابطال اوروبا" width="33" height="33">
                                        </span>
                                        دوري ابطال اوروبا
                                    </a>
                                </li>

                                <li id="menu-item-51"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-championship menu-item-51">
                                    <a href="#">
                                        <span>
                                            <img src="images/12-3.png" 
                                            alt="الدوري الاسباني" width="33" height="33">
                                        </span>
                                        الدوري الاسباني
                                    </a>
                                </li>

                                <li id="menu-item-53"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-championship menu-item-53">
                                    <a href="#">
                                        <span>
                                            <img src="images/Ligue_1-e1546417395835.png" 
                                            alt="الدوري الفرنسي" width="33" height="33">
                                        </span>
                                        الدوري الفرنسي
                                    </a>
                                </li>

                                <li id="menu-item-512"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-championship menu-item-512">
                                    <a href="#">
                                        <span>
                                            <img src="images/download-17.png" 
                                            alt="الدوري الالماني" width="33" height="33">
                                        </span>
                                        الدوري الالماني
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <footer class="main-footer">
            <div class="footer_bottom txt-center">
                <div class="container">
                    <h6 class="footer_copyRights">حقوق النشر والتأليف ©</h6>
                </div>
            </div>
        </footer>

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
    </body>
</html>