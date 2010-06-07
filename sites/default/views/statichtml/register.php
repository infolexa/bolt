<?php defined('SYSPATH') or die('404 Not Found.');?>
<form id="dummy" action="" method="post">

  <fieldset>
    <legend>Simple sample form</legend>
    <p>
      <label for="dummy0">Text input (title)</label><br>
      <input type="text" class="title" name="dummy0" id="dummy0" value="Field with class .title">
    </p>

    <p>
      <label for="dummy1">Another field</label><br>
      <input type="text" class="text" id="dummy1" name="dummy1" value="Field with class .text">
    </p>

    <p>
      <label for="dummy2">Textarea</label><br>
      <textarea name="dummy2" id="dummy2" rows="5" cols="20"></textarea>
    </p>

    <p>
      <label for="dummy3">A password field</label><br>
      <input type="password" class="text" id="dummy3" name="dummy3" value="Password field with class .text">
    </p>

    <p>
      <input type="submit" value="Submit">
      <input type="reset" value="Reset">
    </p>

  </fieldset>
</form>