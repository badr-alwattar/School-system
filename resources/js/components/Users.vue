<template>
    <div>
        <div class="container py-3" v-for="user in users">
            <a class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal" @click="updateReceiver(user)">{{user.name}}</a>

            <div class="modal fade " id="myModal" role="dialog">
                <message-component
                    :receiver= "sendTo"
                ></message-component>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                currentuser: {},
                users: [],
                sendTo: {}
            }
        },
        mounted() {
            axios.get('/getUsers')
                .then((response) => {
                    this.users = response.data; 
                    console.log(response.data);
                });

            // axios.get('/getCurrentUser/')
            //     .then((response) => {
            //         this.users.forEach((user) => {
            //             console.log('is admin:')
            //             if(!response.data.isAdmin) {
            //                 if(!user.isAdmin) {
            //                     this.users.splice(this.users.indexOf(user), 1);
            //                 }
            //             }
            //         });
            //         // console.log('users after filter:',this.users)
            //     });
        },

        methods: {
            updateReceiver(user) {
                this.sendTo = user;
            }
        }

    }
</script>
