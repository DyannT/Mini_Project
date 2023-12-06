$('button[data-dismiss=alert]').click((e)=>{
    let $parent = $(e.target).closest('.alert');
    $parent.alert('close')
})

$('.js-delete-post').click((e)=>{
    let $this = $(e.target).closest('.js-delete-post');
    let $id = $this.attr('data-id');
    let $btnConfirmDelete = $('#deleteConfirmModal .js-delete-confirm');
    let $href = $btnConfirmDelete.attr('data-href');

    $btnConfirmDelete.attr('href','');
    $btnConfirmDelete.attr('href', $href + $id)
})