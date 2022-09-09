<template>

    <div id="container-modal">
        <div id="modal">
            <div id="modal-header">
                <span id="modal-title">Fazer Cadastro</span>
                <span @click="$emit('exchangeVisibility')" id="modal-back">X</span>
            </div>

            <form id="container-inputs" @submit="userRegister">
                <input type="text" name="name" id="name" v-model="name" placeholder="Nome completo">
                <input type="text" name="login" id="login" v-model="login" placeholder="Login">
                <input type="password" name="password" id="password" v-model="password" placeholder="Senha">
                <input id="modal-button" type="submit" value="Entrar">
                <span class="error" v-if="error!=null">{{error}}</span>
            </form>

        </div>
    </div>

</template>

<script>
export default {
    name: "SettingsModal",
    emits: ['exchangeVisibility'],
    data() {
        return {
            "name": null,
            "login": null,
            "password": null,
            "error" : null,
        }
    },
    methods: {
        async userRegister(e) {
            e.preventDefault();
            if (this.name != null && this.login != null && this.password != null) {
                const user = {
                    name: this.name,
                    login: this.login,
                    password: this.password,
                    status: true
                }

                const userJson = JSON.stringify(user)

                const req = await fetch("http://localhost:8000/api/register", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: userJson
                })

                const resp = await req.json();
                console.log(resp);
                if(resp.success){
                    this.$emit('exchangeVisibility')
                }else{
                    this.error = "Usuário já existe"
                    this.reset()
                }
            }else{
                this.error = "Preencha todos os campos"
                this.reset()
            }
        },
        reset(){
            this.name = null
            this.login = null
            this.password = null
        }
    }
}
</script>

<style scoped>
#container-modal {
    position: absolute;
    background-color: rgba(0, 0, 0, 0.8);
    width: 100vw;
    height: 91vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Ubuntu', sans-serif;
    color: var(--main-color);
    z-index: 101;
}

#modal {
    background-color: var(--secondary-color);
    border: 1px solid var(--main-color);
    border-radius: 26px;
    animation-name: modal;
    animation-duration: 0.3s;
    width: 450px;
    height: 380px;

}

@keyframes modal {
    from {
        width: 150px;
        height: 100px;
    }

    to {
        width: 450px;
        height: 300px;
    }
}

a:hover {
    cursor: pointer;
}

#modal-header {
    display: flex;
    justify-content: space-between;
    padding: 10px 20px;
    font-size: 20px;
}

#container-inputs {
    margin-top: 30px;
    width: 100%;
    display: flex;
    align-items: center;
    flex-direction: column;
}

select,
input {
    width: 90%;
    height: 6vh;
    border-radius: 5px;
    padding-left: 20px;
    border: 1px solid;
    margin-bottom: 25px;
}

.error{
    margin: 5px 0;
    color: red;
}

option {
    color: var(--main-color)
}

#modal-back:hover {
    cursor: pointer;
}

#modal-button {
    width: 60%;
    padding-left: 0;
    margin-bottom: 0;
}

#modal-button:hover {
    background-color: var(--main-color);
    color: var(--secondary-color)
}
</style>