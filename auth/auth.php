<?php 
if(isset($_GET['error'])){
    if($_GET['error'] == 'pass'){
        echo "<p class='bg-red-500 text-white font-bold text-center py-3'>Password Wrong</p>";
    }
    if($_GET['error'] == 'email'){
        echo "<p class='bg-red-500 text-white font-bold text-center py-3'>Email Wrong</p>";
    }
    if($_GET['error'] == 'dbConn'){
        echo "<p class='bg-red-500 text-white font-bold text-center py-3'>Database Connection Error</p>";
    }
    if($_GET['error'] == 'emailexist'){
        echo "<p class='bg-red-500 text-white font-bold text-center py-3'>Email Already Exist</p>";
    }
    if($_GET['error'] == 'geterror'){
        echo "<p class='bg-red-500 text-white font-bold text-center py-3'>Someting Is Wrong</p>";
    }
    
}

?>

<style>
   
    .custom-bg {
        position: relative;
    }

    .custom-bg::before {
        content: "";
        position: absolute;
        background-size: cover;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url("https://www.affordable.pk/uploads/blog/1641910889_Untitled%20design%20(7).jpg");
        opacity: 1;
        /* Keep opacity at 1 */

        z-index: -1;
    }

    .form_flex {
        display: flex;
        transition: transform 1s ease;
    }

    .flex-row-reverse {
        flex-direction: row-reverse;
    }

    .form_flex.slide-out {
        transform: translateX(5%);
    }

    .form_flex.slide-in {
        transform: translateX(-5%);
    }
</style>

