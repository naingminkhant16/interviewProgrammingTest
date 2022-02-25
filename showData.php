<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #eee;
        }
    </style>
</head>

<body>
    <div class="container" style='max-width:1200px;'>
        <div class="card bg-light" style="margin-top:40px">
            <div class="card-header" style="background-color: #e4aaf0;">
                <h3 class="text-center" style="color:#777">User's Messages</h3>
            </div>
            <div class="card-body" style="background-color: white">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-1">
                    <?php
                    require "_actions/config.php";
                    $db = new DB();
                    $db->connect();
                    $result = $db->getAll();
                    if ($result) :
                        foreach ($result as $user) :
                    ?>
                            <div class="col">
                                <div id="card<?= $user->id ?>" class="card text-white bg-dark mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">From <?= DB::escape($user->name) ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Email - <?= DB::escape($user->email) ?></h6>
                                        <p class="card-text"><?= DB::escape($user->message) ?></p>
                                        <a href="_actions/delete.php?id=<?= $user->id ?>" class="card-link btn btn-danger">Delete</a>
                                        <div onclick="read(<?= $user->id ?>)" id="read<?= $user->id ?>" class="card-link btn btn-primary ">Marks as read</div>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach;
                    endif;
                    ?>
                </div>
            </div>
            <div class="card-footer text-center text-muted" style="background-color: #e4aaf0;">
                Thank You For Your Time
                <a href="index.php" class="btn btn-secondary" style="float: right;">Back</a>
            </div>
        </div>
    </div>
    <script>
        function read(id) {
            let card = document.getElementById('card' + id);
            let readBtn = document.getElementById('read' + id);
            card.classList.remove('bg-dark');
            card.classList.remove('text-white');
            card.style.color = "#777";
            card.style.backgroundColor = '#eee'

            readBtn.textContent = "Already Read";
            readBtn.classList.add('disabled');
        }
    </script>
</body>

</html>