    <template>
        <div id="category">
            {{name}}
        </div>
    </template>

    <script>

    export default {

        name: "Category",
        props:{
            name: String
        }

    }

    </script>

    <style scoped>

    #category{
        width: 100%;
        height: 20%;
        background-color: rgba(238, 238, 238, 1);
        border-radius: 10px;
        display: flex;
        align-items: center;
        padding: 0 3%;
        margin-bottom: 3%;
    }

    </style>