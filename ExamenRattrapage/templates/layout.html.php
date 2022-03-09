
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar nav-expand-lg navbar-light bg-dark mb-5">
    <a href="/hb/cyclisterie" class="navbar-brand">BASE FRAMEWORK</a>
    <ul>
       <!--  <li class="nav-item"><a href="?type=cocktail&action=new" class="btn btn-primary">Create Cocktail</a></li>
        <li class="nav-item"><a href="?type=sandwich&action=index" class="btn btn-primary">sandwiches</a></li> -->
<?php if(isset($_SESSION['user'])){ ?>

    <li class="nav-item"><a href="/" class="btn btn-warning"><?= $_SESSION['user']['displayName'] ?></a></li>


<?php } ?>

            <li class="nav-item"><a href="?type=user&action=signout" class="btn btn-danger">Sign out</a></li>


            <li class="nav-item"><a href="?type=user&action=signup" class="btn btn-secondary">Sign up</a></li>
            <li class="nav-item"><a href="?type=user&action=signin" class="btn btn-primary">Sign in</a></li>




    </ul>

</nav>
<div class="alert alert-warning alert-dismissible fade <?php if(isset($_GET['info'])){ echo 'show';}?>" role="alert">
  <?=$_GET['info'] ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="container">


            <?=  $pageContent ?>


</div>
        




<h1 class="mt-5" >FIN DE PAGE</h1>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>