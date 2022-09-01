<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="page-title">Product List</h1>
      </div>

      <div class="col-lg-12">
        <div class="col-md-auto text-center">
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price (LKR)</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="product in products">
                <td scope="row">{{ product.id }}</td>
                <td>{{ product.name }}</td>
                <td>{{ product.price }}</td>
                <td>
                  <span v-if="product.status == 0" class="badge bg-warning">Out of Stock</span>
                  <span v-else class="badge bg-success">Available</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'home',
  layout: 'productView',

  data() {
    return {
      products: [],
    }
  },

  methods: {
    getProducts() {
      this.$axios.get('api/product').then(response => {
        this.products = response.data;
        console.log(this.products);
      });
    },
  },

  mounted() {
    this.getProducts();
  },
}
</script>

<style>
.page-title {
  padding-top: 10vh;
  margin-bottom: 10vh;
  font-size: 3rem;
  color: #198754;
}

.product-image {
  max-height: 15rem;
}
</style>
