$(document).ready(function () {
    let favorite = $('.favorite');
    let shopId;
    favorite.on('click', function () {
        let $this = $(this);
        shopId = $this.data('shop-id');

        //ajax処理スタート
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/favorite',
            method: 'POST',
            data: {
                'shop_id': shopId
            },
        })

        //通信成功した時の処理
        .done(function (data) {
        $this.toggleClass('favorited');
        })
        //通信失敗した時の処理
        .fail(function () {
        console.log('fail');
        });
    });
});
