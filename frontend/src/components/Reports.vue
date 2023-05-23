<template>
    <section id="content">
        <div id="left-reports">
            <div id="top-panel">

                <PanelReports day="today" textDescription="Hoje" :value=today />
                <PanelReports day="week" textDescription="Essa semana" :value=week />
                <PanelReports day="month" textDescription="Esse mês" :value=month />

            </div>

            <CategoryReports :id=id :login=login :password=password />

        </div>
        <div id="right-reports">
            <RegistryReports />
        </div>
    </section>
</template>

<script>

import PanelReports from '@/components/PanelReports.vue'
import CategoryReports from '@/components/CategoryReports.vue'
import RegistryReports from '@/components/RegistryReports.vue'

export default {
    name: "Reports",
    props: {
        logged: Boolean,
        id: Number,
        name: String,
        login: String,
        password: String,
        reload: Number
    },
    data() {
        return {
            logs: null,
            today: 0,
            week: 0,
            month: 0
        }
    },
    components: {
        PanelReports,
        CategoryReports,
        RegistryReports
    },
    watch: {
        logged(newlogged) {
            if (newlogged) {
                this.getLog()
            }
        },
        reload(){
            this.resetVariables()
            this.getLog();
        }
    },
    methods: {
        async getLog() {
            
            const request = await fetch(`http://localhost:8000/api/log/${this.id}/${this.login}/${this.password}`, {
                method: "GET",
                headers: { "Content-Type": "application/json" },
            })

            const response = await request.json();

            if (response.success) {
                var newLogs = [];
                for (let log of response.data) {
                    log.created_at = log.created_at.slice(0, 10);
                    this.setValueInVariable(log);
                }
                this.logs = newLogs;
            }
        },
        setValueInVariable(log) {

            var oldDate = new Date();
            var currentDate = new Date();
            var arrayDate = log.created_at.split("-");
            var week = new Date();

            week.setDate(week.getDate() - 7);
            oldDate.setDate(arrayDate[2]); 
            oldDate.setMonth(parseInt(arrayDate[1]) -1);
            oldDate.setFullYear(arrayDate[0]);

            if(oldDate.getTime() == currentDate.getTime()){
                this.today += parseFloat(log.hour_value) * (parseInt(log.seconds) / 3600);
            }

            if(oldDate.getTime() >= week.getTime()){
                this.week += parseFloat(log.hour_value) * (parseInt(log.seconds) / 3600);
            }

            if(oldDate.getMonth() == currentDate.getMonth() && oldDate.getFullYear() == currentDate.getFullYear()){
                this.month += parseFloat(log.hour_value) * (parseInt(log.seconds) / 3600);
            }
            
        },
        resetVariables(){
            this.today = 0;
            this.week = 0;
            this.month = 0;
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
    justify-content: space-between;
    padding: 0 2%;
    align-items: center;
}

#left-reports {
    height: 92%;
    width: 70%;
}

#right-reports {
    width: 28%;
    height: 92%;
}

#top-panel {
    display: flex;
    justify-content: space-between;
    height: 32%;

}
</style>
