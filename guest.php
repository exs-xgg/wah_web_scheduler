    <br><br>

<?php
$privacy = 'public';
require_once('conf.php');




$allCals = new C_Calendar('LOAD_PUBLIC_CALENDARS');

//====Load calendar properties
$calendarProperties = $allCals->calendarProperties;

//====Load calendars
$allCalendars = $allCals->allCalendars;

//==== Get calendar Id
$calendarId = isset($_GET['c'])?$_GET['c']:0;
//====Initiate Event Calendar Class
$pec = new C_PhpEventCal($calendarProperties,$calendarId);

//==== Setting Properties
$pec->header();

$pec->buttonText(array('prev'=>'Prev','next'=>'Next', 'agendaDay'=>'Day','basicDay'=>'Day','month'=>'Month','agendaWeek'=>'Week','list'=>'Agenda','pec'=>'Upcoming'));


$events = array(

);





$pec->events($events);

$pec->editable(true);

$pec->dragOpacity(.2);
;
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WAH</title>
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

        a#cal-settings-link{
            display: none;
        }

    </style>
</head>

<body>
<?php require_once(SERVER_HTML_INCLUDE_DIR.'top-navigation.html.php'); ?>
<div class="container">


    <div class="starter-template">
        <p class="lead">
        <div class="row">
            <div class="col-md-2" style="padding: 0;max-width:225px;min-width:225px">
             
              
                <!-- Date Picker -->
                <div id="date-picker" style="border: 1px solid #d9d9d9; margin-left: 3px; margin-top: 0; padding-top: 0; border-radius: 2px"></div>


                <!-- My Calendar -->
                <div id="my-calendars" class="panel panel-default" style="margin-top: 10px; margin-left: 3px;">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="width: 100%">My Calendars <span id="add-calendar" class="glyphicon glyphicon-plus" style="float: right; margin-left: 8px;display:none"></span>&nbsp;<span id="manage-calendar" class="glyphicon glyphicon-cog" style="margin-top:1px; float: right; cursor: pointer;display:none"></span></h3>
                    </div>
                    <div class="list-group" id="list-group-public">

                        <?php if($allCalendars != NULL) foreach($allCalendars as $k => $v){ ?>
                            <?php
                        
                            if($v['id']){
                                $active = '<span class="glyphicon glyphicon-remove unselect-calendar"></span><span style="float: right" class="glyphicon glyphicon-ok"></span>';
                                $activeClass = 'selected';
                            }
                            else {
                                $active = '';
                                $activeClass = '';
                            }
                            ?>
                            <a href="javascript:void(0);" class="list-group-item list-group-item-public ladda-button <?php echo $activeClass?>" data-style="expand-right" style="background-color: <?php echo $v['color']?>; color:white;" id="<?php echo $v['id']?>"><span class="ladda-label"><?php echo $v['name']?></span> <?php echo $active?></a>
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
$pec->display('body','public');
?>

</body>

</html>