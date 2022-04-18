<template>
    <div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div
                        class="
                            card-header
                            py-3
                            d-flex
                            flex-row
                            align-items-center
                            justify-content-between
                        "
                    >
                        <h6 class="m-0 font-weight-bold text-primary">
                            Product List
                        </h6>
                        <div class="form-group">
                            <input type="text" v-model="search" class="form-control" placeholder="Search product name">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>id</th>
                                <th>Product name</th>
                                <th>Product author</th>
                                <th>Product quantity</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr
                                v-for="product in filterSearch"
                                :key="product.id"
                            >
                                <td>
                                    {{ product.id }}
                                </td>
                                <td>{{ product.product_name }}</td>
                                <td>{{ product.product_author }}</td>
                                <td>{{ product.product_quantity }}</td>
                                <td>{{ product.created_at}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        <!--Row-->
    </div>
</template>

<script>
export default {
    data() {
        return {
            products: [],
            search: ''
        }
    },
    methods: {
        allProduct() {
            axios
                .get("/api/product")
                .then(({data}) => (this.products = data.data))
                .catch()
        }
    },
    computed: {
        filterSearch() {
            return this.products.filter((product) => {
                return product.product_name.match(this.search);
            })
        }
    },
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "/" });
        }

        this.allProduct();
    },
}
</script>
