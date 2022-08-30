<template>
    	
    <Header/>

</template>

<script>

    import Header from '@/components/Header.vue';

    export default{
        name: "App",
        components: {
            Header
        }
    }

</script>

<style>

    :root{
        --main-color: rgb(0,0,0);
        --secondary-color: rgb(255,255,255);
        --grey-light-color: rgb(200,200,200);
    }

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap');

    .row{
        display: flex;
    }

</style>
