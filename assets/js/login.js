$('button[data-dismiss=alert]').click((e)=>{
    let $parent = $(e.target).closest('.alert');
    $parent.alert('close')
})

