<template>
    <div class="sms-container">
        <div class="header">
            <h1>Sms list</h1>
        </div>
        <div class="list">
            <ul>
                <li v-for="sms in sms_data" :key="sms.id">
                    <Sms :text="sms.text"></Sms>
                    <br>
                </li>
            </ul>
        </div>
        <div v-if="!user.isAuthenticated" class="register-input-block">
            <RegisterInput @successful-registration="handle_registration_success"></RegisterInput>
        </div>
        <div v-else class="chat-input-block">
            <ChatInput
                @new-message="post_new_message"
                @logout="logout"
                :login="user.login"
            ></ChatInput>
        </div>
    </div>
</template>

<script>
import Sms from './MessagePage/Sms.vue';
import ChatInput from './MessagePage/ChatInput.vue';
import RegisterInput from './MessagePage/RegisterInput.vue';

export default {
    name: "MessagePage",
    data() {
      return {
          sms_data: [],
          user: {
              login: 'Anonymous',
              isAuthenticated: false
          }
      }
    },
    components: {
        Sms,
        ChatInput,
        RegisterInput,
    },
    methods: {
        async fetch_sms_data() {
            const response = await fetch('/api/sms')
            const data = await response.json();
            data.forEach((el) => this.sms_data.push(el))
        },
        handle_registration_success(login) {
            this.user.isAuthenticated = true;
            this.user.login = login
        },
        async authenticate_user(login) {
            let response = await fetch('/api/checkAuth')
            let data = await response.json();

            this.user.isAuthenticated = await data.isAuthenticated

            if (!this.user.isAuthenticated){
                return
            }

            response = await fetch('/api/currentUser')
            data = await response.json();
            this.user.login = await data.name
        },
        async logout() {
            const response = await fetch('/api/logout')
            const data = await response.json();

            if (data.success) {
                this.user.login = 'Anonymous'
                this.user.isAuthenticated = false
            }
        },
        post_new_message(message_text) {
            this.sms_data.push({text: message_text})
        }
    },
    created() {
        this.fetch_sms_data()
        this.authenticate_user()
    },
}

</script>

<style scoped>
    .sms-container {
        border: 10px solid lightskyblue;
        width: 80%;
        margin: 0 auto;
        text-align: center;
        margin-top: 10px;
    }
    ul {
        padding: 0 40px 0 40px;
        list-style: none;
    }
</style>
