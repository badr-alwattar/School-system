<template>
    <div>
        <li :class="MessageClass"><slot></slot></li>
        <small class="badge float-right" :class="badgeClass"> {{ user }} </small>
    </div>
</template>

<script>
    export default {

        props: [
            'color',
            'user'
        ],

        computed: {
            MessageClass() {
                return 'list-group-item list-group-item-'+this.color+'';
            },
            badgeClass() {
                return 'badge-'+this.color+'';
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
