(() => {
    const urlParams = new URLSearchParams(window.location.search); 
    const gameId = urlParams.get('gameId');
    let page = 1;
    
    const loadComments = () => {
        $.ajax({
            url: 'comentariosAsync.php',
            data: {
                gameId,
                page
            },
            dataType: 'html'
        }).done((html) => {
            $('#comments').html(html);
            $('.comment-rating').rating();
        }).fail((err) => {
            console.log(err);
        });
    };
    
    $(document).ready(() => {
        $(document).on('click', '#prev', () => {
            page -= 1;
            loadComments();
        });

        $(document).on('click', '#next', () => {
            page += 1;
            loadComments();
        });

        loadComments();
    });
})();
