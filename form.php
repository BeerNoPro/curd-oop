<div class="col-md-6 col-sm-12 form-group">
    <label for="register-form-name">Username:</label>
    <input type="text" name="name" value="<?php if(isset($row)) { echo $row['name']; } ?>" class="form-control" placeholder="Ex: Pham Viet Hung..." required>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <label for="register-form-name">Email:</label>
    <input type="email" name="email" value="<?php if(isset($row)) { echo $row['email']; } ?>" class="form-control" placeholder="Ex: phamviethungqnm@gmail.com.." required>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <label for="register-form-name">Phone:</label>
    <input type="text" name="phone" value="<?php if(isset($row)) { echo $row['phone']; } ?>" class="form-control" placeholder="Ex: 0936.567.669..." required>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <label for="register-form-name">Address:</label>
    <input type="text" name="address" value="<?php if(isset($row)) { echo $row['address']; } ?>" class="form-control" placeholder="Ex: Da Nang City..." required>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <label for="register-form-name">Message:</label>
    <textarea class="form-control" name="message" placeholder="Ex: Hello guy...">
        <?php if(isset($row)) { echo $row['message']; } ?>
    </textarea>
</div>
<div class="col-md-6 col-sm-12 form-group">
    <label for="register-form-name" style="display: block">Avatar:</label>
    <label for="file-img" class="btn btn-info file-img">Upload image</label>
    <input id="file-img" type="file" class="" name="image" style="opacity: 0; width:150px" accept="image/*">
    <span id="img-preview">
        <?php 
            if(isset($row)) {
                echo "<img src='images/".$row['avatar']."' style='width:100px; height:100px'>";
            }
        ?> 
    </span>
</div>