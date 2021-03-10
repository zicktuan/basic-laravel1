$(function() {
    $(document).on('click', '.btn-action-add-page-js', handleCreatePage);
    $(document).on('click', '.btn-action-update-page-js', handleUpdatePage);

});
function handleCreatePage(e) {

    e.preventDefault();

    let link = window.location.pathname.split('/')[1] + '/admin_cpanel/page/manage';

    let urlRequest = $(this).data('url');

    let page_title = $('.page-title').val(),
        page_slug = $('.page-slug').val(),
        page_content = $('.page-content').val();

    $.ajax({
        type: 'POST',
        url: urlRequest,
        data: {
            page_title,
            page_slug,
            page_content
        },
        success: (data) => {
            if (200 === data.code) {
                $('.info-after-sm').css('display', 'block');
                $('.info-after-sm').text('Thêm mới dữ liệu thành công');
                setTimeout(() =>{
                    $('.info-after-sm').css('display', 'none');
                }, 3000);

                document.location.href = document.location.origin + "/" +link;

            }
        }
    });
}

const handleUpdatePage = (e) => {

    e.preventDefault();

    let link = window.location.pathname.split('/')[1] + '/admin_cpanel/page/manage';

    let urlRequest = $('.request-url-update').val();

    let page_title = $('.page-title').val(),
        page_slug = $('.page-slug').val(),
        page_content = $('.page-content').val(),
        token = $('input[name="_token"]').val();

    $.ajax({
        type: 'POST',
        url: urlRequest,
        data: {
            _token: token,
            page_title,
            page_slug,
            page_content
        },
        success: (data) => {
            if (200 === data.code) {
                $('.info-after-sm').css('display', 'block');
                $('.info-after-sm').text('Cập nhập dữ liệu thành công');
                setTimeout(() =>{
                    $('.info-after-sm').css('display', 'none');
                }, 3000);

                document.location.href = document.location.origin + "/" +link;
            }
        }
    });
};