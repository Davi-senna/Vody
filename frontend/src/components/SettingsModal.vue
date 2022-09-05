<template>

    <div id="container-modal">
        <div id="modal">
            <div id="modal-header">
                <span id="modal-title">Definições</span>
                <span @click="$emit('exchangeVisibility')" id="modal-back">X</span>
            </div>

            <form id="container-inputs" action="#">
                <select name="category" id="category">
                    <option value="Selecione a categoria">Selecione a categoria</option>
                    <option value="pattern">Padrão</option>
                </select>
                <input type="number" min="0" name="hourValue" id="hourValue" placeholder="Valor hora">
                <input id="modal-button" type="submit">
            </form>
        </div>
    </div>

</template>

<script>
    export default{
        name: "SettingsModal",
        emits: ['exchangeVisibility']
    }
</script>

<style scoped>
#container-modal {
    position: absolute;
    background-color: rgba(0, 0, 0, 0.8);
    width: 100vw;
    height: 91vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Ubuntu', sans-serif;
    color: var(--main-color)
}

#modal {
    background-color: var(--secondary-color);
    border: 1px solid var(--main-color);
    border-radius: 26px;
    animation-name: modal;
    animation-duration: 0.3s;
    width: 450px;
    height: 300px;

}

@keyframes modal {
    from {
        width: 150px;
        height: 100px;
    }

    to {
        width: 450px;
        height: 300px;
    }
}

#modal-header {
    display: flex;
    justify-content: space-between;
    padding: 10px 20px;
    font-size: 20px;
}

#container-inputs {
    margin-top: 30px;
    width: 100%;
    display: flex;
    align-items: center;
    flex-direction: column;
    height: 190px;
}

select,
input {
    width: 90%;
    height: 6vh;
    border-radius: 5px;
    padding-left: 20px;
    border: 1px solid;
    margin-bottom: 25px;
}

option {
    color: var(--main-color)
}

#modal-back:hover {
    cursor: pointer;
}

#modal-button{
    width: 60%;
    padding-left: 0;
    margin-bottom: 0;
}

#modal-button:hover{
    background-color: var(--main-color);
    color: var(--secondary-color)
}
</style>