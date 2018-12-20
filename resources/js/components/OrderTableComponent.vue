<template>
    <div class="table-responsive">
        <table class="table table-striped" id="table">
            
        </table>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            $("#table").DataTable({
                ajax:function(data,callback,settings){
                    axios.get('/orders/byauth').then(res=>{
                        callback(res);
                    });
                },
                columns:[
                    {title:'Order ID',data:'id'},
                    {title:'Plan',data:'plan.name'},
                    {title:'Berangkat',data:function(val){
                        return new Date(val.schedule.start_at).toDateString();
                    }},
                    {title:'Pulang',data:function(val){
                        return new Date(val.schedule.end_at).toDateString();
                    }},
                    {title:'Amount',data:function(val){
                        return "Rp "+val.total_amount.toLocaleString();
                    }},
                    {title:'Dibayar',data:function(val){
                        return "Rp "+val.sum_transaction_value.toLocaleString();
                    }},
                    {title:'Status',data:'order_statuses[0].description'}
                ]
            });
        }
    }
</script>
