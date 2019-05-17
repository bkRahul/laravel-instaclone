<template>
    <div>
        <button @click="followUser" v-text="followText" class="btn btn-primary"></button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],

        data: function() {
            return {
                status: this.follows
            }
        },

        methods: {
            followUser()
            {
                axios.post('/follow/' + this.userId)
                .then(response => {
                    this.status= ! this.status;
                    console.log(response.data);
                })
                .catch(errors => {
                    if(errors.response.status == 401) {
                        window.location = '/login';
                    }
                });
            }
        },

        computed: {
            followText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }    
    }
</script>