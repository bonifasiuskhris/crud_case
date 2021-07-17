<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

<script>
    $('#add_new_component').click(function() {
        console.log('test');
        $('#employee_component_master').clone().appendTo('#employee_component_duplicate');
    });

    $('#btnContDel').click(function() {
        var indextgl = $('.groupContent').length - 1;
        if (indextgl > 0) {
            // $('.formKontenCategory').eq(indextgl).parent().remove();
            $('.groupContent').eq(indextgl).remove();
        }
        if (quantity > 1) {
            quantity--;
            $('#InputAdQty').val(quantity);
        }
    });

    $('#period_id').change(function(){
        var period_id = $(this).val();
        console.log(period_id)
        $.ajax({
            url: "{{ url('payroll/employee_list') }}",
            type: 'GET',
            data: {
                period_id: period_id,
            },
            beforeSend: () => {
            },
            success: (data) => {
                $('#employee_id').prop('disabled', false).html('').html(data.option);
                $('#period_month_year').val(data.period.month_year)
                console.log(new Date(data.period.month_year));
            },
            complete: () => {
                // $('#price_table_view').unblock();
            }
        })
    });
</script>
