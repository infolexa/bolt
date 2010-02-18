<?php defined('SYSPATH') or die('404 Not Found.');?>

<?php if (strlen($content)): ?>
    
    <div class="widget <?php echo (isset($params['class'])) ? $params['class'] : '' ?>">
    <?php if ($widget['show_title']): ?>
        <h3 class="title"><?php echo $title ?></h3>
    <?php endif ?>
        <div class="content">
    <?php echo $content ?>
        </div>
    </div>

<?php endif ?>