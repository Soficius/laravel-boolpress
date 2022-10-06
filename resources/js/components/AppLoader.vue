<template>
<div class="spinner">
    <div class="spinner-border text-primary " role="status">
    </div>
</div>
</template>

<script>
export default {
    name: 'AppLoader',
   }
</script>

<style scoped lang="scss">
.spinner{
    top:0;
    left: 0;
    right: 0;
    bottom: 0;
    position: fixed;
    z-index: 9;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}
.spinner-border{
    width: 5em;
    height: 5em;
}
</style>
