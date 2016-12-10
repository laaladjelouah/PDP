<?php $__env->startSection('page-wrapper'); ?>

<?php if(!empty($message)): ?>
    <div class="alert-box success">
        <h2><?php echo e($message); ?></h2>
    </div>
<?php endif; ?>

<?php if($demo_status == true): ?>
	<h4>You are not allowed to edit the profile in demo version of panel.</h4>
<?php else: ?>

<div class="row">
    <div class="col-xs-4" >

<?php echo Form::model($admin, array( $admin->id)); ?>


<?php echo Form::label('first_name', \Lang::get('panel::fields.FirstName')); ?>

<?php echo Form::text('first_name', $admin->first_name, array('class' => 'form-control')); ?>

<br />
<?php echo Form::label('last_name', \Lang::get('panel::fields.LastName')); ?>

<?php echo Form::text('last_name', $admin->last_name, array('class' => 'form-control')); ?>

<br />
<!-- email -->
<?php echo Form::label('email', 'Email'); ?>

<?php echo Form::email('email', $admin->email, array('class' => 'form-control')); ?>		
<br />
<?php echo Form::submit(\Lang::get('panel::fields.updateProfile'), array('class' => 'btn btn-primary')); ?>


<?php echo Form::close(); ?>


<?php endif; ?>

  </div>    
</div>
    
<?php $__env->stopSection(); ?>   

<?php echo $__env->make('panelViews::mainTemplate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>