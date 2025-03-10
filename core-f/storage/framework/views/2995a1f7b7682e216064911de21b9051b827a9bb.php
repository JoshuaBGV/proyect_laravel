<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.manage-users', [])->html();
} elseif ($_instance->childHasBeenRendered('l7zxVkB')) {
    $componentId = $_instance->getRenderedChildComponentId('l7zxVkB');
    $componentTag = $_instance->getRenderedChildComponentTagName('l7zxVkB');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l7zxVkB');
} else {
    $response = \Livewire\Livewire::mount('admin.manage-users', []);
    $html = $response->html();
    $_instance->logRenderedChild('l7zxVkB', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nb9pvggwxcwi/public_html/ultra.multipagos.co/core/resources/views/admin/Users/users.blade.php ENDPATH**/ ?>