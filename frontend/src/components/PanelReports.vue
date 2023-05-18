<template>
  <div class="small-reports">
    <figure>
      <img v-if="imageValidate('today')" src="../../src/assets/img/Time-Today-icon.png" alt="Hoje">
      <img v-if="imageValidate('week')" src="../../src/assets/img/Week.png" alt="Essa semana">
      <img v-if="imageValidate('month')" src="../../src/assets/img/month.png" alt="Esse mês">

      <span>{{ textDescription }}</span>
    </figure>
    <span class="textDescription">R$ 350,00</span>
  </div>
</template>
  
<script>
export default {
  name: "PanelReports",
  props: {
    day: String,
    textDescription: String
  },
  methods: {
    imageValidate(day) {
      if (this.day == day) {
        return true;
      } else {
        return false;
      }
    },


  }
};
</script>
  

<style scoped>
.small-reports {
  height: 180px;
  width: 31.2%;
  border: 2px solid var(--main-color);
  border-radius: 12px;
  padding: 3%;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
}

.small-reports img {
  width: 22.5%;
  margin-right: 10%;
}

.small-reports figure span {
  font-size: 20px;
  font-family: 'Ubuntu', sans-serif;
  color: var(--main-color);
}

.small-reports figure{
  display: flex;
  align-items: center;
}

.textDescription {
  font-size: 20px;
  font-family: 'Ubuntu', sans-serif;
  color: var(--main-color);
}
</style>