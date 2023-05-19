<template>

    <header id="header-page">
        <span id="soon">
            <a href="#">
                Vody
            </a>
        </span>

        <span id="title">
            Área de trabalho 
        </span>

        <div id="menu-icon">

            <a @click="menuVisibility=!menuVisibility">

                <div class="menu-row">
                    <div class="item-menu"></div>
                    <div class="item-menu"></div>
                    <div class="item-menu"></div>
                </div>

                <div class="menu-row">
                    <div class="item-menu"></div>
                    <div class="item-menu"></div>
                    <div class="item-menu"></div>
                </div>

                <div class="menu-row">
                    <div class="item-menu"></div>
                    <div class="item-menu"></div>
                    <div class="item-menu"></div>
                </div>

            </a>

        </div>
        
    </header>
    <Sidebar @changeView="modifyView" @situationExchangeLogged="situationExchangeLogged" @exchangeVisibility="exchangeVisibilityMenu" :visibility=menuVisibility :currentView=view />
    

</template>
  
<script>

import Sidebar from '@/components/Sidebar.vue'


export default {
    name: 'Header', 
    components:{
        Sidebar
    },
    props:{
        view: String
    },
    emits: ['situationExchangeLogged','changeView'],
    data(){
        return{
            menuVisibility : false
        }
    },
    methods:{
        exchangeVisibilityMenu(){
            this.menuVisibility = !this.menuVisibility;
        },
        situationExchangeLogged(params){
            this.$emit('situationExchangeLogged',params);
        },
        modifyView(params){
            this.$emit('changeView',params);
        }
    }
}

</script>

<style scoped>

    header {
      width: 100vw;
      height: 9vh;
      background-color: var(--main-color);
      font-family: 'Ubuntu', sans-serif;
      display: flex;
      justify-content: space-between;
      padding: 0 3vw;
    }

    a{
        text-decoration:none;
        color: var(--grey-light-color);
    }

    a:hover{
        text-decoration:none;
        color: var(--secondary-color);
        cursor: pointer;
    }

    #soon{
        font-size:30px;
        display: flex;
        height: 100%;
    }

    #soon a{
        font-size:30px;
        display: flex;
        align-items: center;
    }

    #title{
        color: var(--secondary-color); 
        font-size:30px;
        display: flex;
        align-items: center;
    }

    #menu-icon{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .menu-row{
        display: flex;
        justify-content: space-between;
    }

    .item-menu{
        height: 7px;
        width: 7px;
        background-color: var(--secondary-color);
        margin: 3px;
        border-radius: 2px;
    }

</style>