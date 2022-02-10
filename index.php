<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud oop home</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />
 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
        .file-img {
            position: absolute;
            top: 32px;
            right: 73%;
        }
        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body class="stretched">
    <div id="wrapper" class="clearfix">
        <div class="col-md-12 hed">
            <h1 class="text-center">Insert Data</h1>
        </div>
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <div class="row">
                        <div class="col-md-12" id="hide">
                            <form  class="row form" action="insert.php" method="post" enctype="multipart/form-data">
                                <?php include 'form.php'; ?>
                                <div class="col-12 form-group">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Insert">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 p-0 table-responsive">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Stt</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Avatar</th>
                                        <th scope="col" colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        include 'database.php';
                                        $b = new database();
                                        $b->select("data","*");
                                        $result = $b->sql;
                                        $i = 1;
                                    ?>
                                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <td><?php echo $row['message']; ?></td>
                                            <td>
                                                <img src="images/<?php echo $row['avatar']; ?>" alt="">
                                            </td>
                                            <td>
                                                <a href="view.php?id=<?php echo $row['id']; ?>" type="button" class="btn btn-success btn-sm">View</a>
                                            </td>
                                            <td>
                                                <a href="edit.php?id=<?php echo $row['id']; ?>" type="button" class="btn btn-primary btn-sm">Edit</a>
                                            </td>
                                            <td>
                                                <a href="" type="button"  data-toggle="modal" data-id="<?php echo $row['id']; ?>" data-target="#myModal" id="del" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            // get preview image
            $('#file-img').bind('input', function(e) {
                var url = URL.createObjectURL(e.target.files[0])
                var img = $('<img src="">')
                img.attr('src', url)
                $('#img-preview').append(img)
            });

            $(document).on('click',"#del",function(e) {
                e.preventDefault();
                var del = $(this).data('id');
                var delTr = $(this).closest('tr');

                swal({
                    title: "You are sure?",
                    text: "Once deleted, you will not be able to recover this file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url : "delete_data.php",
                            type : "POST",
                            data : {id:del},
                            success : function() {
                                $(delTr).remove(); 
                            }
                        });
                        swal("Your file has been deleted!", {
                            icon: "success",
                        });
                    }
                });
            });
        });
    </script>
    <!-- https://www.nicesnippets.com/blog/php-mysql-oop-crud-example-tutorial -->
</body>
</html>