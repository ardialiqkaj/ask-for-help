<?php  
/* 
Template Name: Login Page
*/  
ob_start();
get_header();   
if($_POST) 
{  
   
    global $wpdb;  
   
    //We shall SQL escape all inputs  
    $username = $wpdb->escape($_REQUEST['username']);  
    $password = $wpdb->escape($_REQUEST['password']);  
   

   
    $login_data = array();  
    $login_data['user_login'] = $username;  
    $login_data['user_password'] = $password;  
   
    $user_verify = wp_signon( $login_data, false );   
   
    if ( is_wp_error($user_verify) )   
    {  
        
        $errors = array();  
        $username = $wpdb->escape($_REQUEST['username']);  
        $password=$wpdb->escape($_REQUEST['password']);
        if(empty($username) ){
            $errors['username']="Please enter a username";
        }
        if(empty($password)){
            $errors['password']="Please enter a password";
        }
       else{
            $errors['password']="Username or Password is incorrect!";
        }
     } else
    {    
       wp_redirect(home_url());
       exit();  
     }  
   
} 
 ?>


<!-- Login -->
<div class="min-h-screen flex flex-col pt-16" id="login-page">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2 m-5">
        <div class="bg-white dark:bg-[#222c3b] px-6 py-8 rounded shadow-md text-black dark:text-white">
            <h1 class="mb-8 text-3xl text-center">Log in</h1>
            <form class="space-y-4 md:space-y-6" id="login1" name="form" action="<?php echo home_url(); ?>/login/"
                method="post">
                <div>

                    <input type="text" class="block border border-gray-300 w-full p-3 rounded mb-4 dark:text-gray-800" name="username"
                        placeholder="Username" />
                    <?php if(isset($errors['username'])):?>
                    <span class="text-red-500 text-sm">
                        <?php echo $errors['username']?>
                    </span>
                    <?php endif ?>
                </div>
                <input type="password" class="block border border-gray-300 w-full p-3 rounded mb-4 dark:text-gray-800" name="password"
                    placeholder="Password" />
                <?php if(isset($errors['password'])):?>
                <span class="text-red-500 text-sm">
                    <?php echo $errors['password']?>
                </span>
                <?php endif ?>
                <br>

                <input type="checkbox" value="remember" id="remember"> <label for="remember">Remember me</label>
                <div class="justify-center text-center p-4 ">
                    <button type="submit" id="submitbtn" name="submit"
                        class="w-full text-center py-3 rounded bg-[#4767C9] text-white hover:bg-[#4767E9] focus:outline-none my-1">Login
                    </button>
                </div>


                <div class="text-center text-sm text-gray-700 mt-4 dark:text-gray-300 ">
                    By log in, you agree to the
                    <a class="no-underline border-b border-gray-700 text-gray-700 dark:text-gray-400 " href="#">
                        Terms of Service
                    </a> and
                    <a class="no-underline border-b border-gray-700 text-gray-700 dark:text-gray-400" href="#">
                        Privacy Policy
                    </a>
                </div>
        </div>
        </form>
        <div class="text-gray-700 m-5 dark:text-gray-100">
            Not registered yet?
            <a class="no-underline border-b border-blue-900 text-blue-900 " href="<?php echo home_url(). '/register'?>">
                Create an Account
            </a>.
        </div>

    </div>
</div>
<?php ob_end_flush();?>
<?php get_footer(); ?>