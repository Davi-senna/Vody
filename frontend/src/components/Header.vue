<template>

    <header>
        <span id="soon">
            <a href="#">
                Vody
            </a>
        </span>

        <span id="title">
            ÁREA DE TRABALHO
        </span>

        <div id="menu-icon">

            <a href="#">

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

    <Sidebar/>

</template>
  
<script>

import Sidebar from '@/components/Sidebar.vue'

export default {
    name: 'Header',
    components:{
        Sidebar
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