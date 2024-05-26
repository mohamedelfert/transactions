

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Transactions</h1>
            <div>
                <a href="<?php echo e(route('transactions.create')); ?>" class="btn btn-primary">Add Transaction</a>
                <a href="<?php echo e(route('transactions.report')); ?>" class="btn btn-secondary">Generate Report</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Transactions (Page <?php echo e($transactions->currentPage()); ?> of <?php echo e($transactions->lastPage()); ?>)
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Amount</th>
                            <th>Receiver</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($transaction->id); ?></td>
                                <td>$<?php echo e(number_format($transaction->amount, 2)); ?></td>
                                <td><?php echo e($transaction->receiver); ?></td>
                                <td><?php echo e($transaction->date->format('Y-m-d')); ?></td>
                                <td>
                                    <a href="<?php echo e(route('transactions.show', $transaction->id)); ?>"
                                        class="btn btn-info">View</a>
                                    <a href="<?php echo e(route('transactions.edit', $transaction->id)); ?>"
                                        class="btn btn-warning">Edit</a>
                                    <form action="<?php echo e(route('transactions.destroy', $transaction->id)); ?>" method="POST"
                                        style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right"><strong>Total Amount:</strong></td>
                            <td>$<?php echo e(number_format($totalAmount, 2)); ?></td>
                        </tr>
                    </tfoot>
                </table>
                <?php echo e($transactions->links()); ?> <!-- Pagination links -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel projects\transaction\resources\views/transactions/index.blade.php ENDPATH**/ ?>