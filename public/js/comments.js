$(document).ready(() => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    const loadComments =(id=$('#last-post').val(),post=$('#post-id').val()) => {
        let html;
        $.ajax({
            url:'/more',
            method:'post',
            data: `id=${id}&post=${post}`,
            success: data => {
                html = "";
                data.forEach(comment => {
                    console.log(comment);
                    if(comment['owned'] != true) {
                        icon = `<span class="iconify  post-icon" data-icon="mdi:comment-text-multiple-outline" data-inline="false"></span>`;
                    }
                    else {
                        icon = `<a href='${comment['id']}/comments/remove'><span class="iconify  post-icon" data-icon="ic:baseline-delete-forever" data-inline="false"></span></a>`;
                    }
                    html+= `
                            <div class="comment patch">
                                <a href="/profile/${comment['created_by']}">
                                    <div class='info'>
                                        <img src="${comment['grav']}">
                                        <p class='post-author'>${comment['author']}</p>
                                        <p class='post-date'>${comment['created_at']}Z</p>
                                    </div>
                                </a>
                                <div class="text">
                                    <p>${comment['comment']}</p>
                                </div>
                                ${icon}
                            </div>
                        `;
                        $('#last-post').val(comment['id']);
                    });
                    $('.comments').append(html);
                    updateDates();
                    if(data[4]) {
                        setTimeout(()=> {
                                $(window).scroll(scrollHandler);
                            },1000) 
                        }             
            }
        })
    }

    loadComments();
    let scrollActive = false;
    let scrollHandler = ()=> {
        if($(document).scrollTop() + $(window).height() > $(document).height() - 200 && scrollActive == false) {
            scrollActive = true;
            $(window).off("scroll");
            let height = $(document).height();
            loadComments();
            setTimeout(() => {
                scrollActive = false;
            }, 500);
        }
    };
    $(window).scroll(scrollHandler);
});