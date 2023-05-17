<template>
    <div id="category-reports">
        <div id="header-category-reports">
            <span id="title-category">Categorias</span>
            <span id="button-add-category">Adicionar categoria +</span>
        </div>
    </div>
</template>

<script>

export default {

    name: "CategoryReports",

}

    </script>

<style scoped>

#category-reports{
    height: 60%;
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

#title-category{
    font-size: 20px;
    font-family: 'Ubuntu', sans-serif;
    color: var(--main-color);
}

#button-add-category{
    font-size: 15px;
    font-family: 'Ubuntu', sans-serif;
    color: var(--main-color);
}

</style>