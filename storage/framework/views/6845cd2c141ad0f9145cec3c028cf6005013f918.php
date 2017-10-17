<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Blog</div>

                <div class="panel-body">
                    <form id="createBlog" class="form-horizontal" method="POST" action="<?php echo e(action('BlogController@store')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                            <label for="title" class="col-md-4 control-label">Title</label>

                        <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" required autofocus>

                                <?php if($errors->has('title')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('slug') ? ' has-error' : ''); ?>">
                            <label for="slug" class="col-md-4 control-label">Slug</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control" name="slug" required autofocus>

                                <?php if($errors->has('slug')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('slug')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('content') ? ' has-error' : ''); ?>">
                            <label for="content" class="col-md-4 control-label">Content</label>

                            <div class="col-md-6">

                                <div id="summernote"></div>
                                <input id="content" type="hidden" class="form-control" name="content">

                                <?php if($errors->has('content')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('content')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Blog
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote();
        $('#content').val($('#summernote').summernote('code'));

        // summernote.keyup
        $('#summernote').on('summernote.keyup', function(we, e) {
            console.log("hit");
            $('#content').val($('#summernote').summernote('code'));
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>