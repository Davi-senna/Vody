<template>

    <div id="container-modal">
        <div id="modal">
            <div id="modal-header">
                <span id="modal-title">Informações de envio</span>
                <span @click="$emit('exchangeVisibility')" id="modal-back">X</span>
            </div>
            <div class="modal-body">
                <span>
                    Tempo: 14h 35m 27s
                </span>

                <span>
                    Categoria: Vody
                </span>

                <span>
                    Valor hora: 6 reais
                </span>

                <span>
                    Valor total: 84 reais
                </span>
            </div>
            <div class="modal-footer">
                <input id="modal-button" type="submit" value="Confirmar">
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "ConfirmLogModal",

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
    color: var(--main-color);
    z-index: 100;
}

#modal {
    background-color: var(--secondary-color);
    border: 1px solid var(--main-color);
    border-radius: 26px;
    animation-name: modal;
    animation-duration: 0.3s;
    width: 450px;
    height: 320px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding-bottom: 40px;

}

.modal-footer {
    display: flex;
    justify-content: center;
    width: 100%;
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

a {
    margin-top: 10px
}

a:hover {
    cursor: pointer;
}

#modal-header {
    display: flex;
    justify-content: space-between;
    padding: 10px 20px;
    font-size: 20px;
}


#modal-back:hover {
    cursor: pointer;
}

.modal-body{
    padding:20px 0 30px 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
}



#modal-button {
    width: 60%;
    padding-left: 0;
    margin-bottom: 0;
}

#modal-button:hover {
    background-color: var(--main-color);
    color: var(--secondary-color)
}
</style>