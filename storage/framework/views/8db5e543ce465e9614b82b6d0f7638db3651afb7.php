<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags  -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />

    <title><?php echo e(config('app.name')); ?> - Sign In</title>
    <link rel="icon" type="image/png" href="/images/favicon.png" />

    <!-- CSS Assets -->
    <link rel="stylesheet" href="css/app.css" />

    <!-- Javascript Assets -->
    <script src="js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />
    <style>
      .showAlertButton {
        display: none;
      }
    </style>
</head>
<body x-data class="is-header-blur" x-bind="$store.global.documentBody" onload="showAlerts()">
<!-- App preloader-->
<div
    class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900"
>
    <div class="app-preloader-inner relative inline-block h-48 w-48"></div>
</div>

<!-- Page Wrapper -->
<div
    id="root"
    class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900"
    x-cloak
>
    <main class="grid w-full grow grid-cols-1 place-items-center">
        <div class="w-full max-w-[26rem] p-4 sm:px-5">
            <div class="text-center">
                <img
                    class="mx-auto h-16 w-16"
                    src="/images/app-logo.png"
                    alt="logo"
                />
                <div class="mt-4">
                    <h2
                        class="text-2xl font-semibold text-slate-600 dark:text-navy-100"
                    >
                        Welcome Back
                    </h2>
                    <p class="text-slate-400 dark:text-navy-300">
                        Please sign in to continue
                    </p>
                </div>
            </div>

            <form method="POST"
                  action="<?php echo e($role == 1 ? route('admin-login') : $role == route('customer-login')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="role" value="<?php echo e($role); ?>">



                <div class="card mt-5 rounded-lg p-5 lg:p-7">
                    <label class="block">
                        <span>Email:</span>
                        <span class="relative mt-1.5 flex">
                  <input
                      class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                      placeholder="Enter Email"
                      type="email"
                      name="email"
                      id="email"
                      value="<?php echo e(old('email')); ?>"
                      required
                      autocomplete="email"
                      autofocus
                  />
                  <span
                      class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                  >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 transition-colors duration-200"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="1.5"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                      />
                    </svg>
                  </span>
                </span>
                    </label>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-tiny+ text-error">
                  <strong><?php echo e($message); ?></strong>
                </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <label class="mt-4 block">
                        <span>Password:</span>
                        <span class="relative mt-1.5 flex">
                  <input
                      class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                      placeholder="Enter Password"
                      type="password"
                      id="password"
                      name="password"
                      required
                      autocomplete="current-password"
                  />
                  <span
                      class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                  >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 transition-colors duration-200"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="1.5"
                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                      />
                    </svg>
                  </span>
                </span>
                    </label>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-tiny+ text-error">
                  <strong><?php echo e($message); ?></strong>
                </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="mt-4 flex items-center justify-between space-x-2">
                        <label class="inline-flex items-center space-x-2">
                            <input
                                class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                                type="checkbox"
                                name="remember"
                                id="remember"
                                <?php echo e(old('remember') ? 'checked' : ''); ?>

                            />
                            <span class="line-clamp-1">Remember me</span>
                        </label>
                        <a
                            href="#"
                            class="text-xs text-slate-400 transition-colors line-clamp-1 hover:text-slate-800 focus:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100 dark:focus:text-navy-100"
                        >Forgot Password?</a
                        >
                    </div>
                    <button
                        class="btn mt-5 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                        type="submit"
                    >
                        Sign In
                    </button>
                    <div class="mt-4 text-center text-xs+">
                        <p class="line-clamp-1">
                            <span>Dont have Account?</span>

                            <a
                                class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                                href="pages-singup-1.html"
                            >Create account</a
                            >
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>

<!--
    This is a place for Alpine.js Teleport feature
    @see https://alpinejs.dev/directives/teleport
  -->
<div id="x-teleport-target"></div>
  <?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <button
      class="showAlertButton btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
      @click="$notification({text:'<?php echo e($error); ?>',variant:'error',position:'right-top'})"
    >
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
  <?php if(session()->has('success')): ?>
    <button
      class="showAlertButton btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
      @click="$notification({text:'<?php echo e(session()->get('success')); ?>',variant:'success',position:'right-top'})"
    >
  <?php endif; ?>


  <?php if(session()->has('info')): ?>
    <button
      class="showAlertButton btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
      @click="$notification({text:'<?php echo e(session()->get('info')); ?>',variant:'info',position:'right-top'})"
    >
  <?php endif; ?>


  <?php if(session()->has('warning')): ?>
    <button
      class="showAlertButton btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
      @click="$notification({text:'<?php echo e(session()->get('warning')); ?>',variant:'warning',position:'right-top'})"
    >
      toastr.warning("<?php echo e(session()->get('warning')); ?>");
  <?php endif; ?>


  <?php if(session()->has('error')): ?>
    <button
      class="showAlertButton btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
      @click="$notification({text:'<?php echo e(session()->get('error')); ?>',variant:'error',position:'right-top'})"
    > 
  <?php endif; ?>
<script>
    window.addEventListener("DOMContentLoaded", () => Alpine.start());
    function showAlerts() {
      var btns = document.getElementsByClassName('showAlertButton');
      console.log(btns);
      for(i=0;i<btns.length;i++)
        btns[i].click();
    }
</script>
</body>
</html>
<?php /**PATH /home/vagrant/web/platinum-club-app/Platinum-Club-App/resources/views/admin/login.blade.php ENDPATH**/ ?>