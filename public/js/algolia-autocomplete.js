$(document).ready(function(){
    $('.js-user-autocomplete').autocomplete({ hint: false }, [
        {
            source: function(query, cb){
                cb([
                    {value:'foo'},
                    {value:'bar'}
                ]);
            }
        }
    ]).on('autocomplete:selected', function(event, suggestion, dataset, context) {
        console.log(event, suggestion, dataset, context);
    });
});
