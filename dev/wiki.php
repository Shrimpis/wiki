<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Skapa Wiki</h3>
                    <form action="http://10.130.216.101/TP/api.php" method="POST">
                        <input type="hidden" name="nyckel" value="iRxOUsizwhoXddb4">
                        <input type="hidden" name="tjanst" value="wiki">
                        <input type="hidden" name="typ" value="function">
                        <input type="hidden" name="handling" value="skapa">
                        <input type="hidden" name="funktion" value="skapaWiki">
                        <input type="hidden" name="anvandarId" value="4">
                        <input type="text" name="titel" placeholder="Skriv titeln på wikit">
                        <input type="submit" value="Skapa Wiki">
                    </form>
                </div>
                <div class="col">
                    <p>Poof</p>
                </div>
                <div class="col">
                    <h3>Ta Bort Wiki</h3>
                    <form action="http://10.130.216.101/TP/api.php" method="POST">
                        <input type="hidden" name="nyckel" value="iRxOUsizwhoXddb4">
                        <input type="hidden" name="tjanst" value="wiki">
                        <input type="hidden" name="typ" value="function">
                        <input type="hidden" name="handling" value="tabort">
                        <input type="hidden" name="funktion" value="tabortWiki">
                        <input type="hidden" name="anvandarId" value="4">
                        <input type="number" name="wikiId" placeholder="Vilket wiki ska tas bort">
                        <input type="submit" value="Ta Bort Wiki">
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>