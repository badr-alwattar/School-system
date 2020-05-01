
require('./bootstrap');

window.Vue = require('vue');



Vue.component('message-component', require('./components/Message.vue').default);


const app = new Vue({
    el: '#app',
    data: {
        message: '',

        chat: {
            message: [],
            user: [],
            color: []
        }
    },

    methods: {
         send(){
             if(this.message.length != 0) {
                this.chat.message.push(this.message);
                this.chat.user.push('you');
                this.chat.color.push('success');
                axios.post('/send', {
                    body: this.message,
                    sender: '1',
                    receiver: '2',
                    
                  })
                  .then(response => {
                    console.log(response);
                    this.message = '';
                  })
                  .catch(error => {
                    console.log(error);
                  });
                
             }
             
         }
    },
    mounted(){
        console.log(" chat is mounted");

        Echo.private('chat')
        .listen('ChatEvent', (e) => {
            this.chat.message.push(e.message);
            this.chat.user.push(e.user);
            this.chat.color.push('warning');
            // console.log("HELLO");
            console.log(e);
        });
    }
});
