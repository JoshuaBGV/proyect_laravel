 <!-- Top Up Modal -->
 <div id="topupModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Credit/Debit <?php echo e($user->name); ?> account.</strong></h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <form method="post" action="<?php echo e(route('topup')); ?>">
                     <?php echo csrf_field(); ?>
                     <div class="form-group">
                         <div class="input-group">
                             <div class="input-group-prepend">
                                 <span class="input-group-text"><?php echo e($settings->currency); ?></span>
                             </div>
                             <input type="number" placeholder="Enter amount" step="any" name="amount"
                                 class="form-control" aria-label="Amount (to the nearest dollar)" required>
                         </div>
                     </div>
                     
                     <div class="form-group">
                         <h5 class="">Select where to Credit/Debit</h5>
                         <select class="form-control  " name="type" required>
                             <option value="" selected disabled>Select Column</option>
                             <option value="Bonus">Bonus</option>
                             <option value="Profit">Profit</option>
                             <option value="Ref_Bonus">Ref_Bonus</option>
                             <option value="balance">Account Balance</option>
                             <option value="Deposit">Deposit</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <h5 class="">Select credit to add, debit to subtract.</h5>
                         <select class="form-control  " name="t_type" required>
                             <option value="">Select type</option>
                             <option value="Credit">Credit</option>
                             <option value="Debit">Debit</option>
                         </select>
                         <small class="mt-2"> <b>NOTE:</b> You cannot debit the deposit column of users</small>
                     </div>
                     <div class="form-group">
                         <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                         <input type="submit" class="btn btn-primary" value="Submit">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- /deposit for a plan Modal -->


 <!-- send a single user email Modal-->
 <div id="sendmailtooneuserModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Send Email</h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <p class="">This message will be sent to <?php echo e($user->name); ?></p>
                 <form method="post" action="<?php echo e(route('sendmailtooneuser')); ?>">
                     <?php echo csrf_field(); ?>
                     <div class=" form-group">
                         <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                     </div>
                     <div class="form-group">
                         <textarea placeholder="Type your message here" class="form-control" name="message" row="8"
                             placeholder="Type your message here" required></textarea>
                     </div>
                     <div class="form-group">
                         <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                         <input type="submit" class="btn btn-primary" value="Send">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- /Trading History Modal -->

 <div id="TradingModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Add Trading History for <?php echo e($user->name); ?> <?php echo e($user->l_name); ?> </h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <form role="form" method="post" action="<?php echo e(route('addhistory')); ?>">
                     <?php echo csrf_field(); ?>
                     <div class="form-group">
                         <h5 class=" ">Select Investment Plan</h5>
                         <select class="form-control  " name="plan">
                             <option value="" selected disabled>Select Plan</option>
                             <?php $__currentLoopData = $pl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($plns->name); ?>"><?php echo e($plns->name); ?></option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <h5 class=" ">Amount</h5>
                         <input type="number" name="amount" class="form-control  ">
                     </div>
                     <div class="form-group">
                         <h5 class=" ">Type</h5>
                         <select class="form-control  " name="type">
                             <option value="" selected disabled>Select type</option>
                             <option value="Bonus">Bonus</option>
                             <option value="ROI">ROI</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <input type="submit" class="btn btn-primary" value="Add History">
                         <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- /send a single user email Modal -->

 <!-- Edit user Modal -->
 <div id="edituser" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Edit <?php echo e($user->name); ?> details.</strong></h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">
                 <form role="form" method="post" action="<?php echo e(route('edituser')); ?>">
                     <div class="form-group">
                         <h5 class=" ">Username</h5>
                         <input class="form-control" id="input1" value="<?php echo e($user->username); ?>" type="text"
                             name="username" required>
                         <small>Note: same username should be use in the referral link.</small>
                     </div>
                     <div class="form-group">
                         <h5 class=" ">Fullname</h5>
                         <input class="form-control  " value="<?php echo e($user->name); ?>" type="text" name="name"
                             required>
                     </div>
                     <div class="form-group">
                         <h5 class=" ">Email</h5>
                         <input class="form-control  " value="<?php echo e($user->email); ?>" type="text" name="email"
                             required>
                     </div>
                     <div class="form-group">
                         <h5 class=" ">Phone Number</h5>
                         <input class="form-control  " value="<?php echo e($user->phone); ?>" type="text" name="phone"
                             required>
                     </div>
                     <div class="form-group">
                         <h5 class=" ">Country</h5>
                         <input class="form-control  " value="<?php echo e($user->country); ?>" type="text" name="country">
                     </div>
                     <div class="form-group">
                         <h5 class=" ">Referral link</h5>
                         <input class="form-control  " value="<?php echo e($user->ref_link); ?>" type="text" name="ref_link"
                             required>
                     </div>
                     <div class="form-group">
                         <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                         <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                         <input type="submit" class="btn btn-primary" value="Update">
                     </div>
                 </form>
             </div>
             <script>
                 $('#input1').on('keypress', function(e) {
                     return e.which !== 32;
                 });
             </script>
         </div>
     </div>
 </div>
 <!-- /Edit user Modal -->

 <!-- Reset user password Modal -->
 <div id="resetpswdModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Reset Password</strong></h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <p class="">Are you sure you want to reset password for <?php echo e($user->name); ?> to <span
                         class="text-primary font-weight-bolder">user01236</span></p>
                 <a class="btn btn-primary" href="<?php echo e(url('admin/dashboard/resetpswd')); ?>/<?php echo e($user->id); ?>">Reset
                     Now</a>
             </div>
         </div>
     </div>
 </div>
 <!-- /Reset user password Modal -->

 <!-- Switch useraccount Modal -->
 <div id="switchuserModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">You are about to login as <?php echo e($user->name); ?>.</strong></h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <a class="btn btn-success"
                     href="<?php echo e(url('admin/dashboard/switchuser')); ?>/<?php echo e($user->id); ?>">Proceed</a>
             </div>
         </div>
     </div>
 </div>
 <!-- /Switch user account Modal -->

 <!-- Clear account Modal -->
 <div id="clearacctModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Clear Account</strong></h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <p class="">You are clearing account for <?php echo e($user->name); ?> to <?php echo e($settings->currency); ?>0.00
                 </p>
                 <a class="btn btn-warning"
                     href="<?php echo e(url('admin/dashboard/clearacct')); ?>/<?php echo e($user->id); ?>">Proceed</a>
             </div>
         </div>
     </div>
 </div>
 <!-- /Clear account Modal -->

 <!-- Delete user Modal -->
 <div id="deleteModal" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title ">Delete User</strong></h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body  p-3">
                 <p class="">Are you sure you want to delete <?php echo e($user->name); ?> Account? Everything associated
                     with this account will be loss.</p>
                 <a class="btn btn-danger" href="<?php echo e(url('admin/dashboard/delsystemuser')); ?>/<?php echo e($user->id); ?>">Yes
                     i'm sure</a>
             </div>
         </div>
     </div>
 </div>
 <!-- /Delete user Modal -->
<?php /**PATH /home/nb9pvggwxcwi/public_html/ultra.multipagos.co/core/resources/views/admin/Users/users_actions.blade.php ENDPATH**/ ?>