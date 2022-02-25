<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        label {
            color: #9932a8;
        }
    </style>
</head>

<body>
    <section class="row container" style="margin: 40px auto;max-width:1000px;height:600px">
        <div class="col-12 col-md-7">
            <img src="images/work2.jpg" width="100%" height="100%">
        </div>
        <div class="col-12 col-md-5 p-5">
            <?php if (isset($_GET['error'])) : ?>
                <div class="alert alert-warning">
                    Failed to submit!!
                </div>
            <?php endif; ?>

            <form action="_actions/insert.php" method="POST" style="margin:40px auto">
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label><br>
                    <small style="color:red;float:left"><?= isset($_GET['nameErr']) ? '*Name is required' : '' ?></small>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label><br>
                    <small style="color:red;float:left"><?= isset($_GET['emailErr']) ? '*Email is required' : '' ?></small>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Your Message</label><br>
                    <small style="color:red;float:left"><?= isset($_GET['msgErr']) ? '*Message is required' : '' ?></small>
                    <input type="text" name="message" class="form-control" required>
                </div>

                <button type="submit" class="w-100 btn" style="background-color: #9932a8;color:white">send</button>
                <a href="showData.php" style="text-decoration: none;">User's messages page -></a>
            </form>
        </div>
    </section>
</body>

</html>