<?php  if (count($errors) > 0) : ?>
  <img id="captcha" src="/sepr/securimage/securimage_show.php" alt="CAPTCHA Image" />
  <input type="text" name="captcha_code" size="10" maxlength="6" />
  <a href="#" onclick="document.getElementById('captcha').src = '/sepr/securimage/securimage_show.php?' + Math.random();
    return false">[ Different Image ]</a>
<?php  endif ?>
