<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card-wrapper">
                    <div class="card">
                        <div class="card-header">Contact Form</div>

                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" placeholder="name@example.com" v-model="form.email">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone number</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="+x(xxx)xxx-xx-xx" v-model="form.phone" v-mask="'+#(###)###-##-##'">
                                </div>

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" rows="3" v-model="form.message"></textarea>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary" @click.prevent="send">Send</button>
                                <spinner v-if="loading"></spinner>
                                <div class="send_msg send_success" v-if="showSuccess">Form was successfully submitted!</div>
                                <div class="send_msg send_error" v-if="showError">Form submission error!</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Spinner from './Spinner'
    import axios from 'axios'
    import {TheMask} from 'vue-the-mask'

    export default {
        components: {
            Spinner,
            TheMask
        },
        data: () => ({
            form: {
                email: '',
                phone: '',
                message: ''
            },
            loading: false,
            showError: false,
            showSuccess: false
        }),
        methods: {
            send() {
                this.loading = true
                this.showError = false
                this.showSuccess = false
                axios.post('/api/message', this.form, {
                    headers: {
                        "Content-type": "application/json"
                    }
                })
                .then(res => {
                    this.loading = false
                    if(res.data) {
                        const data = res.data
                        const invalids = Object.keys(data)

                        const controls = this.$el.querySelectorAll(".form-control");
                        controls.forEach((elem) => {
                            elem.classList.remove("is-invalid");
                        })

                        invalids.forEach((elem) => {
                            let control = document.getElementById(elem)
                            control.classList.add("is-invalid");
                        })
                    } else {
                        const controls = this.$el.querySelectorAll(".form-control");
                        controls.forEach((elem) => {
                            elem.classList.remove("is-invalid");
                        })
                        this.form.email = this.form.phone = this.form.message = ''
                        this.showSuccess = true
                    }
                }).catch(res => {
                    this.loading = false
                    this.showError = true
                })
            }
        },
    }
</script>

<style>
    .send_msg {
        margin: 15px 5px;
    }
    .send_success {
        color: green;
    }
    .send_error {
        color: red;
    }
</style>
