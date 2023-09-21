<template>
    <div id="category-reports">
        <div id="header-category-reports">
            <span id="title-category">Categorias</span>
            <span @click="exchangeVisibility" id="button-add-category">Adicionar categoria +</span>
        </div>
        <div id="body-category-reports">
            <Category v-for="categorie in categories" :name=categorie.name />
            <AddCategoryModal v-if="addCategoryVisibility" @exchangeVisibility="exchangeVisibility"/>
        </div>
    </div>
</template>

<script>

import Category from '@/components/Category.vue';
import AddCategoryModal from '@/components/AddCategoryModal.vue';

export default {

    name: "CategoryReports",
    components: {
        Category,
        AddCategoryModal
    },
    props:{
        login: String,
        id: Number,
        password: String,
        logged: Boolean
    },
    data(){
        return{
            categories: null,
            addCategoryVisibility: false
        }
    },
    methods: {

        async getCategories() {
            const request = await fetch(`http://localhost:8000/api/category/${this.id}/${this.login}/${this.password}`, {
                method: "GET",
                headers: { "Content-Type": "application/json" },
            })

            const response = await request.json();
            console.log(response);

            if (response.success) {
                this.categories = response.data;
            }
        },

        exchangeVisibility() { 
            this.addCategoryVisibility = !this.addCategoryVisibility;
        }

    },
    watch:{
        logged(){
            this.getCategories()
        }
    }

}

</script>

<style scoped>
#category-reports {
    margin-top: 3%;
    height: 63%;
    width: 100%;
    border: 2px solid var(--main-color);
    border-radius: 12px;
    padding: 3%;
}

#header-category-reports {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;

}

#category-reports {
    font-family: 'Ubuntu', sans-serif;
    color: var(--main-color);
}

#title-category {
    font-size: 20px;
}

#button-add-category {
    font-size: 15px;
    cursor: pointer;
}

#body-category-reports {
    margin-top: 3%;
    height: 80%;
}
</style>