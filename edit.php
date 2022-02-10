<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <title>Crud oop edit</title>
    <style>
        .hed{
            background: #ccc;
            color: blue;
        }
        .hed h1{
            padding-top: 20px;
            padding-bottom: 25px;
        }
        .form{
            margin-top: 50px;
            background: #ccc;
        }
        .table{
            margin-top: 50px;
        }
    </style>
</head>
<body class="stretched">
        <div class="col-md-12 hed">
            <h1 class="text-center">Edit Data</h1>
        </div>
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <div class="row">
                        <?php 
                            include 'database.php';

                            $id = $_GET['id'];

                            $b = new database();
                            $b->select("data","*","id='$id'");
                            $result = $b->sql;

                            $row = mysqli_fetch_assoc($result);
                        ?>
                        <div class="col-md-12" id="hide">
                            <form  class="row form" action="update.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <?php include 'form.php'; ?>
                                <div class="col-12 form-group">
                                    <input type="submit" class="btn btn-success" name="submit" value="Save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            $('#file-img').bind('input', function(e) {
                var url = URL.createObjectURL(e.target.files[0])
                var img = $('<img src="">')
                img.attr('src', url)
                $('#img-preview').html(img)
            });
        </script>
    </body>
</html>