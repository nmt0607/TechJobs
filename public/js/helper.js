$("document").ready(function(){
    // $(".select2-box").select2({
    //     placeholder: "Chọn type",
    //     allowClear: true,
    // });

    window.addEventListener('setSelect2', event => {
        let id = $('#buyDateEdit').attr('id');
        $(".select2-box").select2({
            width: 'resolve',
        });

    });
    
    
        window.livewire.on('closeModalCreateEdit', () => {
            $('#modelCreateEdit').modal('hide');
        });
   

});