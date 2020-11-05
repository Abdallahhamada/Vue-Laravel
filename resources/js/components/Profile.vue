<template>
<div class="content-wrapper">

    <!-- Start Content Header -->
    <ContentHeader title="Profile"></ContentHeader>
    <!-- End Content Header -->

    <!-- Start Main Content -->
    <section class="content">
        <div class="container-fluid">

            <div id="divAlert" class="alert alert-success" role="alert" style="display: none">
                <strong>Updated Successfuly!</strong>
                <button type="button" class="close" @click="hideAlert">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form @submit.prevent="editUser">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input v-model="form.name" type="text" name="name" class="form-control" placeholder="Enter Name" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input v-model="form.email" type="text" name="email" class="form-control" placeholder="Enter Email" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input v-model="form.password" type="password" name="password" class="form-control" placeholder="Enter New password" :class="{ 'is-invalid': form.errors.has('password') }">
                            <has-error :form="form" field="password"></has-error>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Main Content -->

</div>
</template>

<script>
import ContentHeader from "./ContentHeader.vue";

export default {
    components: {
        ContentHeader
    },
    data() {
        return {
            form: new Form({
                id: '',
                name: '',
                email: '',
                password: '',
            })
        }
    },
    methods: {
        loadUser: function () {
            self = this;
            axios.get("user/profile")
                .then(function (response) {
                    self.form = new Form({
                        id: response.data.id,
                        name: response.data.name,
                        email: response.data.email,
                        password: '',
                    })
                });
        },
        editUser: function () {
            self = this;
            this.form.post("user/edit")
                .then(function (response) {
                    $("#divAlert").show(1000);
                    self.form.password = '';
                });
        },
        hideAlert: function () {
            $("#divAlert").hide(1000);
        }
    },
    created() {
        this.loadUser();
    }
}
</script>
