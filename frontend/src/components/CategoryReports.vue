<template>
    <div id="category-reports">
        <div id="header-category-reports">
            <span id="title-category">Categorias</span>
            <span id="button-add-category">Adicionar categoria +</span>
        </div>
        <div id="body-category-reports">
            <Category />
            <Category />
            <Category />
        </div>
    </div>
</template>

<script>

import Category from '@/components/Category.vue'

export default {

    name: "CategoryReports",
    components:{
        Category
    }

}

</script>

<style scoped>

#category-reports{
    height: 69.5%;
    width: 100%;
    border: 2px solid var(--main-color);
    border-radius: 12px;
    margin-top: 3.5%;
    padding: 3%;
}

#header-category-reports{
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    
}

#category-reports{
    font-family: 'Ubuntu', sans-serif;
    color: var(--main-color);
}

#title-category {
    font-size: 20px;
}

#button-add-category{
    font-size: 15px;
    cursor: pointer;
}

#body-category-reports{
    margin-top: 3%;
    height: 80%;
}

</style>