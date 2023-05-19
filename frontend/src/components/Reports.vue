<template>
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

import PanelReports from '@/components/PanelReports.vue'
import CategoryReports from '@/components/CategoryReports.vue'
import RegistryReports from '@/components/RegistryReports.vue'

export default {
    name: "Reports",
    props:{
        logged: Boolean,
        id: Number,
        name: String,
        login: String,
        password: String
    },
    components: {
        PanelReports,
        CategoryReports,
        RegistryReports
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
    justify-content: space-between;
    padding: 0 2%;
    align-items: center;
}

#left-reports {
    height: 92%;
    width: 70%;
}

#right-reports{
    width: 28%;
    height: 92%;
}

#top-panel{
    display: flex;
    justify-content: space-between;
    height: 32%;
    
}

</style>
