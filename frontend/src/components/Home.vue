<template>

    <section id="content">
        <Date />
        <Stopwatch @reloadReports="$emit('reloadReports')" :logged=logged :login=login :password=password :id=id />
    </section>

</template>

<script>

import Date from '@/components/Date.vue'
import Stopwatch from '@/components/Stopwatch.vue'

export default {
    name: "Home",
    props:{
        logged: Boolean,
        id: Number,
        name: String,
        login: String,
        password: String
    },
    components: {
        Date,
        Stopwatch
    },
    emits:[
        'reloadReports'
    ]
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
</style>
