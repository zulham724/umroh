<template>
    <v-data-table
        :headers="headers"
        :items="orders"
        :loading="loading"
        class="elevation-1"
    >

        <v-progress-linear slot="progress" color="blue" indeterminate></v-progress-linear>

        <template slot="items" slot-scope="props">
            <td>{{ props.item.id }}</td>
            <td class="text-xs-right">{{ props.item.plan.name }}</td>
            <td class="text-xs-right">{{ new Date(props.item.schedule.start_at).toDateString() }}</td>
            <td class="text-xs-right">{{ new Date(props.item.schedule.end_at).toDateString() }}</td>
            <td class="text-xs-right">Rp {{ props.item.total_amount.toLocaleString() }}</td>
            <td class="text-xs-right">Rp {{ props.item.sum_transaction_value.toLocaleString() }}</td>
            <td class="text-xs-right">{{ props.item.order_statuses[0].description }}</td>
            <td class="justify-center layout px-0">
                <v-icon color="green darken-2" @click="payment(props.item.id)">
                    fas fa-money-bill-alt
                </v-icon>
            </td>
        </template>
    </v-data-table>
</template>

<script>
    export default {
        data () {
          return {
            loading:false,
            headers: [
              {
                text: 'Order ID',
                align: 'left',
                sortable: false,
                value: 'order_id'
              },
              { text: 'Plan', value: 'plan' },
              { text: 'Tanggal Berangkat', value: 'start_at' },
              { text: 'Tanggal Pulang', value: 'end_at' },
              { text: 'Biaya', value: 'amount' },
              { text: 'Dibayar', value: 'sum_transaction_value' },
              { text: 'Status', value: 'status' },
              { text: 'Pembayaran', value: 'payment' }
            ],
            orders: []
          }
        },
        mounted() {
            console.log('Component mounted.')
            this.loading = true;
            axios.get('/orders/byauth').then(res=>{
                this.orders = res.data;
                this.loading = false;
            });
        },
        methods:{
            payment:function(order_id){
                let access = {
                    order_id:order_id
                }

                axios.post("/payment/installment",access).then(res=>{
                    snap.pay(res.data.snap_token, {
                        // Optional
                        onSuccess: function (result) {
                            Swal({
                              title: 'Success!',
                              text: 'Pembayaran Anda Berhasil',
                              type: 'info',
                              showConfirmButton: false,
                              timer: 3500
                            });
                        },
                        // Optional
                        onPending: function (result) {
                            window.location.replace('/payment/success/'+res.data.order.id);
                        },
                        // Optional
                        onError: function (result) {
                            Swal({
                              title: 'Oppss!',
                              text: 'Terjadi Kesalahan',
                              type: 'error',
                              showConfirmButton: false,
                              timer: 1500
                            });
                        }
                    });
                });
            }
        }
    }

</script>
