<template>
  <span >
    <button class="bg-blue-400 rounded-lg p-2 text-white font-bold bg-blue-500" @click="goBack">< go back</button>
  </span>
</template>

<script>
export default {
  methods: {
    goBack() {
      return this.$router.go(-1);
    }
  }
};
</script>

<style scoped>
.go-back {
  cursor: pointer;
}
button {
  border: 0;
}
</style>
