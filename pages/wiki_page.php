<?php 
include "../includes/settings.php";
include "../functions/view_json.php";
include "../functions/get_title.php";

if(isset($_GET["page"])){
    $title = $_GET["page"];
    $page_id = getTitle($title);
    $array = getWiki($wiki_id);
}

include '../includes/head.php';

?>
        <main role="main" class="flex-shrink-0">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb shadow" style="border: 1px solid rgba(0,0,0,.125);">
                        <?php 
                        if($array['sidor'][$page_id]['titel'] != 'Home'){
                            echo 
                            '
                            <li class="breadcrumb-item"><a href="/Wiki">Hem</a></li>
                            <li class="breadcrumb-item active" aria-current="page">'. $array['sidor'][$page_id]['titel'] .'</li>
                            ';
                        } else {
                            echo '<li class="breadcrumb-itemactive" aria-current="page"><a>Hem</a></li>';
                        }
                        
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
                                        <a class="nav-link <?php if(empty($_SESSION['username'])){ echo "disabled"; }?>" href="<?php echo $host;?>/<?php echo $array['sidor'][$page_id]['titel']; ?>/_edit">Redigera</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $host;?>/<?php echo $array['sidor'][$page_id]['titel']; ?>/_history">Historik</a>
                                    </li>
                                </ul>
                                <br>
                                <?php 
                                if($array['sidor'][$page_id]['last'] == 1){
                                    echo '<i style="margin-left:3px!important;" class="fa fa-lock fa-lg"></i> ';
                                } 
                                ?>
                                <h1>
                                <?php
                                    echo $array['sidor'][$page_id]['titel']; 
                                ?></h1>
                                <p><i>Senast ändrad: <?php echo $array['sidor'][$page_id]['datum']; ?></i></p>
                            </div>
                            <?php 
                                if(isset($_COOKIE['debug']) && isset($_SESSION['role'])){
                                    if($_SESSION['role'] == "superadmin" && $_COOKIE['debug'] == "on"){ 
                                        echo 
                                        '
                                        <div class="col-4">
                                        <p>Debug:</p>
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <sub>Sid-ID: '.$array['sidor'][$page_id]['id'].'</sub><br>
                                                <sub>JSON-ID: '.$page_id.'</sub><br>
                                                <sub>Godkänd av id: '.$array['sidor'][$page_id]['godkantAv'].'</sub><br>
                                                <sub>Godkänd av namn: '.$array['sidor'][$page_id]['godKantAvNamn'].'</sub><br>
                                            </div>
                                            <div class="col">
                                                <sub>Bidragsgivare: '.$array['sidor'][$page_id]['bidragsgivare'].'</sub><br>
                                                <sub>Dolt: '.$array['sidor'][$page_id]['dolt'].'</sub><br>
                                                <sub>Låst: '.$array['sidor'][$page_id]['last'].'</sub><br>
                                            </div>
                                        </div>
                                        </div>
                                        '; 
                                    }
                                }   
                            ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div id="test-markdown-view" class="js-toc-content">
                                    <!-- Server-side output Markdown text -->
                                    <textarea style="display:none;">
<?php echo $array['sidor'][$page_id]['innehall']; ?>
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