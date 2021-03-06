<?php
error_reporting(E_ERROR | E_PARSE);

include "../includes/settings.php";
include "../functions/view_json.php";
include "../functions/get_title.php";
include "../functions/get_history.php";
include_once  "../functions/inline_function.php";

$page_title = 'Jämför artikel';

if(isset($_GET['parent_branch'])){
    $parent_branch = $_GET['parent_branch'];
    $version = $_GET['version'];
    $page_id = $_GET['page_id'];
    $index = $_GET['index'];

    if($version[1] == null){
        header('location: '.$_SERVER['HTTP_REFERER'].'');
    }

    $array = getHistory($page_id);

    for($i = 0; $i < sizeof($array); $i++){
        if($array[$i]['id'] == $version[0]){
            $index_new = $i;
        } 

        if($array[$i]['id'] == $version[1]){
            $index_old = $i;
        }

        if(isset($index_new) && isset($index_old)){
            break;
        }

    }

    $new_souce = $array[$index_new]['innehall'];
    $old_source = $array[$index_old]['innehall'];

} else {
    header('location: '.$host.'/'.$parent_branch.'/_history');
}

include '../includes/head.php';

?>
 <main role="main" class="flex-shrink-0">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb shadow" style="border: 1px solid rgba(0,0,0,.125);">
                        <?php 
                            echo 
                            '
                            <li class="breadcrumb-item"><a href="/Wiki">Hem</a></li>
                            <li class="breadcrumb-item"><a href=/Wiki/'. $parent_branch.'>'.$parent_branch.'</a></li>
                            <li class="breadcrumb-item"><a href=/Wiki/'. $parent_branch.'/_history>Historik</a></li>
                            <li class="breadcrumb-item active" aria-current="page">'.$page_title.'</li>
                            ';
                        ?>
                    </ol>
                </nav>
            </div>

            <div class="container">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active">Artikel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo ''.$host.'/'.$parent_branch.'/_history';?>">Gå tillbaka till historik</a>
                                    </li>
                                </ul>
                                <br>
                                <h1><?php echo $parent_branch ?></h1>
                                <p><i><?php echo "Du jämför artikeln ".$parent_branch." med versionerna <strong>".$version[0]."</strong> och <strong>".$version[1]."</strong>"; ?></i></p>
                            </div>
                            <div class="col-4 alert alert-warning">
                                <h5><i class="fas fa-exclamation-triangle"></i> Jämförelse av artiklar</h5><br>
                                <p><i><?php echo "Du jämför artikeln ".$parent_branch." med versionerna <strong>".$version[0]."</strong> och <strong>".$version[1]."</strong>"; ?></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div id="test-markdown-view" class="js-toc-content">
                                    <!-- Server-side output Markdown text -->
                                    <textarea style="display:none;">
<?php 
$nl = '#**!)@#';
$diff = inline_diff($new_souce, $old_source , $nl);
//echo str_replace($nl,"\n",$diff)."\n";
echo $diff;
?>
                                    </textarea>             
                                </div>
                            </div>
                            <div class="col-4" style="border-left: 1px solid rgba(0,0,0,.125);text-align:left;">
                            <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <h5>Innehållsförteckning</h5>
                                                </button>
                                                <div class="float-right" data-toggle="collapse" data-target="#collapseOne" style="margin-top: 3%;">
                                                    <i class="fa" aria-hidden="true"></i>
                                                </div>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                <div id="custom-toc-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include '../includes/footer.php'; ?>

    </body>
</html>