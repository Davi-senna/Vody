<template>

    <div id="stopwatch">
        <div id="stopwatch-face">
            <button @click="timeStart()" v-if="!stopwatchActive" id="button-start">Iniciar</button>
            <span v-if="stopwatchActive">{{time}}</span>
            <button @click="timeStop()" v-if="stopwatchActive" id="button-stop">Parar</button>
        </div>
        <figure>
            <img @click="exchangeVisibilitySettings()" id="settings"
                src="@/assets/img/configuration_control_gear_preferences_setting_settings_tools_icon_123195.png" alt="">
        </figure>
    </div>

    <SettingsModal :logged = logged :login = login :password = password :id = id v-show="settingsVisibility" @exchangeVisibility="exchangeVisibilitySettings" @changeHourValue="changeHourValue" @changeCategory="changeCategory" />

    <ConfirmLogModal :totalSeconds=totalSeconds :time=time :idCategory=idCategory :categoryName=categoryName :hourValue=hourValue v-show="confirmVisibility" @exchangeVisibility="exchangeVisibilityConfirm" @submitLog="submitLog"/>

</template>

<script>

import SettingsModal from '@/components/SettingsModal.vue'
import ConfirmLogModal from '@/components/ConfirmLogModal.vue'

var interval

export default {
    name: "Stopwatch",
    data() {
        return {
            time: "00  : 00 : 00 ",
            hours: 0,
            minutes: 0,
            seconds: 0,
            totalSeconds:0,
            stopwatchActive: false,
            settingsVisibility: false,
            confirmVisibility: false,
            categories: null,
            hourValue: null,
            idCategory: null,
            categoryName: null,

        }
    },
    methods: {
        timeStart() {
            interval = setInterval(() => { this.setTimer() }, 1000)
            this.stopwatchActive = true
        },
        format() {
            this.time = (this.hours < 10 ? "0" + this.hours : this.hours) + " : " + (this.minutes < 10 ? "0" + this.minutes : this.minutes) + " : " + (this.seconds < 10 ? "0" + this.seconds : this.seconds)
        },
        setTimer() {
            if (this.seconds < 59) {
                this.seconds += 1
                this.totalSeconds += 1
                this.format()
            } else if (this.seconds == 59 && this.minutes < 59) {
                this.setZero("seconds")
                this.minutes += 1
                this.totalSeconds += 1
                this.format()
            } else {
                this.setZero("seconds", "minutes")
                this.hours += 1
                this.totalSeconds += 1
                this.format()
            }
        },
        timeStop() {
            clearInterval(interval);
            this.confirmVisibility = true;
            
        },
        setZero(seconds, minutes = "", hours = "") {
            if (seconds == "seconds") {
                this.seconds = 0
            }

            if (minutes == "minutes") {
                this.minutes = 0
            }

            if (hours == "hours") {
                this.hours = 0
            }
        },
        exchangeVisibilitySettings() {
            this.settingsVisibility = !this.settingsVisibility;
        },
        exchangeVisibilityConfirm() {
            this.confirmVisibility = !this.confirmVisibility;
            this.timeStart()
        },
        changeHourValue(params){
            this.hourValue = params
        },  
        changeCategory(params){               
            this.categoryName = params.categoryName;
            this.idCategory = params.idCategory;
        },
        async submitLog(){
            if(this.id != null){
                const log = {
                    id_user : this.id,
                    id_category : this.idCategory,
                    password : this.password,
                    login : this.login,
                    seconds : this.totalSeconds,
                    hour_value : this.hourValue,
                }

                const logJson = JSON.stringify(log)

                const req = await fetch("http://localhost:8000/api/log", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: logJson
                })

                const resp = await req.json();

                this.confirmVisibility = !this.confirmVisibility;
                this.restart()
            }else{  
                alert("Faça login para concluir essa ação")
            }            
            
        },
        restart(){
            this.setZero("seconds","minutes","hours")
            this.format()
            this.stopwatchActive = false
        }
    },
    components: {
        SettingsModal,
        ConfirmLogModal
    },
    props:{
        logged: Boolean,
        login : String,
        password : String,
        id: Number,
    },
    
}

</script>

<style scoped>
#stopwatch {
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
    font-family: 'Ubuntu', sans-serif;
    color: var(--main-color);
}

#stopwatch-face {
    width: 400px;
    height: 400px;
    border: 2px solid var(--main-color);
    border-radius: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

button {
    border: none;
    background-color: transparent;
}

#button-start {
    font-size: 60px;
    font-weight: 500;
}

#button-start:hover {
    font-size: 65px;
}

#button-stop {
    font-size: 30px;
}

span {
    font-size: 40px;
    margin-bottom: 20px
}

#settings {
    width: 60px;
    margin-left: 10px;

}

#settings:hover {
    cursor: pointer;
    animation-name: settings;
    animation-duration: 0.5s;
}

@keyframes settings {
    from {
        transform: rotateZ(0deg);
    }

    to {
        transform: rotateZ(90deg);
    }
}

@media(max-width: 950px) {
    #stopwatch {
        width: 100vw;
        height: 80vh;
        display: flex;
        align-items: center;
        font-family: 'Ubuntu', sans-serif;
        color: var(--main-color);
        position: absolute;
        justify-content: center;
    }
}
</style>