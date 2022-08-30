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
        --secundary-color: rgb(255,255,255);
    }

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
</style>
