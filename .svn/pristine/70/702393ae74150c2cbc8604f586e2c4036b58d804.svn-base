<?php if($field->type == 'hidden'): ?>

    <?php echo $field->output; ?>


    <?php if($field->message!=''): ?>
        <span class="help-block">
            <span class="glyphicon glyphicon-warning-sign"></span>
            <?php echo $field->message; ?>

        </span>
    <?php endif; ?>

<?php else: ?>
    <div class="form-group<?php echo $field->has_error; ?>">

        <label for="<?php echo $field->name; ?>" class="sr-only"><?php echo $field->label.$field->star; ?></label>
        <span id="div_<?php echo $field->name; ?>">

            <?php echo $field->output; ?>



            <?php if(count($field->messages)): ?>
            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            <?php endif; ?>

        </span>

    </div>
<?php endif; ?>
