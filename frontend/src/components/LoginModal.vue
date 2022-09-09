<template>

    <div id="container-modal">
        <div id="modal">
            <div id="modal-header">
                <span id="modal-title">Fazer login</span>
                <span @click="$emit('exchangeVisibility')" id="modal-back">X</span>
            </div>

            <form @submit="auth" id="container-inputs">
                <input type="text" name="login" id="login" v-model="login" placeholder="Login">
                <span class="error" v-if="error!=null">{{error}}</span>
                <input type="password" name="Password" id="Password" v-model="password" placeholder="Senha">
                <input id="modal-button" type="submit" value="Entrar">
                <a @click="$emit('register')">Não tenho uma conta</a>
            </form>

        </div>
    </div>

</template>

<script>
export default {
    name: "SettingsModal",
    emits: ['exchangeVisibility', 'register'],
    data() {
        return {
            login: null,
            password: null,
            error : null
        }
    },
    methods: {
        async auth(e) {
            e.preventDefault();
            if (this.login != null && this.password != null){

                const request = await fetch(`http://localhost:8000/api/auth/${this.login}/${this.password}`, {
                    method: "GET",
                    headers: { "Content-Type": "application/json" },
                })

                const response = await request.json();

                console.log(response)

                if(response.success){
                    this.$emit('exchangeVisibility')
                }else{
                    this.error = "Usuário ou senha incorreta"
                    this.reset()
                }

            }else{
                this.error = "Preencha todos os campos"
            }

        },
        reset(){
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
    z-index: 100;
}

#modal {
    background-color: var(--secondary-color);
    border: 1px solid var(--main-color);
    border-radius: 26px;
    animation-name: modal;
    animation-duration: 0.3s;
    width: 450px;
    height: 320px;

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

a {
    margin-top: 10px
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

.error{
    color: red;
}

#container-inputs {
    margin-top: 30px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-direction: column;
    height: 220px;
}

select,
input {
    width: 90%;
    height: 45px;
    border-radius: 5px;
    padding-left: 20px;
    border: 1px solid;
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