<template>
    <Header @situationExchangeLogged="situationExchangeLogged" />

    <section id="content">
        <div id="left-reports">
            <div id="top-panel">

                <PanelReports />
                <PanelReports />
                <PanelReports />
                
            </div>
        </div>
    </section>
</template>

<script>

import Header from '@/components/Header.vue'
import PanelReports from '@/components/PanelReports.vue'

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
        PanelReports
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
    width: 72%;
}
</style>
