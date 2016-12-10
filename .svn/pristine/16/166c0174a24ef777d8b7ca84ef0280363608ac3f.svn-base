<?php echo $__env->make('rapyd::toolbar', array('label'=>$label, 'buttons_right'=>$buttons['TR']), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<table<?php echo $dg->buildAttributes(); ?>>

	<div class="pull-right">
        	<a href="<?php echo url('panel/'.$current_entity.'/edit'); ?>" class="btn btn-primary"><?php echo e(trans('rapyd::rapyd.add')); ?></a>
	</div>

	<?php if($dg->rowCount()): ?>
    		<thead>
			<tr>
				<?php foreach($dg->columns as $column): ?>
				        <th<?php echo $column->buildAttributes(); ?>>
				        	<?php if($column->orderby): ?>
							<?php if($dg->onOrderby($column->orderby_field, 'asc')): ?>
						                <span class="glyphicon glyphicon-arrow-up"></span>
					                <?php else: ?>
						                <a href="<?php echo $dg->orderbyLink($column->orderby_field,'asc'); ?>">
						                        <span class="glyphicon glyphicon-arrow-up"></span>
						                </a>
					                <?php endif; ?>
					                <?php if($dg->onOrderby($column->orderby_field, 'desc')): ?>
						                <span class="glyphicon glyphicon-arrow-down"></span>
					                <?php else: ?>
						                <a href="<?php echo $dg->orderbyLink($column->orderby_field,'desc'); ?>">
						                        <span class="glyphicon glyphicon-arrow-down"></span>
						                </a>
					                <?php endif; ?>
						<?php endif; ?>
						        <?php echo $column->label; ?>

					</th>
				<?php endforeach; ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach($dg->rows as $row): ?>
			        <tr<?php echo $row->buildAttributes(); ?>>
				        <?php foreach($row->cells as $cell): ?>
					        <td<?php echo $cell->buildAttributes(); ?>><?php echo $cell->value; ?></td>
			                <?php endforeach; ?>
			        </tr>
			<?php endforeach; ?>
		</tbody>
	<?php else: ?>
		<h4><?php echo e(Lang::get('rapyd::rapyd.empty_list')); ?></h4>
	<?php endif; ?>
</table>

<?php if($dg->havePagination()): ?>
	<div class="pagination">
		<?php echo $dg->links(); ?>

	</div>
<?php endif; ?>
