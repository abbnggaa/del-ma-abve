<template>
  <div class="py-4 container-fluid">
    <div class="row">
      <div class="col-12">
        <Table />
      </div>
    </div>
  </div>
</template>

<script>
import Table from "@/views/catatan/Index.vue";

export default {
  name: "tables",
  components: {
    Table,
  },
};
</script>
