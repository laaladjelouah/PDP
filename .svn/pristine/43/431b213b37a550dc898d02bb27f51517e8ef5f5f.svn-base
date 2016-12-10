
<?php $__env->startSection('df.header'); ?>
    <?php echo $df->open; ?>

    <?php echo $__env->make('rapyd::toolbar', array('label'=>$df->label, 'buttons_right'=>$df->button_container['TR']), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldSection(); ?>

<?php if($df->message != ''): ?>
<?php $__env->startSection('df.message'); ?>
    <div class="alert alert-success"><?php echo $df->message; ?></div>
<?php echo $__env->yieldSection(); ?>
<?php endif; ?>

<?php if($df->message == ''): ?>
<?php $__env->startSection('df.fields'); ?>

        <?php echo $__env->renderEach('rapyd::dataform.field_inline', $df->fields, 'field'); ?>

<?php echo $__env->yieldSection(); ?>
<?php endif; ?>

<?php $__env->startSection('df.footer'); ?>

    <?php if(isset($df->button_container['BL']) && count($df->button_container['BL'])): ?>


        <?php foreach($df->button_container['BL'] as $button): ?> <?php echo $button; ?>

        <?php endforeach; ?>

    <?php endif; ?>

    <?php echo $df->close; ?>

<?php echo $__env->yieldSection(); ?>
