<template>
    <div>
        <div class="card">
            <div class="card-header">Edit company</div>
            <div class="card-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label class="control-label">Company name</label>
                            <input type="text" v-model="company.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label class="control-label">Company address</label>
                            <input type="text" v-model="company.address" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label class="control-label">Company website</label>
                            <input type="text" v-model="company.website" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label class="control-label">Company email</label>
                            <input type="text" v-model="company.email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <router-link to="/" class="btn btn-primary">Back</router-link>
                            <button class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.companyId = id;
            axios.get('/api/v1/companies/' + id)
                .then(function (resp) {
                    app.company = resp.data;
                })
                .catch(function () {
                    alert("Could not load your company")
                });
        },
        data: function () {
            return {
                companyId: null,
                company: {}
            }
        },
        methods: {
            saveForm() {
                var app = this;
                var newCompany = app.company;

                axios.patch('/api/v1/companies/' + app.companyId, newCompany)
                .then(function (resp) {
                    app.$router.replace('/');
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not create your company");
                });
            }
        }
    }
</script>