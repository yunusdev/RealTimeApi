<template>
    <div class="modal fade" id="talkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="card card-shadowed p-50 w-400 mb-0" style="max-width: 100%">
                <h5 class="text-uppercase text-center">Create Talk</h5>
                <br>
                <form>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" v-model="name">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" v-model="description" id="description" cols="30" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-bold btn-block btn-primary" @click="createTalk()" type="button">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import Axios from 'axios'

    export default {

        props: ['user'],

        data(){

            return{

                name: '',
                email: '',
                description: ''
            }
        },

        methods: {

            createTalk(){

                    Axios.post('/talk', {

                        name: this.name,
                        description: this.description
                    }).then(res => {

                        let data = res.data;

                        window.location = '/talk/' + data.slug

                    }).catch(err => {

                        console.log(err)

                    })

            }
        }
    }
</script>

<style scoped>

</style>