d<?php
include 'css/style.css';
function get_avatar()
{
   if ($_SESSION['user_avatar'] === '') {
      echo '<div class="user-container"><img src="images/default-avatar.png"></div>';
   } else {
      echo '<div class="user-container"><img src="uploaded_img" '  . $_SESSION['user_avatar'] . '"></div>';
   }
}
