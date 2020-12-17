<template>
  <span class="p-2 rounded bg-blue-500 text-white font-bold">
    <button @click="goBack">< go back</button>
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
