<template>
    <div id="contentDate">
        <span id="today">
            {{today}}
        </span>
        <span id="date">
            {{ day + " de " + month}}
        </span>
    </div>
</template>

<script>

var date = new Date
var week = ["Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado"]
var months = ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro",]

export default {
    name: 'Date',
    data() {
        return {
            today: week[date.getDay()],
            day: date.getDate(),
            month: months[date.getMonth()],
        }
    },
    methods: {

    }
};

</script>

<style scoped>

    #contentDate{
        width: 45%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-end;
        font-family: 'Ubuntu', sans-serif;
        padding-right: 5%;
        color : var(--main-color);
    }

    #today{
        font-weight: 300;
        font-size: 35px
    }

    #date{
        font-weight: 600;
        font-size: 40px
    }

</style>