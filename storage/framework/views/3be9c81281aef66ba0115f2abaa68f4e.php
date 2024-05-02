<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between items-center"> <!-- Changed here -->
                    <div>
                        Hello <?php echo e(Auth::user()->name); ?>

                    </div>
                    <div>
                        <i id="eye-icon" class="fa fa-eye cursor-pointer" aria-hidden="true" onclick="toggleTable()"></i> <?php echo e(count($children)); ?>

                    </div>
                    <div class="flex space-x-4"> <!-- Changed here -->
                        <!-- Add Payment Button -->
                        <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Make Payment</a>
                        <!-- Write to Sponsored Child Button -->
                        <a href="#" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Write to Your Sponsored Child</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Livewire Component -->
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('transaction-table');

$__html = app('livewire')->mount($__name, $__params, 'lw-1360259590-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

                </div>
            </div>
        </div>
    </div>
     <!-- table pop up -->
     <div id="table-popup" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-8 max-w-md rounded-lg">
                <!-- Table content -->
                <table class="min-w-full  border-gray-300 rounded-lg">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Second Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            <!-- Add more headers if needed -->
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                         <?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"><?php echo e($child->child->first_name); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?php echo e($child->child->second_name); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                         <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Write Letter</a>
                                </td>
                                <!-- Add more data cells if needed -->
                            </tr>
                             
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- Add more rows of data if needed -->
                    </tbody>
                </table>
                <!-- End of table content -->

                <!-- Close button -->
                <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="toggleTable()">Close</button>
            </div>
        </div>
     <!-- table pop up-->
     <script>
        function toggleTable() {
            var tablePopup = document.getElementById("table-popup");
            tablePopup.classList.toggle("hidden");
        }
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /Users/katendenicholas/Desktop/laravel/dummy/resources/views/dashboard.blade.php ENDPATH**/ ?>