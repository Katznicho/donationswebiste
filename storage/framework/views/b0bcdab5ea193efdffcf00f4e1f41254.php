<div class="overflow-x-auto">

    <!--[if BLOCK]><![endif]--><?php if($transactions->isEmpty()): ?>
        <p class="text-center text-gray-500 py-4">No records found.</p>
    <?php else: ?>
        <table id="transactionTable"
            class="min-w-full divide-y divide-gray-200 shadow-md border border-gray-300 rounded-lg">
            <thead class="bg-gray-50">
                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone
                        Number</th>

                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Child Name
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment
                        Mode</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount
                    </th>
                    
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Description</th>
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    


                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo e($transaction->created_at->format('Y-m-d H:i:s')); ?></td>


                        <td class="px-6 py-4 whitespace-nowrap"><?php echo e($transaction->phone_number); ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo e($transaction->amount); ?></td>

                        <td class="px-6 py-4 whitespace-nowrap"><?php echo e($transaction->child->first_name. ' '. $transaction->child->second_name); ?></td>

                        <td class="px-6 py-4 whitespace-nowrap"><?php echo e($transaction->type); ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo e($transaction->status); ?></td>

                        <td class="px-6 py-4 whitespace-nowrap"><?php echo e($transaction->payment_mode); ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo e($transaction->amount); ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo e($transaction->description); ?></td>
                        <!-- Add more table data columns as needed -->
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>

    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#transactionTable').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "searching": true,
                "lengthChange": true,
                "language": {
                    "paginate": {
                        "previous": "&lt;",
                        "next": "&gt;"
                    },
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                    "infoEmpty": "Showing 0 to 0 of 0 entries",
                    "lengthMenu": "Show _MENU_ entries",
                    "search": "Search:"
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/codeartisan/Desktop/laravelapps/dummy3/dummy2/resources/views/livewire/transaction-table.blade.php ENDPATH**/ ?>