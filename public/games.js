(() => {
    const urlParams = new URLSearchParams(window.location.search); 
    const genreId = urlParams.get('genreId');
    const query = urlParams.get('query');
    let isDescending = urlParams.get('isDescending') || true;
    let sort = urlParams.get('sort') || 'puntuacion';
    let page = 1;
    
    const loadGames = () => {
        $.ajax({
            url: 'juegosAsync.php',
            data: {
                genreId,
                query,
                sort,
                isDescending,
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
        
        $(document).on('click', '#direction', () => {
            const char = $('#direction').text();
            isDescending = !isDescending;
            $('#direction').text(isDescending ? '↑' :'↓')
            
            page = 1;
            loadGames();
        });
        
        $(document).on('change', '#sort', () => {
            page = 1;
            sort = $('#sort').val();
            loadGames();
        });

        loadGames();
    });
})();
