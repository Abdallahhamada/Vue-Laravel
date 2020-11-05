<template>
<div class="content-wrapper">

    <!-- Start Content Header -->
    <ContentHeader title="Users"></ContentHeader>
    <!-- End Content Header -->

    <!-- Start Main Content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <!-- <h3 class="card-title">Responsive Hover Table</h3> -->
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#addUserModal">Add <i class="fas fa-user-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" id="showUsers">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Registered At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="user in users.data">
                                        <td>{{ user.id }}</td>
                                        <td>{{ user.name }}</td>
                                        <td>{{ user.email }}</td>
                                        <td>{{ user.created_at | myDate }}</td>
                                        <td>
                                            <i class="fas fa-edit btn btn-primary" @click="editUser(user)"></i>
                                            <i class="fas fa-trash-alt btn btn-danger" @click="deleteUser(user)"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer">
                            <pagination :data="users" @pagination-change-page="getResults"></pagination>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- End Main Content -->

    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" @click="resetData">&times;</span>
                    </button>
                </div>

                <form @submit.prevent="createUser">
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Name</label>
                            <input v-model="form.name" type="text" name="name" class="form-control" placeholder="Enter Name" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input v-model="form.email" type="text" name="email" class="form-control" placeholder="Enter Email" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input v-model="form.password" type="password" name="password" class="form-control" placeholder="Enter Password" :class="{ 'is-invalid': form.errors.has('password') }">
                            <has-error :form="form" field="password"></has-error>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="resetData">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" @click="resetData">&times;</span>
                    </button>
                </div>

                <form @submit.prevent="completeEditUser">
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Name</label>
                            <input v-model="form.name" type="text" name="name" class="form-control" placeholder="Enter Name" :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input v-model="form.email" type="text" name="email" class="form-control" placeholder="Enter Email" :class="{ 'is-invalid': form.errors.has('email') }">
                            <has-error :form="form" field="email"></has-error>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input v-model="form.password" type="password" name="password" class="form-control" placeholder="Enter New Password" :class="{ 'is-invalid': form.errors.has('password') }">
                            <has-error :form="form" field="password"></has-error>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="resetData">Canel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" @click="resetData">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <h4>Are Sure Delete This Users?</h4>
                </div>

                <form @submit.prevent="completeDeleteUser">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

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
            users: {},
            userIdDelete: "",
            form: new Form({
                name: '',
                email: '',
                password: ''
            })
        }
    },
    methods: {
        getResults(page = 1) {
            self = this;
            axios.get('users/all?page=' + page)
                .then(function (response) {
                    self.users = response.data;
                });
        },
        loadUsers: function () {
            self = this;
            axios.get("users/all")
                .then(function (response) {
                    self.users = response.data;
                });

            // reset data
            this.resetData();
        },
        createUser: function () {
            self = this;
            this.form.post("user/create")
                .then(function (data) {
                    $('#addUserModal').modal('hide');
                    self.loadUsers();

                    Toast.fire({
                        icon: 'success',
                        title: 'Create User successfully'
                    })
                });
        },
        deleteUser: function (user) {
            $('#deleteUserModal').modal('show');
            this.userIdDelete = user.id;
        },
        completeDeleteUser: function (user) {
            self = this;
            axios.post("user/delete", {
                    "id": this.userIdDelete
                })
                .then(function (response) {
                    $('#deleteUserModal').modal('hide');
                    self.loadUsers();

                    Toast.fire({
                        icon: 'error',
                        title: 'Delete User successfully'
                    })
                });
        },
        editUser: function (user) {
            $('#editUserModal').modal('show');
            this.form = new Form({
                id: user.id,
                name: user.name,
                email: user.email,
                password: ''
            });
        },
        completeEditUser: function (user) {
            self = this;
            this.form.post("user/edit")
                .then(function (data) {
                    $('#editUserModal').modal('hide');
                    self.loadUsers();

                    Toast.fire({
                        icon: 'success',
                        title: 'Edit User successfully'
                    })
                });
        },
        resetData: function () {
            this.userIdDelete = "";
            this.form = new Form({
                name: '',
                email: '',
                password: ''
            });
        }
    },
    created() {
        this.loadUsers();
    }
}
</script>
