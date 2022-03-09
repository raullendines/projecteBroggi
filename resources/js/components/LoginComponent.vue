<template>
    <div class="container border border-dark rounded bg-light">
        <div class="row justify-content-center m-4">
            <div class="col-md-4">
                <img src="" alt="" />
            </div>
                <div class="col-md-6 container">
                    <form needs-validation>
                        <div class="row">
                        <h1>Login</h1>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="Adreça electrònica" oninput="validation()"/>
                                    <label for="email">Adreça electrònica</label>
                                    <div id="feedback-email"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-10">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" placeholder="Contrassenya" oninput="validation()"/>
                                    <label for="password">Contrassenya</label>
                                    <div id="feedback-password"></div>
                                </div>
                            </div>
                            <div class="col-2">
                                <button class="btn rounded-pill" type="button" style="background-color: #00b0c8" onclick="viewPassword()"> <i class="fa fa-eye"></i> </button>
                            </div>
                            <div class="d-grid gap-2 col-12 mt-3">
                                <button class="btn rounded-pill" type="button" style="background-color: #00b0c8">
                                    Accedir
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        viewPassword() {
            var password = document.getElementById("password");
            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
        },
        validation() {
            var password = document.getElementById("password").value;
            var email = document.getElementById("email").value;

            if (password.length >= 10) {
                var mensaje = "Correcto";
            } else {
                var mensaje = "Error";
            }

            document.getElementById("feedback-password").innerHTML = mensaje;
        },
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
