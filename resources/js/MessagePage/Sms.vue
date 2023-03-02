<template>
    <div class="sms-body">
        {{ this.text }}
    </div>
</template>

<script>
export default {
    name: "Sms",
    props: ['text']
}
</script>

<style scoped>
    .sms-body {
        text-align: left;
        background: floralwhite;
        padding: 10px;
        border-color: black;
        border: 1px solid;
        border-radius: 5px;
    }
</style>
