<?php  
ob_start();
/* 
Template Name: Register Page
*/  
   
get_header();   
global $wpdb, $user_ID,$errors;  
//Check whether the user is already logged in  
if ($user_ID) 
{  
   
    // They're already logged in, so we bounce them back to the homepage.  
    wp_redirect(home_url());  
   
} else
 {  
   
    $errors = array();  
   
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
      {  
   
        // Check username is present and not already in use  
        $username = $wpdb->escape($_REQUEST['username']);  
        if ( strpos($username, ' ') !== false )
        {   
            $errors['username'] = "Sorry, no spaces allowed in usernames";  
        }  
        if(empty($username)) 
        {   
            $errors['username'] = "Please enter a username";  
        } elseif( username_exists( $username ) ) 
        {  
            $errors['username'] = "Username already exists, please try another";  
        }  
   
        // Check email address is present and valid  
        $email = $wpdb->escape($_REQUEST['email']);  
        if( !is_email( $email ) ) 
        {   
            $errors['email'] = "Please enter a valid email";  
        } elseif( email_exists( $email ) ) 
        {  
            $errors['email'] = "This email address is already in use";  
        }  
   
        // Check password is valid  
        if(0 === preg_match("/.{6,}/", $_POST['password']))
        {  
          $errors['password'] = "Password must be at least six characters";  
        }  
   
        // Check password confirmation_matches  
        if(0 !== strcmp($_POST['password'], $_POST['password_confirmation']))
         {  
          $errors['password_confirmation'] = "Passwords do not match";  
        }  
    
        if(0 === count($errors)) 
         {  
   
            $password = $_POST['password'];  
   
            $new_user_id = wp_create_user( $username, $password, $email );   
   
            $success = 1; 
             
             // Send the newly created user to the home page 
            wp_redirect(home_url('/login')); exit;
   
        }  
   
    }  
}  
  
?>


<!-- Register -->
<div class="min-h-screen flex flex-col pt-16" id="register-page">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2 m-5">
        <div class="bg-white  dark:bg-[#222c3b] px-6 py-8 rounded shadow-md text-black w-full dark:text-white">
            <h1 class="mb-8 text-3xl text-center">Sign up</h1>
            <form class="space-y-4 md:space-y-6" id="wp_signup_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>"
                method="post">
                <div>

                    <input type="text" class="block border border-gray-300 w-full p-3 rounded dark:text-gray-800" name="username"
                        placeholder="Username" />

                    <!-- If exists any error display it -->
                    <?php if(isset($errors['username'])):?>
                    <span class="text-red-500 text-sm">
                        <?php echo $errors['username']?>
                    </span>
                    <?php endif ?>


                </div>
                <input type="text" class="block border border-gray-300 w-full p-3 rounded dark:text-gray-800" name="email"
                    placeholder="Email" />

                <!-- If exists any error display it -->
                <?php if(isset($errors['email'])):?>
                <span class="text-red-500 text-sm">
                    <?php echo $errors['email']?>
                </span>
                <?php endif ?>

                <input type="password" class="block border border-gray-300 w-full p-3 rounded dark:text-gray-800 " name="password"
                    placeholder="Password" />

                <!-- If exists any error display it -->
                <?php if(isset($errors['password'])):?>
                <span class="text-red-500 text-sm">
                    <?php echo $errors['password']?>
                </span>
                <?php endif ?>

                <input type="password" class="block border border-gray-300 w-full p-3 rounded dark:text-gray-800"
                    name="password_confirmation" placeholder="Confirm Password" />

                <!-- If exists any error display it -->
                <?php if(isset($errors['password_confirmation'])):?>
                <span class="text-red-500 text-sm">
                    <?php echo $errors['password_confirmation']?>
                </span>
                <?php endif ?>

                <button type="submit" id="submitbtn" name="submit"
                    class="w-full text-center py-3 rounded bg-[#4767C9] text-white hover:bg-[#4767E9] focus:outline-none my-1">Create
                    Account</button>

                <div class="text-center text-sm text-gray-700 mt-4 dark:text-gray-300">
                    By signing up, you agree to the
                    <a class="no-underline border-b border-gray-700 text-gray-700 dark:text-gray-400" href="#">
                        Terms of Service
                    </a> and
                    <a class="no-underline border-b border-gray-700 text-gray-700 dark:text-gray-400" href="#">
                        Privacy Policy
                    </a>
                </div>
        </div>
        </form>
        <div class="text-gray-700 m-5 dark:text-gray-100">
            Already have an account?
            <a class="no-underline border-b border-blue-900 text-blue-900" href="<?php echo home_url(). '/login'?>">
                Log in
            </a>.
        </div>

    </div>
</div>
<?php ob_end_flush(); ?>

<?php get_footer(); ?>