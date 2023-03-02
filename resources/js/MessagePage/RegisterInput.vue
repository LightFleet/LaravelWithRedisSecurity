<template>
    <div class="input-block">
        <span>Select your username and password (for current session):</span>
        <span class="reg-error text-red d-none">Something went wrong!</span>
        <input class="chat-input login-input"
               type="text"
               name="login"
               placeholder="Enter Login..."
               v-model="login"
        >
        <input class="chat-input password-input"
               type="text"
               name="password"
               placeholder="Enter password..."
               v-model="password"
        >
        <input @click="submit_user_reg_form()" class="chat-input-button" type="button" value="Submit">
    </div>
</template>

<script>
export default {
    name: "ChatInput",
    props: ['text'],
    emits: ['successful_registration'],
    data () {
      return {
          login: '',
          password: '',
      }
    },
    methods: {
        async submit_user_reg_form() {
            const response = await fetch('api/user/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                        login: this.login,
                        password: this.password
                    }
                )
            })
            const data = await response.json();

            const errorEl = document.getElementsByClassName('reg-error')[0]
            if (!data.success) {
                errorEl.classList.remove('d-none')
            } else {
                errorEl.classList.add('d-none')
                this.$emit('successfulRegistration', this.login);
            }
        }
    }
}
</script>

<style scoped>
    .text-red {
        color: red;
    }
    .d-none {
        display: none !important;
    }

    .input-block {
        margin: 0 40px 0 40px;
        display: block;
        padding-bottom: 10px;
    }

    .password-input {
        margin-top: 10px;
    }

    .input-block > span {
        text-align: left;
        display: block;
        margin-bottom: 10px;
        font-size: 20px;
        font-weight: bold;
    }

    input {
        width: 100%;
        height: 100%;
        border-radius: 5px;
        padding: 10px;

        border: 1px solid black;
        border-radius: 5px;
    }

    .chat-input-button {
        margin-top: 10px;
        text-align: left;
    }
</style>
