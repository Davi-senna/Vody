<template>

    <div v-if="visibility" id="menu-container">
        <div @click="$emit('exchangeVisibility')" id="back-menu"></div>
        <nav>
            <div id="menu-title" class="menu-item">Menu</div>
            <ul>

                <li>
                    <div @click="changeView('home')" class="menu-item menu-link">
                        Início
                    </div>
                </li>

                <li>
                    <div @click="changeView('reports')" v-if="id != false" class="menu-item menu-link">
                        Relatórios
                    </div>
                    <div @click="alertLogged()" v-if="id == false" id="reportsDisabled" class="menu-item menu-link">Relatórios</div>
                </li>

                <li>
                    <div to="" class="menu-item menu-link">
                        Configurações
                    </div>
                </li>

            </ul>

            <div id="menu-footer">
                <a v-if="!logged" @click="exchangeVisibilityLogin()">Entrar<img src="../../src/assets/img/Login-icon.png" alt="Fazer login"></a>
                <a v-if="logged">Sair<img src="../../src/assets/img/Logout-icon.png" alt="sair"></a>
            </div>
        </nav>
    </div>

    <LoginModal @situationExchangeLogged="situationExchangeLogged" @register="register" @exchangeVisibility="exchangeVisibilityLogin" v-show="LoginVisibility"/>
    <RegisterModal @exchangeVisibility="exchangeVisibilityRegister" v-show="RegisterVisibility"/>
</template>

<script>

import LoginModal from '@/components/LoginModal.vue'
import RegisterModal from '@/components/RegisterModal.vue'

export default {
    name: 'Sidebar',
    props: {
        visibility: Boolean,
        currentView: String
    },
    emits:['exchangeVisibility','situationExchangeLogged','changeView'],
    components:{
        LoginModal,
        RegisterModal,
    },
    data(){
        return {
            LoginVisibility: false,
            RegisterVisibility: false,
            logged: false,
            id: false
        }
    },
    methods:{
        exchangeVisibilityLogin(){
            this.LoginVisibility = !this.LoginVisibility
        },
        register(){
            this.exchangeVisibilityLogin()
            this.RegisterVisibility = !this.RegisterVisibility 
        },
        exchangeVisibilityRegister(){
            this.RegisterVisibility = !this.RegisterVisibility
        },
        situationExchangeLogged(params){
            this.logged = !this.logged;
            this.$emit('situationExchangeLogged',params);
            this.id = params.id;
            
        },
        alertLogged(){
            alert('Faça login para acessar os seus relatórios');
        },
        changeView(view){
            this.$emit('changeView',view);
        }
    },

}

</script>

<style scoped>
nav {
    background-color: var(--main-color);
    width: 250px;
    height: 100%;
    border-top: 1px solid var(--grey-color);
    position: absolute;
    animation-name: menu;
    animation-duration: 0.5s;
}

@keyframes menu {
    from {
        right: -250px;
    }

    to {
        right: 0;
    }
}

#back-menu {
    width: 72%;
    margin-right: 250px;
}



ul {
    list-style: none;
    padding: 0;
    display: flex;
    justify-content: center;
    flex-direction: column;
    width: 100%;
}

a {
    text-decoration: none;
}

a:hover {
    cursor: pointer;
}

#menu-container {
    width: 100vw;
    height: 91vh;
    margin-top: 9vh;
    position: absolute;
    top: 0;
    display: flex;
    justify-content: flex-end;
    overflow: hidden;
    z-index: 99;
    grid-template-columns: auto 250px;

}

#menu-close {
    width: 72%;
}

#menu-close:hover {
    cursor: pointer;
}

.menu-item {
    text-decoration: none;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    cursor: pointer;
}

#menu-title {
    font-weight: 600;
    height: 17vh;
    color: var(--secondary-color);
    border-bottom: 1px solid var(--grey-color);
    width: 100%;
}

.menu-link {
    width: 80%;
    height: 60px;
    color: var(--secondary-color);
    background-color: transparent;
    border-radius: 10px;
    border: 1px solid var(--secondary-color);
}

.menu-link:hover {
    color: var(--main-color);
    background-color: var(--secondary-color);
    border-radius: 10px;
    border: 1px solid var(--secondary-color);
    transition: .4s;
}

li {
    display: flex;
    justify-content: center;
    margin-top: 6.5vh;
}

#menu-footer {
    margin-top: 6.5vh;
    border-top: 1px solid var(--grey-color);
    height: 22vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;

}

#menu-footer a {
    color: var(--secondary-color);
}

#menu-footer img {
    width: 35px
}
</style>