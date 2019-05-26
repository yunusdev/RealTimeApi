<template>
    <div class="modal fade" id="talkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="card card-shadowed p-50 w-400 mb-0" style="max-width: 100%">
                <h5 class="text-uppercase text-center">Create Talk</h5>
                <br>
                <form>

                    <div class="form-group">
                        <label for="description">Name</label>
                        <input :class="{ 'is-invalid': errors.hasError('name')}" type="text" class="form-control" placeholder="Name" v-model="name">

                        <div style="color: red; font-size: 12px " class="invalid-feedback" v-if="errors.hasError('name')"><strong><i>{{ errors.first('name') }}</i></strong></div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea :class="{ 'is-invalid': errors.hasError('description')}" class="form-control" name="description" v-model="description" id="description" cols="30" rows="5"></textarea>

                        <div style="color: red; font-size: 12px " class="invalid-feedback" v-if="errors.hasError('description')"><strong><i>{{ errors.first('description') }}</i></strong></div>
                    </div>

                    <div class="form-group">
                        <label class="typo__label">Add Attendees </label>
                        <multiselect v-model="value" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="id" :options="options" :multiple="true" :taggable="true" @tag="addTag"></multiselect>
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
    import Multiselect from 'vue-multiselect'
    import ErrorBag from './error_bag'


export default {

        props: ['user', 'users_raw'],

        components: {
            Multiselect
        },

        mounted(){

            if (this.errors.hasErrors()) {
                this.errors.clearAll();
            }
        },

        data(){

            return{

                name: '',
                email: '',
                value: [],
                description: '',
                options: JSON.parse(this.users_raw),
                errors: new ErrorBag

            }
        },



        methods: {


            addTag (newTag) {
                const tag = {
                    name: newTag
                }
                console.log(tag);
                this.options.push(tag)
                this.value.push(tag)
            },



            createTalk() {

                let identities = []

                this.value.forEach(function(element) {

                    identities.push(element.id)

                });

                Axios.post('/talk', {

                    name: this.name,
                    description: this.description,
                    users_arr: identities
                }).then(res => {

                    let data = res.data;

                    window.location = '/talk/' + data.slug

                }).catch(err => {

                    if (err.response && err.response.status == 422) {

                        const errorss = err.response.data.errors;

                        this.errors.setErrors(errorss);
                    }

                })

            }
        }
    }
</script>

<style scoped>

    .is-invalid{

        border-color: red;
    }

</style>