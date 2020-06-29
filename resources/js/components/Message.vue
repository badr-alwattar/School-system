<template>
    <div>
        <div class="modal-dialog modal-xl mt-5">
                    
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="text-secondary"> {{ receiver.name }} </h3>
                <button type="button" data-dismiss="modal" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
            <div class="modal-body">
                
                <div v-for="message in chat">
                    <div :class="MessageClass(message)" >
                        <slot>{{message.body}}</slot>
                        <small class="badge float-right" :class="badgeClass(message)" v-if="message.sender == currentuser.id">You</small>
                    </div>
                        
                </div>
                
            </div>
            <div class="modal-body">
                
                <input type="text" v-model="message" @keyup.enter="send" class="form-control" placeholder="type your message here...">
            </div>


            <!--
            <div class="modal-footer">

            
                <button type="button" class="btn btn-default" data-dismiss="modal">Dismiss</button>  
            </div>
           -->
        </div>

</div>

        
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: '',
                currentuser: {},
                userMessages: [],
                chat: [],
            };
        },
        props: [
            'receiver',
        ],

        computed: {
            
            
        },
        methods: {
             MessageClass(message) {
                if(message.sender === this.currentuser.id){
                    return 'list-group-item list-group-item-warning my-2';
                } else {
                    return 'list-group-item list-group-item-success my-2';
                }
                
            },
            badgeClass(message) {
                if(message.sender === this.currentuser.id){
                    return 'badge-warning';
                }  else {
                    return 'badge-dark';
                }
            },
            send(){
                if(this.message.length != 0) {
                    this.chat.push(
                        {
                            body: this.message,
                            sender: this.currentuser.id,
                            receiver: this.receiver.id
                        }
                    );
                    axios.post('/send', {
                        body: this.message,
                        sender: this.currentuser.id,
                        receiver: this.receiver.id
                        
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
            axios.get('/getMessages/')
            .then((response) => {
                this.userMessages = response.data;
               // console.log('messages:',this.userMessages);
            });

            axios.get('/getCurrentUser/')
            .then((response) => {
                this.currentuser = response.data;
               // console.log('current user:',this.currentuser);
            });

            Echo.private('chat')
            .listen('ChatEvent', (e) => {
                this.chat.message.push(e.message);
                this.chat.user.push(e.user);
                this.chat.color.push('warning');
                console.log("HELLO");
                console.log(e);
            });

        },
        watch: {
      	receiver: function(newVal, oldVal) { // watch it
            this.chat = [];
            this.userMessages.forEach((message) => {
                if(message.sender === this.receiver.id || message.receiver === this.receiver.id ) {
                    this.chat.push(message);
                }
            });
        }
      }
    }
</script>
