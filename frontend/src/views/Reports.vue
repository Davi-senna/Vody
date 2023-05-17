<template>
    <Header @situationExchangeLogged="situationExchangeLogged" />

    <section id="content">
        <div id="left-reports">
            <div id="top-panel">

                <PanelReports day="today" textDescription="Hoje" />
                <PanelReports day="week" textDescription="Essa semana" />
                <PanelReports day="month" textDescription="Esse mês" />

            </div>

            <CategoryReports/>
            
        </div>

        <div id="right-reports">
            <RegistryReports/>
        </div>
    </section>
</template>

<script>

import Header from '@/components/Header.vue'
import PanelReports from '@/components/PanelReports.vue'
import CategoryReports from '@/components/CategoryReports.vue'
import RegistryReports from '@/components/RegistryReports.vue'

export default {
    name: "Reports",
    data() {
        return {
            logged: false,
            id: null,
            name: null,
            login: null,
            password: null,
        }
    },
    components: {
        Header,
        PanelReports,
        CategoryReports,
        RegistryReports
    },
    methods: {
        situationExchangeLogged(params) {
            this.logged = !this.logged
            this.id = params.id
            this.name = params.name
            this.login = params.login
            this.password = params.password
        }
    }

}

</script>

<style>
:root {
    --main-color: rgb(0, 0, 0);
    --secondary-color: rgb(255, 255, 255);
    --grey-light-color: rgb(200, 200, 200);
    --grey-color: #707070;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

@import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500;700&display=swap');

#content {
    height: 91vh;
    width: 100%;
    display: flex;
}

#left-reports {
    height: 100%;
    width: 70%;
    padding: 2%;
}

#top-panel{
    display: flex;
    justify-content: space-between;
    align-items: center;
    
}

#right-reports{
    width: 28%;
    height: 92%;
    padding-top: 1%;
}
</style>
