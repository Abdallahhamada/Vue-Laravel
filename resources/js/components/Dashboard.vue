<template>
<div class="content-wrapper">

    <!-- Start Content Header -->
    <ContentHeader title="Dashboard"></ContentHeader>
    <!-- End Content Header -->

    <!-- Start Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{statistics.userCounts}}</h3>
                            <p>users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <router-link :to="{name:'users'}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </router-link>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Main Content -->

</div>
</template>

<script>
import axios from 'axios';
import ContentHeader from "./ContentHeader.vue";

export default {
    components: {
        ContentHeader
    },
    data: function () {
        return {
            statistics: {
                "userCounts": 0
            }
        }
    },
    mounted() {
        self = this;
        axios.get("/statistics")
            .then(function (response) {
                self.statistics = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
    }
}
</script>
