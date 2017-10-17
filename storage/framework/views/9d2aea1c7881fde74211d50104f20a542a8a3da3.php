<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h3><?php echo e($blog['title']); ?></h3></div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <h3><?php echo e($blog['slug']); ?></h3>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <h3><?php echo $blog['content']; ?></h3>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>