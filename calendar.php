<?php
//test for wp plugin branch
require_once('conf.php');
//====security checking
$validateUser = C_Security::validateUserSession();


//====Load all calendars
$allCals = new C_Calendar('LOAD_MY_CALENDARS');

//====Load calendar properties
$calendarProperties = $allCals->calendarProperties;

//====Load calendars
$allCalendars = $allCals->allCalendars;

//====Initiate Event Calendar Class
$pec = new C_PhpEventCal($calendarProperties);

//==== Setting Properties
$pec->header();

if(isset($_SESSION['currentView']) && $_SESSION['currentView']!=''){
    $pec->defaultView($_SESSION['currentView']); //month,basicWeek,agendaWeek,basicDay,agendaDay
    unset($_SESSION['currentView']);
}


$pec->buttonText(array('prev'=>'Prev','next'=>'Next', 'agendaDay'=>'Day','basicDay'=>'Day','month'=>'Month','agendaWeek'=>'Week','list'=>'Agenda'));


);


$activeExternalURLForCalendars = C_Events::findExternalURLForCalendars($_SESSION['userData']['active_calendar_id']);

if($activeExternalURLForCalendars) {
    $calURLs = NULL;
    foreach($activeExternalURLForCalendars as $k => $cal){
        $calURLs[] = array('url'=>$cal['description'],'color'=>$cal['color']);
    }
    if(!is_null($calURLs)) $pec->events($calURLs,'calendar');
}
else $pec->events($events);



$pec->editable(true);

$pec->dragOpacity(.2);

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP Event Calendar (b1.0.5)</title>
    <?php echo $pec->display('head');?>
    <style>
        .container {
            width: auto;
        }
        #add-calendar {
            cursor: pointer;
        }
        .list-group a {
            padding: 4px;
            text-align: left;
            padding-left: 10px;
            padding-right: 2px;
        }
        .list-group a:hover {
            opacity: 0.75;
        }
        .fc-header-right .fc-header-space {
            display: none;
        }
        .unselect-calendar {
            float: right;
            font-size: 8px;
            margin-top: 13px;
            display: inline-block;
            z-index: 10000;
        }
        .unselect-calendar:hover {
            text-shadow: 0 2px 5px black;
            color: maroon;
        }

    </style>
</head>

<body>
    <?php require_once(SERVER_HTML_INCLUDE_DIR.'top-navigation.html.php'); ?>
    <div class="container">

        <?php
        require_once(SERVER_HTML_DIR.'calendar-create.html.php');
        require_once(SERVER_HTML_DIR.'calendar-update.html.php');
        require_once(SERVER_HTML_DIR.'calendar-settings.html.php');
        ?>

        <div class="starter-template">
            <p class="lead">
                <div class="row">
                    <div class="col-md-2" style="padding: 0;max-width:225px;min-width:225px">
                        <!-- Create New Event Button -->
                        
                        <div style="clear: both; height: 17px; display: none"></div>
                        <!-- Date Picker -->
                        <div id="date-picker" style="border: 1px solid #d9d9d9; margin-left: 3px; margin-top: 0; padding-top: 0; border-radius: 2px"></div>


                        <!-- My Calendar -->
                        <div id="my-calendars" class="panel panel-default" style="margin-top: 10px; margin-left: 3px;">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="width: 100%">
                                    My Calendars
                                    <span id="add-calendar" class="glyphicon glyphicon-plus" style="float: right; margin-left: 8px;"></span>
                                    &nbsp;
                                    <span id="manage-calendar" class="glyphicon glyphicon-cog" style="margin-top:1px; float: right; cursor: pointer;"></span>
                                </h3>
                            </div>
                            <div class="list-group" id="list-group">

                                <?php if($allCalendars != NULL) foreach($allCalendars as $k => $v){ ?>
                                    <?php
                                        //var_dump($_SESSION['userData']['active_calendar_id']);
                                        if(@in_array($v['id'],$_SESSION['userData']['active_calendar_id'])){
                                            $active = '<span class="glyphicon glyphicon-remove unselect-calendar"></span><span style="float: right" class="glyphicon glyphicon-ok"></span>';
                                            $activeClass = 'selected';
                                        }
                                        else {
                                            $active = '';
                                            $activeClass = '';
                                        }
                                    ?>
                                    <a href="javascript:void(0);" class="list-group-item ladda-button <?php echo $activeClass?>" data-style="expand-right" style="background-color: <?php echo $v['color']?>; color:white;" id="<?php echo $v['id']?>"><span class="ladda-label"><?php echo $v['name']?></span> <?php echo $active?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10" style="overflow:hidden;float:inherit;width:inherit">
                        <?php
                            $pec->display_container();
                        ?>
                    </div>
                </div>
            </p>
        </div>



    </div><!-- /.container -->


    <?php
    //=====display
    $pec->display();
    ?>

    <?php
    //======display debug info
    $pec->display_debug();
    ?>
</body>

</html>