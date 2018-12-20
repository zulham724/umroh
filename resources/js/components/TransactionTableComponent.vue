<template>
    <table class="table table-striped" id="table">
        
    </table>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            $("#table").DataTable({
                ajax:function(data,callback,settings){
                    axios.get('/transactions/byauth').then(res=>{
                        callback(res);
                    });
                },
                columns:[
                    {title:'Order ID',data:'order.id'},
                    {title:'Transaction ID',data:'id'},
                    {title:'Amount',data:function(val){
                        return "Rp "+val.order.total_amount.toLocaleString();
                    }},
                    {title:'Staus',data:'transaction_statuses[0].description'},
                ]
            });
        }
    }
</script>
