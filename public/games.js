(() => {
    const urlParams = new URLSearchParams(window.location.search); 
    const genreId = urlParams.get('genreId');
    const query = urlParams.get('query');
    
    let page = 1;
    
    const loadGames = () => {
        $.ajax({
            url: 'juegosAsync.php',
            data: {
                genreId,
                query,
                page
            },
            dataType: 'html'
        }).done((html) => {
            $('#content').html(html);
        }).fail((err) => {
            console.log(err);
        });
    };
    
    $(document).ready(() => {
        $(document).on('click', '#prev', () => {
            page -= 1;
            loadGames();
        });

        $(document).on('click', '#next', () => {
            page += 1;
            loadGames();
        });

        loadGames();
    });
})();
