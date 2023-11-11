<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login_register.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Forgot</title>
</head>

<body>
    <div class="contrainer">
        <img class="b_img_yan" src="./imgs/yan.jpg" alt="" />
        <div class="col-5
        ">
            <img class="b_img" src="./imgs/cd693bc4-a693-4cda-9d84-fc4e69e855be.jpg" alt="" />
        </div>
        <div class="col b_login_sag">
            <h1>Forgot password?</h1>
            <p>Please enter your email address to continue</p>
            @if (session('email'))
                <div class="alert alert-danger">
                    {{ session('email') }}
                </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <div class="row b_inputs">
                <div class="col-1">
                    <svg width="576" height="72" viewBox="0 0 576 72" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="64" height="64" rx="16" fill="#503E9D" fill-opacity="0.1" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M22.4 23H41.6C42.9255 23 44 24.0633 44 25.375V39.625C44 40.9367 42.9255 42 41.6 42H22.4C21.068 42 20 40.9312 20 39.625V25.375C20 24.0569 21.068 23 22.4 23ZM32 31.3125L41.6 25.375H22.4L32 31.3125ZM41.6 28.1894V39.625H22.4V28.1894L32 34.115L41.6 28.1894Z"
                            fill="#503E9D" />
                    </svg>
                </div>
                <form action="{{ route('send.email') }}">
                    @csrf
                    <div class="col">
                        <input class="b_input_text" type="text" name="email" placeholder="Email" />
                    </div>
                    <input type="button" class="b_button_continue" value="Continue">
                    <div class="reset_password_bg">
                        <div class="reset_password">
                            <div class="reset_svg">
                                <i id="reset_exit" class="fa-solid fa-plus"
                                    style="font-size: 30px; transform: rotate(45deg)"></i>
                                <svg width="576" height="72" viewBox="0 0 576 72" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="64" height="64" rx="16" fill="#503E9D"
                                        fill-opacity="0.1" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M22.4 23H41.6C42.9255 23 44 24.0633 44 25.375V39.625C44 40.9367 42.9255 42 41.6 42H22.4C21.068 42 20 40.9312 20 39.625V25.375C20 24.0569 21.068 23 22.4 23ZM32 31.3125L41.6 25.375H22.4L32 31.3125ZM41.6 28.1894V39.625H22.4V28.1894L32 34.115L41.6 28.1894Z"
                                        fill="#503E9D" />
                                </svg>
                            </div>
                            <h2>
                                Reset email sent
                            </h2>
                            <p>
                                We have just sent an email with a password reset link to
                                <span style="font-weight: bold" id="b_input_span"></span>
                            </p>
                            <div class="row">
                                <button type="submit" class="b_reset_button_gotit">Got it</button>
                                <button class="b_reset_button_send">Send again</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const reset_exit = document.getElementById("reset_exit");
        const reset_password_bg = document.querySelector(".reset_password_bg");
        const reset_password = document.querySelector(".reset_password");
        const b_reset_button_send = document.querySelector(".b_reset_button_send");
        const b_button_continue = document.querySelector(".b_button_continue");
        const b_input_text = document.querySelector(".b_input_text");
        const b_input_span = document.getElementById("b_input_span");

        b_reset_button_send.addEventListener("click", () => {
            reset_password_bg.style.display = "none";
            reset_password.style.display = "none";
        });

        b_button_continue.addEventListener("click", () => {
            reset_password_bg.style.display = "block";
            reset_password.style.display = "block";
            const email = b_input_text.value;
            b_input_span.textContent = email;
        });

        reset_exit.addEventListener("click", () => {
            reset_password_bg.style.display = "none";
            reset_password.style.display = "none";
        });
        b_input_span.value = b_input_text.value;
    </script>


</body>

</html>
