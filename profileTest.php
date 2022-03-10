<div class="change-avatar-section">
<div class="change-avatar-title">
    <h2>change profile image</h2>
</div>
<form method="POST" class="profile-avatar-form">
    <ul class="profile-avatar-section">
        <?php
            foreach ($selectAvatar as $key => $val): //I use mvc model so you can't see the rest of the code but it's run perfectly
        ?>
        <li>
            <input type="checkbox" id="avatar_img_<?php echo $val->avatar_id ?>" name="avatar_img_<?php echo $val->avatar_id ?>" value="<?php echo $val->name?>">
            <label class="avatar-label" for="avatar_img_<?php echo $val->avatar_id ?>"><img src="public/main/image/Avatar/<?php echo $val->name?>" alt="avatar"></label>
            <div class="selected-avatar"> <!--when users click an image this svg will show up -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.97 17.9"><path d="M10,21a.78.78,0,0,1-.57-.26L3.2,13.49a.75.75,0,1,1,1.14-1L9.9,19,19.6,3.42a.77.77,0,0,1,1-.24.76.76,0,0,1,.24,1L10.64,20.62a.78.78,0,0,1-.58.35Z" transform="translate(-3.02 -3.07)"/></svg>
            </div>
        </li>
        <?php
            endforeach;
        ?>
    </ul>
    <div class="update-avatar">
        <input type="submit" name="btn_change_avatar" class="update-avatar-btn" value="update">
    </div>
</form>