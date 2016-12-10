<?php if(in_array($field->type, array('hidden','auto'))): ?>


    <?php echo $field->output; ?>



    <?php if($field->message!=''): ?>
    <span class="help-block">
        <span class="glyphicon glyphicon-warning-sign"></span>

        <?php echo $field->message; ?>


    </span>
    <?php endif; ?>

<?php else: ?>
    <div class="form-group<?php echo $field->has_error; ?>">

        <label for="<?php echo $field->name; ?>" class="col-sm-2 control-label<?php echo $field->req; ?>"><?php echo $field->label; ?></label>
        <div class="col-sm-10" id="div_<?php echo $field->name; ?>">

            <?php echo $field->output; ?>


            <?php if(count($field->messages)): ?>
                <?php foreach($field->messages as $message): ?>
                    <span class="help-block">
                        <span class="glyphicon glyphicon-warning-sign"></span>
                        <?php echo $message; ?>

                    </span>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>

    </div>
<?php endif; ?>
