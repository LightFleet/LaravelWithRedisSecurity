<template>
    <div class="input-block">
        <span>{{ login }}:</span>
        <input class="chat-input"
               type="text"
               v-model="chatInput"
               placeholder="Your input..."
        >
        <input @click="$emit('newMessage', chatInput)" class="chat-input-button" type="button" value="Submit">
        <input @click="$emit('logout')" class="chat-input-button" type="button" value="Logout">
    </div>
</template>

<script>
export default {
    name: "ChatInput",
    props: ['text', 'login'],
    data () {
        return {
            login: this.login,
            chatInput: ''
        }
    },
    watch: {
        login(old_val, new_val) {
            if (new_val === 'Anonymous') { // please ignore
                this.login = old_val
            }
        }
    },
}
</script>

<style scoped>
    .text-blue {
        color: blue;
    }

    .input-block > * {
        margin-right: 10px;
    }

    .input-block {
        margin: 0 40px 0 40px;
        display: flex;
        padding-bottom: 10px;
        align-items: center;
        justify-content: space-between;
    }

    input {
        width: 100%;
        height: 100%;
        border-radius: 5px;
        padding: 10px;

        border-color: black;
        border: 1px solid;
        border-radius: 5px;
    }

    .chat-input-button {
        text-align: left;
        width: 300px;
    }
</style>
