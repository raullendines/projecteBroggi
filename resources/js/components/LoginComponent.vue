<template>
    <div class="container border border-dark rounded bg-light">
        <div class="row justify-content-center m-4">
            <div class="col-md-4">
                <img src="" alt="">
            </div>
            <div class="col-md-4">
                <h1>Login</h1>
                <form needs-validation>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Adreça electrònica" oninput="validation()">
                        <label for="email">Adreça electrònica</label>
                        <div id="feedback-email"> </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Contrassenya" oninput="validation()">
                        <label for="password">Contrassenya</label>
                        <div id="feedback-password"></div>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn rounded-pill" type="button" style="background-color: #00B0C8">Accedir</button>
                    </div>
                </form>
            </div>           
        </div>
    </div>
</template>

<script>
    function viewPassword() {
        var password = document.getElementById("password");
            if (password.type === "password") 
            {
                password.type = "text";
            } else 
            {
                password.type = "password";
            }
    }

    function validation(){
        var password = document.getElementById("password").value;
        var email = document.getElementById("email").value;

        if (password.length >= 10) {
            var mensaje = "Correcto";
        }else{
            var mensaje = "Error";
        }
        
        document.getElementById("feedback-password").innerHTML = mensaje;
    }
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>