<div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
    <div class="mx-auto p-5 flex justify-center items-center">
        <div class="custom-bg bg-cover w-[800px] h-[600px] text-white">
            <div class="flex form_flex  ">
                <div class="bg-white p-2 md:w-[500px] w-full h-[600px] ">
                    <!-- Sign IN  -->
                    <form class="block sign_in mx-auto" action="login.php" method="post">
                        <!-- sign in form  -->
                        <div class="w-full bg-white p-3 md:rounded-l-0 rounded-l-lg rounded-r-lg flex items-center justify-center text-gray-950 text-center relative">
                            <div class="p-5">
                                <div class="mb-5">
                                    <div class="mb-2 flex items-center justify-center">
                                        <a href="#">
                                            <img src="https://snipbyte.com/_next/image?url=%2Fassets%2Fimages%2Fpng%2FsnipbyteLogo.png&w=256&q=80" width="95px" height="15px" />
                                        </a>
                                    </div>

                                    <div class="md:hidden block text-xl md:text-2xl mb-2 font-normal">
                                        Hello Again!
                                    </div>
                                    <div class="md:hidden block text-xs md:text-sm mb-2 font-normal text-gray-400">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fuga veniam ea minima vitae.
                                    </div>
                                </div>
                                <div class="mb-[40px]">
                                    <div class="relative mb-2">
                                        <input name="email" type="email" id="floatingEmail" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-950 bg-transparent border border-t-0 border-r-0 border-l-0 border-gray-400 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder="" required/>
                                        <label for="floatingEmail" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Email</label>
                                        <span class="absolute top-1/2 right-2 -translate-y-1/2 text-gray-400">
                                            <i class="fa-solid fa-at"></i>
                                        </span>
                                    </div>
                                    <div class="relative mb-2">
                                        <input name="pass" type="password" id="floatingPassword" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-950 bg-transparent border border-t-0 border-r-0 border-l-0 border-gray-400 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder="" required/>
                                        <label for="floatingPassword" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Password</label>
                                        <span class="absolute top-1/2 right-2 -translate-y-1/2 text-gray-400">
                                            <!-- Lock icon as inline SVG -->
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <div class="text-xs text-gray-400">Remember me</div>
                                        <div class="text-xs text-indigo-500 font-medium">
                                            <a href="<?php echo $databaseFN->mainUrl . "/auth?checkPoint=forgetPass" ?>" class="hover:underline hover:underline-offset-4">Forget Password</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <button type="submit" name="login" class="w-full text-center text-white bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded p-2 text-sm">
                                        Login
                                    </button>
                                </div>
                                <div class="mb-5">
                                    <button class="rounded w-full text-sm text-center text-gray-400 border border-gray-300 p-2 flex items-center justify-center">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/2008px-Google_%22G%22_Logo.svg.png" height="20px" width="20px" class="mx-4" />
                                        Sign in with google
                                    </button>
                                </div>
                                <div class="hidden md:flex md:items-center md:justify-center">
                                    <div class="mx-2 p-3 bg-white rounded-full shadow-lg text-center">
                                        <i class="fa-brands fa-facebook-f text-indigo-500 "></i>
                                    </div>
                                    <div class="mx-2 p-3 bg-white rounded-full shadow-lg text-center">
                                        <i class="fa-brands fa-instagram text-orange-300"></i>
                                    </div>
                                    <div class="mx-2 p-3 bg-white rounded-full shadow-lg text-center">
                                        <i class="fa-brands fa-twitter text-sky-500"></i>
                                    </div>
                                    <div class="mx-2 p-3 bg-white rounded-full shadow-lg text-center">
                                        <i class="fa-brands fa-whatsapp text-green-300"></i>
                                    </div>
                                </div>
                                <div class="block md:hidden absolute bottom-7 left-0 right-0 flex justify-center items-center text-sm text-gray-400">
                                    Dont have an account yet ?
                                    <span class="font-bold text-indigo-500 mx-1 cursor-pointer" id="showSignUpFrom">Sign up</span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Sign IN  -->

                    <!-- Sign UP  -->
                    <form class="sign_up hidden mx-auto" action="signup.php" method="post">
                        <div class="w-full bg-white p-3 md:rounded-l-0 rounded-l-lg rounded-r-lg flex items-center justify-center text-gray-950 text-center relative">
                            <div class="p-5">
                                <div class="mb-5">
                                    <div class="mb-2 flex items-center justify-center">
                                        <a href="#">
                                            <img src="https://snipbyte.com/_next/image?url=%2Fassets%2Fimages%2Fpng%2FsnipbyteLogo.png&w=256&q=80" width="95px" height="15px" />
                                        </a>
                                    </div>

                                    <div class="md:hidden block text-xl md:text-2xl mb-2 font-normal">
                                        Welcome To Family !
                                    </div>
                                    <div class="md:hidden block text-xs md:text-sm mb-2 font-normal text-gray-400">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    </div>
                                </div>
                                <div class="mb-[40px]">
                                    <div class="relative mb-2">
                                        <input name="name" type="text" id="floatingfName" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-950 bg-transparent border border-t-0 border-r-0 border-l-0 border-gray-400 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder="" required/>
                                        <label for="floatingfName" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Your Name</label>
                                        <span class="absolute top-1/2 right-2 -translate-y-1/2 text-gray-400">
                                            <!-- Lock icon as inline SVG -->
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                    </div>
                                    <div class="relative mb-2">
                                        <input name="email" type="email" id="floatingEmail" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-950 bg-transparent border border-t-0 border-r-0 border-l-0 border-gray-400 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder="" required/>
                                        <label for="floatingEmail" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Email</label>
                                        <span class="absolute top-1/2 right-2 -translate-y-1/2 text-gray-400">
                                            <i class="fa-solid fa-at"></i>
                                        </span>
                                    </div>
                                    <div class="relative mb-2">
                                        <input name="pass" type="password" id="floatingPassword" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-950 bg-transparent border border-t-0 border-r-0 border-l-0 border-gray-400 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder="" required/>
                                        <label for="floatingPassword" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Password</label>
                                        <span class="absolute top-1/2 right-2 -translate-y-1/2 text-gray-400">
                                            <!-- Lock icon as inline SVG -->
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                    </div>
                                    <div class="relative mb-2">
                                        <input name="conPass" type="password" id="conPass" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-950 bg-transparent border border-t-0 border-r-0 border-l-0 border-gray-400 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder="" required/>
                                        <label for="conPass" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-indigo-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Confirm Password</label>
                                        <span class="absolute top-1/2 right-2 -translate-y-1/2 text-gray-400">
                                            <!-- Lock icon as inline SVG -->
                                            <i class="fa-solid fa-lock"></i>
                                        </span>
                                    </div>
                                    <input name="date" hidden value="<?php date_default_timezone_set("Asia/Dhaka"); echo date("d-m-Y h:i:s A"); ?>" id="date" type="text" >
                                </div>
                                <div class="mb-5">
                                    <button class="w-full text-center text-white bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded p-2 text-sm" type="submit" name="signUp">
                                        Register
                                    </button>
                                </div>
                                <div class="mb-5">
                                    <button class="rounded w-full text-sm text-center text-gray-400 border border-gray-300 p-2 flex items-center justify-center">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/2008px-Google_%22G%22_Logo.svg.png" height="20px" width="20px" class="mx-4" />
                                        Sign up with google
                                    </button>
                                </div>
                                <div class="hidden md:flex md:items-center md:justify-center">
                                    <div class="mx-2 p-3 bg-white rounded-full shadow-lg text-center">
                                        <i class="fa-brands fa-facebook-f text-indigo-500 "></i>
                                    </div>
                                    <div class="mx-2 p-3 bg-white rounded-full shadow-lg text-center">
                                        <i class="fa-brands fa-instagram text-orange-300"></i>
                                    </div>
                                    <div class="mx-2 p-3 bg-white rounded-full shadow-lg text-center">
                                        <i class="fa-brands fa-twitter text-sky-500"></i>
                                    </div>
                                    <div class="mx-2 p-3 bg-white rounded-full shadow-lg text-center">
                                        <i class="fa-brands fa-whatsapp text-green-300"></i>
                                    </div>
                                </div>
                                <div class="block md:hidden absolute bottom-7 left-0 right-0 flex justify-center items-center text-sm text-gray-400">
                                    Already a member ?
                                    <span class="font-bold text-indigo-500 mx-1 cursor-pointer" id="showSignInFrom">Sign in</span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Sign UP  -->
                </div>
                <div class="hidden buttons md:flex md:items-center md:justify-center mx-auto h-full">
                    <div class="mt-5 signup block text-center w-[230px] text-center" id="signupButton">
                        <div class="mb-2">
                            <span class="md:text-2xl lg:text-3xl text-xl">Hello Again</span>
                        </div>
                        <div>
                            <span class="mt-2 text-sm text-gray-300">Lorem ipsum dolor sit amet consectetur adipisicing.
                            </span>
                        </div>
                        <button class="mx-auto mt-[230px] w-[90px] p-3 border border-gray-300 text-center rounded-full text-sm">
                            Sign Up
                        </button>
                    </div>
                    <div class="mt-5 signin hidden text-center" id="signinButton">
                        <div class="mb-2">
                            <span class="md:text-2xl lg:text-3xl text-xl">Be a member !</span>
                        </div>
                        <div>
                            <span class="mt-2 text-sm text-gray-300"> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </span>
                        </div>
                        <button class="mx-auto mt-[230px] w-[90px] p-3 border border-gray-300 text-center rounded-full text-sm">
                            Sign In
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const showSignUpFrom = document.getElementById("showSignUpFrom");
        const showSignInFrom = document.getElementById("showSignInFrom");
        const signupButton = document.getElementById("signupButton");
        const signinButton = document.getElementById("signinButton");
        const signUpForm = document.querySelector(".sign_up");
        const signInForm = document.querySelector(".sign_in");
        const parentDiv = document.querySelector(".form_flex");

        showSignUpFrom.addEventListener("click", function() {
            signUpForm.classList.remove("hidden");
            signUpForm.classList.add("block");
            signInForm.classList.remove("block");
            signInForm.classList.add("hidden");
        });
        showSignInFrom.addEventListener("click", function() {
            signUpForm.classList.remove("block");
            signUpForm.classList.add("hidden");
            signInForm.classList.remove("hidden");
            signInForm.classList.add("block");
        });

        signupButton.addEventListener("click", function() {
            signUpForm.classList.remove("hidden");
            signUpForm.classList.add("block");
            signInForm.classList.remove("block");
            signInForm.classList.add("hidden");
            signupButton.classList.add("hidden");
            signinButton.classList.remove("hidden");
            parentDiv.classList.remove("slide-in");
            parentDiv.classList.add("slide-out");
            parentDiv.classList.add("flex-row-reverse");
        });

        signinButton.addEventListener("click", function() {
            signUpForm.classList.add("hidden");
            signUpForm.classList.remove("block");
            signInForm.classList.add("block");
            signInForm.classList.remove("hidden");
            signupButton.classList.remove("hidden");
            signinButton.classList.add("hidden");
            parentDiv.classList.remove("slide-out");
            parentDiv.classList.add("slide-in");
            parentDiv.classList.remove("flex-row-reverse");
        });
    </script>
</div>
