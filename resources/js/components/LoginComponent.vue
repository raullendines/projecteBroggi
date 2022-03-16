<template>
    <div class="container border border-dark rounded bg-light">
        <div class="row d-flex align-items-center">
            <div class="col-xl-5 col-12">
                <img :src="'./img/broggi_bg.png'" class="mx-auto d-block"/>
            </div>
                <div class="col-xl-6 container mb-3">
                    <form needs-validation>
                        <div class="row">
                        <h1>Login</h1>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="Adreça electrònica" oninput="validation()" v-model=/>
                                    <label for="email">Adreça electrònica</label>
<!--                                     <div id="feedback-email"></div>-->
                                 </div>
                            </div>
                            <div class="col-12">
                                <!-- Se me esta quitando el label ayudaaaa -->
                                <div class="input-group form-floating">
                                    <input :type="tipo" class="form-control" id="password" placeholder="Contrassenya" oninput="validation()"/>
                                    <label for="password">Contrassenya</label>
<!--                                     <div id="feedback-password"></div>-->  
                                   <button @click="viewPassword" class="btn input-group-text" type="button" style="background-color: #00b0c8" > <i class="fa fa-eye"></i> </button>

                                </div>
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
    data: () => ({
        tipo: 'password'
    }),
    methods: {
        viewPassword() {

            if (this.tipo === "password") {
                this.tipo = "text";
            } else {
                this.tipo = "password";
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
